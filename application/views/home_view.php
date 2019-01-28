<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="theme-color" content="#ffffff">
        <?php $this->load->view('common/css') ?>
    </head>
    <body data-spy="scroll"  data-offset="60">
        <main class=" box-shadow-wide">
            <div class="main-box">
                <section class="font-1 p-0">
                    <div class="container">
                        <?php $this->load->view('common/header') ?>
                        <div class="flexslider flexslider-simple">
                            <div class="fg">
                                    <?= form_open('search',array('method'=>'get')) ?>
                                    <div class="row">
                                        <div class=" col-lg-4"> 
                                            <input list="browsers" autocomplete="off" class="form-control" id="query" type="text" name="query" placeholder="Search">
                                            <datalist id="browsers">
                                                <?php foreach ($all_category_key as $key => $category_data) : ?>
                                                    <option value="<?= $category_data->category_name ?>">
                                                <?php endforeach ; ?>
                                            </datalist>
                                        </div>
                                        <div class=" col-lg-3">
                                            <select class="form-control" name="services">
                                                <option value="0">---Select Services---</option>
                                                <?php foreach ($search_services as $key => $search_services_data) : ?>
                                                    <option value="<?= $search_services_data->id ?>"><?= $search_services_data->services_name ?></option>
                                                <?php endforeach ; ?>
                                            </select>
                                        </div>
                                        <div class=" col-lg-3">
                                            <select class="form-control" name="city">
                                                <option value="0">---Select City---</option>
                                                <?php foreach ($get_city_by_curent_country as $key => $get_city_by_curent_country_data) : ?>
                                                    <option value="<?= $get_city_by_curent_country_data->id ?>"><?= $get_city_by_curent_country_data->city_name ?></option>
                                                <?php endforeach ; ?>
                                            </select>
                                        </div>
                                        <div class=" col-lg-2"> 
                                            <button class="btn btn-md-lg btn-primary" type="Go" style="width:100%;"> <span class="color-white fw-600">GO</span></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <ul class="slides">
                                <li data-zanim-timeline="{}" class="" data-thumb-alt="" style="width: 100%; float: left; margin-right: -100%; position: relative; opacity: 0; display: block; z-index: 1;">
                                    <section class="py-0">
                                        <div class="background-holder" style="background-image:url(<?= base_url('assets') ?>/images/slider-1.jpg);"></div>
                                        <div class="container p-9">
                                        </div>
                                    </section>
                                </li>
                                <li data-zanim-timeline="{}" data-thumb-alt="" style="width: 100%; float: left; margin-right: -100%; position: relative; opacity: 1; display: block; z-index: 2;" class="flex-active-slide">
                                    <section class="py-0">
                                        <div class="background-holder" style="background-image:url(<?= base_url('assets') ?>/images/slider-2.jpg);"></div>
                                        <div class="container p-9">
                                        </div>
                                    </section>
                                </li>
                                <li data-zanim-timeline="{}" data-thumb-alt="" style="width: 100%; float: left; margin-right: -100%; position: relative; opacity: 0; display: block; z-index: 1;">
                                    <section class="py-0">
                                        <div class="background-holder" style="background-image:url(<?= base_url('assets') ?>/images/slider-3.jpg);"></div>
                                        <div class="container p-9">
                                        </div>
                                    </section>
                                </li>
                            </ul>
                        </div>
                    </div>
                </section>
                <section class="font-1 py-5">
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
                            <div class="col-lg-9 px-0">
                                <div class="container text-center">
                                    <div class="row mb-6">
                                        <div class="col-lg-12">
                                            <h3 class="fs-2 fs-md-3"> Premium Listing</h3>
                                            <hr class="short" data-zanim="{&quot;from&quot;:{&quot;opacity&quot;:0,&quot;width&quot;:0},&quot;to&quot;:{&quot;opacity&quot;:1,&quot;width&quot;:&quot;4.20873rem&quot;},&quot;duration&quot;:0.8}" style="width: 4.20873rem; opacity: 1;">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <?php foreach ($paid_profile_key as $key => $paid_profile_data) : ?>
                                            <div class="col-lg-4  mb-3 mt-3 imgp">
                                                <a  class="cuadroa" href="<?= base_url().str_replace(' ','-',$paid_profile_data->title)."/info/".$this->friend->base64url_encode($paid_profile_data->id) ?>">
                                                    <div class="cuadro_intro_hover ">
                                                        <p style="text-align:center;">
                                                            <img src="<?= base_url('admin/spa_image') ?>/<?= $paid_profile_data->image ? $paid_profile_data->image : "default.jpg" ?>" class="img-responsive" alt="">
                                                        </p>
                                                        <div class="caption">
                                                            <div class="blur"></div>
                                                            <div class="caption-text">
                                                                <h3><marquee><?= $paid_profile_data->title ?></marquee></h3>
                                                                <p><b><?= $paid_profile_data->city_name ?></b> </p>
                                                                <p class="bgp"><?= $paid_profile_data->description ? $paid_profile_data->description : "" ?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        <?php endforeach ; ?>
                                    </div>
                                </div>
                                <div class="container text-center">
                                    <div class="row mb-6">
                                        <div class="col">
                                            <h3 class="fs-2 fs-md-3">Services</h3>
                                            <hr class="short" data-zanim="{&quot;from&quot;:{&quot;opacity&quot;:0,&quot;width&quot;:0},&quot;to&quot;:{&quot;opacity&quot;:1,&quot;width&quot;:&quot;4.20873rem&quot;},&quot;duration&quot;:0.8}" style="width: 4.20873rem; opacity: 1;">
                                        </div>
                                    </div>
                                    <div data-dots="true" data-nav="true" data-items='{"0":{"items":2},"600":{"items":2}}' data-autoplay="true" data-margin="30" data-loop="true" class="owl-carousel owl-theme owl-nav-outer  owl-dot-round">
                                        <?php foreach ($services_key as $key => $services_data) : ?>
                                            <div class="item"><img src="<?= base_url('assets') ?>/images/services-1.jpg" class="radius-primary"/><p><b><?= $services_data->services_name ?></b></p></div>
                                        <?php endforeach ; ?>
                                    </div>
                                </div>
                                <div class="container text-center mt-5">
                                    <div class="row mb-6">
                                        <div class="col">
                                            <h3 class="fs-2 fs-md-3">Free Listing</h3>
                                            <hr class="short" data-zanim="{&quot;from&quot;:{&quot;opacity&quot;:0,&quot;width&quot;:0},&quot;to&quot;:{&quot;opacity&quot;:1,&quot;width&quot;:&quot;4.20873rem&quot;},&quot;duration&quot;:0.8}" style="width: 4.20873rem; opacity: 1;">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <?php foreach ($free_profile_key as $key => $free_profile_data) : ?>
                                            <div class="col-lg-4  mb-3 mt-3 imgp">
                                                <a href="<?= base_url().str_replace(' ','-',$free_profile_data->title)."/info/".$this->friend->base64url_encode($free_profile_data->id) ?>">
                                                <div class="cuadro_intro_hover ">
                                                    <p style="text-align:center;">
                                                        <img src="<?= base_url('assets') ?>/images/portrait-1.jpg" class="img-responsive" alt="<?= str_replace(' ','-',$free_profile_data->title) ?>">
                                                    </p>
                                                    <div class="caption">
                                                        <div class="blur"></div>
                                                        <div class="caption-text">
                                                            <h3><marquee><?= $free_profile_data->title ?></marquee></h3>
                                                            <p><b><?= $free_profile_data->city_name ?></b> </p>
                                                            <p class="bgp"><?= $free_profile_data->description ? $free_profile_data->description : "" ?></p>
                                                           
                                                        </div>
                                                    </div>
                                                </div>
                                                </a>
                                            </div>
                                        <?php endforeach ; ?>
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