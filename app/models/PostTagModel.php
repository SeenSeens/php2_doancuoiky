<?php
class PostTagModel extends TermsModel {
    public function insertPostTag($data){
        try {
            // Khởi động transaction để đảm bảo tính toàn vẹn dữ liệu
            $this->db->beginTransaction();

            // Thêm vào bảng terms
            $sql1 = $this->db->table('terms')->insert($data);
            // Lấy term_id vừa thêm vào
            $termId = $this->db->lastInsertId();
            $dataTerm = [
                'term_id' => $termId,
                'taxonomy' => 'tag',
            ];
            // Thêm vào bảng term_taxonomy
            $sql2 = $this->db->table('term_taxonomy')->insert($dataTerm);

            // Commit transaction
            $this->db->commit();
            return $termId; // Trả về term_id mới thêm
        } catch (Exception $e) {
            // Rollback nếu có lỗi
            $this->db->rollBack();
            echo "Lỗi thêm danh mục: " . $e->getMessage();
            return false;
        }
    }
}