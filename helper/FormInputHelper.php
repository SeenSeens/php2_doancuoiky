<?php
class FormInputHelper {
    public static function inputValueTerm(){
        $name = SanitizeUtils::sanitizeInput($_POST['name']);
        $slug = SanitizeUtils::sanitizeInput($_POST['slug']);
        $description = SanitizeUtils::sanitizeInput($_POST['description']);
        // Tạo array để thêm hoặc cập nhật vào database
        return [
            'name' => $name,
            'slug' => $slug,
            'description' => $description,
        ];
    }
}