<?php
class Page extends Controller {
    public array $data = [];
    function index() {
        $this->data['sub_content']['page_title'] = "Trang";
        $this->data['content'] = 'backend/pages/page';
        $this->render('backend/dashboard', $this->data);
    }
    function add() {
        $this->data['sub_content']['page_title'] = "Thêm trang mới";
        $this->data['content'] = 'backend/pages/add_page';
        $this->render('backend/dashboard', $this->data);
    }
}
?>