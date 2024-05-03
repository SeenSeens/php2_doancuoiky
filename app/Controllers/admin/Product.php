<?php
class Product extends Controller {
    public array $data = [];
    public $categories;
    public $products;
    public function __construct() {
        $this->categories = $this->model('CategoriesModel');
        $this->products = $this->model('ProductsModel');
    }

    public function index() {
        $dataCategory = $this->categories->all();
        $dataProduct = $this->products->all(); // Lấy tất cả chuyên mục
        $this->data['sub_content']['page_title'] = "Trang chủ";
        $this->data['sub_content']['product'] = $dataProduct;
        $this->data['content'] = 'backend/pages/products/product';
        $this->render('backend/dashboard', $this->data);
    }

    function viewProductById($id) {
        $this->data['sub_content']['page_title'] = "Trang chủ";
        $this->data['sub_content']['product'] = $this->products->find($id);
        $this->data['content'] = 'backend/pages/products/product_detail';
        $this->render('backend/dashboard', $this->data);
    }
    /**
     * Thêm mới sản phẩm
     * @return void
     */
    public function add(){
        $this->data['sub_content']['page_title'] = "Thêm mới sản phẩm";
        $this->data['content'] = 'backend/pages/products/add_product';
        $this->render('backend/dashboard', $this->data);
        try {
            if (isset($_POST['uploadProduct'])) :
                $title = isset($_POST['title']) ? $_POST['title'] : '';
                $slug = !empty($_POST['slug']) ? $_POST['slug'] : '';
                $description= !empty($_POST['description']) ? $_POST['description'] : '';
                $excerpt = !empty($_POST['excerpt']) ? $_POST['excerpt'] : '';
                $thumbnail = !empty($_POST['thumbnail']) ? $_POST['thumbnail'] : '';
//                $price = !empty($_POST['price']) ? $_POST['price'] : NULL;
//                $discount = !empty($_POST['discount']) ? $_POST['discount'] : NULL;
                $data = [
                    'title' => $title,
                    'slug' => $slug,
                    'description' => $description,
                    'excerpt' => $excerpt,
                    'thumbnail' => $thumbnail,
//                    'price' => $price,
//                    'discount' => $discount
                ];
                $this->products->addProduct($data);
                header('Location: ' . __WEB_ROOT__ . 'admin/san-pham/them-moi');
                exit();
            endif;
        } catch (PDOException $e) {

        }
    }
    public function edit($id){
        $this->data['sub_content']['page_title'] = "Sửa sản phẩm";
        $this->data['sub_content']['product'] = $this->products->find($id);
        $this->data['content'] = 'backend/pages/products/edit_product';
        $this->render('backend/dashboard', $this->data);
        try {
            if(isset($_POST['editProduct'])) {
//                $id = $_POST['id'];
                $title = $_POST['title'];
                $slug = $_POST['slug'];
                $description = $_POST['description'];
                $excerpt = $_POST['excerpt'];
                $thumbnail = $_POST['thumbnail'];
//                $price = $_POST['price'];
//                $discount = $_POST['discount'];
                $data = [
//                    'id' => $id,
                    'title' => $title,
                    'slug' => $slug,
                    'description' => $description,
                    'excerpt' => $excerpt,
                    'thumbnail' => $thumbnail,
//                    'price' => $price,
//                    'discount' => $discount
                ];
                $this->products->editProduct($data, $id);
                header('Location: ' . __WEB_ROOT__ . '/admin/san-pham');
                exit();
            }

        } catch (PDOException $e) {

        }
    }
    public function delete($id){
        try {
            if ( !empty($id)) :
                $this->products->deleteProduct($id);
                header('Location: ' . __WEB_ROOT__ . '/admin/san-pham');
                exit();
            else:
                echo 'Id Không tồn tại';
            endif;
        } catch (\PDOException $e) {
            return 'Đã xảy ra lỗi khi xóa sản phẩm ';
        }
    }
}
?>