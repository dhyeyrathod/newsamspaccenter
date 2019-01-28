<footer style="background-color: #f6c42d;">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 text-center">
                <div class="footer-nav">
                    <ul>
                        <li><a href="Contact_Us.html">Contact Us</a></li>
                        <li><a href="Blog.html">Blog</a></li>
                        <li><a href="faq.html">FAQ</a></li>
                        <li><a href="Testimonial.html">Testimonial</a></li>
                        <li><a href="Feedback.html">Feedback</a></li>
                        <li><a href="Business_Badge.html">Business Badge</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 ">
                <img src="<?= base_url('assets') ?>/images/visa.jpg" style="width:100%">
                <div class="clearfix"></div>
                <br>
                <div class="socilbg">
                    <a href="#">
                        <div class="background-primary text-center d-flex align-items-center radius-primary" style="height: 27px; width: 27px; float:right; margin-right:5px;"><span class="w-100 fa fa-linkedin color-warning"></span></div>
                    </a>
                    <a href="#">
                        <div class="background-primary text-center d-flex align-items-center radius-primary" style="height: 27px; width: 27px; float:right; margin-right:5px;"><span class="w-100 fa fa-twitter color-warning"></span></div>
                    </a>
                    <a href="#">
                        <div class="background-primary text-center d-flex align-items-center radius-primary" style="height: 27px; width: 27px; float:right; margin-right:5px;"><span class="w-100 fa fa-facebook color-warning"></span></div>
                    </a>
                    <a href="#">
                        <div class="background-primary text-center d-flex align-items-center radius-primary" style="height: 27px; width: 27px; float:right; margin-right:5px;"><span class="w-100 fa fa-google-plus color-warning"></span></div>
                    </a>
                </div>
            </div>
            <hr>
            <?php foreach ($all_cities_key as $key => $all_cities_data) : ?>
            <div class="col-lg-2">
                <div class="footer-menu">
                    <ul>
                        <li><a href="<?= base_url() ?><?= str_replace(' ', '-',$all_cities_data->country_name) ?>/<?= str_replace(' ', '-',$all_cities_data->city_name) ?>/city-location/<?= $this->friend->base64url_encode($all_cities_data->id) ?>"><span><i class="fa fa-angle-double-right"></i></span> <?= $all_cities_data->city_name ?></a></li>
                    </ul>
                </div>
            </div>
            <?php endforeach ; ?>
        </div>
    </div>
</footer>
<section class="fpm">
    <div class="container">
        <p class="fp">Spa Company is one of the best and leading companies in India known for delivering the quality services. It gives the unique experience to the clients by our special treatment and massage therapies. Spa experts of our company have designed natural treatments where you will come across with different herbal and ancient techniques, which gives the best mode in the field of relaxation. Our Spa experts are trained and professionals who provide customized services according to the customers need. These experts are friendlier in nature and solve the problem of the clients in an effective way.</p>
    </div>
</section>
<section class="background-primary text-center py-4">
    <div class="container">
        <div class="row align-items-center" style="opacity: 0.85;">
            <div class="col-sm-3 text-sm-left">
            </div>
            <div class="col-sm-6 mt-3 mt-sm-0">
                <p class="color-warning lh-6 mb-0 fw-600 cp">&copy; Copyright 2018 Sam Spa Center &nbsp;&nbsp;&nbsp;<a class="color-warning" href="privacy-policy.html">Privacy Policy</a> | <a class="color-warning " href="terms-of-use.html">Terms of Use</a></p>
            </div>
            <div class="col text-sm-right mt-3 mt-sm-0">
            </div>
        </div>
    </div>
</section>
<div class="rightfixed">
    <a href="<?= base_url('members/dashboard') ?>" class="frilst "></a>
    <a  href="customer-care.html" class="cscare "></a>
</div>