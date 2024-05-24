<?php
class OrderDetailsModel extends Model
{

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
    function insertOrderProduct($data) : void {
        $this->db->table('order_details')->insert($data);
    }
}
?>