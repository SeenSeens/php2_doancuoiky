<?php
class Post extends Controller {
    public array $data = [];
    public $posts;
    public function __construct() {
        $this->posts = $this->model('PostsModel');
    }

    function index() {
        $this->data['sub_content']['page_title'] = "Bài viết";
        $this->data['sub_content']['posts'] = $this->posts->all();
        $this->data['content'] = 'backend/pages/post';
        $this->render('backend/dashboard', $this->data);
    }
    function add() {
        $this->data['sub_content']['page_title'] = "Thêm bài viết";
        $this->data['content'] = 'backend/pages/add_post';
        $this->render('backend/dashboard', $this->data);
    }


}
?>