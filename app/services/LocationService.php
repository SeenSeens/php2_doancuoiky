<?php
require_once __DIR_ROOT__ . '/app/services/BaseService.php';
require_once __DIR_ROOT__ . '/app/repositories/LocationRepository.php';
class LocationService extends BaseService{
    protected LocationRepository $locationRepository;
    public function __construct() {
        $this->locationRepository = new LocationRepository();
    }
    public function getProvinces(){
        return $this->locationRepository->getProvinces();
    }
    public function getDistricts(){
        return $this->locationRepository->getDistricts();
    }
    public function getWards(){
        return $this->locationRepository->getWards();
    }




    public function getFullWards() {
        return $this->locationRepository->getFullWards();
    }
    public function getProvincesWithRegion(){
        return $this->locationRepository->getProvincesWithRegion();
    }
    public function getDistrictsByProvince($districtCode){
        return $this->locationRepository->getDistrictsByProvince($districtCode);
    }
    public function getWardsByDistrict($districtCode){
        return $this->locationRepository->getWardsByDistrict($districtCode);
    }

}