<?php
class AboutController extends Controller {
    public array $data = [];

    public function __construct(){

    }

    public function index(){
        $this->data['sub_content']['page_title'] = "Giới thiệu";
        $this->data['content'] = 'frontend/pages/about';
        $this->render('frontend/app_layout', $this->data);
    }
}

?>
