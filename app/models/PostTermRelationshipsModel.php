<?php
class PostTermRelationshipsModel extends Model {
    private string $__table = 'post_term_relationships';
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