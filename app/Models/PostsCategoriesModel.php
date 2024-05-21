<?php
class PostsCategoriesModel extends Model {
    public $__table = 'category_posts';
    #[\Override] function tableFill(){
        return $this->__table;
    }

    #[\Override] function fieldFill(){
        return '*';
    }

    #[\Override] function primaryKey(){
        return 'id';
    }
    /*function getPostCategory(){

    }
    function addPostCategory($data): bool {
        return $this->db->table($this->__table)->insert($data);
    }
    function deletePostCategory($id): bool {
        return $this->db->table($this->__table)
            ->where('id', '=', $id)
            ->delete();
    }
    function updatePostCategory($data, $id){
        return $this->db->table($this->__table)
            ->where('id', '=', $id)
            ->update($data);
    }*/
}
?>