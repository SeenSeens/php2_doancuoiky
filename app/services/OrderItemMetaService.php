<?php
require_once __DIR_ROOT__ . '/app/services/BaseService.php';
require_once __DIR_ROOT__ . '/app/repositories/OrderItemMetaRepository.php';
class OrderItemMetaService extends BaseService{
    private $orderItemMetaRepository;
    public function __construct(){
        $this->orderItemMetaRepository = new OrderItemMetaRepository();
    }
}