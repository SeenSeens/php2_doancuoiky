<?php
class UserModel extends Model {
    private string $__table = 'users';
    #[\Override] function tableFill(){
        return $this->__table;
    }

    #[\Override] function fieldFill(){
        return '*';
    }

    #[\Override] function primaryKey(){
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
}