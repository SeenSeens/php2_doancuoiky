<?php
class TermRepository extends BaseRepository {
    private $db;

    public function __construct() {
        parent::__construct('TermsModel');
    }
    public function insertTerm($data, $taxonomy = ''){
        try {
            // Khởi động transaction để đảm bảo tính toàn vẹn dữ liệu

            // Thêm vào bảng terms
            $this->db->table( $this->model->tableFill() )->insert($data);
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
    }
}
?>