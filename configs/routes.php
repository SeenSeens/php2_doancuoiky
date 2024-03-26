<?php
$routes['default_controller'] = 'home';
$routes['cua-hang'] = 'products/store';
$routes['lien-he'] = 'contact';
$routes['san-pham'] = 'products';
$routes['san-pham/(.+)'] = 'products/getProductDetailById/$1';
?>