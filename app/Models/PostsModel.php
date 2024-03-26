<?php
class PostsModel extends Model {
    public $__table = 'posts';
    #[\Override] function tableFill(){
        return $this->__table;
    }
    #[\Override] function fieldFill(){}
    #[\Override] function primaryKey(){}
    // Query ra 3 bài viết mới nhất ở trang chủ
    public function getLatestPosts(){
        return $this->db->table('posts')
            ->limit(3)
            ->get();
    }
}