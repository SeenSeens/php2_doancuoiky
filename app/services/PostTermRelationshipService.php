<?php
require_once __DIR_ROOT__ . '/app/services/BaseService.php';
require_once __DIR_ROOT__ . '/app/repositories/PostTermRelationshipRepository.php';
class PostTermRelationshipService extends BaseService {
    protected PostTermRelationshipRepository $postTermRelationshipRepository;

    public function __construct() {
        $this->postTermRelationshipRepository = new PostTermRelationshipRepository();
    }
}