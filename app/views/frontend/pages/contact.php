<?php $this->render('frontend/layout/header'); ?>
<!-- Hero Section Begin -->
<section class="hero hero-normal">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <?php $this->render('frontend/layout/header/hero__categories') ?>
            </div>
            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form action="#">
                            <div class="hero__search__categories">
                                All Categories
                                <span class="arrow_carrot-down"></span>
                            </div>
                            <input type="text" placeholder="What do yo u need?">
                            <button type="submit" class="site-btn">SEARCH</button>
                        </form>
                    </div>
                    <div class="hero__search__phone">
                        <div class="hero__search__phone__icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="hero__search__phone__text">
                            <h5>+65 11.188.888</h5>
                            <span>support 24/7 time</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->
<!-- Breadcrumb Section Begin -->
<?php $this->render('frontend/layout/breadcrumb') ?>
<!-- Breadcrumb Section End -->
<!-- Contact Section Begin -->
<section class="contact spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                <div class="contact__widget">
                    <span class="icon_phone"></span>
                    <h4>Phone</h4>
                    <p>0385 573 558</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                <div class="contact__widget">
                    <span class="icon_pin_alt"></span>
                    <h4>Address</h4>
                    <p>303/41 Tân Sơn Nhì</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                <div class="contact__widget">
                    <span class="icon_clock_alt"></span>
                    <h4>Open time</h4>
                    <p>08:00 am to 17:00 pm</p>
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
    <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d125420.78863964338!2d106.6401792!3d10.780672!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2s!5e0!3m2!1svi!2s!4v1716321313399!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    <div class="map-inside">
        <i class="icon_pin"></i>
        <div class="inside-widget">
            <h4>Tân Phú</h4>
            <ul>
                <li>Phone: 0385 573 558</li>
                <li>Add: 303/41 Tân Sơn Nhì</li>
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
                    <h2>Leave Message</h2>
                </div>
            </div>
        </div>
        <form action="#">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <input type="text" placeholder="Your name">
                </div>
                <div class="col-lg-6 col-md-6">
                    <input type="text" placeholder="Your Email">
                </div>
                <div class="col-lg-12 text-center">
                    <textarea placeholder="Your message"></textarea>
                    <button type="submit" class="site-btn">SEND MESSAGE</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Contact Form End -->
<?php $this->render('frontend/layout/footer'); ?>