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
        $dataProduct = $this->products->allProduct(); // Lấy tất cả chuyên mục
//        var_dump($dataProduct );
        $this->data['sub_content']['page_title'] = "Trang chủ";
        $this->data['sub_content']['product'] = $dataProduct;
        $this->data['content'] = 'backend/pages/product'; // truyền dữ liệu qua bên view
        $this->render('backend/dashboard', $this->data);
    }

    public function delete($productId){
        if ($this->products->deleteProduct($productId)) :
            echo json_encode(["success" => true, "message" => "Sản phẩm đã được xóa thành công."]);
        else:
            echo json_encode(["success" => false, "message" => "Đã xảy ra lỗi khi xóa sản phẩm."]);
        endif;
    }
}
?>