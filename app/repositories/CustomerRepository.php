<?php
require_once __DIR_ROOT__ . '/app/repositories/BaseRepository.php';
class CustomerRepository extends BaseRepository{
    private string $table = 'customers';
    public function __construct() {
        parent::__construct('CustomersModel');
    }
    public function getLastId(){
        return $this->db->table($this->table)
            ->lastInsertId();
    }
    public function insertCustomer( $data ) {
        return $this->db->table( $this->table )->insert($data);

    }
    public function updateCustomer($data, $id) {
        return $this->db->table( $this->table )
            ->where('id', '=', $id )
            ->update( $data );
    }
}