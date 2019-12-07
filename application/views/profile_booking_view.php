<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--  -->
        <!--    Document Title-->
        <!-- =============================================-->
        <title>Spa in India, Spa Treatments in India</title>
        <?php $this->load->view('common/css') ?>
    </head>
    <body data-spy="scroll"  data-offset="60">
        <main class=" box-shadow-wide">
            <div class="main-box">
                <section class="font-1 p-0">
                    <div class="container">
                        <?php $this->load->view('common/header') ?>
                        <div class="flexslider flexslider-simple">
                            <img src="<?= base_url('assets') ?>/images/inner-banner.jpeg" />
                        </div>
                    </div>
                </section>
                <section class="font-1 p-0 mt-4">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-3 mr-0">
                                <div class="vertical-menu">
                                    <h5>Categories</h5>
                                    <hr class="color-9 my-2">
                                    <ul>
                                        <?php foreach ($category_key as $key => $category_data) : ?>
                                            <li><a href="<?= base_url().str_replace(" ", "-",$category_data->category_name)."-in-".str_replace(" ","-",$this->session->userdata('current_locaation'))."/category/".$this->friend->base64url_encode($category_data->id) ?>"><span class="fa fa-list-alt"></span> &nbsp <?= $category_data->category_name ?></a></li>
                                        <?php endforeach ; ?>
                                    </ul>
                                </div>
                                <div class="vertical-menu">
                                    <h5>Popular Areas</h5>
                                    <hr class="color-9 my-2">
                                    <ul>
                                        <?php foreach ($area_key as $key => $area_data) : ?>
                                            <li><a href="<?= base_url().str_replace(' ','',$area_data->country_name)."/".str_replace(' ','',$area_data->city_name)."/".str_replace(' ','-',$area_data->area_name)."/area-location/".$this->friend->base64url_encode($area_data->id) ?>"><span class="fa fa-map-marker"></span> &nbsp <?= $area_data->area_name ?></a></li>
                                        <?php endforeach ; ?>
                                    </ul>
                                </div>
                                <div class="vertical-menu">
                                    <h5>Services:</h5>
                                    <hr class="color-9 my-2">
                                    <ul>
                                        <?php foreach ($services_key as $key => $services_data) : ?>
                                            <li><a href="<?= base_url().str_replace(' ','-',$services_data->services_name)."-services-in-".$this->session->userdata('current_locaation')."/services/".$this->friend->base64url_encode($services_data->id) ?>"><span class="fa fa-hand-o-right"></span> &nbsp <?= $services_data->services_name ?></a></li>
                                        <?php endforeach ; ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-9 pl-0">
                                <div class="container ">
                                    <div class="row mb-6 text-center">
                                        <div class="col">
                                            <h3 class="fs-2 fs-md-3">Booking</h3>
                                            <hr class="short" data-zanim="{&quot;from&quot;:{&quot;opacity&quot;:0,&quot;width&quot;:0},&quot;to&quot;:{&quot;opacity&quot;:1,&quot;width&quot;:&quot;4.20873rem&quot;},&quot;duration&quot;:0.8}" style="width: 4.20873rem; opacity: 1;">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 ">
                                                <?= form_open('home/profile_booking'); ?>
                                                <div class="row">
                                                    <div class="col-lg-4 mb-4 mb-lg-4">
                                                        <label class="color-primary">Name</label>
                                                        <input class="form-control background-white" type="text" name="name" placeholder="Name" required>
                                                    </div>
                                                    <div class="col-lg-4 mb-4 mb-lg-4">
                                                        <label class="color-primary">Email</label>
                                                        <input class="form-control background-white" type="email" name="email" placeholder="Email" required>
                                                    </div>
                                                    <div class="col-lg-4 mb-4 mb-lg-4">
                                                        <label class="color-primary">Phone Number</label>
                                                        <input class="form-control background-white" type="text" name="contact" placeholder="Phone Number" required>
                                                    </div>
                                                    <div class="col-lg-6 mb-4 mb-lg-4">
                                                        <label class="color-primary">Date</label>
                                                        <input class="form-control background-white" type="date" name="date_to_visite" placeholder="Date To visit" required>
                                                    </div>
                                                    <div class="col-lg-6 mb-4 mb-lg-4">
                                                        <label class="color-primary">Pincode</label>
                                                        <input class="form-control background-white" type="text" name="pincode" placeholder="Pincode" required>
                                                    </div>
                                                    <div class="col-12 mt-4">
                                                        <textarea style="height: 135px!important;" class="form-control  background-white textarea" name="descriptions" rows="8" placeholder="Enter your descriptions here..." required=""></textarea>
                                                    </div>
                                                    <input type="hidden" value="<?= $profile_id ?>" name="profile_id">
                                                    <div class="col-12 mt-4">
                                                        <button class="btn btn-md-lg btn-primary">Send Now</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <?php $this->load->view('common/footer') ?>
            </div>
        </main>
        <?php $this->load->view('common/js') ?>
    </body>
</html>