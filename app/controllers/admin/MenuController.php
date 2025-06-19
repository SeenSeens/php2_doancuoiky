<?php
require_once __DIR_ROOT__ . '/app/services/PostService.php';
require_once __DIR_ROOT__ . '/app/services/TermService.php';
require_once __DIR_ROOT__ . '/app/services/MenuService.php';
require_once __DIR_ROOT__ . '/app/services/MenuItemsService.php';
class MenuController extends Controller {
    public array $data = [];
    private PostService $postService;
    private TermService $termService;
    private MenuService $menuService;
    private MenuItemsService $menuItemsService;

    public function __construct() {
        $this->postService = new PostService();
        $this->termService = new TermService();
        $this->menuService = new MenuService();
        $this->menuItemsService = new MenuItemsService();
    }
    public function index() {
        $this->data['sub_content']['page_title'] = "Menu";
        $this->data['sub_content']['data_menu'] = $this->dataMenu(); // Lấy ds các items để thêm vào menu
        $this->data['sub_content']['menu_locations'] = $this->menuService->getMenu(); // Lấy location menu
        $this->data['content'] = 'backend/menus/index';
        $this->render('backend/admin_layout', $this->data);
    }
    public function create() {
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);

        if (!$data || !isset($data['items'])) {
            http_response_code(400);
            echo json_encode(['success' => false, 'message' => 'Dữ liệu không hợp lệ']);
            return;
        }

        foreach ($data['items'] as $item) {
            $data = [
                'menu_id' => $item['menu_id'],
                'title' => $item['title'],
                'url' => $item['url'],
            ];
            $this->menuItemsService->create($data);
        }

        echo json_encode(['success' => true, 'message' => 'Lưu menu thành công!']);
    }

    public function edit($id){

    }

    public function delete(){

    }

    /**
     * Lấy ra data để thêm vào menu
     * @return array
     */
    private function dataMenu(){
        return [
            'post' => $this->postService->menuItems( 'post' ),
            'pages' => $this->postService->menuItems( 'page' ),
            'category' => $this->termService->menuItems( 'category'),
            'tag' => $this->termService->menuItems( 'tag' ),
            'product_cat' => $this->termService->menuItems( 'product_cat' ),
            'product_tag' => $this->termService->menuItems( 'product_tag' ),
            'product_brand' => $this->termService->menuItems( 'product_brand' ),
        ];
    }
}
?>