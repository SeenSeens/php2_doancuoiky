<?php
require_once __DIR_ROOT__ . '/app/services/LocationService.php';
class LocationController extends Controller{
    public array $data = [];
    private LocationService $locationService;
    public function __construct(){
        $this->locationService = new LocationService();
    }
    public function provinces(){
        $provinces = $this->locationService->getProvinces();
        header('Content-Type: application/json');
        echo json_encode($provinces, JSON_THROW_ON_ERROR);
    }
    public function districts(){
        $provinceCode = $_GET['province_code'] ?? null;
        $data = $this->locationService->getDistrictsByProvince($provinceCode);
        echo json_encode($data, JSON_THROW_ON_ERROR);
    }
    public function wards(){
        $districtCode = $_GET['district_code'] ?? null;
        $data = $this->locationService->getWardsByDistrict($districtCode);
        echo json_encode($data, JSON_THROW_ON_ERROR);
    }
}