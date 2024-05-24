<?php

/**
 * Controller này có nhiệm vụ xử lý file uploads
 */
class Upload extends Controller {
    function uploadImage() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['thumbnail'])) {
            $target_dir = __DIR_ROOT__ . "/public/uploads/";
            $target_file = $target_dir . basename($_FILES["file"]["name"]);

            // Di chuyển tệp đã upload vào thư mục đích
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                // Xử lý hình ảnh
                process_image($target_dir, basename($_FILES["file"]["name"]));
                echo json_encode(["message" => "File uploaded and processed successfully."]);
            } else {
                echo json_encode(["message" => "Sorry, there was an error uploading your file."]);
            }
        } else {
            echo json_encode(["message" => "Invalid request."]);
        }
    }
}