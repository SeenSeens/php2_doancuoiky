<?php
require_once __DIR_ROOT__ . '/app/repositories/BaseRepository.php';
class LocationRepository extends BaseRepository{
    public function __construct(){
        parent::__construct(null);
    }

    public function getProvinces(){
        return $this->db->table('provinces')
            ->get();
    }
    public function getDistricts(){
        return $this->db->table('districts')
            ->get();
    }
    public function getWards(){
        return $this->db->table('wards')
            ->get();
    }
    public function getFullWards() {
        return $this->db->table('wards AS w')
            ->select("
                w.code AS ward_code, w.name AS ward_name, auw.full_name AS ward_type,
                d.code AS district_code, d.name AS district_name, aud.full_name AS district_type,
                p.code AS province_code, p.name AS province_name, aup.full_name AS province_type,
                ar.name AS region_name
            ")
            ->leftJoin('districts AS d', 'w.district_code = d.code')
            ->leftJoin('provinces AS p', 'd.province_code = p.code')
            ->leftJoin('administrative_units AS auw', 'w.administrative_unit_id = auw.id')
            ->leftJoin('administrative_units AS aud', 'd.administrative_unit_id = aud.id')
            ->leftJoin('administrative_units AS aup', 'p.administrative_unit_id = aup.id')
            ->leftJoin('administrative_regions AS ar', 'p.administrative_region_id = ar.id')
            ->orderBy('p.name', 'ASC')
            ->get();
    }
    //
    public function getProvincesWithRegion() {
        return $this->db->table('provinces AS p')
            ->select('p.code, p.name, aup.full_name AS province_type, ar.name AS region_name')
            ->leftJoin('administrative_units AS aup', 'p.administrative_unit_id = aup.id')
            ->leftJoin('administrative_regions AS ar', 'p.administrative_region_id = ar.id')
            ->orderBy('p.name', 'ASC')
            ->get();
    }

    public function getDistrictsByProvince($provinceCode) {
        return $this->db->table('districts AS d')
            ->select('d.code, d.name, aud.full_name AS district_type')
            ->leftJoin('administrative_units AS aud', 'd.administrative_unit_id = aud.id')
            ->where('d.province_code', '=', $provinceCode)
            ->orderBy('d.name', 'ASC')
            ->get();
    }

    public function getWardsByDistrict($districtCode) {
        return $this->db->table('wards AS w')
            ->select('w.code, w.name, auw.full_name AS ward_type')
            ->leftJoin('administrative_units AS auw', 'w.administrative_unit_id = auw.id')
            ->where('w.district_code', '=', $districtCode)
            ->orderBy('w.name', 'ASC')
            ->get();
    }
}