<?php
class ProductTermRelationshipsModel extends Model {
    private string $__table = 'product_term_relationships';
    function tableFill(){
        return $this->__table;
    }

    function fieldFill(){
        return '*';
    }

    function primaryKey(){
        return 'id';
    }


}