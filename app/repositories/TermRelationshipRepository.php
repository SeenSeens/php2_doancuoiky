<?php
require_once __DIR_ROOT__ . '/app/repositories/BaseRepository.php';
class TermRelationshipRepository extends BaseRepository {
    private string $table = 'term_relationships';
    public function __construct() {
        parent::__construct('TermRelationshipsModel');
    }

    /*public function attachTermsToPost($post_id, array $term_taxonomy_ids) {
        foreach ($term_taxonomy_ids as $term_id) {
            $this->db->table('term_relationships')
                ->insertOrUpdate([
                    'post_id' => $post_id,
                    'term_taxonomy_id' => $term_id,
                ]);
        }
    }*/
    public function attachTermsToPost($post_id, array $term_taxonomy_ids) {
        if (empty($term_taxonomy_ids)) return;

        $values = [];

        foreach ($term_taxonomy_ids as $term_id) {
            $values[] = "($post_id, $term_id)";
        }

        $valueString = implode(", ", $values);

        // Cập nhật chính nó để tránh lỗi duplicate mà vẫn đúng logic
        $sql = "INSERT INTO $this->table ( post_id, term_taxonomy_id ) 
            VALUES $valueString
            ON DUPLICATE KEY UPDATE post_id = VALUES(post_id), term_taxonomy_id = VALUES(term_taxonomy_id)";

        $this->db->query($sql); // Dùng query thô vì không cần prepare
    }

}