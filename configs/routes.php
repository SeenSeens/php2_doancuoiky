<?php
$routes['default_controller'] = 'home';
$routes['cua-hang'] = 'products/store';
$routes['lien-he'] = 'contact';
$routes['san-pham'] = 'products';
$routes['san-pham/(.+)'] = 'products/getProductDetailById/$1';

/**
 * Route admin
 */
//$routes['admin'] = 'admin/dashboard';
$routes['admin/chuyen-muc'] = 'admin/category';
$routes['admin/chuyen-muc/them-moi-chuyen-muc'] = 'admin/category/insert';
$routes['admin/chuyen-muc/sua-chuyen-muc'] = 'admin/category/update';
$routes['admin/chuyen-muc/xoa-chuyen-muc'] = 'admin/category/delete';
$routes['admin/san-pham'] = 'admin/product';
//$routes['admin/san-pham/delete/(.+)'] = 'admin/product/delete/$1';
?>