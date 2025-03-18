<?php
class UserModel extends Model {

    #[\Override] function tableFill()
    {
        // TODO: Implement tableFill() method.
    }

    #[\Override] function fieldFill()
    {
        // TODO: Implement fieldFill() method.
    }

    #[\Override] function primaryKey()
    {
        // TODO: Implement primaryKey() method.
    }
    function selectUser($email){
        return $this->db->table('users')
            ->where('$email', '=', $email)
            ->get();
    }

    function register($data) {
        return $this->db->table('users')->insert($data);
    }
    function login($email, $password) {
        return $this->db->table('users')
            ->where('$email', '=', $email)
            ->where('password', '=', $password)
            ->get();
    }
    public function isAdmin($email) {
        $user = $this->find($email);
        return ($user['role'] === 'admin');
    }
}