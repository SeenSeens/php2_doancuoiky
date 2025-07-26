<?php
require_once __DIR_ROOT__ . '/app/repositories/BaseRepository.php';

class OrderItemMetaRepository extends BaseRepository{
    private string $table = 'order_item_meta';
    public function __construct(){
        parent::__construct('OrderItemMetaModel');
    }
}