<?php
require_once __DIR_ROOT__ . '/app/services/BaseService.php';
require_once __DIR_ROOT__ . '/app/repositories/PostRepository.php';
require_once __DIR_ROOT__ . '/app/repositories/PostTermRelationshipRepository.php';
require_once __DIR_ROOT__ . '/helper/FlashMessage.php';
class PostService extends BaseService {
    protected PostRepository $postRepository;
    protected PostTermRelationshipRepository $postTermRelationshipRepository;
    public function __construct() {
        $this->postRepository = new PostRepository();
        $this->postTermRelationshipRepository = new PostTermRelationshipRepository();
    }
    public function getPostExcerpt( $type ){
        return $this->postRepository->getPostExcerpt( $type );
    }
    public function getPaginatedPosts(int $limit = 10, int $page = 1, array $conditions = []) {
        return $this->postRepository->paginate($limit, $page, $conditions);
    }


    public function findPostBySlug( $type, $slug ){
        return $this->postRepository->findPostBySlug( $type, $slug );
    }
    public function findPost( $id ) {
        return $this->postRepository->findPost( $id );
    }
    public function allPosts( $type ) {
        return $this->postRepository->allPosts( $type );
    }
    public function menuItems( $type ) {
        return $this->postRepository->menuItems( $type );
    }
    public function savePost( $id, $type, $routes ) {
        try {
            if( $_SERVER['REQUEST_METHOD'] === 'POST' ) :
                $data = FormInputHelper::inputValuePost( $type );

                if ( !empty( $id )) {
                    $this->postRepository->updatePost($data, $id);
                    $post_id = $id;
                    $message = "Cập nhật thành công!";

                } else {
                    $this->postRepository->insertPost($data);
                    $post_id = $this->postRepository->getLastId();
                    $message = "Thêm thành công!";
                }

                $this->handleTerms($post_id);

                // Trả về kết quả
                FlashMessage::set('success', $message);

                header("Location: " . __WEB_ROOT__ . "/admin/" . $routes);
                exit();
            endif;
        } catch( Exception $e ) {
            FlashMessage::set('error', "Có lỗi xảy ra: " . $e->getMessage());
        }
    }


    public function deletePost( $id ) {
        if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
            if ( !isset($_POST['id'] ) || empty( $_POST['id'] ) ) {
                echo json_encode(['success' => false, 'message' => 'Thiếu ID post']);
                exit;
            }

            $postId = intval($_POST['id']);
            $deleted = $this->postRepository->deletePost($postId);

            echo json_encode(['success' => $deleted]);
            exit;
        }
    }

    // Lấy ra sản phẩm với số lượng nhất định
    public function getPostLimit( $type, $limit = 10 ){
        return $this->postRepository->getPostLimit( $type, $limit );
    }
    public function allPostsWithExcerpt( $type, $status ) {
        return $this->postRepository->allPostsWithExcerpt( $type, $status );
    }
    private function handleTerms(int $post_id) {
        $category_ids = SanitizeUtils::sanitizeInputArray($_POST['category'] ?? []);
        $tag_ids = SanitizeUtils::sanitizeInputArray($_POST['tag'] ?? []);
        $term_taxonomy_ids = array_merge($category_ids, $tag_ids);
        // Gán term cho bài viết
        $this->postTermRelationshipRepository->attachTermsToPost($post_id, $term_taxonomy_ids);
    }

}

?>