<?php
class TermRelationshipsModel extends Model {
    private string $__table = 'term_relationships';
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