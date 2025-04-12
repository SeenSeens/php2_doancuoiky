<?php
require_once __DIR_ROOT__ . '/app/services/BaseService.php';
require_once __DIR_ROOT__ . '/app/repositories/PostRepository.php';
require_once __DIR_ROOT__ . '/app/repositories/TermRelationshipRepository.php';
class PostService extends BaseService {
    protected PostRepository $postRepository;
    protected TermRelationshipRepository $termRelationshipRepository;
    public function __construct() {
        $this->postRepository = new PostRepository();
        $this->termRelationshipRepository = new TermRelationshipRepository();
    }
    public function getPost( $type ){
        return $this->postRepository->getPost( $type );
    }
    public function findPost( $id ) {
        return $this->postRepository->findPost( $id );
    }
    public function allPosts() {
        return $this->postRepository->allPosts();
    }
    public function savePost( $id, $routes) {
        try {
            if( $_SERVER['REQUEST_METHOD'] == 'POST' ) :
                $data = FormInputHelper::inputValuePost();

                if ($id) {
                    $this->postRepository->updatePost($data, $id);
                    $post_id = $id;
                    $message = "Cập nhật thành công!";
                } else {
                    $this->postRepository->insertPost($data);
                    $post_id = $this->postRepository->getLastId();
                    $message = "Đăng ký thành công!";
                }

                $this->handleTerms($post_id);

                // Trả về kết quả
                $result = ['success' => true, 'message' => $message];

                header("Location: " . __WEB_ROOT__ . "/admin/" . $routes);
                exit();
            endif;
        } catch( Exception $e ) {
            return ['success' => false, 'message' => "Có lỗi xảy ra: " . $e->getMessage()];
        }
    }


    public function deletePost( $id ) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!isset($_POST['id']) || empty($_POST['id'])) {
                echo json_encode(['success' => false, 'message' => 'Thiếu ID post']);
                exit;
            }

            $postId = intval($_POST['id']);
            $deleted = $this->postRepository->deletePost($postId);

            echo json_encode(['success' => $deleted]);
            exit;
        }
    }

    /*public function createPostWithTerms(int $post_id, array $categories = [], array $tags = []) {
        $term_taxonomy_ids = array_merge($categories, $tags);
        $this->termRelationshipRepository->attachTermsToPost($post_id, $term_taxonomy_ids);
    }*/

    private function handleTerms(int $post_id) {
        $category_ids = SanitizeUtils::sanitizeInputArray($_POST['category'] ?? []);
        $tag_ids = SanitizeUtils::sanitizeInputArray($_POST['tag'] ?? []);
        $term_taxonomy_ids = array_merge($category_ids, $tag_ids);
        // Gán term cho bài viết
        $this->termRelationshipRepository->attachTermsToPost($post_id, $term_taxonomy_ids);
    }
}

?>