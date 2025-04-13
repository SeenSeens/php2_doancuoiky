<?php
class Postcategory extends Controller{
    public array $data = [];
    public $postcategory;
    public function __construct(){
        $this->postcategory = $this->model('PostsCategoriesModel');
    }
    public function index() {
        $this->data['sub_content']['page_title'] = "Chuyên mục";
        $this->data['sub_content']['post_category'] = $this->postcategory->all();
        $this->data['content'] = 'backend/pages/terms';
        $this->render('backend/dashboard', $this->data);
    }
}
?>