<?php
class Shop extends Controller {
    public array $data = [];
    public $categories;
    public $products;
    public function __construct() {
        $this->categories = $this->model('CategoriesModel');
        $this->products = $this->model('ProductsModel');
    }

    public function addToCart() {

    }
    public function shopingCart() {

    }
    public function checkout() {

    }

}