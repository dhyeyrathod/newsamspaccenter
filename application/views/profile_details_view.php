<?php 
// echo "<pre>";
// print_r($profile_data);
// exit();
?>
<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Spa in India, Spa Treatments in India</title>
        <META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
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
                            <img src="<?= base_url('assets') ?>/images/details-banner.jpg" />
                            <div id="fixedbg">
                                <div class="col-sm-6 color-1">
                                    <p class="lead color-primary fw-600"><?= $profile_data->title ?><span class="share"><i class="fa fa-share-alt-square"></i></span></p>
                                    <div class="color-warning">
                                        <?php for ($i=0 ; $i < $profile_data->ranking ; $i++) : ?>
                                            <span class="fa fa-star mr-1 color-warning"></span>
                                        <?php endfor ; ?>
                                    </div>
                                    <div class="color-5 mt-2">
                                        <a class="color-5 fs--1" target="_blank" href="<?= $profile_data->google_map_url ?>"> <span class="fa fa-address-book mr-1"></span><?= mb_substr($profile_data->address, 0 , 20) ?></a> | <a class="color-5 fs--1" href="#">More</a>
                                    </div>
                                    <div class="color-5 mt-2">
                                        <a class="color-5 fs--1" href="tel:<?= $profile_data->contact_number ?>"> <span class="fa fa-volume-control-phone mr-1"></span><?= $profile_data->contact_number ?></a>
                                    </div>
                                    <div class="color-5 mt-2">
                                        <a class="color-5 fs--1" href="#"> <span class="fa fa-whatsapp mr-1"></span>Message on WhatsApp</a>
                                    </div>
                                </div>
                                <!-- <div class="row mt-3 p-5">
                                    <div class="col-lg-4 text-center">
                                        <a href="<?= $profile_data->google_map_url ?>">
                                        <span class="ico-mapicn"><i class="fa fa-map-marker"></i></span>
                                        <span class="wrtrvtxt">Map</span>
                                        </a>
                                    </div>
                                    <div class="col-lg-4 text-center">
                                        <a href="#">
                                        <span class="ico-mapicn"><i class="fa fa-envelope-o"></i></span>
                                        <span class="wrtrvtxt">SMS/Email</span>
                                        </a>
                                    </div>
                                    <div class="col-lg-4 text-center">
                                        <a href="#">
                                        <span class="ico-mapicn"><i class="fa fa-pencil-square"></i></span>
                                        <span class="wrtrvtxt">Write a Review</span>
                                        </a>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </section>
                <!-- <section class="font-1 pt-2 pl-0 pb-0 pr-0">
                    <div class="container">
                        <h1 class="gglsrc lng_commn">Beauty Parlours in Delhi-NCR</h1>
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
                            <script>
                                // Get the modal
                                var modal = document.getElementById('myModal');
                                
                                // Get the button that opens the modal
                                var btn = document.getElementById("myBtn");
                                
                                // Get the <span> element that closes the modal
                                var span = document.getElementsByClassName("close")[0];
                                
                                // When the user clicks the button, open the modal 
                                btn.onclick = function () {
                                    modal.style.display = "block";
                                }
                                
                                // When the user clicks on <span> (x), close the modal
                                span.onclick = function () {
                                    modal.style.display = "none";
                                }
                                
                                // When the user clicks anywhere outside of the modal, close it
                                window.onclick = function (event) {
                                    if (event.target == modal) {
                                        modal.style.display = "none";
                                    }
                                }
                            </script>
                        </div>
                    </div>
                </section>
                <section class="font-1 py-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-3">
                                <h5>Sam Spa</h5>
                                <hr class="color-9 my-2">
                                <div class="row p-3">
                                    <?php foreach ($profile_images as $key => $profile_images_data) : ?>
                                        <div class="col-lg-4 m-0 p-1"><img src="<?= base_url('admin/spa_image') ?>/<?= $profile_images_data->image_name ?>"/></div>
                                    <?php endforeach ; ?>
                                </div>
                                <div class="color-5 mt-2"><a class="color-5 fs--1" href="#"> <span class="fa fa-volume-control-phone mr-1"></span><?= $profile_data->contact_number ?></a></div>
                                <div class="color-5 mt-2"> <span class="fa fa-location-arrow mr-1"></span><span class="color-5 fs--1" ><?= $profile_data->address ?></span></div>

                                <div class="vertical-menu">
                                    <h5>Category</h5>
                                    <hr class="color-9 my-2">
                                    <ul>
                                        <li><a href="#"><?= $profile_data->category_name ?></a></li>
                                    </ul>
                                </div>
                                <div class="vertical-menu">
                                    <h5>Services</h5>
                                    <hr class="color-9 my-2">
                                    <ul>
                                        <li><a href="#"><?= $profile_data->services_names ?></a></li>
                                    </ul>
                                </div>
                                <div class="vertical-menu">
                                    <h5>Country</h5>
                                    <hr class="color-9 my-2">
                                    <ul>
                                        <li><a href="#"><?= $profile_data->country_name ?></a></li>
                                    </ul>
                                </div>
                                <div class="vertical-menu">
                                    <h5>Cities</h5>
                                    <hr class="color-9 my-2">
                                    <ul>
                                        <li><a href="#"><?= $profile_data->city_name ?></a></li>
                                    </ul>
                                </div>
                                <div class="vertical-menu">
                                    <h5>Area</h5>
                                    <hr class="color-9 my-2">
                                    <ul>
                                        <li><a href="#"><?= $profile_data->area_name ?></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-9 pl-lg-2">
                                <div class="row pb-3 align-items-center">
                                    <div class="col">
                                        <p class="mb-0"><strong>Spa Center Noida </strong></p>
                                    </div>
                                </div>
                                <div class="row align-items-center border color-9 m-2 p-3">
                                    <div class="tab mb-4">
                                        <button class="tablinks btn-primary" onclick="openCity(event, 'demo1')"> <span class="fa fa-pencil-square-o mr-2"></span> WRITE A REVIEW</button>
                                        <button class="tablinks btn-primary" onclick="openCity(event, 'demo2')" id="defaultOpen"> <span class="fa fa-star mr-2"></span> REVIEWS &amp; RATINGS</button>
                                    </div>
                                    <div id="demo1" class="tabcontent">
                                        <div class="row  mb-3">
                                            <div class="col-sm-6">
                                                <h5> Please rate your experience</h5>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="rating">
                                                    <?php for ($i=0; $i < $profile_data->ranking; $i++) : ?>
                                                        <span class="fa fa-star mr-1 color-warning"></span>
                                                    <?php endfor ; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="background-10 p-3  rounded mb-3">
                                            <b class="mb-2">Add Review</b>
                                            <form>
                                                <input type="text" placeholder="name" name="name">
                                                <input type="number" placeholder="ranking" name="ranking">
                                                <textarea placeholder="comments"></textarea>
                                            </form>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12"><a href="#" class="btn btn-info mb-4">Submit</a></div>
                                        </div>
                                    </div>
                                    <div id="demo2" class="tabcontent">
                                        <div class="row">
                                            <div class="col-sm-6 mb-4"><img src="<?= base_url('assets') ?>/images/chart.gif" /></div>
                                            <div class="col-sm-6 mb-4"><img src="<?= base_url('assets') ?>/images/chart1.gif" /></div>
                                            <div class="allratL ml-3 mb-2"><img src="<?= base_url('assets') ?>/images/he.gif" /></div>
                                            <div class="allratR  mb-2 ">
                                                <div class="color-warning">
                                                    <span class="color-primary"><b>Mr Rajan Pande</b> </span>&nbsp;&nbsp;&nbsp;
                                                    <span class="fa fa-star mr-1 color-warning"></span>
                                                    <span class="fa fa-star mr-1 color-warning"></span>
                                                    <span class="fa fa-star mr-1 color-warning"></span>
                                                    <span class="fa fa-star mr-1 color-warning"></span>
                                                    <span class="fa fa-star mr-1 color-warning"></span>
                                                    <span class="color-primary" style="text-align:right; float:right;  font-size:14px;">7th Mar, 2018</span>
                                                </div>
                                                <hr />
                                                <p>Excellent</p>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="allratL ml-3 mb-2"><img src="<?= base_url('assets') ?>/images/he.gif" /></div>
                                            <div class="allratR  mb-2 ">
                                                <div class="color-warning">
                                                    <span class="color-primary"><b>Mr Rajan Pande</b> </span>&nbsp;&nbsp;&nbsp;
                                                    <span class="fa fa-star mr-1 color-warning"></span>
                                                    <span class="fa fa-star mr-1 color-warning"></span>
                                                    <span class="fa fa-star mr-1 color-warning"></span>
                                                    <span class="fa fa-star mr-1 color-warning"></span>
                                                    <span class="fa fa-star mr-1 color-warning"></span>
                                                    <span class="color-primary" style="text-align:right; float:right;  font-size:14px;">7th Mar, 2018</span>
                                                </div>
                                                <hr />
                                                <p>Excellent</p>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="allratL ml-3 mb-2"><img src="<?= base_url('assets') ?>/images/he.gif" /></div>
                                            <div class="allratR  mb-2 ">
                                                <div class="color-warning">
                                                    <span class="color-primary"><b>Mr Rajan Pande</b> </span>&nbsp;&nbsp;&nbsp;
                                                    <span class="fa fa-star mr-1 color-warning"></span>
                                                    <span class="fa fa-star mr-1 color-warning"></span>
                                                    <span class="fa fa-star mr-1 color-warning"></span>
                                                    <span class="fa fa-star mr-1 color-warning"></span>
                                                    <span class="fa fa-star mr-1 color-warning"></span>
                                                    <span class="color-primary" style="text-align:right; float:right;  font-size:14px;">7th Mar, 2018</span>
                                                </div>
                                                <hr />
                                                <p>Excellent</p>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="allratL ml-3 mb-2"><img src="<?= base_url('assets') ?>/images/he.gif" /></div>
                                            <div class="allratR  mb-2 ">
                                                <div class="color-warning">
                                                    <span class="color-primary"><b>Mr Rajan Pande</b> </span>&nbsp;&nbsp;&nbsp;
                                                    <span class="fa fa-star mr-1 color-warning"></span>
                                                    <span class="fa fa-star mr-1 color-warning"></span>
                                                    <span class="fa fa-star mr-1 color-warning"></span>
                                                    <span class="fa fa-star mr-1 color-warning"></span>
                                                    <span class="fa fa-star mr-1 color-warning"></span>
                                                    <span class="color-primary" style="text-align:right; float:right;  font-size:14px;">7th Mar, 2018</span>
                                                </div>
                                                <hr />
                                                <p>Excellent</p>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="allratL ml-3 mb-2"><img src="<?= base_url('assets') ?>/images/he.gif" /></div>
                                            <div class="allratR  mb-2 ">
                                                <div class="color-warning">
                                                    <span class="color-primary"><b>Mr Rajan Pande</b> </span>&nbsp;&nbsp;&nbsp;
                                                    <span class="fa fa-star mr-1 color-warning"></span>
                                                    <span class="fa fa-star mr-1 color-warning"></span>
                                                    <span class="fa fa-star mr-1 color-warning"></span>
                                                    <span class="fa fa-star mr-1 color-warning"></span>
                                                    <span class="fa fa-star mr-1 color-warning"></span>
                                                    <span class="color-primary" style="text-align:right; float:right;  font-size:14px;">7th Mar, 2018</span>
                                                </div>
                                                <hr />
                                                <p>Excellent</p>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="allratL ml-3 mb-2"><img src="<?= base_url('assets') ?>/images/he.gif" /></div>
                                            <div class="allratR  mb-2 ">
                                                <div class="color-warning">
                                                    <span class="color-primary"><b>Mr Rajan Pande</b> </span>&nbsp;&nbsp;&nbsp;
                                                    <span class="fa fa-star mr-1 color-warning"></span>
                                                    <span class="fa fa-star mr-1 color-warning"></span>
                                                    <span class="fa fa-star mr-1 color-warning"></span>
                                                    <span class="fa fa-star mr-1 color-warning"></span>
                                                    <span class="fa fa-star mr-1 color-warning"></span>
                                                    <span class="color-primary" style="text-align:right; float:right;  font-size:14px;">7th Mar, 2018</span>
                                                </div>
                                                <hr />
                                                <p>Excellent</p>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="allratL ml-3 mb-2"><img src="<?= base_url('assets') ?>/images/he.gif" /></div>
                                            <div class="allratR  mb-2 ">
                                                <div class="color-warning">
                                                    <span class="color-primary"><b>Mr Rajan Pande</b> </span>&nbsp;&nbsp;&nbsp;
                                                    <span class="fa fa-star mr-1 color-warning"></span>
                                                    <span class="fa fa-star mr-1 color-warning"></span>
                                                    <span class="fa fa-star mr-1 color-warning"></span>
                                                    <span class="fa fa-star mr-1 color-warning"></span>
                                                    <span class="fa fa-star mr-1 color-warning"></span>
                                                    <span class="color-primary" style="text-align:right; float:right;  font-size:14px;">7th Mar, 2018</span>
                                                </div>
                                                <hr />
                                                <p>Excellent</p>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="allratL ml-3 mb-2"><img src="<?= base_url('assets') ?>/images/he.gif" /></div>
                                            <div class="allratR  mb-2 ">
                                                <div class="color-warning">
                                                    <span class="color-primary"><b>Mr Rajan Pande</b> </span>&nbsp;&nbsp;&nbsp;
                                                    <span class="fa fa-star mr-1 color-warning"></span>
                                                    <span class="fa fa-star mr-1 color-warning"></span>
                                                    <span class="fa fa-star mr-1 color-warning"></span>
                                                    <span class="fa fa-star mr-1 color-warning"></span>
                                                    <span class="fa fa-star mr-1 color-warning"></span>
                                                    <span class="color-primary" style="text-align:right; float:right;  font-size:14px;">7th Mar, 2018</span>
                                                </div>
                                                <hr />
                                                <p>Excellent</p>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="allratL ml-3 mb-2"><img src="<?= base_url('assets') ?>/images/he.gif" /></div>
                                            <div class="allratR  mb-2 ">
                                                <div class="color-warning">
                                                    <span class="color-primary"><b>Mr Rajan Pande</b> </span>&nbsp;&nbsp;&nbsp;
                                                    <span class="fa fa-star mr-1 color-warning"></span>
                                                    <span class="fa fa-star mr-1 color-warning"></span>
                                                    <span class="fa fa-star mr-1 color-warning"></span>
                                                    <span class="fa fa-star mr-1 color-warning"></span>
                                                    <span class="fa fa-star mr-1 color-warning"></span>
                                                    <span class="color-primary" style="text-align:right; float:right;  font-size:14px;">7th Mar, 2018</span>
                                                </div>
                                                <hr />
                                                <p>Excellent</p>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="allratL ml-3 mb-2"><img src="<?= base_url('assets') ?>/images/he.gif" /></div>
                                            <div class="allratR  mb-2 ">
                                                <div class="color-warning">
                                                    <span class="color-primary"><b>Mr Rajan Pande</b> </span>&nbsp;&nbsp;&nbsp;
                                                    <span class="fa fa-star mr-1 color-warning"></span>
                                                    <span class="fa fa-star mr-1 color-warning"></span>
                                                    <span class="fa fa-star mr-1 color-warning"></span>
                                                    <span class="fa fa-star mr-1 color-warning"></span>
                                                    <span class="fa fa-star mr-1 color-warning"></span>
                                                    <span class="color-primary" style="text-align:right; float:right;  font-size:14px;">7th Mar, 2018</span>
                                                </div>
                                                <hr />
                                                <p>Excellent</p>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="col-sm-12 businfo seoshow ">
                                                <p class="heading lng_commn_all">Business Information</p>
                                                <span class="detl lng_commn_all">
                                                    <?= $profile_data->description ?>
                                                </span>
                                                <!-- </section> -->
                                            </div>
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
        <script type="text/javascript">
            function openCity(evt, cityName) {
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("tablinks");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                }
                document.getElementById(cityName).style.display = "block";
                evt.currentTarget.className += " active";
            }
        document.getElementById("defaultOpen").click();
        </script>
    </body>
</html>