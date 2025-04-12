<?php
require_once __DIR_ROOT__ . '/app/services/TermService.php';
require_once __DIR_ROOT__ . '/app/services/PostService.php';
class PostController extends Controller {
    public array $data = [];
    private PostService $postService;
    private TermService $termService;
    private string $router = 'post-new';
    private mixed $post, $term_relationships, $term_taxonomy;
    public function __construct() {
        $this->postService = new PostService();
        $this->termService = new TermService();

//        $this->post = $this->model('PostModel');
//        $this->term_relationships = $this->model('TermRelationshipsModel');
//        $this->term_taxonomy = $this->model('TermTaxonomyModel');
    }

    public function index() {
        $this->data['sub_content']['page_title'] = "Bài viết";
        $this->data['sub_content']['posts'] = $this->postService->allPosts();
        $this->data['content'] = 'backend/posts/index';
        $this->render('backend/admin_layout', $this->data);
    }
    public function create() {
        $this->data['sub_content']['page_title'] = "Thêm bài viết";
        $this->categories();
        $this->tags();
        $this->postService->savePost(null, $this->router );
        $this->data['text-add-form'] = [
            'button' => 'Xuất bản',
        ];
        $this->data['content'] = 'backend/posts/add_post';
        $this->render('backend/admin_layout', $this->data);
    }

    public function edit($id){
        $this->data['posts'] = $this->postService->findPost( $id );
        $this->data['sub_content']['page_title'] = "Sửa bài viết";
        $this->categories();
        $this->tags();
        $this->data['text-edit-form'] = [
            'button' => 'Cập nhập',
        ];
        $this->data['content'] = 'backend/posts/add_post';
        $this->render('backend/admin_layout', $this->data);
    }

    public function delete(){}

    private function categories(){
        $this->data['categories'] = $this->termService->getTerms('category');
    }

    private function tags() {
        $this->data['tags'] = $this->termService->getTerms('tag');
    }
}
?>