<?php
require_once __DIR_ROOT__ . '/app/repositories/BaseRepository.php';

class OrderRepository extends BaseRepository{
    private string $table = 'orders';
    public function __construct(){
        parent::__construct('OrdersModel');
    }
    public function getLastId(){
        return $this->db->table($this->table)
            ->lastInsertId();
    }
    public function insertOrder( $data ) {
        return $this->db->table( $this->table )->insert($data);
    }
    public function updateOrder($data, $id) {
        return $this->db->table( $this->table )
            ->where('id', '=', $id )
            ->update( $data );
    }
}