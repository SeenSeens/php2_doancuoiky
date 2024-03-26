<?php
/**
 * Lớp base controller
 */
class Controller {
    public function model( $model ) {
        if( file_exists(__DIR_ROOT__ . '/app/Models/' . $model . '.php')) {
            require_once __DIR_ROOT__ . '/app/Models/' . $model . '.php';
            if ( class_exists($model) ) {
                return new $model();
            }
        }
        return false;
    }
    public function render($view = null, array $data = [] ): void {
        extract( $data );
        if( file_exists(__DIR_ROOT__ . '/app/Views/' . $view . '.php')) :
            require_once __DIR_ROOT__ . '/app/Views/' . $view . '.php';
//            require_once __DIR_ROOT__ . '/app/Views/' . $layout . '.php';
        else:
            echo 'Err';
        endif;
    }

}
?>