<?php
require_once __DIR_ROOT__ . '/app/services/BaseService.php';
require_once __DIR_ROOT__ . '/app/repositories/CustomerRepository.php';
class CustomerService extends BaseService{
    private CustomerRepository $customerRepository;
    public function __construct(){
        $this->customerRepository = new CustomerRepository();
    }
    public function saveCustomer( $id ) {
        try {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') :
                $data = FormInputHelper::inputValueCustomer();
                if (!empty($id)) {
                    $this->customerRepository->updateCustomer($data, $id);
                    return ['success' => true, 'message' => 'Cập nhật khách hàng thành công', 'customer_id' => $id];
                } else {
                    $customer_id = $this->customerRepository->insertCustomer($data);
                    return ['success' => true, 'message' => 'Thêm khách hàng thành công', 'customer_id' => $customer_id];
                }
            endif;
        } catch (Exception $e) {
            return ['success' => false, 'message' => "Có lỗi xảy ra: " . $e->getMessage()];
        }
    }
}