<?php
class User extends Controller{
    public array $data = [];
    public $users;
    public function __construct() {
        $this->users = $this->model('UserModel');
    }

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
}