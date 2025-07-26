<!-- Single Page Header start -->
<?php $this->render('frontend/template-parts/breadcrumb'); ?>
<!-- Single Page Header End -->
<!-- Cart Page Start -->
<section class="shoping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th class="shoping__product">Sản phẩm</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Tổng tiền</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="cart-body"></tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__btns">
                    <a href="<?= __WEB_ROOT__ . '/cua-hang' ?>" class="primary-btn cart-btn">Tiếp tục mua sắm</a>
                    <a href="#" class="primary-btn cart-btn cart-btn-right" id="update-cart-btn"><span class="icon_loading"></span>Cập nhật giỏ hàng</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="shoping__continue">
                    <div class="shoping__discount">
                        <h5>Mã giảm giá</h5>
                        <form action="#">
                            <input type="text" placeholder="Enter your coupon code">
                            <button type="submit" class="site-btn">Áp dụng mã giảm giá</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="shoping__checkout">
                    <h5>Tổng cộng giỏ hàng</h5>
                    <ul>
                        <li>Subtotal <span id="cart-subtotal">0 VNĐ</span></li>
                        <li>Total <span id="cart-total">0 VNĐ</span></li>
                    </ul>
                    <a href="<?= __WEB_ROOT__ . '/thanh-toan' ?>" class="primary-btn">Tiến hành thanh toán</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Cart Page End -->
<script src="<?= __WEB_ROOT__ . '/public/frontend/js/cart.js' ?>"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const cartUI = new CartUI("cart-body", "<?= __WEB_ROOT__ ?>");
        cartUI.render();

        const updateBtn = document.getElementById("update-cart-btn");
        updateBtn.addEventListener("click", function (e) {
            e.preventDefault(); // Ngăn reload
            cartUI.updateFromInputs();
        });
    });
</script>