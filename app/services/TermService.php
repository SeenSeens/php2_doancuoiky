<?php
// require_once __DIR_ROOT__ . '/helper/FormInputHelper.php';
require_once __DIR_ROOT__ . '/app/services/BaseService.php';
require_once __DIR_ROOT__ . '/app/repositories/TermRepository.php';
class TermService extends BaseService {
    protected $termRepository;

    public function __construct() {
        $this->termRepository = new TermRepository();
    }
    public function getTerms( $taxonomy ){
        return $this->termRepository->getTerms( $taxonomy );
    }
    public function findTerm( $id ) {
        return $this->termRepository->findTerm( $id );
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

    public function deleteTerm( $id ) {
        header('Content-Type: application/json');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!isset($_POST['id']) || empty($_POST['id'])) {
                echo json_encode(['success' => false, 'message' => 'Thiếu ID term']);
                exit;
            }

            $termId = intval($_POST['id']);
            $deleted = $this->termRepository->deleteTerm($termId);

            // ✅ Chỉ trả JSON, không có HTML / script
            echo json_encode(['success' => $deleted]);
            exit;
        }
    }

}

?>