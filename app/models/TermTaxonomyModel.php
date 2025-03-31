<?php
class TermTaxonomyModel extends Model{
    private string $__table = 'term_taxonomy';
    protected function tableFill(){
        return $this->__table;
    }

    protected function fieldFill(){
        return '*';
    }

    protected function primaryKey(){
        return 'id';
    }

    public function insert($data){
        return $this->db->table($this->__table)->insert($data);
    }
}