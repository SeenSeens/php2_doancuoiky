<?php
$routes['default_controller'] = 'home';
$routes['cua-hang'] = 'products/store';
$routes['lien-he'] = 'contact';
$routes['san-pham'] = 'products';
$routes['san-pham/(.+)'] = 'products/getProductDetailById/$1';
$routes['danh-muc-san-pham/(.+)'] = 'products/ProductCategory/$1';

//$routes['add-to-cart'] = 'shop/addToCart';
$routes['gio-hang'] = 'shop/shopingCart';
$routes['thanh-toan'] = 'shop/checkout';
$routes['dat-hang'] = 'shop/order';



/**
 * Route admin
 */

//$routes['admin'] = 'admin/DashboardController';

//$routes['admin/chuyen-muc-san-pham'] = 'admin/productcategory';
//$routes['admin/chuyen-muc-san-pham/them-moi'] = 'admin/productcategory/insert';
//$routes['admin/chuyen-muc-san-pham/sua-chuyen-muc'] = 'admin/productcategory/update';
//$routes['admin/chuyen-muc-san-pham/xoa-chuyen-muc'] = 'admin/productcategory/delete';


//$routes['admin/san-pham/(.+)'] = 'admin/product/viewProductById/$1';

//$routes['admin/san-pham/xoa-san-pham/(.+)'] = 'admin/product/delete/$1';
//$routes['admin/san-pham/sua-san-pham/(.+)'] = 'admin/product/edit/$1';

//$routes['admin/don-hang'] = 'admin/product/orders';

//$routes['admin/upload'] = 'admin/upload/uploadimage';

//$routes['admin/comments'] = 'admin/comment';

// Cải tiến
$routes = [
    // Dashboard
    'admin' => 'admin/DashboardController',
    'admin/dashboard' => 'DashboardController/index',

    // PostController
    'admin/posts' => 'admin/PostController',
    'admin/post-new' => 'admin/PostController/create',
    'admin/post/edit_id=(.+)' => 'admin/PostController/edit/$1',
    'admin/post/delete' => 'admin/PostController/delete',
    // PageController
    'admin/page' => 'admin/PageController',
    'admin/page-new' => 'admin/PageController/create',

    // ProductController
    'admin/product' => 'admin/ProductController',
    'admin/product-new' => 'admin/ProductController/create',

    // CategoryController
    'admin/category' => 'admin/taxonomy/CategoryController/index',
    'admin/category-new' => 'admin/taxonomy/CategoryController/create',
    'admin/category/(.+)' => 'admin/taxonomy/CategoryController/category/$1',
    'admin/category/delete' => 'admin/taxonomy/CategoryController/delete',
    'admin/category/edit_id=(.+)' => 'admin/taxonomy/CategoryController/edit/$1',

    // PostTagController
    'admin/post-tag' => 'admin/taxonomy/PostTagController/index',
    'admin/post-tag-new' => 'admin/taxonomy/PostTagController/create',
    'admin/post-tag/(.+)' => 'admin/taxonomy/PostTagController/category/$1',
    'admin/post-tag/delete' => 'admin/taxonomy/PostTagController/delete',
    'admin/post-tag/edit_id=(.+)' => 'admin/taxonomy/PostTagController/edit/$1',

    // ProductCategoryController
    'admin/product-cat' => 'admin/taxonomy/ProductCategoryController/index',
    'admin/product-cat-new' => 'admin/taxonomy/ProductCategoryController/create',
    'admin/product-cat/(.+)' => 'admin/taxonomy/ProductCategoryController/category/$1',
    'admin/product-cat/delete' => 'admin/taxonomy/ProductCategoryController/delete',
    'admin/product-cat/edit_id=(.+)' => 'admin/taxonomy/ProductCategoryController/edit/$1',

    // ProductTagController
    'admin/product-tag' => 'admin/taxonomy/ProductTagController/index',
    'admin/product-tag-new' => 'admin/taxonomy/ProductTagController/create',
    'admin/product-tag/(.+)' => 'admin/taxonomy/ProductTagController/category/$1',
    'admin/product-tag/delete' => 'admin/taxonomy/ProductTagController/delete',
    'admin/product-tag/edit_id=(.+)' => 'admin/taxonomy/ProductTagController/edit/$1',

    // ProductBrandController
    'admin/product-brand' => 'admin/taxonomy/ProductBrandController/index',
    'admin/product-brand-new' => 'admin/taxonomy/ProductBrandController/create',
    'admin/product-brand/(.+)' => 'admin/taxonomy/ProductBrandController/category/$1',
    'admin/product-brand/delete' => 'admin/taxonomy/ProductBrandController/delete',
    'admin/product-brand/edit_id=(.+)' => 'admin/taxonomy/ProductBrandController/edit/$1',


    // MediaController
    'admin/upload' => 'admin/MediaController',
    'admin/media-new' => 'admin/MediaController/create',

    // UserController
    'admin/user' => 'admin/UserController',
    'admin/user/add-user' => 'admin/UserController/create',
    'admin/user/profile' => 'admin/UserController/profile',
    'admin/user/profile/(.+)' => 'admin/UserController/profile/$1',
    'admin/user/delete' => 'admin/UserController/delete',

    // CommentController
    'admin/comments' => 'admin/CommentController',

    // AuthController
    'admin/login' => 'admin/AuthController/login',
    'admin/register' => 'admin/AuthController/register',
    'admin/forgot-password' => 'admin/AuthController/forgotPassword',
    'admin/logout' => 'admin/AuthController/logout',
];

?>