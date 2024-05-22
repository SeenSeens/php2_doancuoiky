<?php
class ProductsModel extends Model {
    public $__table = 'products';
    #[\Override] function tableFill(){
        return $this->__table;
    }

    #[\Override] function fieldFill(){
        return '*';
    }

    #[\Override] function primaryKey(){
        return 'id';
    }
    public function allProduct() {
        return $this->db->table('products as p')
            ->join('categories as c', 'p.category_id = c.id')
            ->select('p.id, p.title, p.thumbnail, p.price, p.description, c.name as category_name')
            ->get();
    }
    // Lấy ra sản phẩm theo chuyên mục
    public function getProductCategory(){
    }

    /**
     * Lấy sản phẩm mới nhất
     * @return array|false
     */
    public function latestProducts() {
        return $this->db->table('products')
            ->limit(3)
            ->get();
    }

    /**
     * Lấy sản phẩm liên quan theo chuyên mục
     * @param $catId
     * @param $proId
     * @return array|false
     */
    public function relatedProduct($catId, $proId) {
        return $this->db->table('products as p')
            ->join('categories as c', 'p.category_id = c.id')
            ->where('p.id', '!=', $proId)
            ->where('c.id', '=', $catId )
            ->limit(4)
            ->get();
    }

    /**
     * @param $data
     * @return bool
     */
    public function addProduct($data) {
        return $this->db->table('products')->insert($data);
    }
    function editProduct($data, $id) {
        return $this->db->table('products')
            ->where('id', '=', $id)
            ->update($data);
    }
    /**
     * @param $id
     * @return bool
     */
    public function deleteProduct($id) {
        return $this->db->table('products')
            ->where('id', '=', $id)
            ->delete();
    }
}
?>