<?php
require_once __DIR_ROOT__ . '/app/services/BaseService.php';
require_once __DIR_ROOT__ . '/app/repositories/PostTermRelationshipRepository.php';
class PostTermRelationshipService extends BaseService {
    protected PostTermRelationshipRepository $postTermRelationshipRepository;

    public function __construct() {
        $this->postTermRelationshipRepository = new PostTermRelationshipRepository();
    }
    public function getSelectedTermIds($post_id, $taxonomy) {
        return $this->postTermRelationshipRepository->getTermIdsByPostAndTaxonomy($post_id, $taxonomy);
    }
}