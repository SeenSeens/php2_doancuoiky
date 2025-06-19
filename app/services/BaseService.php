<?php
class BaseService {
    protected $repository;

    public function __construct($repository) {
        $this->repository = $repository;
    }

    public function getAll() {
        return $this->repository->all();
    }

    public function getById($id) {
        return $this->repository->find($id);
    }

    public function create($data) {
        // Thêm logic kiểm tra dữ liệu trước khi insert
        return $this->repository->insert($data);
    }

    public function update($id, $data) {
        // Kiểm tra dữ liệu hợp lệ trước khi update
        return $this->repository->update($id, $data);
    }

    public function delete($id) {
        return $this->repository->delete($id);
    }
}
