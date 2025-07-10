<?php
require_once __DIR_ROOT__ . '/app/services/MediaService.php';
class MediaController extends Controller{
    public array $data = [];
    private MediaService $mediaService;
    public function __construct() {
        $this->mediaService = new MediaService();
    }
    function index(){
        $this->data['sub_content']['page_title'] = "Thư viện";
        $this->data['sub_content']['media'] = $this->mediaService->listMedia();
        $this->data['content'] = 'backend/media/index';
        $this->render('backend/admin_layout', $this->data);
    }
    // Optional: view elfinder standalone popup
    function popup() {
        require_once __DIR_ROOT__ . '/public/elfinder_popup.php';
    }

    function create(){
        $this->data['sub_content']['page_title'] = "Tải lên";
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
            $file = $_FILES['file'];
            $realPath = $this->moveUploadedFile($file); // Upload vào thư mục

            if ($realPath) {
                $success = $this->mediaService->uploadFromPath($realPath, $_SESSION['user_id'] ?? null);
                if ($success) {
                    $_SESSION['flash'] = 'Tải ảnh lên thành công!';
                    header('Location: ' . __WEB_ROOT__. '/admin/upload');
                    exit;
                } else {
                    $_SESSION['flash_error'] = 'Không thể lưu dữ liệu ảnh vào hệ thống.';
                }
            } else {
                $_SESSION['flash_error'] = 'Tải lên thất bại.';
            }
        }
        $this->data['content'] = 'backend/media/upload';
        $this->render('backend/admin_layout', $this->data);
    }

    // Hàm hỗ trợ di chuyển file vào /public/uploads
    private function moveUploadedFile(array $file): ?string {
        if ($file['error'] === UPLOAD_ERR_OK) {
            $uploadDir = __DIR_ROOT__ . '/public/uploads/';
            $fileName = uniqid('', true) . '_' . basename($file['name']);
            $targetPath = $uploadDir . $fileName;

            if (move_uploaded_file($file['tmp_name'], $targetPath)) {
                return $targetPath;
            }
        }
        return null;
    }

    public function connector(){
        // Nạp elFinder
        require_once __DIR_ROOT__ . '/public/admin/plugins/elFinder/php/elFinderConnector.class.php';
        require_once __DIR_ROOT__ . '/public/admin/plugins/elFinder/php/elFinder.class.php';

        // Nếu bạn dùng LocalFileSystem
        require_once __DIR_ROOT__ . '/public/admin/plugins/elFinder/php/elFinderVolumeDriver.class.php';
        require_once __DIR_ROOT__ . '/public/admin/plugins/elFinder/php/elFinderVolumeLocalFileSystem.class.php';

        // Gọi logger để xử lý upload/remove
        require_once __DIR_ROOT__ . '/core/MediaLogger.php';

        $opts = [
            'roots' => [
                [
                    'driver' => 'LocalFileSystem',
                    'path'   => __DIR_ROOT__ . '/public/uploads/',
                    'URL'    => __WEB_ROOT__ . '/public/uploads/',
                    'accessControl' => [$this, 'elfinderAccess'],
                ]
            ],
            'bind' => [
                'upload' => ['MediaLogger::onUpload'],
                'rm'     => ['MediaLogger::onRemove'],
            ]
        ];

        $connector = new elFinderConnector(new elFinder($opts));
        $connector->run();

        exit; // Không render view nữa
    }

    // Ẩn file/directory bắt đầu bằng dấu chấm
    public function elfinderAccess($attr, $path, $data, $volume)
    {
        return (str_starts_with(basename($path), '.')) // ẩn file .htaccess, .env...
            ? !($attr === 'read' || $attr === 'write')
            : null;
    }
}

?>