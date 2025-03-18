<?php
class Dashboard extends Controller {
    public array $data = [];
    public function index() {
        $this->data['sub_content']['page_title'] = "Trang";
        $this->render('backend/dashboard');
        $this->render('backend/dashboard', $this->data);
    }

}
?>