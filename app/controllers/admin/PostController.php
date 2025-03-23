<?php
class PostController extends Controller {
    public array $data = [];
    public $posts;
    public function __construct() {
        $this->posts = $this->model('PostsModel');
    }

    public function index() {
        $this->data['sub_content']['page_title'] = "Bài viết";
        $this->data['sub_content']['posts'] = $this->posts->all();
        $this->data['content'] = 'backend/posts/index';
        $this->render('backend/admin_layout', $this->data);
    }
    public function create() {
        try {
            if( isset($_POST['addPost'])) :
                $title = !empty($_POST['slug']) ? $_POST['slug'] : '';
                $slug = !empty($_POST['slug']) ? $_POST['slug'] : '';
                $slug = !empty($_POST['slug']) ? $_POST['slug'] : '';
                $slug = !empty($_POST['slug']) ? $_POST['slug'] : '';
                $slug = !empty($_POST['slug']) ? $_POST['slug'] : '';
                $slug = !empty($_POST['slug']) ? $_POST['slug'] : '';
            endif;
        } catch (\Throwable $th) {

        }
        $this->data['sub_content']['page_title'] = "Thêm bài viết";
        $this->data['content'] = 'backend/posts/add_post';
        $this->render('backend/admin_layout', $this->data);
    }

    public function update(){
        $this->data['sub_content']['page_title'] = "Sửa bài viết";
        $this->data['content'] = 'backend/posts/add_post';
        $this->render('backend/admin_layout', $this->data);
    }

    public function delete(){}
    public function category(){
        $this->data['sub_content']['page_title'] = "Danh ";
        $this->data['content'] = 'backend/posts/add_post';
        $this->render('backend/admin_layout', $this->data);
    }
}
?>