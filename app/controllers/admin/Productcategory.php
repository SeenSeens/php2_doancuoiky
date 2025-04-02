<?php
class Productcategory extends Controller {
    public array $data = [];
    public $categories;
    public function __construct() {
        $this->categories = $this->model('CategoriesModelBk');
    }
    public function index() {
        try {
            $dataCategory = $this->categories->all(); // Lấy tất cả chuyên mục
            $this->data['sub_content']['page_title'] = "Chuyên mục sản phẩm";
            $this->data['sub_content']['terms'] = $dataCategory;
            $this->data['content'] = 'backend/products/terms';
            $this->render('backend/dashboard', $this->data);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function insert(){
        try {
            $form_data = json_decode(file_get_contents('php://input'),true);
            $message = '';
            $validation_error = '';
            // Kiểm tra xem các trường bắt buộc có được cung cấp không
            if ( !empty($form_data['name']) ) :
                $name = $form_data['name'];
                $description = $form_data['description'];
                // Sử dụng lớp ImageUpload
                $imageUpload = new ImageUpload("public/uploads/");
                $thumbnail = $imageUpload->upload($_FILES['thumbnail']);
                $data = [
                    'name' => $name,
                    'description' => $description,
                    'thumbnail' => basename($thumbnail),
                ];
                $this->categories->insertCategory($data);
                $message = 'Chuyên mục đã được thêm thành công!';
            else :
                $validation_error = 'Tên và mô tả là các trường bắt buộc';
            endif;

            $output = [
                'error' => $validation_error,
                'message' => $message
            ];

            return json_encode($output);
        }catch (PDOException $e) {
            echo json_encode(['error' => 'Đã xảy ra lỗi khi chèn danh mục: ' . $e->getMessage()]);
        }
    }
    public function update() {
        try {
            $form_data = json_decode(file_get_contents('php://input'), true);
            if (isset($form_data['id'])) :
                $id = $form_data['id'];
                // Lấy thông tin chuyên mục hiện tại
                $cat = $this->categories->find($id);
                $name = $form_data['name'];
                $description = $form_data['description'];
                // Sử dụng lớp ImageUpload để xử lý ảnh mới
                $imageUpload = new ImageUpload();
                $thumbnail = $imageUpload->upload();
                // Nếu không có ảnh mới, giữ lại ảnh cũ
                if (empty($thumbnail)) {
                    $thumbnail = $cat['thumbnail'];
                }

                // Assuming $this->categories is your model
                $data = [
                    'name' => $name,
                    'description' => $description,
                    'thumbnail' => $thumbnail,
                ];

                // Assuming updateCategory method returns a Promise-like object
                $this->categories->updateCategory($data, $id);

                // Send response
                echo json_encode(['success' => true]);
            else :
                echo json_encode(['error' => 'Thiếu ID danh mục']);
                return;
            endif;

        } catch (\Exception $e) {
            echo json_encode(['error' => 'Đã xảy ra lỗi khi cập nhật danh mục: ' . $e->getMessage()]);
            return;
        }
    }

    public function delete(){
        try {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') :
                $data = json_decode(file_get_contents('php://input'), true);
                if (isset($data['id'])) :
                    $categoryId = $data['id'];
//                    $cat = $this->categories->find($categoryId);
                    // Lấy đường dẫn ảnh của chuyên mục
//                    $thumbnail = $cat['thumbnail'];
                    $this->categories->deleteCategory($categoryId);
                    // Xóa tệp ảnh khỏi thư mục lưu trữ nếu nó tồn tại
                    /*$imageUpload = new ImageUpload();
                    if ($imageUpload->delete($thumbnail)) {
                        // Xóa thành công
                        echo "Xóa ảnh thành công.";
                    } else {
                        // Xóa không thành công hoặc tệp không tồn tại
                        echo "Không thể xóa ảnh.";
                    }*/
                    echo json_encode(['success' => true]);
                    return;
                else:
                    echo json_encode(['error' => 'Thiếu ID danh mục']);
                    return;
                endif;
            else:
                echo json_encode(['error' => 'Phương thức yêu cầu không hợp lệ']);
                return;
            endif;
        } catch ( \Exception $e ) {
            echo json_encode(['error' => 'Đã xảy ra lỗi khi xóa danh mục: ' . $e->getMessage()]);
            return;
        }
    }
}
?>