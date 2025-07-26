<?php
class DistrictsModel extends Model{
    private string $__table = 'districts';
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