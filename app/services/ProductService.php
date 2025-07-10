<?php
require_once __DIR_ROOT__ . '/app/services/BaseService.php';
require_once __DIR_ROOT__ . '/app/repositories/ProductRepository.php';
require_once __DIR_ROOT__ . '/app/repositories/ProductTermRelationshipRepository.php';
require_once __DIR_ROOT__ . '/helper/FlashMessage.php';
class ProductService extends BaseService{
    protected ProductRepository $productRepository;
    protected ProductTermRelationshipRepository $productTermRelationshipRepository;
    public function __construct(){
        $this->productRepository = new ProductRepository();
        $this->productTermRelationshipRepository = new ProductTermRelationshipRepository();
    }
    public function saveProduct($id, $routes){
        try {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') :
                $data = FormInputHelper::inputValueProduct();
                if (!empty($id)) {
                    $this->productRepository->updateProduct($data, $id);
                    $product_id = $id;
                    $message = "Cập nhật sản phẩm thành công!";
                } else {
                    $this->productRepository->insertProduct($data);
                    $product_id = $this->productRepository->getLastId();
                    $message = "Thêm mới sản phẩm thành công!";
                }

                $this->handleTerms($product_id);

                // Trả về kết quả
                FlashMessage::set('success', $message);

                header("Location: " . __WEB_ROOT__ . "/admin/" . $routes);
                exit();
            endif;
        } catch (Exception $e) {
            return ['success' => false, 'message' => "Có lỗi xảy ra: " . $e->getMessage()];
        }
    }
    public function deleteProduct($id){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!isset($_POST['id']) || empty($_POST['id'])) {
                echo json_encode(['success' => false, 'message' => 'Thiếu ID post']);
                exit;
            }

            $postId = intval($_POST['id']);
            $deleted = $this->productRepository->deleteProduct($postId);

            echo json_encode(['success' => $deleted]);
            exit;
        }
    }
    // Lấy tất cả sản phẩm
    public function getAll(){
        return $this->productRepository->getAll();
    }

    // Lấy ra 1 sản phẩm theo id
    public function findProductById( $id ){
        return $this->productRepository->findProductById( $id );
    }
    // Lấy ra 1 sản phẩm theo slug
    public function findProductBySlug( $slug ){
        return $this->productRepository->findProductBySlug( $slug );
    }
    // Lấy ra sản phẩm theo chuyên mục
    public function getProductCategory( $id ){
        return $this->productRepository->getProductCategory($id);
    }
    // Lấy ra sản phẩm liên quan theo chuyên mục bằng id sản phẩm
    public function relatedProductById( $cat_id, $product_id, $number ){
        return $this->productRepository->relatedProductById( $cat_id, $product_id, $number );
    }
    // Lấy ra sản phẩm liên quan theo chuyên mục bằng slug sản phẩm
    public function relatedProductBySlug( $cat_id, $product_slug, $number ){
        return $this->productRepository->relatedProductBySlug( $cat_id, $product_slug, $number );
    }

    // Gán sản phẩm vào danh mục
    private function handleTerms(int $product_id){
        $category_ids = SanitizeUtils::sanitizeInputArray($_POST['category'] ?? []);
        $tag_ids = SanitizeUtils::sanitizeInputArray($_POST['tag'] ?? []);
        $term_taxonomy_ids = array_merge($category_ids, $tag_ids);
        // Gán term cho bài viết
        $this->productTermRelationshipRepository->attachTermsToProduct($product_id, $term_taxonomy_ids);
    }
}

?>