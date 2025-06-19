<?php
require_once __DIR_ROOT__ . '/app/services/TermService.php';
require_once __DIR_ROOT__ . '/app/services/ProductService.php';
require_once __DIR_ROOT__ . '/app/services/PostService.php';
class HomeController extends Controller {
    public array $data = [];
    private TermService $termService;
    private ProductService $productService;
    private PostService $postService;
    public function __construct() {
        $this->termService = new TermService();
        $this->productService = new ProductService();
        $this->postService = new PostService();
    }
    public function index () {
        $this->data['sub_content']['page_title'] = "Trang chủ";
        $this->data['sub_content']['product_categories'] = $this->termService->getTerms('product_cat');
        $this->data['sub_content']['products'] = $this->productService->getAll(); // Lấy tất cả sản phẩm
        $this->data['sub_content']['pro_cats'] = $this->productService->getProductCategory('2'); // Lấy sản phẩm theo danh mục
        $this->data['sub_content']['news'] = $this->postService->getPostLimit('post', '3');
        $this->data['content'] = 'frontend/pages/home'; // truyền dữ liệu qua bên view
        $this->render('frontend/templates/app_layout', $this->data);
    }
}

?>
