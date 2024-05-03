<?php
class Productcategory extends Controller {
    public array $data = [];
    public $categories;
    public function __construct() {
        $this->categories = $this->model('CategoriesModel');
    }
    public function index() {
        try {
            $dataCategory = $this->categories->all(); // Lấy tất cả chuyên mục
            $this->data['sub_content']['page_title'] = "Chuyên mục sản phẩm";
            $this->data['sub_content']['category'] = $dataCategory;
            $this->data['content'] = 'backend/pages/products/category';
            $this->render('backend/dashboard', $this->data);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function insert(){
        // V1
        /*try {
            if ( isset($_POST['saveCategory'])) :
                $name = $_POST['name'];
                $slug = $_POST['slug'];
                $description = $_POST['description'];
                $thumbnail = $_POST['thumbnail'];
                $data = [
                    'name' => $name,
                    'slug' => $slug,
                    'description' => $description,
                    'thumbnail' => $thumbnail,
                ];
                $this->categories->insertCategory($data);
                header('Location: ' . __WEB_ROOT__ . '/admin/chuyen-muc-san-pham');
                exit();
            endif;
        } catch ( \Exception $e ) {
        }*/

        try {
            $form_data = json_decode(file_get_contents('php://input'),true);
            $message = '';
            $validation_error = '';
            if ( !empty($form_data['name']) && !empty($form_data['slug'])) :
                $name = $form_data['name'];
                $slug = $form_data['slug'];
                $description = isset($form_data['description']) ? $form_data['description'] : '';
                $thumbnail = isset($form_data['thumbnail']) ? $form_data['thumbnail'] : '';
//                $parent_id = isset($form_data['parent_id']) ? $form_data['parent_id'] : '';

                $data = [
                    'name' => $name,
                    'slug' => $slug,
                    'description' => $description,
                    'thumbnail' => $thumbnail,
//                    'parent_id' => $parent_id
                ];
                $this->categories->insertCategory($data);
               /* if ($statement->execute($data)) :
                    $message = 'Dữ liệu đã được chèn';
                endif;*/

            else :
                $validation_error = 'Tên và slug là các trường bắt buộc';
            endif;

            $output = [
                'error' => $validation_error,
                'message' => $message
            ];

            return json_encode($output);
        }catch (PDOException $e) {
            echo json_encode(['error' => 'Đã xảy ra lỗi khi chèn danh mục']);
        }

    }
    public function update() {
        try {
            $form_data = json_decode(file_get_contents('php://input'), true);
            if (isset($form_data['id'])) :
                $id = $form_data['id'];
                $name = $form_data['name'];
                $slug = $form_data['slug'];
                $description = $form_data['description'];
                $thumbnail = $form_data['thumbnail'];
                // Perform validation if required

                // Assuming $this->categories is your model
                $data = [
                    'name' => $name,
                    'slug' => $slug,
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
                    $this->categories->deleteCategory($categoryId);
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