<?php
require_once __DIR_ROOT__ . '/helper/FormInputHelper.php';
class TermService extends BaseService {
    protected $termRepository;

    public function __construct() {
        $this->termRepository = new TermRepository();
    }

    public function saveTerm($id, $taxonomy, $routes) {
        try {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $data = FormInputHelper::inputValueTerm();
                if ($id) {
                    // Cập nhật
                    $result = $this->termRepository->updateTerm($data, $id);
                    $message = "Cập nhật thành công!";
                } else {
                    // Thêm mới
                    $result = $this->termRepository->insertTerm($data, $taxonomy);
                    $message = "Đăng ký thành công!";
                }

                if ($result) {
                    $_SESSION['success'] = $message;
                } else {
                    $_SESSION['error'] = "Thao tác thất bại.";
                }
                header("Location: " . __WEB_ROOT__ . "/admin/" . $routes);
                exit();
            }
        } catch (Exception $e) {
            $_SESSION['error'] = "Có lỗi xảy ra: " . $e->getMessage();
            header("Location: " . __WEB_ROOT__ . "/admin/" . $routes);
            exit();
        }
    }
}

?>