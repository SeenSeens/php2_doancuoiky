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

    // PageController
    'admin/page' => 'admin/PageController',
    'admin/page-new' => 'admin/PageController/create',

    // ProductController
    'admin/product' => 'admin/ProductController',
    'admin/product-new' => 'admin/ProductController/create',

    // TaxonomyController
    'admin/category' => 'admin/TaxonomyController/category',
    'admin/category/(.+)' => 'admin/TaxonomyController/category/$1',
    'admin/post-tag' => 'admin/TaxonomyController/postTag',
    'admin/product-cat' => 'admin/TaxonomyController/productCat',
    'admin/product-tag' => 'admin/TaxonomyController/productTag',
    'admin/product-brand' => 'admin/TaxonomyController/productBrand',
    'admin/product-attributes' => 'admin/TaxonomyController/productAttributes',
    'admin/product-reviews' => 'admin/TaxonomyController/productReviews',

    // MediaController
    'admin/upload' => 'admin/MediaController',
    'admin/media-new' => 'admin/MediaController/create',

    // UserController
    'admin/user' => 'admin/UserController',
    'admin/user/add-user' => 'admin/UserController/create',
    'admin/user/profile' => 'admin/UserController/profile',
    'admin/user/profile/(.+)' => 'admin/UserController/profile/$1',

    // CommentController
    'admin/comments' => 'admin/CommentController',

    // AuthController
    'admin/login' => 'admin/AuthController/login',
    'admin/register' => 'admin/AuthController/register',
    'admin/forgot-password' => 'admin/AuthController/forgotPassword',
    'admin/logout' => 'admin/AuthController/logout',
];

?>