<?php
require_once __DIR_ROOT__ . '/app/repositories/BaseRepository.php';
class MenuRepository extends BaseRepository{
    private string $table = 'menus';
    public function __construct(){
        parent::__construct('MenusModel');
    }
    public function insertMenu( $data ) {
        try {
            $this->db->table( $this->table )->insert($data);
            return $this->db->lastInsertId(); // trả ID
        } catch (Exception $e) {
            error_log("Lỗi thêm menu: " . $e->getMessage());
            return false;
        }
    }
    public function updateMenu($data, $id){
        try {
            $this->db->table($this->table)
                ->where('id', '=', $id)
                ->update($data);
        } catch (Exception $e) {
            error_log("Lỗi sửa menu: " . $e->getMessage());
            return false;
        }
    }
    public function deleteMenu($id){
        return $this->db->table( $this->table )
            ->where('id', '=', $id)
            ->delete();
    }
    public function getMenu(){
        return $this->db->table( $this->table )
            ->get();
    }
}