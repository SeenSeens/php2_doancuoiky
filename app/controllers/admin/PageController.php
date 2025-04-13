<?php
require_once __DIR_ROOT__ . '/app/services/TermService.php';
require_once __DIR_ROOT__ . '/app/services/PostService.php';
class PageController extends Controller {
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
        $this->data['sub_content']['posts'] = $this->postService->allPosts('page');
        $this->data['content'] = 'backend/post/index';
        $this->render('backend/admin_layout', $this->data);
    }
    public function create() {
        $this->data['sub_content']['page_title'] = "Thêm trang";
        $this->postService->savePost(null, 'page', 'page-new' );
        $this->data['text-add-form'] = [
            'routes' => 'page-new',
            'button' => 'Xuất bản',
        ];
        $this->data['content'] = 'backend/post/page';
        $this->render('backend/admin_layout', $this->data);
    }

    public function edit($id){
        $this->data['post'] = $this->postService->findPost( $id );
        $this->data['sub_content']['page_title'] = "Sửa trang";
        $this->data['text-edit-form'] = [
            'routes' => 'page/edit_id=' . $id,
            'button' => 'Cập nhập',
        ];
        $this->postService->savePost( intval( $id ),'page', 'page/edit_id=' . $id );
        $this->data['content'] = 'backend/post/page';
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
}
?>