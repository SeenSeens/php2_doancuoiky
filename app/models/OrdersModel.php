<?php
class OrdersModel extends Model {
    public string $__table = 'orders';
    function tableFill(){
        return $this->__table;
    }

    function fieldFill(){
        return '*';
    }

    function primaryKey(){
        return 'id';
    }
    public function insertOrder($data): void {
        $this->db->table('orders')->insert($data);
    }
}