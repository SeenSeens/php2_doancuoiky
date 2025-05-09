<!-- wrapper -->
<div class="wrapper">
    <div class="authentication-forgot d-flex align-items-center justify-content-center">
        <div class="card forgot-box">
            <div class="card-body">
                <div class="p-4 rounded  border">
                    <div class="text-center">
                        <img src="<?= __WEB_ROOT__ . '/public/admin/assets/icons/forgot-2.png'; ?>" width="120" alt="" />
                    </div>
                    <h4 class="mt-5 font-weight-bold">Forgot Password?</h4>
                    <p class="text-muted">Enter your registered email ID to reset the password</p>
                    <div class="my-4">
                        <label class="form-label">Email id</label>
                        <input type="text" class="form-control form-control-lg" placeholder="example@user.com" />
                    </div>
                    <div class="d-grid gap-2">
                        <button type="button" class="btn btn-primary btn-lg">Send</button> <a href="<?= __WEB_ROOT__ . '/admin/login'; ?>" class="btn btn-light btn-lg"><i class='bx bx-arrow-back me-1'></i>Back to Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end wrapper -->