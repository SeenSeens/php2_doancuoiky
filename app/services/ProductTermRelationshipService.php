<?php
require_once __DIR_ROOT__ . '/app/services/BaseService.php';
require_once __DIR_ROOT__ . '/app/repositories/ProductRepository.php';
require_once __DIR_ROOT__ . '/app/repositories/ProductTermRelationshipRepository.php';
class ProductTermRelationshipService extends BaseService{
    protected ProductTermRelationshipRepository $productTermRelationshipRepository;

    public function __construct(){
        $this->productTermRelationshipRepository = new ProductTermRelationshipRepository();
    }
    public function getSelectedTermIds($product_id, $taxonomy) {
        return $this->productTermRelationshipRepository->getTermIdsByProductAndTaxonomy($product_id, $taxonomy);
    }

}