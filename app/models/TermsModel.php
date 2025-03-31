<?php
class TermsModel extends Model {
    private string $__table = 'terms';
    protected function tableFill(){
        return $this->__table;
    }

    protected function fieldFill(){
        return '*';
    }

    protected function primaryKey(){
        return 'id';
    }

    /*public function insertTerm($data, $taxonomy = ''){
        try {
            // Khởi động transaction để đảm bảo tính toàn vẹn dữ liệu

            // Thêm vào bảng terms
            $this->db->table( $this->tableFill() )->insert($data);
            // Lấy term_id vừa thêm vào
            $termId = $this->db->lastInsertId();
            $dataTerm = [
                'term_id' => $termId,
                'taxonomy' => $taxonomy,
            ];
            // Thêm vào bảng term_taxonomy
            $this->db->table('term_taxonomy')->insert($dataTerm);

            // Commit transaction

            return $termId; // Trả về term_id mới thêm
        } catch (Exception $e) {
            // Rollback nếu có lỗi

            echo "Lỗi thêm danh mục: " . $e->getMessage();
            return false;
        }
    }
    public function updateTerm($data, $id){
        return $this->db->table('terms')
            ->where('id', '=', $id)
            ->update($data);
    }
    public function deleteTerm($id){
        return $this->db->table('terms')
            ->where('id', '=', $id)
            ->delete();
    }*/
}