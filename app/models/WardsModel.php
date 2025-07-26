<?php
class WardsModel extends Model{
    private string $__table = 'wards';
    public function tableFill(){
        return $this->__table;
    }

    public function fieldFill(){
        return '*';
    }

    public function primaryKey(){
        return 'code';
    }
}