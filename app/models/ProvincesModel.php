<?php
class ProvincesModel extends Model{
    private string $__table = 'provinces';
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