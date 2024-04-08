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
$routes['admin/chuyen-muc/them-moi'] = 'admin/category/indert';
$routes['admin/chuyen-muc/delete'] = 'admin/category/delete';
//$routes['admin/san-pham'] = 'admin/product';
//$routes['admin/san-pham/delete/(.+)'] = 'admin/product/delete/$1';
?>