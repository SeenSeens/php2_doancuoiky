<?php
require_once __DIR_ROOT__ . '/app/services/BaseService.php';
require_once __DIR_ROOT__ . '/app/repositories/MenuRepository.php';
class MenuService extends BaseService {
    protected MenuRepository $menuRepository;
    public function __construct() {
        $this->menuRepository = new MenuRepository();
    }
    public function savePost( $id, $type, $routes ) {
        try {
            if( $_SERVER['REQUEST_METHOD'] == 'POST' ) :
                $data = FormInputHelper::inputValuePost( $type );

                if ( !empty( $id )) {
                    $this->menuRepository->updateMenu($data, $id);
                    $message = "Cập nhật thành công!";
                } else {
                    $this->menuRepository->insertMenu($data);
                    $message = "Thêm thành công!";
                }

                // Trả về kết quả
                $result = ['success' => true, 'message' => $message];

                header("Location: " . __WEB_ROOT__ . "/admin/" . $routes);
                exit();
            endif;
        } catch( Exception $e ) {
            return ['success' => false, 'message' => "Có lỗi xảy ra: " . $e->getMessage()];
        }
    }
    public function deleteMenu(){

    }
    public function getMenu(){
        return $this->menuRepository->getMenu();
    }
}