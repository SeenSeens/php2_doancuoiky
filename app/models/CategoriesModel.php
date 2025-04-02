<?php
require_once __DIR_ROOT__ . '/app/models/TermsModel.php';
class CategoriesModel extends TermsModel {

    public function getCategory() {
        return $this->db->table( $this->tableFill() )
            ->join('term_taxonomy', 'terms.id = term_taxonomy.term_id')
            ->where('term_taxonomy.taxonomy', '=', 'terms')
            ->get();
    }
    public function findCategory($id) {
        return $this->db->table( $this->tableFill() )
            ->join('term_taxonomy', 'terms.id = term_taxonomy.term_id')
            ->where('terms.id', '=', $id)
            ->first();
    }
}