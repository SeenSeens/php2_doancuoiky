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

    /*public function insertOrUpdate($data, $id) {
        foreach ($data as $item) {
            // Kiểm tra xem bản ghi đã tồn tại dựa trên user_id và meta_key
            $existingRecord = $this->table( $this->__table )
                ->where('user_id', '=', $id)
                ->where('meta_key', '=', $item['meta_key'])
                ->first();

            if ($existingRecord) {
                // Nếu tồn tại, thực hiện cập nhật
                $this->table( $this->__table )
                    ->where('user_id', '=', $id)
                    ->where('meta_key', '=', $item['meta_key'])
                    ->update( $item );
            } else {
                // Nếu không tồn tại, thực hiện chèn mới
                $this->table( $this->__table )->insert($item);
            }
        }
        return true; // Trả về thành công sau khi hoàn tất vòng lặp
    }*/

    function insertOrUpdateUserMeta($userId, $metaData) {
        $values = [];
        $updateFields = [];

        foreach ($metaData as $data) {
            $values[] = "($userId, '{$data['meta_key']}', '{$data['meta_value']}')";
            $updateFields[] = "`meta_value` = VALUES(`meta_value`)";
        }

        $valueString = implode(", ", $values);
        $updateString = implode(", ", $updateFields);

        $sql = "INSERT INTO user_meta (user_id, meta_key, meta_value) 
            VALUES $valueString 
            ON DUPLICATE KEY UPDATE $updateString";

        // Thực hiện query
        $this->db->query($sql);
    }




}

