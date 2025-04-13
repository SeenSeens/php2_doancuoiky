<?php
require_once __DIR_ROOT__ . '/app/services/TermService.php';
class ProductTagController extends Controller{
    public array $data = [];
    private TermService $termService;
    private string $taxonomy = 'product_tag';
    private string $router = 'product-tag';
    public function __construct(){
        $this->termService = new TermService();
    }

    // terms
    public function index() {
        $this->data['sub_content']['page_title'] = "Thẻ sản phẩm";
        $this->data['routes-new'] = $this->router . "-new";
        $this->data['text-form'] = [
            'title' => 'Thêm thẻ sản phẩm',
            'button' => 'Thêm thẻ sản phẩm'
        ];
        $this->data();
        $this->data['content'] = 'backend/terms/index';
        $this->render('backend/admin_layout', $this->data);

    }
    public function create() {
        $result = $this->termService->saveTerm(null, $this->taxonomy, $this->router );
        $_SESSION[$result['success'] ? 'success' : 'error'] = $result['message'];
        header("Location: " . __WEB_ROOT__ . "/admin/terms");
        exit();
    }

    public function edit( $id ) {
        $this->data['term'] = $this->termService->findTerm( $id );
        $this->data['routes-edit'] = $this->router . "/edit_id";
        $this->data['text-edit-form'] = [
            'title' => 'Sửa thẻ sản phẩm',
            'button' => 'Sửa thẻ sản phẩm'
        ];
        $this->termService->saveTerm( $id, $this->taxonomy, $this->router );
        $this->index();
    }
    public function delete() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['id'])) {
            echo json_encode(['success' => false, 'message' => 'Yêu cầu không hợp lệ!']);
            exit;
        }
        $termId = intval($_POST['id']);
        $deleted = $this->termService->deleteTerm($termId);
        echo json_encode(['success' => $deleted, 'message' => $deleted ? 'Xóa thành công' : 'Xóa thất bại']);
        ob_clean();
        exit;
    }

    private function data(){
        $this->data['taxonomy'] = $this->router;
        $this->data['sub_content']['terms'] = $this->termService->getTerms( $this->taxonomy );

    }

}