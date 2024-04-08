<?php
class CategoriesModel extends Model {
    public $__table = 'categories';

    #[\Override] function tableFill()
    {
        return $this->__table;
    }

    #[\Override] function fieldFill(){
        return '*';
    }
    #[\Override] function primaryKey(){
        // TODO: Implement primaryKey() method.
    }
    // Lấy ra danh sách chuyên mục sản phẩm
    public function getListCategory() {
        return $this->db->table('categories')->get();
    }
    public function categoryName($id){
        return $this->db->table('categories')
            ->select('name')
            ->where('id', '=', $id)
            ->first();
    }
    public function insert($data){
        $this->db->table('categories')
            ->insert($data);
    }
//    public function update($data, $id){
//        $this->db->table('categories')
//            ->where('id', '=', $id)
//            ->update($data);
//    }
    public function deleteCategory($id){
        $this->db->table('categories')
            ->where('id', '=', $id)
            ->delete();
    }
}