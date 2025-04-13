<?php
class ProductsModel extends Model {
    public string $__table = 'products';
    #[\Override] function tableFill(){
        return $this->__table;
    }

    #[\Override] function fieldFill(){
        return '*';
    }

    #[\Override] function primaryKey(){
        return 'id';
    }

}
?>