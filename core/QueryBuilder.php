<?php
trait QueryBuilder{
    protected string $tableName = '';
    protected string $where = '';
    protected string $operator = '';
    protected string $selectField = '*';
    protected string $limit = '';
    protected string $orderBy = '';
    protected string $innerJoin = '';
    protected array $groupConcatFields = [];
    protected string $groupBy = '';
    public function table( $tableName ){
        $this->tableName = $tableName;
        return $this;
    }
    public function where( $field, $compare, $value ){
        if(empty($this->where)){
            $this->operator = ' WHERE ';
        } else {
            $this->operator = ' AND ';
        }
        $this->where .= "$this->operator $field $compare '$value'";
        return $this;
    }
    public function orWhere($field, $compare, $value) {
        if(empty($this->where)){
            $this->operator = ' WHERE ';
        } else {
            $this->operator = ' OR ';
        }
        $this->where .= "$this->operator $field $compare '$value'";
        return $this;
    }
    public function whereLike($field, $value){
        if(empty($this->where)){
            $this->operator = ' WHERE ';
        } else {
            $this->operator = ' AND ';
        }
        $this->where .= "$this->operator $field LIKE '$value'";
        return $this;
    }
    public function select($field = '*'){
        $this->selectField = $field;
        return $this;
    }
    public function limit($number, $offset = 0){
        $this->limit = "LIMIT $offset, $number";
        return $this;
    }

    /**
     * ORDER BY id DESC
     * $this->db->orderBy('id', 'DESC')
     * $this->db->orderBy('id ASC, name DESC')
     */
    public function orderBy($field, $type = 'ASC'){
        $fieldArr = array_filter( explode(',', $field) );
        if( !empty($fieldArr) && count($fieldArr) >= 2){
            // SQL order by multi
            $this->orderBy = "ORDER BY " . implode(', ', $fieldArr);
        } else {
            $this->orderBy = "ORDER BY " . $field . " " . $type;
        }
        return $this;
    }
    public function get(){
        if (!empty($this->groupConcatFields)) {
            if ($this->selectField === '*') {
                $this->selectField = implode(', ', $this->groupConcatFields);
            } else {
                $this->selectField .= ', ' . implode(', ', $this->groupConcatFields);
            }
        }
        $sqlQuery = "SELECT $this->selectField FROM $this->tableName $this->innerJoin $this->where $this->groupBy $this->orderBy $this->limit";
        $sqlQuery = trim($sqlQuery);
        $query = $this->query($sqlQuery);
        // Reset field
        $this->resetQuery();

        if (!empty($query)){
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        return false;
    }
    // Group by

    public function groupBy($field) {
        $this->groupBy = "GROUP BY " . $field . " ";
        return $this;
    }

    // Inner join
    public function join($tableName, $relationShip){
        $this->innerJoin .= " INNER JOIN " . $tableName . " ON " . $relationShip . " ";
        return $this;
    }
    // Left join
    public function leftJoin($tableName, $relationship) {
        $this->innerJoin .= " LEFT JOIN " . $tableName . " ON " . $relationship . " ";
        return $this;
    }
    // groupConcat() – hỗ trợ thêm các field GROUP_CONCAT(...) vào câu lệnh SELECT
    public function groupConcat($field, $alias = null, $separator = ', ', $distinct = false, $orderBy = null, $condition = null) {
        $gc = "GROUP_CONCAT(";
        if ($distinct) $gc .= "DISTINCT ";

        // Nếu có điều kiện (CASE WHEN ...)
        if ($condition) {
            $gc .= "CASE WHEN $condition THEN $field END";
        } else {
            $gc .= $field;
        }

        // ORDER BY bên trong GROUP_CONCAT
        if ($orderBy) {
            $gc .= " ORDER BY $orderBy";
        }

        $gc .= " SEPARATOR '$separator')";

        if ($alias) {
            $gc .= " AS $alias";
        }

        $this->groupConcatFields[] = $gc;
        return $this;
    }

    // Insert
    public function insert($data){
        $tableName = $this->tableName;
        return $this->insertData($tableName, $data);
    }
    // LastId
    public function lastId(){
        return $this->lastInsertId();
    }
    // Update
    public function update($data){
        $whereUpdate = str_replace('WHERE', '', $this->where);
        $whereUpdate = trim($whereUpdate);
        $tableName = $this->tableName;
        $statusUpdate = $this->updateData($tableName, $data, $whereUpdate);
        return $statusUpdate;
    }
    // Delete
    public function delete(){
        $whereDelete = str_replace('WHERE', '', $this->where);
        $whereDelete = trim($whereDelete);
        $tableName = $this->tableName;
        $statusDelete = $this->deleteData($tableName, $whereDelete);
        return $statusDelete;
    }
    // Lấy 1 bản ghi
    public function first(){
        $sqlQuery = "SELECT $this->selectField FROM $this->tableName $this->innerJoin $this->where $this->groupBy $this->orderBy $this->limit";
        $query = $this->query($sqlQuery);

        // Reset field
        $this->resetQuery();

        if (!empty($query)){
            return $query->fetch(PDO::FETCH_ASSOC);
        }
        return false;
    }
    public function insertOrUpdate($data, $updateFields = [], $parentId = null, $parentKey = '') {

        // Thêm parent ID vào dữ liệu nếu cần
        if ($parentId !== null) {
            $data[$parentKey] = $parentId;
        }

        // Tạo danh sách cột và giá trị để chèn
        $columns = implode(', ', array_keys($data));
        $placeholders = ':' . implode(', :', array_keys($data));

        // Xử lý phần `ON DUPLICATE KEY UPDATE`
        $updateQuery = '';
        if (!empty($updateFields)) {
            $updateSet = [];
            foreach ($updateFields as $field) {
                $updateSet[] = "$field = VALUES($field)";
            }
            $updateQuery = 'ON DUPLICATE KEY UPDATE ' . implode(', ', $updateSet);
        }

        // Xây dựng câu SQL hoàn chỉnh
        $sql = "INSERT INTO $this->tableName ($columns) VALUES ($placeholders) $updateQuery";

        // Thực hiện chuẩn bị và bind dữ liệu
        $stmt = $this->query($sql);
        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }

        // Thực thi query và trả về kết quả
        return $stmt->execute();
    }

    // Trong BaseQueryBuilder hoặc trait QueryBuilder
    public function paginate($limit = 10, $page = 1) {
        $offset = ($page - 1) * $limit;

        $totalQuery = clone $this;
        $total = $totalQuery->count(); // tổng số dòng

        $this->limit($limit)->offset($offset);
        $data = $this->get();

        return [
            'data' => $data,
            'total' => $total,
            'perPage' => $limit,
            'currentPage' => $page,
            'totalPages' => ceil($total / $limit),
        ];
    }

    public function resetQuery(){
        $this->tableName = '';
        $this->where = '';
        $this->operator = '';
        $this->selectField = '*';
        $this->limit = '';
        $this->orderBy = '';
        $this->innerJoin = '';
        $this->groupConcatFields = [];
        $this->groupBy = '';


    }
}
?>
