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
    // Lấy tất cả sản phẩm
    public function getAll() {
        return $this->db->table( $this->table )
            ->select('products.title, products.slug, products.description, products.excerpt, products.price, products.thumbnail, terms.name, terms.slug as term_slug')
            ->join('product_term_relationships', 'products.id = product_term_relationships.object_id')
            ->join('term_taxonomy', 'product_term_relationships.term_taxonomy_id = term_taxonomy.id')
            ->join('terms', 'term_taxonomy.term_id = terms.id')
            ->get();
    }
    // Lấy ra 1 sản phẩm theo slug
    public function findProductBySlug( $slug ) {
        return $this->db->table( $this->table )
            ->where('slug', '=', $slug)
            ->first();
    }
    // Lấy ra sản phẩm theo chuyên mục nhất định
    public function getProductCategory( $id ){
        return $this->db->table('product_term_relationships')
            ->join('products', 'product_term_relationships.object_id = products.id')
            ->join('term_taxonomy', 'product_term_relationships.term_taxonomy_id = term_taxonomy.id')
            ->where('product_term_relationships.term_taxonomy_id', '=', $id)
            ->get();
    }

    // Lấy sản phẩm mới nhất
    public function latestProducts() {
        return $this->db->table( $this->table )
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
