<?php
require_once __DIR_ROOT__ . '/helper/FormInputHelper.php';
class CategoryController extends Controller{
    public array $data = [];
    private mixed $terms;
    private TermService $termService;
    public function __construct(){
        $this->terms = $this->model('CategoriesModel');
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
//        $this->saveCategory();
//        TermsHelper::insertTerm( $id = null, 'category', 'category');
        $this->termService->saveTerm(null, 'category', 'category');
    }

    public function editCategory($id) {
        $this->data['category'] = $this->termService->findCategory($id);
        $this->saveCategory($id);
        $this->category();
    }
    public function deleteCategory() {
        if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
            try {
                // Đọc và giải mã dữ liệu JSON từ yêu cầu
                $data = json_decode(file_get_contents('php://input'), true);

                // Kiểm tra nếu ID danh mục tồn tại trong dữ liệu
                if (!empty($data['id'])) {
                    $result = $this->terms->deleteTerm($data['id']); // Gọi hàm xóa danh mục

                    if ($result) {
                        echo json_encode([
                            'success' => true,
                            'message' => 'Danh mục đã được xóa thành công!'
                        ]);
                    } else {
                        // Trả về lỗi nếu việc xóa không thành công
                        http_response_code(500); // Internal Server Error
                        echo json_encode([
                            'error' => 'Không thể xóa danh mục. Vui lòng thử lại!'
                        ]);
                    }
                } else {
                    // Trả về phản hồi lỗi nếu thiếu ID
                    http_response_code(400); // Bad Request
                    echo json_encode([
                        'error' => 'Thiếu ID danh mục trong yêu cầu'
                    ]);
                }
            } catch (Exception $e) {
                // Xử lý ngoại lệ nếu có lỗi xảy ra trong quá trình xóa
                http_response_code(500); // Internal Server Error
                echo json_encode([
                    'error' => 'Đã xảy ra lỗi khi xử lý yêu cầu',
                    'details' => $e->getMessage()
                ]);
            }
        } else {
            // Trả về lỗi nếu phương thức không hợp lệ
            http_response_code(405); // Method Not Allowed
            echo json_encode([
                'error' => 'Phương thức không được hỗ trợ. Chỉ chấp nhận DELETE.'
            ]);
        }
    }

    private function dataCategory(){
        $this->data['sub_content']['categories'] = $this->terms->getCategory();
    }

    private function saveCategory($id = null) {
        try {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $data = FormInputHelper::inputValueTerm();
                if ($id) {
                    // Nếu có ID => cập nhật
                    $result = $this->terms->updateTerm($data, $id);
                    $message = "Cập nhật thành công!";
                } else {
                    // Nếu không có ID => tạo mới
                    $result = $this->terms->insertTerm($data, 'category');
                    $message = "Đăng ký thành công!";
                }

                if ($result) {
                    $_SESSION['success'] = $message;
                } else {
                    $_SESSION['error'] = "Thao tác thất bại.";
                }
                header("Location: " . __WEB_ROOT__ . "/admin/category");
                exit();
            }
        } catch (Exception $e) {
            $_SESSION['error'] = "Có lỗi xảy ra: " . $e->getMessage();
            header("Location: " . __WEB_ROOT__ . "/admin/category");
            exit();
        }
    }

}