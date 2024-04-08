<?php
class Category extends Controller {
    public array $data = [];
    public $categories;
    public function __construct() {
        $this->categories = $this->model('CategoriesModel');
    }
    public function index() {
        $dataCategory = $this->categories->all(); // Lấy tất cả chuyên mục
        $this->data['sub_content']['page_title'] = "Trang chủ";
        $this->data['sub_content']['category'] = $dataCategory;
        $this->data['content'] = 'backend/pages/category'; // truyền dữ liệu qua bên view
        $this->render('backend/dashboard', $this->data);
    }
    public function indert(){
        $error = '';
        $message = '';
        $validation_error = '';
        $first_name = '';
        $last_name = '';

        try {
            if ( !empty($form_data->first_name) && !empty($form_data->last_name)) :
                $first_name = $form_data->first_name;
                $last_name = $form_data->last_name;
            endif;

            if (empty($error)) :
                if ($form_data->action === 'Insert') :
                    $data = [
                        ':first_name' => $first_name,
                        ':last_name' => $last_name
                    ];
                    $query = "INSERT INTO sinhvien (first_name, last_name) VALUES (:first_name, :last_name)";
                    $statement = $this->connection->prepare($query);
                    if ($statement->execute($data)) :
                        $message = 'Data Inserted';
                    endif;
                endif;

            else :
                $validation_error = implode(", ", $error);
            endif;

            $output = [
                'error' => $validation_error,
                'message' => $message
            ];

            return json_encode($output);
        }catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

    }
    public function update(){

    }
    public function delete(){
        $catId = $_POST['cat_id']; // Lấy ID của danh mục từ request
        if ($this->categories->deleteCategory($catId)) {
            echo json_encode(["success" => true, "message" => "Danh mục đã được xóa thành công."]);
        } else {
            echo json_encode(["success" => false, "message" => "Đã xảy ra lỗi khi xóa danh mục."]);
        }
    }
}
?>