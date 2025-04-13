<?php
class UserController extends Controller{
    public array $data = [];
    public mixed $users, $user_meta;
    public function __construct() {
        $this->users = $this->model('UserModel');
        $this->user_meta = $this->model('UserMetaModel');
    }
    public function index() {
        // Lấy tất cả user
        $this->data['sub_content']['page_title'] = 'Thành viên';
        $this->data['sub_content']['users'] = $this->users->all();;
        $this->data['content'] = 'backend/user/index';
        $this->render('backend/admin_layout', $this->data);
    }
    public function create() {
        $this->data['sub_content']['page_title'] = 'Thêm thành viên';
        $this->data['content'] = 'backend/user/create';
        $this->render('backend/admin_layout', $this->data);
    }
    public function edit() {

    }
    public function delete() {
        if($_SERVER['REQUEST_METHOD'] == 'DELETE') {
            $data = json_decode(file_get_contents('php://input'), true);
            if ( isset( $data['id'] ) ) :
                $this->users->deleteUser($data['id']);
                echo json_encode(['success' => true]);
                return;
            else:
                echo json_encode(['error' => 'Thiếu ID danh mục']);
                return;
            endif;
        }
    }

    public function profile($id) {
        $this->data['sub_content']['page_title'] = 'Hồ sơ';
        $this->data['sub_content']['user'] = $this->users->find($id);
        // Lấy metadata của user
        $this->data['sub_content']['metaData'] = $this->user_meta->selectMetabyId($id);

        // Dùng với Form 
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy dữ liệu từ form một cách an toàn
            $full_name = isset( $_POST['full_name']) ? trim(htmlspecialchars(strip_tags($_POST['full_name']), ENT_QUOTES, 'UTF-8')) : '';
            $phone = isset( $_POST['phone']) ? trim(htmlspecialchars(strip_tags($_POST['phone']), ENT_QUOTES, 'UTF-8')) : '';
            $address = isset( $_POST['address']) ? trim(htmlspecialchars(strip_tags($_POST['address']), ENT_QUOTES, 'UTF-8')) : '';

            $metaData = [
                ['meta_key' => 'full_name', 'meta_value' => $full_name],
                ['meta_key' => 'phone', 'meta_value' => $phone],
                ['meta_key' => 'address', 'meta_value' => $address],
            ];

            // Thực hiện insert hoặc update
            $result = $this->user_meta->insertOrUpdateUserMeta($id, $metaData);
            // Redirect sau khi lưu
            header("Location: " . __WEB_ROOT__ . "/admin/user/profile/" . $id);
            exit;
        }

        // Dùng Ajax
        
        $this->data['content'] = 'backend/user/profile';
        $this->render('backend/admin_layout', $this->data);
    }
}