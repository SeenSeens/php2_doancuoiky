<?php

require_once __DIR_ROOT__ . '/app/repositories/BaseRepository.php';

class MenuItemsRepository extends BaseRepository{
    private string $table = 'menu_items';

    public function __construct(){
        parent::__construct('MenuItemsModel');
    }

    public function insertMenuItems($data){
        try {
            $this->db->table($this->table)->insert($data);

        } catch (Exception $e) {
            error_log("Lỗi thêm menu: " . $e->getMessage());
            return false;
        }
    }

    public function updateMenuItems($data, $id){
        try {
            $this->db->table($this->table)
                ->where('id', '=', $id)
                ->update($data);
        } catch (Exception $e) {
            error_log("Lỗi sửa menu: " . $e->getMessage());
            return false;
        }
    }
}