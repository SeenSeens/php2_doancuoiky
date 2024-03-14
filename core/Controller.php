<?php
/**
 * Lớp base controller
 */
class Controller {
    public $db;
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

    public function view($layout = null, $view = null, array $data = []){
        foreach($data as $key => $value){
            $$key = $value;
        }
        if(isset($layout) && strlen($layout) > 0){
            if(isset($view) && strlen($view) > 0)
                $view = $this->getPath($view);
            require_once $this->getPath($layout);
        }
    }
    private function getPath($path){
        $path = str_replace( ".", "/", $path);
        // News/category
        $path = self::PATH_VIEW . "/" . $path . ".php";
        // Views/News.category.php
        return $path;
    }
}
?>