<?php
class HomeController extends Controller {
    public array $data = [];
    public function __construct() {

    }
    public function index () {
        $this->data['sub_content']['page_title'] = "Trang chủ";
        $this->data['content'] = 'frontend/pages/home'; // truyền dữ liệu qua bên view
        $this->render('frontend/templates/app_layout', $this->data);
    }
}

?>
