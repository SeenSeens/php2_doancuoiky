<?php
abstract class Model extends Database {
    protected $db;
    abstract public function tableFill();
    abstract public function fieldFill();
    abstract public function primaryKey();
    public function __construct() {
        $this->db = new Database();
    }
    // Lấy tất cả bản ghi
    public function all() {
        $tableName = $this->tableFill();
        $fieldSelect = $this->fieldFill();
        if( empty( $fieldSelect )) {
            $fieldSelect = ' * ';
        }
        $sql = "SELECT $fieldSelect FROM $tableName";
        $query = $this->db->query( $sql );
        if( !empty( $query ) ) {
            return $query->fetchAll( PDO::FETCH_ASSOC );
        }
        return false;
    }

    // Lấy 1 bản ghi
    public function find($id) {
        $tableName = $this->tableFill();
        $fieldSelect = $this->fieldFill();
        $primaryKey = $this->primaryKey();
        if( empty( $fieldSelect )) {
            $fieldSelect = ' * ';
        }
        $sql = "SELECT $fieldSelect FROM $tableName WHERE $primaryKey = $id";
        $query = $this->db->query( $sql );
        if( !empty( $query ) ) {
            return $query->fetch( PDO::FETCH_ASSOC );
        }
        return false;
    }

    public function paginate($perPage = 10, $currentPage = 1) {
        $tableName = $this->tableFill();
        $fieldSelect = $this->fieldFill();
        $primaryKey = $this->primaryKey();

        // Tính toán vị trí bắt đầu của bản ghi
        $start = ($currentPage - 1) * $perPage;

        if(empty($fieldSelect)) {
            $fieldSelect = ' * ';
        }

        // Thực hiện truy vấn để lấy dữ liệu phân trang
        $sql = "SELECT $fieldSelect FROM $tableName LIMIT $start, $perPage";
        $query = $this->db->query($sql);

        if(!empty($query)) {
            $data = $query->fetchAll(PDO::FETCH_ASSOC);

            // Lấy tổng số lượng bản ghi
            $totalRecords = $this->count();

            // Tính toán số trang
            $totalPages = ceil($totalRecords / $perPage);

            return [
                'data' => $data,
                'total_pages' => $totalPages,
                'current_page' => $currentPage
            ];
        }
        return false;
    }

}
?>