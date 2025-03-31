<?php
class SanitizeUtils {
    public static function sanitizeInput( $input ) {
        return trim(htmlspecialchars(strip_tags( $input ), ENT_QUOTES, 'UTF-8'));
    }
}