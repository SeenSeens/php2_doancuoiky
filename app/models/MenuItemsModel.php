<?php
class MenuItemsModel extends Model{
    public string $__table = 'menu_items';
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