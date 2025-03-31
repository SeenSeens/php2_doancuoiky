<?php
class TermRelationshipsModel extends Model {
    private string $__table = 'term_relationships';
    protected function tableFill(){
        return $this->__table;
    }

    protected function fieldFill(){
        return '*';
    }

    protected function primaryKey(){
        return 'id';
    }
}