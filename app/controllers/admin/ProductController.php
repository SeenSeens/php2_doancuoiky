<?php
require_once __DIR_ROOT__ . '/app/services/ProductService.php';
require_once __DIR_ROOT__ . '/app/services/TermService.php';
require_once __DIR_ROOT__ . '/app/services/ProductTermRelationshipService.php';
class ProductController extends Controller {
    public array $data = [];
    private ProductService $productService;
    private TermService $termService;
    private ProductTermRelationshipService $productTermRelationshipService;
    public function __construct() {
        $this->productService = new ProductService();
        $this->termService = new TermService();
        $this->productTermRelationshipService = new ProductTermRelationshipService();
    }

    public function index() {
        $this->data['sub_content']['page_title'] = "Sản phẩm";
        $this->data['sub_content']['products'] = $this->productService->getAll();
        $this->data['content'] = 'backend/product/index';
        $this->render('backend/admin_layout', $this->data);
    }
    // Thêm mới sản phẩm
    public function create(){
        $this->data['sub_content']['page_title'] = "Thêm mới sản phẩm";
        $this->data['sub_content']['categories'] = $this->termService->getTerms('product_cat');
        $this->data['text-add-form'] = [
            'routes' => 'product-new',
            'button' => 'Xuất bản',
        ];
        $this->productService->saveProduct(null, 'product-new');
        $this->data['content'] = 'backend/product/add_product';
        $this->render('backend/admin_layout', $this->data);
    }
    function view($id) {
        $this->data['sub_content']['page_title'] = "Trang chủ";
        $this->data['sub_content']['product'] = $this->productService->findProductById($id);
        $this->data['sub_content']['terms'] = $this->termService->getTerms('product_cat');
        // Lấy sản phẩm liên quan
        $cat_id = $this->data['sub_content']['product']['term_taxonomy_id'];
        $this->data['sub_content']['related_products'] = $this->productService->relatedProductById($cat_id, $id, 3);
        $this->data['content'] = 'backend/product/product_detail';
        $this->render('backend/admin_layout', $this->data);
    }

    public function edit($id){
        // Lấy thông tin sản phẩm hiện tại
        $product = $this->productService->findProductById($id);
        $this->data['sub_content']['page_title'] = "Sửa sản phẩm";
        $this->data['sub_content']['product'] = $product;
        $this->data['sub_content']['terms'] = $this->termService->getTerms('product_cat');
        $this->data['sub_content']['selected_category_ids'] = $this->productTermRelationshipService->getSelectedTermIds($id, 'product_cat');

        $this->data['text-edit-form'] = [
            'routes' => 'product/edit_id=' . $id,
            'button' => 'Cập nhập',
        ];
        $this->productService->saveProduct($id, 'product/edit_id=' . $id);
        $this->data['content'] = 'backend/product/add_product';
        $this->render('backend/admin_layout', $this->data);
    }
    public function delete(){
        /*try {
            if ( !empty($id)) :
                $product = $this->products->find($id);
                // Lấy đường dẫn ảnh của sản phẩm
                $thumbnail = $product['thumbnail'];
                // Xóa sản phẩm khỏi cơ sở dữ liệu
                $this->products->deleteProduct($id);
                // Xóa tệp ảnh khỏi thư mục lưu trữ nếu nó tồn tại
                $imageUpload = new ImageUpload();
                if ($imageUpload->delete($thumbnail)) {
                    // Xóa thành công
                    echo "Xóa ảnh thành công.";
                } else {
                    // Xóa không thành công hoặc tệp không tồn tại
                    echo "Không thể xóa ảnh.";
                }

                header('Location: ' . __WEB_ROOT__ . '/admin/san-pham');
                exit();
            else:
                echo 'Id Không tồn tại';
            endif;
        } catch (\PDOException $e) {
            return 'Đã xảy ra lỗi khi xóa sản phẩm ';
        }*/
        if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['id'])) {
            echo json_encode(['success' => false, 'message' => 'Yêu cầu không hợp lệ!']);
            exit;
        }
        $postId = intval($_POST['id']);
        $deleted = $this->productService->deleteProduct($postId);
        echo json_encode(['success' => $deleted, 'message' => $deleted ? 'Xóa thành công' : 'Xóa thất bại']);
        ob_clean();
        exit;
    }

    function orders(){
        $this->data['sub_content']['page_title'] = "Trang chủ";
        $this->data['content'] = 'backend//product/order';
        $this->render('backend/dashboard', $this->data);
    }
}
?>