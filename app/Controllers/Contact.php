<?php
class Contact extends Controller {
    public array $data = [];

    public function index(){
        $this->data['sub_content']['title'] = 'Liên hệ';
        $this->data['content'] = 'frontend/pages/contact';
        $this->render('frontend/app_layout', $this->data);
    }
}


