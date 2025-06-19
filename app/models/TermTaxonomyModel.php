<?php
class TermTaxonomyModel extends Model{
    private string $__table = 'term_taxonomy';
    public function tableFill(){
        return $this->__table;
    }

    public function fieldFill(){
        return '*';
    }

    public function primaryKey(){
        return 'id';
    }

    public function insert($data){
        return $this->db->table($this->__table)->insert($data);
    }
}