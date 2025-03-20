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
    function login() {
        $this->data['sub_content']['page_title'] = "Đăng nhập";
        $this->data['content'] = 'backend/pages/login';
        $this->render('backend/account', $this->data);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $user = $this->users->selectUser($email);
            var_dump($user);
            if ($user && password_verify($password, $user['password'])) {
                session_start();
                $_SESSION['user_id'] = $user['id'];
                if ($this->users->isAdmin($email)) {
                    header("Location: /admin/dashboard");
                } else {
                    header("Location: /");
                }
            } else {
                echo "Login failed";
            }
        }
    }
    public function profile() {
        $this->data['sub_content']['page_title'] = 'Hồ sơ';
        $this->data['content'] = 'backend/user/profile';
        $this->render('backend/admin_layout', $this->data);
    }
}