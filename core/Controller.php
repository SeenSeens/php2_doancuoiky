<?php
/**
 * Lớp base controller
 */
class Controller {
    //Đường dẫn Thư mục view
    const PATH_VIEW = "Views";
    public function model( $model ) {
        if( file_exists(__DIR_ROOT__ . '/app/Models/' . $model . '.php')) {
            require_once __DIR_ROOT__ . '/app/Models/' . $model . '.php';
            if ( class_exists($model) ) {
                return new $model();
            }
        }
        return false;
    }
    public function render( $view,  array $data = [] ): void {
        extract( $data );
        if( file_exists(__DIR_ROOT__ . '/app/Views/' . $view . '.php')) {
            require_once __DIR_ROOT__ . '/app/Views/' . $view . '.php';
        }
    }
}
?>