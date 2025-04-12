<?php
class FormInputHelper {
    public static function inputValueTerm(){
        return [
            'name' => SanitizeUtils::sanitizeInput($_POST['name']),
            'slug' => SanitizeUtils::sanitizeInput($_POST['slug']),
            'description' => SanitizeUtils::sanitizeInput($_POST['description']),
        ];
    }

    public static function inputValuePost(){
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
            'type' => 'post',
            'author_id' => $_SESSION['user_id'],
        ];
    }
}