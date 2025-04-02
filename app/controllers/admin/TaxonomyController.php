<?php
class TaxonomyController extends Controller{
    public array $data = [];
    private mixed $terms, $term_taxonomy, $term_relationships;
    public function __construct(){
        $this->terms = $this->model('TermsModel');
    }

    // terms
    public function category() {
        $this->data['sub_content']['page_title'] = "Danh mục";
        $this->data['sub_content']['routes'] = '/admin/terms-new';
        $this->data['sub_content']['categories'] = $this->terms->getCategory();
        $this->data['content'] = 'backend/terms/index';
        $this->render('backend/admin_layout', $this->data);
    }
    public function createCategory() {
        try {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Lấy thông tin từ dữ liệu JSON
                $name = trim(htmlspecialchars(strip_tags('name'), ENT_QUOTES, 'UTF-8'));
                $slug = trim(htmlspecialchars(strip_tags('slug'), ENT_QUOTES, 'UTF-8'));
                $description = trim(htmlspecialchars(strip_tags('description'), ENT_QUOTES, 'UTF-8'));
                // Kiểm tra xem các trường có bị bỏ trống
                if ( empty($name) || empty($slug) ) {
                    $_SESSION['error'] = "Vui lòng điền đầy đủ thông tin!";
                    header("Location: " . __WEB_ROOT__ . "/admin/terms");
                    exit();
                }

                // Tạo array để thêm vào database
                $data = [
                    'name' => $name,
                    'slug' => $slug,
                    'description' => $description,
                ];

                $result = $this->terms->insertCategory($data);

                if ($result) {
                    $_SESSION['success'] = "Đăng ký thành công!";
                    header("Location: " . __WEB_ROOT__ . "/admin/terms");
                    exit();
                } else {
                    $_SESSION['error'] = "Đăng ký thất bại.";
                    header("Location: " . __WEB_ROOT__ . "/admin/terms");
                    exit();
                }
            }
        } catch (\Throwable $th) {
            // Trả về lỗi nếu có exception
            echo json_encode(['success' => false, 'message' => 'Có lỗi xảy ra: ' . $th->getMessage()]);
        }

    }

    public function updateCategory($id) {

        $this->data['sub_content']['term'] = $this->terms->find($id);
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



    // post_tag
    public function postTag() {
        $this->data['sub_content']['page_title'] = "Thẻ";
        $this->data['sub_content']['button_title'] = "Thêm thẻ mới";
        $this->data['content'] = 'backend/post_tag/index';
        $this->render('backend/admin_layout', $this->data);
    }
    // product_brand
    public function productBrand(){
        $this->data['sub_content']['page_title'] = "Thương hiệu";
        $this->data['sub_content']['button_title'] = "Thêm thương hiệu mới";
        $this->data['content'] = 'backend/post_tag/index';
        $this->render('backend/admin_layout', $this->data);
    }
    // product_cat
    public function productCat(){
        $this->data['sub_content']['page_title'] = "Danh mục sản phẩm";
        $this->data['sub_content']['button_title'] = "Thêm danh mục mới";
        $this->data['content'] = 'backend/post_tag/index';
        $this->render('backend/admin_layout', $this->data);
    }
    // product_tag
    public function productTag(){
        $this->data['sub_content']['page_title'] = "Thẻ sản phẩm";
        $this->data['sub_content']['button_title'] = "Thêm thẻ mới";
        $this->data['content'] = 'backend/post_tag/index';
        $this->render('backend/admin_layout', $this->data);
    }


    public function  productAttributes(){
        $this->data['sub_content']['page_title'] = "Các thuộc tính";
        $this->render('backend/admin_layout', $this->data);
    }
    public function productReviews(){
        $this->data['sub_content']['page_title'] = "Đánh giá";
        $this->render('backend/admin_layout', $this->data);
    }

}