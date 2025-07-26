<?php
require_once __DIR_ROOT__ . '/app/repositories/BaseRepository.php';

class OrderItemRepository extends BaseRepository{
    private string $table = 'order_items';
    public function __construct(){
        parent::__construct('OrderItemsModel');
    }
    public function insertOrderItem( $data ) {
        return $this->db->table( $this->table )->insert($data);
    }
    public function updateOrderItem($data, $id) {
        return $this->db->table( $this->table )
            ->where('id', '=', $id )
            ->update( $data );
    }
}