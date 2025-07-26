<?php
class OrderItemMetaModel extends Model{
    private string $__table = 'order_item_meta';
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