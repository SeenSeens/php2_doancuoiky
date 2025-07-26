<?php
class OrderItemsModel extends Model{
    private string $__table = 'order_items';
    public function tableFill(){
        return $this->__table;
    }

    public function fieldFill(){
        return '*';
    }

    public function primaryKey(){
        return 'id';
    }
}