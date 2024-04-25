<?php
class Category extends Controller {
    public array $data = [];
    public $categories;
    public function __construct() {
        $this->categories = $this->model('CategoriesModel');
    }
    public function index() {
        $dataCategory = $this->categories->all(); // Lấy tất cả chuyên mục
        $this->data['sub_content']['page_title'] = "Chuyên mục sản phẩm";
        $this->data['sub_content']['category'] = $dataCategory;
        $this->data['content'] = 'backend/pages/category'; // truyền dữ liệu qua bên view dưới dạng json
        $this->render('backend/dashboard', $this->data);
    }
    public function insert(){
        try {
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
                header('Location: ' . __WEB_ROOT__ . '/admin/chuyen-muc');
                exit();
            endif;
        } catch ( \Exception $e ) {
            
        }

    }
    public function update(){
        try {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') :
                $data = json_decode(file_get_contents('php://input'), true);
                if (isset($data['id'])) :
                    $categoryId = $data['id'];
                    $this->categories->updateCategory($data, $categoryId);
                    echo json_encode(['success' => true]);
                    return;
                else:
                    echo json_encode(['error' => 'Category Id is missing']);
                    return;
                endif;
            else:
                echo json_encode(['error' => 'Invalid request method']);
                return;
            endif;
        } catch ( \Exception $e ) {
            echo json_encode(['error' => 'An error occurred while deleting category']);
            return;
        }
    }
    public function delete(){
        try {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') :
                $data = json_decode(file_get_contents('php://input'), true);
                var_dump($data);
                if (isset($data['id'])) :
                    $categoryId = $data['id'];
                    $this->categories->deleteCategory($categoryId);
                    echo json_encode(['success' => true]);
                    return;
                else:
                    echo json_encode(['error' => 'Category Id is missing']);
                    return;
                endif;
            else:
                echo json_encode(['error' => 'Invalid request method']);
                return;
            endif;
        } catch ( \Exception $e ) {
            echo json_encode(['error' => 'An error occurred while deleting category']);
            return;
        }
    }
}
?>