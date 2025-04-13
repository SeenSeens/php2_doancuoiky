<?php
require_once __DIR_ROOT__ . '/app/services/BaseService.php';
require_once __DIR_ROOT__ . '/app/repositories/ProductRepository.php';

class ProductService extends BaseService{
    protected ProductRepository $productRepository;

    public function __construct(){
        $this->productRepository = new ProductRepository();
    }
    public function saveProduct($id, $routes){
        try {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') :
                $data = FormInputHelper::inputValuePost();

                if (!empty($id)) {
                    $this->productRepository->updateProduct($data, $id);
                    $message = "Cập nhật thành công!";
                } else {
                    $this->productRepository->insertProduct($data);
                    $message = "Đăng ký thành công!";
                }

                // Trả về kết quả
                $result = ['success' => true, 'message' => $message];

                header("Location: " . __WEB_ROOT__ . "/admin/" . $routes);
                exit();
            endif;
        } catch (Exception $e) {
            return ['success' => false, 'message' => "Có lỗi xảy ra: " . $e->getMessage()];
        }
    }
    public function deletePost($id)
    {
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
    public function getPost($type){
        return $this->productRepository->getPost($type);
    }

    public function findPost($id){
        return $this->productRepository->findPost($id);
    }

    public function allPosts($type)
    {
        return $this->productRepository->allPosts($type);
    }






    private function handleTerms(int $post_id)
    {
        $category_ids = SanitizeUtils::sanitizeInputArray($_POST['category'] ?? []);
        $tag_ids = SanitizeUtils::sanitizeInputArray($_POST['tag'] ?? []);
        $term_taxonomy_ids = array_merge($category_ids, $tag_ids);
        // Gán term cho bài viết
        $this->termRelationshipRepository->attachTermsToPost($post_id, $term_taxonomy_ids);
    }
}

?>