<?php
class FormInputHelper {

    public static function inputValueTerm(){
        return [
            'name' => SanitizeUtils::sanitizeInput($_POST['name']),
            'slug' => SanitizeUtils::sanitizeInput($_POST['slug']),
            'description' => SanitizeUtils::sanitizeInput($_POST['description']),
            'thumbnail' => self::processingThumbnail(),
        ];
    }

    public static function inputValuePost( $type ) {
        // Mặc định là draft
        $status = 'draft';
        switch (true) {
            case isset($_POST['savePost']):
                $status = 'publish';
                break;
            case isset($_POST['draftPost']):
                $status = 'draft';
                break;
            // Nếu cần thêm các nút khác sau này, chỉ cần thêm case
            default:
                $status = 'draft';
        }
        return [
            'title' => SanitizeUtils::sanitizeInput($_POST['title']),
            'slug' => SanitizeUtils::sanitizeInput($_POST['slug']),
            'content' => SanitizeUtils::sanitizeInput($_POST['content']),
            'excerpt' => SanitizeUtils::sanitizeInput($_POST['excerpt']),
            'status' => $status,
            'type' => $type,
            'thumbnail' => self::processingThumbnail(),
            'author_id' => $_SESSION['user_id'],
        ];
    }

    public static function inputValueProduct() {
        return [
            'title' => SanitizeUtils::sanitizeInput($_POST['title']),
            'slug' => SanitizeUtils::sanitizeInput($_POST['slug']),
            'description' => SanitizeUtils::sanitizeInput($_POST['description']),
            'excerpt' => SanitizeUtils::sanitizeInput($_POST['excerpt']),
//            'price' => SanitizeUtils::sanitizeInput($_POST['price']),
//            'stock' => SanitizeUtils::sanitizeInput($_POST['stock']),
//            'status' => SanitizeUtils::sanitizeInput($_POST['status']),
            'thumbnail' => self::processingThumbnail(),
            'author_id' => $_SESSION['user_id'],
        ];
    }

    public static function inputValueCustomer() {
        return [
            'name' => SanitizeUtils::sanitizeInput($_POST['name']),
            'email' => SanitizeUtils::sanitizeInput($_POST['email']),
            'phone' => SanitizeUtils::sanitizeInput($_POST['phone']),
            'address' => SanitizeUtils::sanitizeInput($_POST['address']),
        ];
    }
    private static function processingThumbnail  () {
        $thumbnail = null;
        if (!empty($_FILES['thumbnail']['name'])) {
            $thumbnail = self::handleUploadThumbnail();
        } else {
            $thumbnail = $_POST['old_thumbnail'] ?? null;
        }
        return $thumbnail;
    }
    private static function handleUploadThumbnail(): string{
        $imageUpload = new ImageUpload();
        $path = $imageUpload->upload();
        return $path ? basename($path) : '';
    }
}