<?php
require_once __DIR_ROOT__ . '/app/services/ProductService.php';
require_once __DIR_ROOT__ . '/app/services/TermService.php';
class ProductController extends Controller{
    public array $data = [];
    private ProductService $productService;
    private TermService $termService;
    public function __construct(){
        $this->productService = new ProductService();
        $this->termService = new TermService();
    }

    public function index(){
        $this->data['sub_content']['page_title'] = "Danh mục sản phẩm";
        $this->data['content'] = 'frontend/woocommerce/archive'; // truyền dữ liệu qua bên view
        $this->render('frontend/templates/app_layout', $this->data);
    }

    // Hiển thị chi tiết sản phẩm
    public function detail ( $slug ) {
        $product = $this->productService->findProductBySlug( $slug );
        if (!$product) {
            return;
        }
        $this->data['sub_content']['page_title'] = $product['title'];
        $this->data['sub_content']['product'] = $product;
        $this->data['sub_content']['categories'] = $this->termService->getTerms('product_cat');
        $this->data['sub_content']['related_products'] = $this->productService->relatedProductBySlug($product['object_id'], $slug, 3);
        $this->data['content'] = 'frontend/woocommerce/single'; // truyền dữ liệu qua bên view
        $this->render('frontend/templates/app_layout', $this->data);
    }
    public function category ( $slug ) {
        $term = $this->termService->findTermBySlug( $slug );
        $this->data['sub_content']['page_title'] = $term['name'];
        $this->data['sub_content']['products'] = $this->productService->getProductCategory( $term['id'] ); // Lấy sản phẩm theo danh mục
        $this->data['sub_content']['product_categories'] = $this->termService->getTerms('product_cat');
        $this->data['content'] = 'frontend/woocommerce/archive';
        $this->render('frontend/templates/app_layout', $this->data);
    }
}

?>
