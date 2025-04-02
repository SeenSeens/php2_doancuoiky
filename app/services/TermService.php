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
                switch ($id) {
                    case true:
                        $result = $this->termRepository->updateTerm($data, $id);
                        $message = "Cập nhật thành công!";
                        break;
                    case false:
                        $result = $this->termRepository->insertTerm($data, $taxonomy);
                        $message = "Đăng ký thành công!";
                        break;
                }

                 $result = true
                    ? ['success' => true, 'message' => $message]
                    : ['success' => false, 'message' => "Thao tác thất bại."];

                 header("Location: " . __WEB_ROOT__ . "/admin/" . $routes);
                 exit();
            }
        } catch (Exception $e) {
            return ['success' => false, 'message' => "Có lỗi xảy ra: " . $e->getMessage()];
        }
    }


    public function deleteTerm( $id ) {
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