<?php
class CommentController extends Controller {
    public array $data = [];
    function index() {
        $this->data['sub_content']['page_title'] = "Bình luận";
        $this->data['content'] = 'backend/comment/index';
        $this->render('backend/admin_layout', $this->data);
    }
}
?>