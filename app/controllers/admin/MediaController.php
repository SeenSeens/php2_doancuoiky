<?php
class MediaController extends Controller{
    public array $data = [];

    function index(){
        $this->data['sub_content']['page_title'] = "Thư viện";
        $this->data['content'] = 'backend/media/index';
        $this->render('backend/admin_layout', $this->data);
    }

    function create(){
        $this->data['sub_content']['page_title'] = "Tải lên";
        $this->data['content'] = 'backend/media/index';
        $this->render('backend/admin_layout', $this->data);
    }
}

?>