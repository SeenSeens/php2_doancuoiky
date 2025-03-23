<?php
class PageController extends Controller {
    public array $data = [];
    function index() {
        $this->data['sub_content']['page_title'] = "Trang";
        $this->data['content'] = 'backend/pages/index';
        $this->render('backend/admin_layout', $this->data);
    }
    function create() {
        $this->data['sub_content']['page_title'] = "Thêm trang mới";
        $this->data['content'] = 'backend/pages/add_page';
        $this->render('backend/admin_layout', $this->data);
    }
}
?>