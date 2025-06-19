<?php
require_once __DIR_ROOT__ . '/app/repositories/BaseRepository.php';
class ProductTermRelationshipRepository extends BaseRepository {
    private string $table = 'product_term_relationships';
    public function __construct() {
        parent::__construct('ProductTermRelationshipsModel');
    }

}