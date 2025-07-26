<?php
require_once __DIR_ROOT__ . '/app/repositories/BaseRepository.php';

class OrderStatusHistoryRepository extends BaseRepository{
    private string $table = 'order_status_history';
    public function __construct(){
        parent::__construct('OrderStatusHistoryModel');
    }
}