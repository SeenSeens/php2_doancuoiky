<?php
require_once __DIR_ROOT__ . '/app/services/BaseService.php';
require_once __DIR_ROOT__ . '/app/repositories/OrderRepository.php';
require_once __DIR_ROOT__ . '/app/services/OrderItemService.php';
class OrderService extends BaseService{
    private OrderRepository $orderRepository;
    private OrderItemService $orderItemService;
    public function __construct(){
        $this->orderRepository = new OrderRepository();
        $this->orderItemService = new OrderItemService();
    }
    public function createOrder(array $cartItems, int $customer_id): array {
        try {
            if (!$customer_id) {
                throw new Exception("Không có khách hàng hợp lệ.");
            }

            // 1. Tính tổng tiền
            $total = array_reduce($cartItems, function($sum, $item) {
                return $sum + ($item['price'] * $item['quantity']);
            }, 0);

            // 2. Lưu đơn hàng
            $orderData = [
                'customer_id' => $customer_id,
                'total' => $total,
                'status' => 'pending',
                'created_at' => date('Y-m-d H:i:s'),
            ];

            $this->orderRepository->insertOrder($orderData);
            $order_id = $this->orderRepository->getLastId();

            if (!$order_id) {
                throw new Exception("Không thể tạo đơn hàng.");
            }

            // 3. (Tùy chọn) Ghi order_items tại đây nếu có
            // foreach ($cartItems as $item) { ... }
            $this->orderItemService->saveOrderItems($order_id, $cartItems);
            return [
                'success' => true,
                'message' => 'Đặt hàng thành công!',
                'order_id' => $order_id,
                'customer_id' => $customer_id
            ];
        } catch (Exception $e) {
            return [
                'success' => false,
                'message' => 'Lỗi: ' . $e->getMessage()
            ];
        }
    }

}