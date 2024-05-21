<?php
$routes['default_controller'] = 'home';
$routes['cua-hang'] = 'products/store';
$routes['lien-he'] = 'contact';
$routes['san-pham'] = 'products';
$routes['san-pham/(.+)'] = 'products/getProductDetailById/$1';
$routes['danh-muc-san-pham/(.+)'] = 'productscategories';

$routes['add-to-cart'] = 'shop/addToCart';
/**
 * Route admin
 */
//$routes['admin'] = 'admin/dashboard';
$routes['admin/bai-viet'] = 'admin/post';
$routes['admin/bai-viet/them-moi'] = 'admin/post/add';

$routes['admin/chuyen-muc'] = 'admin/postcategory';

$routes['admin/trang'] = 'admin/page';
$routes['admin/trang/them-moi'] = 'admin/page/add';

$routes['admin/chuyen-muc-san-pham'] = 'admin/productcategory';
$routes['admin/chuyen-muc-san-pham/them-moi'] = 'admin/productcategory/insert';
$routes['admin/chuyen-muc-san-pham/sua-chuyen-muc'] = 'admin/productcategory/update';
$routes['admin/chuyen-muc-san-pham/xoa-chuyen-muc'] = 'admin/productcategory/delete';

$routes['admin/san-pham'] = 'admin/product';
$routes['admin/san-pham/(.+)'] = 'admin/product/viewProductById/$1';
$routes['admin/san-pham/them-moi'] = 'admin/product/add';
$routes['admin/san-pham/xoa-san-pham/(.+)'] = 'admin/product/delete/$1';
$routes['admin/san-pham/sua-san-pham/(.+)'] = 'admin/product/edit/$1';
?>