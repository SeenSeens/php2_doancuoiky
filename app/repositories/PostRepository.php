<?php
require_once __DIR_ROOT__ . '/app/repositories/BaseRepository.php';
class PostRepository extends BaseRepository {
    private string $table = 'posts';
    public function __construct() {
        parent::__construct('PostModel');
    }
    // Lấy ra dữ liệu bài viết
    public function getPost( $type ) {
        return $this->db->table( $this->table )
            ->where('type', '=', $type )
            ->get();
    }
    public function findPost($id) {
        return $this->db->table( $this->table )
            ->select('posts.id, posts.title, posts.slug, posts.content, posts.excerpt, posts.status, users.username')
            ->where('posts.id', '=', $id )
            ->join('users', 'posts.author_id = users.id')
            ->leftJoin('post_term_relationships', 'posts.id = post_term_relationships.post_id')
            ->leftJoin('term_taxonomy', 'post_term_relationships.term_taxonomy_id = term_taxonomy.id')
            ->leftJoin('terms', 'term_taxonomy.term_id = terms.id')
            ->groupConcat('terms.name', 'categories', ', ', true, 'terms.name', "term_taxonomy.taxonomy = 'category'")
            ->groupConcat('terms.name', 'tags', ', ', true, 'terms.name', "term_taxonomy.taxonomy = 'tag'")
            ->groupBy('posts.id')
            ->orderBy('posts.created_at', 'DESC')
            ->get();
    }

    public function allPosts( $type ) {
        return $this->db->table( $this->table )
            ->select('posts.id, posts.title, posts.status, posts.type, users.username')
            ->where('posts.type', '=', $type )
            ->join('users', 'posts.author_id = users.id')
            ->leftJoin('post_term_relationships', 'posts.id = post_term_relationships.object_id')
            ->leftJoin('term_taxonomy', 'post_term_relationships.term_taxonomy_id = term_taxonomy.id')
            ->leftJoin('terms', 'term_taxonomy.term_id = terms.id')
            ->groupConcat('terms.name', 'categories', ', ', true, 'terms.name', "term_taxonomy.taxonomy = 'category'")
            ->groupConcat('terms.name', 'tags', ', ', true, 'terms.name', "term_taxonomy.taxonomy = 'tag'")
            ->groupBy('posts.id')
            ->orderBy('posts.created_at', 'DESC')
            ->get();

    }
    public function insertPost( $data ) {
        try {
            $this->db->table( $this->table )->insert($data);
        } catch (Exception $e) {
            error_log("Lỗi thêm bài viết: " . $e->getMessage());
            return false;
        }
    }
    public function updatePost($data, $id){
        try {
            $this->db->table($this->table)
                ->where('id', '=', $id)
                ->update($data);
        } catch (Exception $e) {
            error_log("Lỗi sửa bài viết: " . $e->getMessage());
            return false;
        }
    }
    public function deletePost($id){
        return $this->db->table( $this->table )
            ->where('id', '=', $id)
            ->delete();
    }

    // Trả ngược id mới thêm về controller
    public function getLastId(){
        return $this->db->table('posts')
            ->lastInsertId();
    }
}
?>