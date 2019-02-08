<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?= $meta_info->title ?></title>
        <meta name="description" content="<?= $meta_info->description ?>">
        <meta name="keywords" content="<?= $meta_info->Keyword ?>">
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
                <!-- <section class="font-1 pt-2 pl-0 pb-0 pr-0">
                    <div class="container">
                        <h1 class="gglsrc lng_commn">Beauty Spas in Delhi-NCR	</h1>
                        <div class="row">
                            <div class="col-lg-2 pl-3 pr-0 pb-0 pt-0"><a class="sortbyresult" href="#">SORT RESULTS BY</a><i class="left_arrow"></i></div>
                            <div class="col-lg-10 row pl-0 pr-0 pb-0 pt-0">
                                <div class="col-lg-2 topsbar"><a href="top-results.html">Top Results</a></div>
                                <div class="col-lg-2 topsbar"><a href="popularity.html">Popularity</a></div>
                                <div class="col-lg-2 topsbar"><a href="#"id="myBtn">Location</a></div>
                                <div class="col-lg-2 topsbar">
                                    <div class="dropdown">
                                        <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Distance
                                        <span class="caret"></span></button>
                                        <ul class="dropdown-menu">
                                            <li><a href="#">1 km</a></li>
                                            <li><a href="#">2 km</a></li>
                                            <li><a href="#">3 km</a></li>
                                            <li><a href="#">4 km</a></li>
                                            <li><a href="#">5 km</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-2 topsbar"><a href="ratings.html">Ratings <i class="fa fa-long-arrow-up"></i></a></div>
                                <div class="col-lg-2 topsbar"><a href="special-offer.html">Special Offer</a></div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </section> -->
                <section class="font-1 pt-2 pl-0 pb-0 pr-0">
                    <div class="container">
                        <div class="row">
                            <!-- The Modal -->
                            <div id="myModal" class="modal">
                                <!-- Modal content -->
                                <div class="modal-content">
                                    <span class="close">&times;</span>
                                    <span class="ptxt">Sort By Location</span>
                                    <p>Where in Delhi</p>
                                    <p>
                                    <div class="search-container">
                                        <form action="#">
                                            <input type="text" placeholder="Search.." name="search">
                                            <button type="submit">Go</button>
                                        </form>
                                    </div>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="font-1 p-0">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-3 pr-4 mr-0">
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
                                <div class="row">
                                    <div class="col-lg-12">
                                        <?php foreach ($get_area_profile as $key => $get_area_profile_data) : ?>
                                            <div class="row align-items-center box-shadow border color-9 mb-3 mx-0 pt-3 pb-1">
                                                <div class="col-sm-3"><a href="<?= base_url().str_replace(' ','-',$get_area_profile_data->title)."/info/".$this->friend->base64url_encode($get_area_profile_data->id) ?>"> <img class="w-100" style="height: 130px" src="<?= base_url('admin/spa_image') ?>/<?= isset($get_area_profile_data->image) ? $get_area_profile_data->image : "default.jpg" ?>"></a></div>
                                                <div class="col-sm-6 color-1">
                                                    <p class="lead color-primary fw-600 mb-0"><?= $get_area_profile_data->title ?></p>
                                                    <div class="color-warning">
                                                        <?php for ($i=1; $i  <= $get_area_profile_data->ranking ; $i++) { ?>
                                                            <span class="fa fa-star mr-1 color-warning"></span>
                                                        <?php } ?>
                                                    </div>
                                                    <div class="color-5 mt-2"><a class="color-5 fs--1" href="tel:<?= $get_area_profile_data->contact_number ?>"> <span class="fa fa-volume-control-phone mr-1"></span><?= $get_area_profile_data->contact_number ?></a></div>
                                                    <div class="color-5 mt-2">
                                                        <a class="color-5 fs--1" href="book-details.html"><span class="fa fa-address-book mr-1"></span><?= $get_area_profile_data->city_name ?></a>
                                                    </div>
                                                    <div class="color-5 mt-2">
                                                        <a class="color-5 fs--1" href="book-details.html"> <span class="fa fa-arrow-circle-right mr-1"></span><?= $get_area_profile_data->category_name ?></a>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3 color-1">
                                                    <a href="<?= base_url('home/profile_booking') ?>/<?= $this->friend->base64url_encode($get_area_profile_data->id) ?> ?>" class="btn btn-icon btn-primary btn-icon-right btn-capsule fr">
                                                    <span class="fa fa-arrow-circle-right color-warning"></span> Book Online</a>
                                                </div>
                                                <div class="rating"> <a href="<?= base_url().str_replace(' ','-',$get_area_profile_data->title)."/info/".$this->friend->base64url_encode($get_area_profile_data->id) ?>"><span class="fa fa-star mr-1 color-warning"></span> Click here to view your <b>friends rating</b></a></div>
                                            </div>
                                        <?php endforeach ; ?>
                                        <nav class="font-1 mt-5" aria-label="Page navigation example">
                                            <ul class="pagination justify-content-center pagination-warning">
                                                <?= $this->pagination->create_links(); ?>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <?php $this->load->view('common/footer') ?>
        </main>
        <?php $this->load->view('common/js') ?>
    </body>
</html>