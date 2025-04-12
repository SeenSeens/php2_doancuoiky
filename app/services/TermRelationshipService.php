<?php
require_once __DIR_ROOT__ . '/app/services/BaseService.php';
require_once __DIR_ROOT__ . '/app/repositories/TermRelationshipRepository.php';
class TermRelationshipService extends BaseService {
    protected TermRelationshipRepository $termRelationshipRepository;

    public function __construct() {
        $this->termRelationshipRepository = new TermRelationshipRepository();
    }
}