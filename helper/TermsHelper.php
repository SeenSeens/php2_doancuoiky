<?php
class TermsHelper {
    private mixed $terms;
    public function __construct(){
        $this->terms = $this->model('CategoriesModel');

    }
    public static function insertTerm($id = null, $taxonomy = '', $routes = 'terms'){
        try {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $name = trim(htmlspecialchars(strip_tags($_POST['name']), ENT_QUOTES, 'UTF-8'));
                $slug = trim(htmlspecialchars(strip_tags($_POST['slug']), ENT_QUOTES, 'UTF-8'));
                $description = trim(htmlspecialchars(strip_tags($_POST['description']), ENT_QUOTES, 'UTF-8'));
                // Tạo array để thêm hoặc cập nhật vào database
                $data = [
                    'name' => $name,
                    'slug' => $slug,
                    'description' => $description,
                ];
                if ($id) {
                    // Nếu có ID => cập nhật
                    $result = TermsHelper::terms->updateTerm($data, $id);
                    $message = "Cập nhật thành công!";
                } else {
                    // Nếu không có ID => tạo mới
                    $result = $this->terms->insertTerm($data, 'terms');
                    $message = "Đăng ký thành công!";
                }

                if ($result) {
                    $_SESSION['success'] = $message;
                } else {
                    $_SESSION['error'] = "Thao tác thất bại.";
                }
                header("Location: " . __WEB_ROOT__ . "/admin/" . $routes );
                exit();
            }
        } catch (Exception $e) {
            $_SESSION['error'] = "Có lỗi xảy ra: " . $e->getMessage();
            header("Location: " . __WEB_ROOT__ . "/admin/" . $routes );
            exit();
        }
    }
}