<?php
//require_once 'ultils/image_helper.php';
class Product extends Controller {
    public array $data = [];
    public $categories;
    public $products;
    public function __construct() {
        $this->categories = $this->model('CategoriesModel');
        $this->products = $this->model('ProductsModel');
    }

    public function index() {
        $this->data['sub_content']['page_title'] = "Sản phẩm";
//        $this->data['sub_content']['product'] = $this->products->allProduct();
        $this->data['content'] = 'backend/products/product';
        $this->render('backend/admin_layout', $this->data);
    }

    function viewProductById($id) {
        $this->data['sub_content']['page_title'] = "Trang chủ";
        $this->data['sub_content']['product'] = $this->products->find($id);
        $this->data['sub_content']['category'] = $this->categories->getListCategory();
        $this->data['content'] = 'backend/products/product_detail';
        $this->render('backend/dashboard', $this->data);
    }
    /**
     * Thêm mới sản phẩm
     * @return void
     */
    public function create(){
        $this->data['sub_content']['page_title'] = "Thêm mới sản phẩm";
//        $this->data['sub_content']['category'] = $this->categories->getListCategory();
        $this->data['content'] = 'backend/products/add_product';
        $this->render('backend/admin_layout', $this->data);
        try {
            if (isset($_POST['uploadProduct'])) :
                $title = isset($_POST['title']) ? $_POST['title'] : '';
                $description= !empty($_POST['description']) ? $_POST['description'] : '';
                $excerpt = !empty($_POST['excerpt']) ? $_POST['excerpt'] : '';
                $price = !empty($_POST['price']) ? intval($_POST['price']) : 0;
                $discount = !empty($_POST['discount']) ? intval($_POST['discount']) : 0;
                $category_id = !empty($_POST['category']) ? $_POST['category'] : '';

                // Sử dụng lớp ImageUpload
                $imageUpload = new ImageUpload();
                $thumbnail = $imageUpload->upload();

                $data = [
                    'title' => $title,
                    'description' => $description,
                    'excerpt' => $excerpt,
                    'thumbnail' => basename($thumbnail),
                    'price' => $price,
                    'discount' => $discount,
                    'category_id' => $category_id
                ];
                $this->products->addProduct($data);
                header('Location: ' . __WEB_ROOT__ . 'admin/san-pham');
                exit();
            endif;
        } catch (PDOException $e) {

        }
    }
    public function edit($id){
        // Lấy thông tin sản phẩm hiện tại
        $product = $this->products->find($id);
        $this->data['sub_content']['page_title'] = "Sửa sản phẩm";
        $this->data['sub_content']['product'] = $product;
        $this->data['sub_content']['category'] = $this->categories->getListCategory();
        $this->data['content'] = 'backend/pages/products/edit_product';
        $this->render('backend/dashboard', $this->data);
        try {
            if(isset($_POST['editProduct'])) {
                $title = !empty($_POST['title']) ? $_POST['title'] : '';
                $description= !empty($_POST['description']) ? $_POST['description'] : '';
                $excerpt = !empty($_POST['excerpt']) ? $_POST['excerpt'] : '';
                $price = !empty($_POST['price']) ? intval($_POST['price']) : 0;
                $discount = !empty($_POST['discount']) ? intval($_POST['discount']) : 0;
                $category_id = !empty($_POST['category']) ? $_POST['category'] : '';

                // Sử dụng lớp ImageUpload để xử lý ảnh mới
                $imageUpload = new ImageUpload();
                $thumbnail = $imageUpload->upload();
                // Nếu không có ảnh mới, giữ lại ảnh cũ
                if (empty($thumbnail)) {
                    $thumbnail = $product['thumbnail'];
                }

                $data = [
                    'title' => $title,
                    'description' => $description,
                    'excerpt' => $excerpt,
                    'thumbnail' => $thumbnail,
                    'price' => $price,
                    'discount' => $discount,
                    'category_id' => $category_id
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
                $product = $this->products->find($id);
                // Lấy đường dẫn ảnh của sản phẩm
                $thumbnail = $product['thumbnail'];
                // Xóa sản phẩm khỏi cơ sở dữ liệu
                $this->products->deleteProduct($id);
                // Xóa tệp ảnh khỏi thư mục lưu trữ nếu nó tồn tại
                $imageUpload = new ImageUpload();
                if ($imageUpload->delete($thumbnail)) {
                    // Xóa thành công
                    echo "Xóa ảnh thành công.";
                } else {
                    // Xóa không thành công hoặc tệp không tồn tại
                    echo "Không thể xóa ảnh.";
                }

                header('Location: ' . __WEB_ROOT__ . '/admin/san-pham');
                exit();
            else:
                echo 'Id Không tồn tại';
            endif;
        } catch (\PDOException $e) {
            return 'Đã xảy ra lỗi khi xóa sản phẩm ';
        }
    }

    function orders(){
        $this->data['sub_content']['page_title'] = "Trang chủ";
        $this->data['content'] = 'backend/pages/products/order';
        $this->render('backend/dashboard', $this->data);
    }
}
?>