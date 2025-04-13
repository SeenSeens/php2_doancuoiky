<?php
require_once __DIR_ROOT__ . '/app/repositories/BaseRepository.php';
class TermRepository extends BaseRepository {
    private string $table = 'terms';
    public function __construct() {
         parent::__construct('TermsModel');
    }
    public function getTerms( $taxonomy ) {
        return $this->db->table( $this->table )
            ->join('term_taxonomy', 'terms.id = term_taxonomy.term_id')
            ->where('term_taxonomy.taxonomy', '=', $taxonomy )
            ->get();
    }
    public function findTerm( $id ) {
        return $this->db->table( $this->table  )
            ->join('term_taxonomy', 'terms.id = term_taxonomy.term_id')
            ->where('terms.id', '=', $id)
            ->first();
    }
    public function insertTerm( $data, $taxonomy = '' ){
        try {
            $this->db->table( $this->table )->insert( $data );
            $termId = $this->db->lastInsertId();
            $dataTerm = [
                'term_id' => $termId,
                'taxonomy' => $taxonomy,
            ];
            // Thêm vào bảng term_taxonomy
            $this->db->table('term_taxonomy')->insert($dataTerm);
            return $termId; // Trả về term_id mới thêm
        } catch (Exception $e) {
            error_log("Lỗi thêm danh mục: " . $e->getMessage());
            return false;
        }
    }
    public function updateTerm($data, $id){
        return $this->db->table( $this->table )
            ->where('id', '=', $id)
            ->update($data);
    }
    public function deleteTerm($id){
        return $this->db->table( $this->table )
            ->where('id', '=', $id)
            ->delete();
    }
}
?>
