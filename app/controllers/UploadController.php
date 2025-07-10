<?php
/**
 * Controller này có nhiệm vụ xử lý file uploads
 */
class UploadController extends Controller{
    public array $data = [];
    // Upload ảnh từ TinyMCE (images_upload_handler)
    function uploadImage(){
        header('Content-Type: application/json'); // luôn trả về JSON
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
            $target_dir = __DIR_ROOT__ . "/public/uploads/";
            if (!is_dir($target_dir)) {
                mkdir($target_dir, 0755, true);
            }

            $filename = basename($_FILES["file"]["name"]);
            $target_file = $target_dir . $filename;

            if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                // Nếu có hàm xử lý ảnh
                if (function_exists('process_image')) {
                    process_image($target_dir, $filename);
                }

                echo json_encode([
                    "location" => __WEB_ROOT__ . "/public/uploads/" . $filename
                ]);
            } else {
                echo json_encode(["error" => "Upload failed."]);
            }
        } else {
            echo json_encode(["error" => "Invalid request."]);
        }
    }

    // Cho TinyMCE kiểu khác sử dụng postAcceptor

    /**
     * @throws JsonException
     */
    function postAcceptor() {
        header('Content-Type: application/json');
        if (isset($_FILES['file'])) {
            $target_dir = __DIR_ROOT__ . "/public/uploads/";
            if (!is_dir($target_dir)) {
                if (!mkdir($target_dir, 0755, true) && !is_dir($target_dir)) {
                    throw new \RuntimeException(sprintf('Directory "%s" was not created', $target_dir));
                }
            }

            $filename = basename($_FILES["file"]["name"]);
            $target_file = $target_dir . $filename;

            if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                echo json_encode([
                    "location" =>  __WEB_ROOT__ . "/public/uploads/" . $filename
                ], JSON_THROW_ON_ERROR);
            } else {
                echo json_encode(["error" => "Upload failed."], JSON_THROW_ON_ERROR);
            }
        } else {
            echo json_encode(["error" => "Invalid request."], JSON_THROW_ON_ERROR);
        }
    }

    // Xử lý elFinder connector (trả JSON cho giao diện elFinder)
    public function Elfinder() {
        require_once __DIR_ROOT__. '/public/admin/plugins/elFinder/php/autoload.php';

        // Hàm kiểm soát quyền truy cập (ẩn file bắt đầu bằng dấu chấm)
        function access($attr, $path, $data, $volume) {
            return strpos(basename($path), '.') === 0
                ? !($attr === 'read' || $attr === 'write')
                : null;
        }

        // Cấu hình thư mục gốc cho elFinder
        $opts = [
            'roots' => [
                [
                    'driver' => 'LocalFileSystem',
                    'path' => __DIR_ROOT__ . '/public/uploads/',
                    'URL' => __WEB_ROOT__ . '/public/uploads/',
                    'accessControl' => 'access',
                    'attributes'    => [],
                ]
            ]
        ];

        $connector = new elFinderConnector(new elFinder($opts));
        $connector->run();
    }
    public function elfinderView(){
        $this->data['sub_content']['page_title'] = "Trình quản lý file";
        $this->render('backend/filemanager', $this->data);
    }
}