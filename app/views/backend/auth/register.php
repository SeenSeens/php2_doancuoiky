
<div class="wrapper">
    <div class="d-flex align-items-center justify-content-center my-5 my-lg-0">
        <div class="container">
            <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2">
                <div class="col mx-auto">
                    <div class="my-4 text-center">
                        <img src="<?= __WEB_ROOT__ . '/public/admin/assets/images/logo-img.png'; ?>" width="180" alt="" />
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="border p-4 rounded">
                                <div class="text-center">
                                    <h3 class="">Đăng ký</h3>
                                    <p>Bạn đã có tài khoản? <a href="<?= __WEB_ROOT__ . '/admin/login' ?>">Đăng nhập tại đây</a></p>
                                </div>
                                <div class="d-grid">
                                    <a class="btn my-4 shadow-sm btn-white" href="javascript:;">
                                        <span class="d-flex justify-content-center align-items-center">
                                            <img class="me-2" src="<?= __WEB_ROOT__ . '/public/admin/assets/icons/search.svg'; ?>" width="16" alt="Image Description">
                                            <span>Đăng ký với Google</span>
                                        </span>
                                    </a>
                                    <a href="javascript:;" class="btn btn-facebook"><i class="bx bxl-facebook"></i>Đăng ký với Facebook</a>
                                </div>
                                <div class="login-separater text-center mb-4">
                                    <span>HOẶC ĐĂNG KÝ BẰNG EMAIL</span>
                                    <hr/>
                                </div>
                                <div class="form-body">
                                    <form class="row g-3" id="registerForm" method="POST" action="<?= __WEB_ROOT__ . '/admin/register'; ?>">
                                        <div class="col-12">
                                            <label for="username" class="form-label">Tên người dùng</label>
                                            <input type="text" class="form-control" id="username" name="username" placeholder="Tên người dùng">
                                        </div>
                                        <div class="col-12">
                                            <label for="email" class="form-label">Địa chỉ Email</label>
                                            <input type="email" class="form-control" id="email" name="email" placeholder="example@user.com">
                                        </div>
                                        <div class="col-12">
                                            <label for="password" class="form-label">Mật khẩu</label>
                                            <div class="input-group" id="show_hide_password">
                                                <input type="password" class="form-control border-end-0" id="password" name="password" placeholder="Nhập mật khẩu"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label for="password" class="form-label">Xác nhận mật khẩu</label>
                                            <div class="input-group" id="show_hide_confirm_password">
                                                <input type="password" class="form-control border-end-0" id="password" name="confirm_password" placeholder="Nhập mật khẩu"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
                                                <label class="form-check-label" for="flexSwitchCheckChecked">Tôi đã đọc và đồng ý với Điều khoản & Điều kiện</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-primary"><i class='bx bx-user'></i>Đăng ký</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end row-->
        </div>
    </div>
</div>

<!--Password show & hide js -->
<script>
    $(document).ready(function () {
        $("#show_hide_password a").on('click', function (event) {
            event.preventDefault();
            if ($('#show_hide_password input').attr("type") == "text") {
                $('#show_hide_password input').attr('type', 'password');
                $('#show_hide_password i').addClass("bx-hide");
                $('#show_hide_password i').removeClass("bx-show");
            } else if ($('#show_hide_password input').attr("type") == "password") {
                $('#show_hide_password input').attr('type', 'text');
                $('#show_hide_password i').removeClass("bx-hide");
                $('#show_hide_password i').addClass("bx-show");
            }
        });
        $("#show_hide_confirm_password a").on('click', function (event) {
            event.preventDefault();
            if ($('#show_hide_confirm_password input').attr("type") == "text") {
                $('#show_hide_confirm_password input').attr('type', 'password');
                $('#show_hide_confirm_password i').addClass("bx-hide");
                $('#show_hide_confirm_password i').removeClass("bx-show");
            } else if ($('#show_hide_confirm_password input').attr("type") == "password") {
                $('#show_hide_confirm_password input').attr('type', 'text');
                $('#show_hide_confirm_password i').removeClass("bx-hide");
                $('#show_hide_confirm_password i').addClass("bx-show");
            }
        });
    });

</script>