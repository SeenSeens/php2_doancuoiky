<?php
require_once __DIR_ROOT__ . '/app/repositories/BaseRepository.php';
class TermRelationshipRepository extends BaseRepository {
    private string $table = 'term_relationships';
    public function __construct() {
        parent::__construct('TermRelationshipsModel');
    }

    public function attachTermsToPost($post_id, array $term_taxonomy_ids) {
        foreach ($term_taxonomy_ids as $term_id) {
            $this->db->table('term_relationships')
                ->insert([
                    'post_id' => $post_id,
                    'term_taxonomy_id' => $term_id,
                ]);
        }
    }
}