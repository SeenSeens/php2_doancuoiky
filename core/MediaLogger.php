<?php
class MediaLogger {
    public static function onUpload($cmd, $result, $args, $elfinder) {
        $service = new MediaService();
        $userId = $_SESSION['user_id'] ?? null;

        foreach ($result['added'] as $file) {
            $realPath = $elfinder->realpath($file['hash']);
            try {
                $service->uploadFromPath($realPath, $userId); // gọi service xử lý
            } catch (Exception $e) {

            }
        }
    }

    public static function onRemove($cmd, $result, $args, $elfinder) {
        $service = new MediaService();
        foreach ($result['removed'] as $path) {
            $fileName = basename($path);
            try {
                $media = $service->findByFileName($fileName);
                if ($media && isset($media['id'])) {
                    $service->deleteByFileId((int)$media['id']);
                }
            } catch (Exception $e) {
            }
        }
    }
}
