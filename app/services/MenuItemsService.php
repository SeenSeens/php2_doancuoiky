<?php
require_once __DIR_ROOT__ . '/app/services/BaseService.php';
require_once __DIR_ROOT__ . '/app/repositories/MenuItemsRepository.php';

class MenuItemsService extends BaseService{
    protected MenuItemsRepository $menuItemsRepository;

    public function __construct(){
        $this->menuItemsRepository = new MenuItemsRepository();
    }

    public function create($data) {
        return $this->menuItemsRepository->insertMenuItems($data);
    }

}