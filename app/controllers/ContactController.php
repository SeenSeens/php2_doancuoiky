<?php
class ContactController extends Controller {
    public array $data = [];
    public function __construct(){
    }

    public function index(){
        $this->data['sub_content']['page_title'] = 'Liên hệ';
         $this->data['content'] = 'frontend/pages/contact';
        $this->render('frontend/templates/app_layout', $this->data);
    }
}


