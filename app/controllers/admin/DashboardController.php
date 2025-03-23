<?php
class DashboardController extends Controller {
    public array $data = [];
    public function index() {
        $this->data['sub_content']['page_title'] = "Trang quản trị";
        $this->data['content'] = 'backend/dashboard';
        $this->render('backend/admin_layout', $this->data);
    }

}
?>