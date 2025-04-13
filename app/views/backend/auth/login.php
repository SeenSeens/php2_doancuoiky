<!--wrapper-->
<div class="wrapper">
    <div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
        <div class="container-fluid">
            <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
                <div class="col mx-auto">
                    <div class="mb-4 text-center">
                        <img src="<?= __WEB_ROOT__ . '/public/admin/assets/images/logo-img.png'?>" width="180" alt="" />
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="border p-4 rounded">
                                <div class="text-center">
                                    <h3 class="">Đăng nhập</h3>
                                    <p>Bạn chưa có tài khoản? <a href="<?= __WEB_ROOT__ . '/admin/register'; ?>">Đăng ký tại đây</a>
                                    </p>
                                </div>
                                <div class="d-grid">
                                    <a class="btn my-4 shadow-sm btn-white" href="javascript:;">
                                        <span class="d-flex justify-content-center align-items-center">
                                            <img class="me-2" src="<?= __WEB_ROOT__ . '/public/admin/assets/icons/search.svg' ?>" width="16" alt="Image Description">
                                            <span>Đăng nhập bằng Google</span>
                                        </span>
                                    </a>
                                    <a href="javascript:;" class="btn btn-facebook"><i class="bx bxl-facebook"></i>Đăng nhập bằng Facebook</a>
                                </div>
                                <div class="login-separater text-center mb-4">
                                    <span>HOẶC ĐĂNG NHẬP BẰNG EMAIL</span>
                                    <hr/>
                                </div>
                                <div class="form-body">
                                    <form class="row g-3" method="post">
                                        <div class="col-12">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" name="email" class="form-control" id="email" placeholder="Nhập Email">
                                        </div>
                                        <div class="col-12">
                                            <label for="password" class="form-label">Mật khẩu</label>
                                            <div class="input-group" id="show_hide_password">
                                                <input type="password" name="password" class="form-control border-end-0" id="password"  placeholder="Nhập mật khẩu">
                                                <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                                                <label class="form-check-label" for="flexSwitchCheckChecked">Nhớ tôi</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 text-end">	<a href="<?= __WEB_ROOT__ . '/admin/forgot-password'?>">Quên mật khẩu ?</a>
                                        </div>
                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button type="submit" name="dangnhap" class="btn btn-primary"><i class="bx bxs-lock-open"></i>Đăng nhập</button>
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
<!--end wrapper-->