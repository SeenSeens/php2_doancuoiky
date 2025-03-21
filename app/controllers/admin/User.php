<?php
class User extends Controller{
    public array $data = [];
    public $users;
    public function __construct() {
        $this->users = $this->model('UserModel');
    }
    public function index() {
        $this->data['sub_content']['page_title'] = 'Thành viên';
        $this->data['content'] = 'backend/user/index';
        $this->render('backend/admin_layout', $this->data);
    }
    public function create() {
        $this->data['sub_content']['page_title'] = 'Thêm thành viên';
        $this->data['content'] = 'backend/user/create';
        $this->render('backend/admin_layout', $this->data);
    }
    public function delete() {}

    public function profile() {
        $this->data['sub_content']['page_title'] = 'Hồ sơ';
        $this->data['content'] = 'backend/user/profile';
        $this->render('backend/admin_layout', $this->data);
    }
}