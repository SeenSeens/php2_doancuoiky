<?php
require_once __DIR_ROOT__ . '/app/repositories/BaseRepository.php';
class MediaRepository extends BaseRepository {
    private string $table = 'media';
    public function __construct() {
        parent::__construct('MediaModel');
    }
    public function insert(array $data): bool {
        return $this->db->table('media')->insert($data);
    }

    public function getAll(): array {
        return $this->db->table('media')->orderBy('id', 'desc')->get();
    }

    public function findById(int $id): ?array {
        return $this->db->table('media')->where('id', '=', $id)->first();
    }

    public function deleteById(int $id): bool {
        return $this->db->table('media')->where('id', '=', $id)->delete();
    }

    public function findByFileName(string $fileName): ?array {
        return $this->db->table('media')->where('file_name', '=', $fileName)->first();
    }

}