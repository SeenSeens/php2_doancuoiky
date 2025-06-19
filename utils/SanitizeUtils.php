<?php
class SanitizeUtils {
    public static function sanitizeInput( $input ) {
        return isset( $input ) ? trim( $input ) : '';
    }

    public static function sanitizeInputArray( $input ) {
        if (!isset( $input )) return [];
        // Ép kiểu về mảng nếu là string (đề phòng form gửi lên 1 giá trị đơn)
        $input = is_array( $input ) ? $input : [ $input ];

        return array_map([self::class, 'sanitizeInput'], $input );
    }

}