<?php
class NewsController extends Controller {
    public array $data = [];
    public function __construct() {

    }
    public function index () {
        $this->data['sub_content']['page_title'] = "Tin tức";
        $this->data['content'] = 'frontend/pages/news'; // truyền dữ liệu qua bên view
        $this->render('frontend/app_layout', $this->data);
    }
}

?>
