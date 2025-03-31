<?php
class AuthController extends Controller{
    public array $data = [];
    public $users;
    public function __construct() {
        $this->users = $this->model('UserModel');
    }
    public function register(){
        if( $_SERVER['REQUEST_METHOD'] == 'POST' ){
            $username = trim(htmlspecialchars(strip_tags($_POST['username']), ENT_QUOTES, 'UTF-8'));
            $email = trim(filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL));
            $password = trim(htmlspecialchars(strip_tags($_POST['password']), ENT_QUOTES, 'UTF-8'));
            $confirm_password = trim(htmlspecialchars(strip_tags($_POST['confirm_password']), ENT_QUOTES, 'UTF-8'));
            // Kiểm tra xem các trường có bị bỏ trống
            if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
                $_SESSION['error'] = "Vui lòng điền đầy đủ thông tin!";
                header("Location: " . __WEB_ROOT__ . "/admin/register");
                exit();
            }
            // Kiểm tra mật khẩu khớp nhau
            if ($password !== $confirm_password) {
                $_SESSION['error'] = "Mật khẩu không khớp";
                header("Location: " . __WEB_ROOT__ . "/admin/register");
                exit();
            }
            // Kiểm tra email có hợp lệ không
            if (!$email) {
                $_SESSION['error'] = "Email không hợp lệ!";
                header("Location: " . __WEB_ROOT__ . "/admin/register");
                exit();
            }
            // Kiểm tra tài khoản tồn tại
            $user = $this->users->findId($email);
            if ($user) {
                $_SESSION['error'] = "Email đã tồn tại.";
                header("Location: " . __WEB_ROOT__ . "/admin/register");
                exit();
            }
            // Mã hóa mật khẩu
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);
            // Lưu vào database
            $data = [
                'username' => $username,
                'email' => $email,
                'password' => $hashed_password
            ];
            $result = $this->users->register($data);
            if ($result) {
                $_SESSION['success'] = "Đăng ký thành công!";
                header("Location: " . __WEB_ROOT__ . "/admin/login");
                exit();
            } else {
                $_SESSION['error'] = "Đăng ký thất bại.";
                header("Location: " . __WEB_ROOT__ . "/admin/register");
                exit();
            }
        }

        $this->data['sub_content']['page_title'] = 'Đăng ký';
        $this->data['content'] = 'backend/auth/register';
        $this->render('backend/account', $this->data);
    }
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = trim(htmlspecialchars(strip_tags($_POST['email']), ENT_QUOTES, 'UTF-8'));
            $password = trim(htmlspecialchars(strip_tags($_POST['password']), ENT_QUOTES, 'UTF-8'));
            // Kiểm tra email có hợp lệ hay không
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                die('Email không hợp lệ.');
            }
            // Truy vấn thông tin người dùng theo email
            $user = $this->users->selectUser($email);
            if (!$user || !password_verify($password, $user['password'])) {
                die('Sai email hoặc mật khẩu.');
            }
            // Thiết lập session sau khi đăng nhập thành công
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];

            // Chuyển hướng người dùng dựa trên vai trò
            if ($this->users->isAdmin($email)) {
                header("Location: " . __WEB_ROOT__ . "/admin");
            } else {
                header("Location: " . __WEB_ROOT__ );
            }
            exit();  // Thêm exit để đảm bảo không thực thi code phía sau sau redirect
            }
        $this->data['sub_content']['page_title'] = "Đăng nhập";
        $this->data['content'] = 'backend/auth/login';
        $this->render('backend/account', $this->data);
    }

    public function logout() {
        session_destroy();
        header("Location: " . __WEB_ROOT__ . '/admin/login');
        exit();
    }
    public function forgotPassword(){
        $this->data['sub_content']['page_title'] = 'Quên mật khẩu';
        $this->data['content'] = 'backend/auth/forgot_password';
        $this->render('backend/account', $this->data);
    }

}