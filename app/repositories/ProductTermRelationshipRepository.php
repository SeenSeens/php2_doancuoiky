<?php
require_once __DIR_ROOT__ . '/app/repositories/BaseRepository.php';
class ProductTermRelationshipRepository extends BaseRepository {
    private string $table = 'product_term_relationships';
    public function __construct() {
        parent::__construct('ProductTermRelationshipsModel');
    }
    public function attachTermsToProduct($product_id, array $term_taxonomy_ids) {
        // Xóa toàn bộ term cũ trước khi thêm mới
        $this->db->query("DELETE FROM $this->table WHERE object_id = ?", [$product_id]);
        if (empty($term_taxonomy_ids)) return;

        $values = [];

        foreach ($term_taxonomy_ids as $term_id) {
            $values[] = "($product_id, $term_id)";
        }

        $valueString = implode(", ", $values);

        // Cập nhật chính nó để tránh lỗi duplicate mà vẫn đúng logic
        $sql = "INSERT INTO $this->table ( object_id, term_taxonomy_id ) 
            VALUES $valueString
            ON DUPLICATE KEY UPDATE object_id = VALUES(object_id), term_taxonomy_id = VALUES(term_taxonomy_id)";

        $this->db->query($sql); // Dùng query thô vì không cần prepare
    }

    public function getTermIdsByProductAndTaxonomy($product_id, $taxonomy) {
        $result = $this->db->table( $this->table )
            ->select('term_taxonomy_id')
            ->join('term_taxonomy', $this->table.'.term_taxonomy_id = term_taxonomy.id')
            ->where($this->table.'.object_id', '=', $product_id )
            ->where('term_taxonomy.taxonomy', '=', $taxonomy)
            ->get();
        return array_column($result ?: [], 'term_taxonomy_id');
    }

}