<!-- Hero Section Begin -->
<?php $this->render('frontend/template-parts/hero__categories'); ?>
<!-- Hero Section End -->

<!-- Breadcrumb Section Begin -->
<?php $this->render('frontend/template-parts/breadcrumb'); ?>
<!-- Breadcrumb Section End -->

<!-- Contact Section Begin -->
<section class="contact spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                <div class="contact__widget">
                    <span class="icon_phone"></span>
                    <h4>Điện thoại</h4>
                    <p>0385 573 558</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                <div class="contact__widget">
                    <span class="icon_pin_alt"></span>
                    <h4>Địa chỉ</h4>
                    <p>303/41 Tân Sơn Nhì, Tân Phú</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                <div class="contact__widget">
                    <span class="icon_clock_alt"></span>
                    <h4>Giờ mở cửa</h4>
                    <p>08:00 đến 19:00</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                <div class="contact__widget">
                    <span class="icon_mail_alt"></span>
                    <h4>Email</h4>
                    <p>truongtuan829@gmail.com</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Section End -->

<!-- Map Begin -->
<div class="map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3138.42001787902!2d106.62876877392773!3d10.796148858831899!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752955af7d87b3%3A0x64c4e80d8d5e6273!2zMzAzIMSQLiBUw6JuIFPGoW4gTmjDrCwgVMOibiBTxqFuIE5ow6wsIFTDom4gUGjDuiwgSOG7kyBDaMOtIE1pbmgsIFZp4buHdCBOYW0!5e1!3m2!1svi!2s!4v1750438615141!5m2!1svi!2s" height="500" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    <div class="map-inside">
        <i class="icon_pin"></i>
        <div class="inside-widget">
            <h4>Tân Phú</h4>
            <ul>
                <li>Điện thoại: 0385 573 558</li>
                <li>Địa chỉ: 303/41 Tân Sơn Nhì, Tân Phú</li>
            </ul>
        </div>
    </div>
</div>
<!-- Map End -->

<!-- Contact Form Begin -->
<div class="contact-form spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="contact__form__title">
                    <h2>Để lại tin nhắn</h2>
                </div>
            </div>
        </div>
        <form action="#">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <input type="text" placeholder="Tên của bạn">
                </div>
                <div class="col-lg-6 col-md-6">
                    <input type="text" placeholder="Email của bạn">
                </div>
                <div class="col-lg-12 text-center">
                    <textarea placeholder="Tin nhắn của bạn "></textarea>
                    <button type="submit" class="site-btn">Gửi tin nhắn</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Contact Form End -->