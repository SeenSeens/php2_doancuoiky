<?php
require_once __DIR_ROOT__ . '/helper/FormInputHelper.php';
require_once __DIR_ROOT__ . '/app/services/TermService.php';
class CategoryController extends Controller{
    public array $data = [];
    private TermService $termService;
    public function __construct(){
        $this->termService = new TermService();
    }

    // category
    public function category() {
        $this->data['sub_content']['page_title'] = "Danh mục";
        $this->dataCategory();
        $this->data['content'] = 'backend/category/index';
        $this->render('backend/admin_layout', $this->data);

    }
    public function createCategory() {
        $result = $this->termService->saveTerm(null, 'category', 'category');
        $_SESSION[$result['success'] ? 'success' : 'error'] = $result['message'];
        header("Location: " . __WEB_ROOT__ . "/admin/category");
        exit();
    }

    public function editCategory( $id ) {
        $this->data['category'] = $this->termService->findTerm( $id );
        $this->termService->saveTerm( $id, 'category', 'category' );
        $this->category();
    }
    public function deleteCategory() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['id'])) {
            echo json_encode(['success' => false, 'message' => 'Yêu cầu không hợp lệ!']);
            exit;
        }
        $termId = intval($_POST['id']);
        // Gọi Service để xử lý xóa term
        $deleted = $this->termService->deleteTerm($termId);

        echo json_encode(['success' => $deleted, 'message' => $deleted ? 'Xóa thành công' : 'Xóa thất bại']);
        ob_clean(); // Xóa tất cả dữ liệu đệm ( loại bỏ HTML không mong muốn )
        exit;
    }


    private function dataCategory(){
        $this->data['sub_content']['categories'] = $this->termService->getTerms('category');
    }

}