<?php
class MenusModel extends Model{
    public string $__table = 'menus';
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