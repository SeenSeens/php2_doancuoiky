<?php
class PostHelper {
    static function getStatusText($status) {
        return [
            'publish' => 'Đã xuất bản',
            'draft' => 'Bản nháp',
            'pending' => 'Chờ duyệt',
            'private' => 'Riêng tư',
            'trash' => 'Đã xóa',
        ][$status] ?? 'Không xác định';
    }

}