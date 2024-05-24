<?php
const __DIR_ROOT__ = __DIR__;
// Xử lý http root
if( !empty( $_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
    $web_root = 'https://' . $_SERVER['HTTP_HOST'];
} else {
    $web_root = 'http://' . $_SERVER['HTTP_HOST'];
}

$dirRoot = str_replace('\\', '/', __DIR_ROOT__);
$documentRoot = str_replace('\\', '/', $_SERVER['DOCUMENT_ROOT']);
$folder = str_replace( strtolower($documentRoot), '', strtolower($dirRoot));
$web_root = $web_root . $folder;
define('__WEB_ROOT__', $web_root);
echo "<script>window.data = { __WEB_ROOT__: '" . __WEB_ROOT__ . "' };</script>";
/**
 * Tự động load configs
 */
$configs_dir = scandir( 'configs' );
if( !empty( $configs_dir )) {
    foreach ( $configs_dir as $item ) {
        if( $item !== '.' && $item !== '..' && file_exists('configs/' . $item) ) {
            require_once 'configs/' . $item ; // Load routes config
        }
    }
}
require_once 'core/Route.php'; // Load Route class
require_once 'app/App.php'; // Load App

// Kiểm tra config và load database
if( !empty( $config['database']) ) {
    $db_config = array_filter( $config['database']);
    if( !empty( $db_config ) ) {
        require_once 'core/Connection.php';
        require_once 'core/QueryBuilder.php';
        require_once 'core/Database.php';
        require_once 'core/DB.php';
    }
}
require_once 'core/Model.php'; // Load Base Model
require_once 'core/Controller.php'; // Load base controller
require_once 'ultils/ImageUpload.php'; // Load ultils images
?>