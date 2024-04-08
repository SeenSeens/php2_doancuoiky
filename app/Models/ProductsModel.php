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
        return $this->db->table('products')
            ->join('categories', 'products.category_id = categories.id')
            ->where('products.id', '!=', $proId)
            ->where('categories.id', '=', $catId )
            ->limit(4)
            ->get();
    }
    public function deletedProduct($id) {
        return $this->db->table('products')
            ->where('id', '=', $id)
            ->delete();
    }
}
?>