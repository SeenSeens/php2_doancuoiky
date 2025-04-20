<?php
require_once __DIR_ROOT__ . '/app/repositories/BaseRepository.php';
class PostRepository extends BaseRepository {
    private string $table = 'posts';
    public function __construct() {
        parent::__construct('PostModel');
    }
    // Lấy ra dữ liệu bài viết
    public function getPostExcerpt( $type, int $limit = 10, int $page = 1, array $conditions = []) {
        return $this->db->table( $this->table )
            ->select('posts.id, posts.title, posts.slug, posts.excerpt, posts.created_at, posts.updated_at, users.username')
            ->where('type', '=', $type )
            ->join('users', 'posts.author_id = users.id')
            ->limit($limit)
            ->paginate($limit, $page, $conditions);
//            ->get();
    }


    public function paginate($limit = 10, $page = 1, $conditions = []) {
        $offset = ($page - 1) * $limit;

        // Chuẩn bị WHERE clause
        $whereClause = '';
        $params = [];

        if (!empty($conditions)) {
            $whereParts = [];
            foreach ($conditions as $key => $value) {
                $whereParts[] = "$key = :$key";
                $params[$key] = $value;
            }
            $whereClause = 'WHERE ' . implode(' AND ', $whereParts);
        }

        // Đếm tổng số bản ghi
        $countSql = "SELECT COUNT(*) as total FROM {$this->table} $whereClause";
        $countStmt = $this->db->query($countSql);
        $countStmt->execute($params);
        $total = $countStmt->fetch(PDO::FETCH_ASSOC)['total'];

        // Lấy dữ liệu thực tế theo LIMIT/OFFSET
        $sql = "SELECT * FROM {$this->table} $whereClause LIMIT :limit OFFSET :offset";
        $stmt = $this->db->query($sql);

        // Bind conditions
        foreach ($params as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }

        $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', (int)$offset, PDO::PARAM_INT);

        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return [
            'data' => $data,
            'total' => (int)$total,
            'perPage' => $limit,
            'currentPage' => $page,
            'totalPages' => ceil($total / $limit),
        ];
    }

    public function findPostBySlug( $type,  $slug ) {
        return $this->db->table( $this->table )
            ->select('posts.id, posts.title, posts.slug, posts.content, posts.excerpt, posts.created_at, posts.updated_at, users.username')
            ->where('type', '=', $type )
            ->where('slug', '=', $slug )
            ->join('users', 'posts.author_id = users.id')
            ->first();
    }
    public function findPost($id) {
        return $this->db->table( $this->table )
            ->select('posts.id, posts.title, posts.slug, posts.content, posts.excerpt, posts.status, users.username')
            ->where('posts.id', '=', $id )
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