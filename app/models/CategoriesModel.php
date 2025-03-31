<?php
require_once __DIR_ROOT__ . '/app/models/TermsModel.php';
class CategoriesModel extends TermsModel {

    public function getCategory() {
        return $this->db->table( $this->tableFill() )
            ->join('term_taxonomy', 'terms.id = term_taxonomy.term_id')
            ->where('term_taxonomy.taxonomy', '=', 'category')
            ->get();
    }
    public function findCategory($id) {
        return $this->db->table( $this->tableFill() )
            ->join('term_taxonomy', 'terms.id = term_taxonomy.term_id')
            ->where('terms.id', '=', $id)
            ->first();
    }
    public function insertCategory($data){
        try {
            // Khởi động transaction để đảm bảo tính toàn vẹn dữ liệu

            // Thêm vào bảng terms
            $this->db->table( $this->tableFill() )->insert($data);
            // Lấy term_id vừa thêm vào
            $termId = $this->db->lastInsertId();
            $dataTerm = [
                'term_id' => $termId,
                'taxonomy' => 'category',
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
}