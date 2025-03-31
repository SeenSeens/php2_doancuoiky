<?php
class UserModel extends Model {
    private string $__table = 'users';
    protected function tableFill(){
        return $this->__table;
    }

    protected function fieldFill(){
        return '*';
    }

    protected function primaryKey(){
        return 'id';
    }
    function selectUser($email){
        return $this->db->table('users')
            ->where('email', '=', $email)
            ->first();
    }

    function register($data) {
        return $this->db->table('users')->insert($data);
    }
    function login($email, $password) {
        return $this->db->table('users')
            ->where('email', '=', $email)
            ->where('password', '=', $password)
            ->get();
    }
    function isAdmin($email) {
        $user = $this->db->table('users')
            ->where('email', '=', $email)
            ->first();

        return $user && $user['role'] === 'admin';  // Kiểm tra role = admin
    }
    public function findId($email){
        return $this->db->table('users')
            ->where('email', '=', $email)
            ->select('id')
            ->get();
    }
    function deleteUser($id) {
        return $this->db->table($this->__table)
            ->where('id', '=', $id)
            ->delete();
    }
}