<?php
/**
 * Lớp base controller
 */
class Controller {
    public function __construct(){
//        AuthMiddleware::checkLogin();
        $this->requireLogin();
    }

    public function model( $model ) {
        if( file_exists(__DIR_ROOT__ . '/app/models/' . $model . '.php')) {
            require_once __DIR_ROOT__ . '/app/models/' . $model . '.php';
            if ( class_exists($model) ) {
                return new $model();
            }
        }
        return false;
    }
    public function render($view = null, array $data = [] ): void {
        extract( $data );
        if( file_exists(__DIR_ROOT__ . '/app/views/' . $view . '.php')) :
            require_once __DIR_ROOT__ . '/app/views/' . $view . '.php';
        else:
            echo 'Err';
        endif;
    }
    private function requireLogin() {
        if (!isset($_SESSION['user_id'])) {
            header("Location: " . __WEB_ROOT__ . '/admin/login');
            exit();
        }
    }
}
?>