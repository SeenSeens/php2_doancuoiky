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

    public function insertOrUpdate($data, $id) {
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
    }

    /*public function insertOrUpdate($data, $userId) {
        $query = "INSERT INTO user_meta (user_id, meta_key, meta_value) VALUES ";
        $values = [];

        foreach ($data as $row) {
            $values[] = "(:user_id, :{$row['meta_key']}_key, :{$row['meta_key']}_value)";
        }

        $query .= implode(", ", $values);
        $query .= " ON DUPLICATE KEY UPDATE meta_value = VALUES(meta_value)";

        $stmt = $this->db->query($query);

        // Gán giá trị cho từng cặp meta_key và meta_value
        foreach ($data as $row) {
            $stmt->bindValue(":user_id", $userId);
            $stmt->bindValue(":{$row['meta_key']}_key", $row['meta_key']);
            $stmt->bindValue(":{$row['meta_key']}_value", $row['meta_value']);
        }

        return $stmt->execute();
    }*/

}

