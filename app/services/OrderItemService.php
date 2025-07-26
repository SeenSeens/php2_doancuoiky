<?php
require_once __DIR_ROOT__ . '/app/services/BaseService.php';
require_once __DIR_ROOT__ . '/app/repositories/OrderItemRepository.php';
class OrderItemService extends BaseService{
    private $orderItemRepository;
    public function __construct(){
        $this->orderItemRepository = new OrderItemRepository();
    }
    public function saveOrderItems(int $order_id, array $cartItems): bool {
        try {
            foreach ($cartItems as $item) {
                $data = [
                    'order_id'   => $order_id,
                    'product_id' => $item['id'],
                    'quantity'   => $item['quantity'],
                    'price'      => $item['price']
                ];
                $this->orderItemRepository->insertOrderItem($data);
            }
            return true;
        } catch (Exception $e) {
            error_log("Lỗi khi lưu order_items: " . $e->getMessage());
            return false;
        }
    }
}