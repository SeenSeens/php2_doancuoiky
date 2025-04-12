<?php
class PostModel extends Model {
    public $__table = 'posts';
    function tableFill(){
        return $this->__table;
    }
    function fieldFill(){
        return '*';
    }
    function primaryKey(){
        return 'id';
    }
    // Query ra 3 bài viết mới nhất ở trang chủ
    public function getLatestPosts(){
        return $this->db->table('posts')
            ->limit(3)
            ->get();
    }


}