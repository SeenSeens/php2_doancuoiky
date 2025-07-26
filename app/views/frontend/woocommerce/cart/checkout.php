<!-- Hero Section Begin -->
<?php $this->render('frontend/template-parts/hero__categories'); ?>
<!-- Hero Section End -->

<!-- Breadcrumb Section Begin -->
<?php $this->render('frontend/template-parts/breadcrumb'); ?>
<!-- Breadcrumb Section End -->

<!-- Checkout Section Begin -->
<section class="checkout spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h6><span class="icon_tag_alt"></span> Bạn có phiếu giảm giá không? <a href="#">Nhấp vào đây</a> để nhập mã của bạn</h6>
            </div>
        </div>
        <div class="checkout__form">
            <h4>Chi tiết thanh toán</h4>
            <form id="checkoutForm" action="<?= __WEB_ROOT__ . '/dat-hang' ?>" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="cart" id="cartInput">
                <div class="row row-cols-1 row-cols-md-2 g-4">
                    <div class="col">
                        <div class="checkout__input">
                            <label for="name">Họ tên<span>*</span></label>
                            <input type="text" name="name" id="name" placeholder="Họ tên" required>
                        </div>
                        <div class="checkout__input">
                            <label for="address">Địa chỉ<span>*</span></label>
                            <input type="text" placeholder="Địa chỉ" class="checkout__input__add" name="address" id="address" required>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Số điện thoại<span>*</span></p>
                                    <input type="text" name="phone" id="phone" placeholder="Số điện thoại" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Email<span>*</span></p>
                                    <input type="text" name="email" id="email" placeholder="your-email@gmail.com" required>
                                </div>
                            </div>
                        </div>
                        <div class="checkout__input__checkbox">
                            <label for="acc">
                                Tạo tài khoản?
                                <input type="checkbox" id="acc">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <p>Tạo tài khoản bằng cách nhập thông tin bên dưới. Nếu bạn là khách hàng cũ, vui lòng đăng nhập ở đầu trang.</p>
                        <div class="checkout__input">
                            <p>Mật khẩu tài khoản<span>*</span></p>
                            <input type="text">
                        </div>
                        <div class="checkout__input__checkbox">
                            <label for="diff-acc">
                                Gửi đến một địa chỉ khác?
                                <input type="checkbox" id="diff-acc">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="checkout__input">
                            <p>Ghi chú đơn hàng<span>*</span></p>
                            <input type="text" placeholder="Notes about your order, e.g. special notes for delivery.">
                        </div>
                    </div>
                    <div class="col">
                        <div class="checkout__order">
                            <h4>Đơn hàng của bạn</h4>
                            <div class="checkout__order__products">Các sản phẩm <span>Tổng cộng</span></div>
                            <ul id="checkout-cart-list"></ul>
                            <div class="checkout__order__subtotal">Tổng phụ <span id="checkout-subtotal"></span></div>
                            <div class="checkout__order__total">Tổng cộng <span id="checkout-total"></span></div>
                            <div class="checkout__input__checkbox">
                                <label for="acc-or">
                                    Tạo tài khoản?
                                    <input type="checkbox" id="acc-or">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adip elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua.</p>
                            <div class="checkout__input__checkbox">
                                <label for="">
                                    Thanh toán khi nhận hàng
                                    <input type="checkbox" id="">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="checkout__input__checkbox">
                                <label for="">
                                    Chuyển khoản
                                    <input type="checkbox" id="">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <button type="submit" class="site-btn">Đặt hàng</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- Checkout Section End -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const cart = JSON.parse(localStorage.getItem("cart")) || [];

        const listEl = document.getElementById("checkout-cart-list");
        const subtotalEl = document.getElementById("checkout-subtotal");
        const totalEl = document.getElementById("checkout-total");

        let subtotal = 0;

        cart.forEach(item => {
        const li = document.createElement("li");
        const itemTotal = item.price * item.quantity;
        li.innerHTML = `<label class="w-75">${item.name} x${item.quantity}</label> <span class="w-25">${item.price.toLocaleString('vi-VN')} VND</span>`;
        listEl.appendChild(li);
        subtotal += itemTotal;
    });

        subtotalEl.textContent = subtotal.toLocaleString('vi-VN') + " VND";
        totalEl.textContent = subtotal.toLocaleString('vi-VN') + " VND"; // Total = Subtotal nếu chưa có phí ship/discount

        // Khi submit form, gán cart vào input ẩn
        const checkoutForm = document.getElementById("checkoutForm");
        checkoutForm.addEventListener("submit", function () {
            cartInput.value = JSON.stringify(cart);
        });
    });

</script>