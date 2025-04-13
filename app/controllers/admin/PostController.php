<?php
require_once __DIR_ROOT__ . '/app/services/TermService.php';
require_once __DIR_ROOT__ . '/app/services/PostService.php';
class PostController extends Controller {
    public array $data = [];
    private PostService $postService;
    private TermService $termService;
    private mixed $post, $term_relationships, $term_taxonomy;
    public function __construct() {
        $this->postService = new PostService();
        $this->termService = new TermService();
    }

    public function index() {
        $this->data['sub_content']['page_title'] = "Bài viết";
        $this->data['sub_content']['posts'] = $this->postService->allPosts( 'post' );
        $this->data['content'] = 'backend/post/index';
        $this->render('backend/admin_layout', $this->data);
    }
    public function create() {
        $this->data['sub_content']['page_title'] = "Thêm bài viết";
        $this->categories();
        $this->tags();
        $this->postService->savePost(null, 'post', 'post-new' );
        $this->data['text-add-form'] = [
            'routes' => 'post-new',
            'button' => 'Xuất bản',
        ];
        $this->data['content'] = 'backend/post/post';
        $this->render('backend/admin_layout', $this->data);
    }

    public function edit($id){
        $this->data['post'] = $this->postService->findPost( $id );
        $this->data['sub_content']['page_title'] = "Sửa bài viết";
        $this->categories();
        $this->tags();
        $this->data['text-edit-form'] = [
            'routes' => 'post/edit_id=' . $id,
            'button' => 'Cập nhập',
        ];
        $this->postService->savePost( intval( $id ),'post','post/edit_id=' . $id );
        $this->data['content'] = 'backend/post/post';
        $this->render('backend/admin_layout', $this->data);
    }

    public function delete(){
        if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['id'])) {
            echo json_encode(['success' => false, 'message' => 'Yêu cầu không hợp lệ!']);
            exit;
        }
        $postId = intval($_POST['id']);
        $deleted = $this->postService->deletePost($postId);
        echo json_encode(['success' => $deleted, 'message' => $deleted ? 'Xóa thành công' : 'Xóa thất bại']);
        ob_clean();
        exit;
    }

    private function categories(){
        $this->data['categories'] = $this->termService->getTerms('category');
    }

    private function tags() {
        $this->data['tags'] = $this->termService->getTerms('tag');
    }
}
?>