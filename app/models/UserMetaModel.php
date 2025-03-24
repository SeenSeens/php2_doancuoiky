<?php
class UserMetaModel extends Model{
    private string $__table = 'user_meta';

    #[\Override] function tableFill(){
        return $this->__table;
    }

    #[\Override] function fieldFill(){
        return '*';
    }

    #[\Override] function primaryKey(){
        return 'user_id';
    }
    function selectMetabyId($id){
        return $this->db->table( $this->__table )
            ->where('user_id','=', $id)
            ->select('*')
            ->get();
    }
    function insertOrUpdateUserMeta($userId, $metaData) {
        $values = [];
        $updateFields = [];

        foreach ($metaData as $data) {
            $values[] = "($userId, '{$data['meta_key']}', '{$data['meta_value']}')";
            $updateFields[] = "`meta_value` = VALUES(`meta_value`)";
        }

        $valueString = implode(", ", $values);
        $updateString = implode(", ", $updateFields);

        $sql = "INSERT INTO $this->__table (user_id, meta_key, meta_value) 
            VALUES $valueString 
            ON DUPLICATE KEY UPDATE $updateString";

        // Thực hiện query
        $this->db->query($sql);
    }




}

