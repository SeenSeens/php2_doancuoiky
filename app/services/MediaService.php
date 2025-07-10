<?php
require_once __DIR_ROOT__ . '/app/services/BaseService.php';
require_once __DIR_ROOT__ . '/app/repositories/MediaRepository.php';
class MediaService extends BaseService{
    protected MediaRepository $mediaRepository;

    public function __construct() {
        $this->mediaRepository = new MediaRepository();

    }
    public function uploadFromPath(string $realPath, ?int $userId = null): bool {
        $info = pathinfo($realPath);
        $mime = mime_content_type($realPath);
        $slug = strtolower(str_replace(' ', '-', $info['filename']));
        $size = filesize($realPath);
        [$width, $height] = [null, null];

        if (str_starts_with($mime, 'image/')) {
            [$width, $height] = getimagesize($realPath);
        }

        $data = [
            'title' => $info['filename'],
            'slug' => $slug,
            'file_name' => $info['basename'],
            'file_path' => str_replace(__DIR_ROOT__, '', $realPath),
            'file_type' => $mime,
            'mime_type' => $mime,
            'extension' => $info['extension'],
            'size' => $size,
            'width' => $width,
            'height' => $height,
            'uploaded_by' => $userId
        ];

        return $this->mediaRepository->insert($data);
    }

    public function listMedia(): array {
        return $this->mediaRepository->getAll();
    }

    public function deleteByFileId( int $id ): bool {
        return $this->mediaRepository->deleteById( $id );
    }

    public function findByFileName(string $fileName): ?array {
        return $this->mediaRepository->findByFileName($fileName);
    }

}