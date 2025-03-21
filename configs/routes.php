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


// Dashboard
$routes['admin/dashboard'] = 'admin/dashboard';

// Auth
$routes['admin/register'] = 'admin/auth/register';
$routes['admin/login'] = 'admin/auth/login';
$routes['admin/forgot-password'] = 'admin/auth/forgotPassword';
$routes['admin/logout'] = 'admin/auth/logout';
// Post
$routes['admin/posts'] = 'admin/post';
$routes['admin/post-new'] = 'admin/post/create';

// Page
$routes['admin/page'] = 'admin/page';
$routes['admin/page-new'] = 'admin/page/create';

// Product
$routes['admin/product'] = 'admin/product';
$routes['admin/product-new'] = 'admin/product/create';


// Taxonomy
$routes['admin/category'] = 'admin/taxonomy/category';
$routes['admin/category/(.+)'] = 'admin/taxonomy/category/$1';
$routes['admin/post-tag'] = 'admin/taxonomy/postTag';
$routes['admin/product-cat'] = 'admin/taxonomy/productCat';
$routes['admin/product-tag'] = 'admin/taxonomy/productTag';
$routes['admin/product-brand'] = 'admin/taxonomy/productBrand';
$routes['admin/product-attributes'] = 'admin/taxonomy/productAttributes';
$routes['admin/product-reviews'] = 'admin/taxonomy/productReviews';

// Media
$routes['admin/upload'] = 'admin/media';
$routes['admin/media-new'] = 'admin/media/create';


// User
$routes['admin/user'] = 'admin/user';
$routes['admin/user/add-user'] = 'admin/user/create';
$routes['admin/user/profile'] = 'admin/user/profile';


//$routes['admin/chuyen-muc-san-pham'] = 'admin/productcategory';
//$routes['admin/chuyen-muc-san-pham/them-moi'] = 'admin/productcategory/insert';
//$routes['admin/chuyen-muc-san-pham/sua-chuyen-muc'] = 'admin/productcategory/update';
//$routes['admin/chuyen-muc-san-pham/xoa-chuyen-muc'] = 'admin/productcategory/delete';
//

//$routes['admin/san-pham/(.+)'] = 'admin/product/viewProductById/$1';

//$routes['admin/san-pham/xoa-san-pham/(.+)'] = 'admin/product/delete/$1';
//$routes['admin/san-pham/sua-san-pham/(.+)'] = 'admin/product/edit/$1';
//
//$routes['admin/don-hang'] = 'admin/product/orders';
//
//
//$routes['admin/upload'] = 'admin/upload/uploadimage';




$routes['admin/comments'] = 'admin/comment';
?>