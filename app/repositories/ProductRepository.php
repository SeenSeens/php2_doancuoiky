<?php
require_once __DIR_ROOT__ . '/app/repositories/BaseRepository.php';

class ProductRepository extends BaseRepository{
    private string $table = 'products';

    public function __construct(){
        parent::__construct('ProductsModel');
    }

    public function insertProduct($data) {
        return $this->db->table( $this->table )->insert($data);
    }
    public function updateProduct($data, $id) {
        return $this->db->table( $this->table )
            ->where('id', '=', $id )
            ->update( $data );
    }
    public function deleteProduct($id) {
        return $this->db->table( $this->table )
            ->where('id', '=', $id )
            ->delete();
    }
    // Lấy ra id chuyên mục từ id sản phẩm
    function getCategoryId($id){
        return $this->db->table('products as p')
            ->where('p.id', '=', $id)
            ->select('p.category_id')
            ->get();
    }
    public function allProduct() {
        return $this->db->table('products as p')
            ->join('categories as c', 'p.category_id = c.id')
            ->select('p.id, p.title, p.thumbnail, p.price, p.description, c.name as category_name')
            ->get();
    }
    // Lấy ra sản phẩm theo chuyên mục
    public function getProductCategory($id){
        return $this->db->table('products as p')
            ->where('p.category_id', '=', $id)
            ->get();
    }

    // Lấy sản phẩm mới nhất
    public function latestProducts() {
        return $this->db->table('products')
            ->limit(3)
            ->get();
    }

    // Lấy sản phẩm liên quan theo chuyên mục
    public function relatedProduct($catId, $proId) {
        return $this->db->table('products as p')
            ->join('categories as c', 'p.category_id = c.id')
            ->where('p.id', '!=', $proId)
            ->where('c.id', '=', $catId )
            ->limit(4)
            ->get();
    }


}

?>
