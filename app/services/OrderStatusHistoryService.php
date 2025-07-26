<?php
require_once __DIR_ROOT__ . '/app/services/BaseService.php';
require_once __DIR_ROOT__ . '/app/repositories/OrderStatusHistoryService.php';
class OrderStatusHistoryService extends BaseService{
    private $orderStatusHistoryRepository;
    public function __construct(){
        $this->orderStatusHistoryRepository = new OrderStatusHistoryRepository();
    }
}