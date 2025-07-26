<?php
class OrderStatusHistoryModel extends Model{
    private string $__table = 'order_status_history';
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