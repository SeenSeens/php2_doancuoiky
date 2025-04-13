<?php
class ImageUpload {
    private $uploadDir;
    public function __construct($uploadDir = "public/uploads/") {
        $this->uploadDir = $uploadDir;
    }
    // Hàm upload file
    public function upload() {
        if (isset($_FILES['thumbnail']) && $_FILES['thumbnail']['error'] == 0) {
            $target_file = $this->uploadDir . basename($_FILES["thumbnail"]["name"]);

            // Move uploaded file to target directory
            if (move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $target_file)) {
                // Process the image
                $this->process_image($this->uploadDir, basename($_FILES["thumbnail"]["name"]));
                return basename($_FILES["thumbnail"]["name"]); // Trả về tên file
            } else {
                // Handle error if file couldn't be moved
                echo "Sorry, there was an error uploading your file.";
                return null;
            }
        } else {
            return null;
        }
    }
    // Hàm remove file
    public function delete($filename) {
        $target = $this->uploadDir . $filename;
        if (file_exists($target)) {
            unlink($target);
            return true; // Trả về true nếu xóa thành công
        } else {
            return false; // Trả về false nếu tệp không tồn tại hoặc không xóa được
        }
    }
    // Hàm xử lý ảnh
    private function process_image($dir, $filename) {
        $i = strrpos($filename, '.');
        $image_name = substr($filename, 0, $i);
        $ext = substr($filename, $i);

        $image_path = $dir . $filename;

        // Thêm chức năng resize ảnh nếu cần
        // $this->resize_image($image_path, $dir . $image_name . '_resized' . $ext, 800, 600);
    }
    // Hàm thay đổi kích thước ảnh
    private function resize_image($old_image_path, $new_image_path, $max_width, $max_height) {
        $image_info = getimagesize($old_image_path);
        $image_type = $image_info[2];

        switch ($image_type) {
            case IMAGETYPE_JPEG:
                $image_from_file = 'imagecreatefromjpeg';
                $image_to_file = 'imagejpeg';
                break;
            case IMAGETYPE_GIF:
                $image_from_file = 'imagecreatefromgif';
                $image_to_file = 'imagegif';
                break;
            case IMAGETYPE_PNG:
                $image_from_file = 'imagecreatefrompng';
                $image_to_file = 'imagepng';
                break;
            default:
                echo 'File must be a JPEG, GIF, or PNG image.';
                exit;
        }

        $old_image = $image_from_file($old_image_path);
        $old_width = imagesx($old_image);
        $old_height = imagesy($old_image);

        $width_ratio = $old_width / $max_width;
        $height_ratio = $old_height / $max_height;

        if ($width_ratio > 1 || $height_ratio > 1) {
            $ratio = max($width_ratio, $height_ratio);
            $new_height = round($old_height / $ratio);
            $new_width = round($old_width / $ratio);
            $new_image = imagecreatetruecolor($new_width, $new_height);

            if ($image_type == IMAGETYPE_GIF) {
                $alpha = imagecolorallocatealpha($new_image, 0, 0, 0, 127);
                imagecolortransparent($new_image, $alpha);
            }
            if ($image_type == IMAGETYPE_PNG || $image_type == IMAGETYPE_GIF) {
                imagealphablending($new_image, FALSE);
                imagesavealpha($new_image, TRUE);
            }

            imagecopyresampled($new_image, $old_image, 0, 0, 0, 0, $new_width, $new_height, $old_width, $old_height);
            $image_to_file($new_image, $new_image_path);
            imagedestroy($new_image);
        } else {
            $image_to_file($old_image, $new_image_path);
        }
        imagedestroy($old_image);
    }
}

?>