<?php
class OrdersModel extends Model {

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
    public function insertOrder($data): void {
        $this->db->table('orders')->insert($data);
    }
}