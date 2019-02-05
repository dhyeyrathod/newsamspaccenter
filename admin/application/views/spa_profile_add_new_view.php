<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Blank Page - Vali Admin</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php $this->load->view('common/css') ?>
    </head>
    <body class="app sidebar-mini rtl">
        <!-- Navbar-->
        <?php $this->load->view('common/header') ?>
        <!-- Sidebar menu-->
        <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
        <?php $this->load->view('common/sidebar') ?>
        <main class="app-content">
            <div class="app-title">
                <div>
                    <h1><i class="fa fa-dashboard"></i>Category</h1>
                </div>
                <ul class="app-breadcrumb breadcrumb">
                    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                    <li class="breadcrumb-item"><a href="#">Blank Page</a></li>
                </ul>
            </div>
            <div class="row" id="spa_master_details">
                <div class="col-md-12">
                    <div class="tile">
                        <?= form_open_multipart('spa_profile/add_new'); ?>
                        <div class="col-lg-12" id="spa_profile_details_tab">
                            <input type="hidden" value="0" id="spa_id" name="spa_id">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Title</label>
                                <input class="form-control" id="title" name="title" type="text" placeholder="Enter Title Name">
                                <span id="title_error"></span>                             
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Contact Number</label>
                                <input class="form-control" id="contact_number" name="contact_number" type="text" placeholder="Enter Contact Number">
                                <span id="contact_number_error"></span>                              
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email Id</label>
                                <input class="form-control" id="email_id" name="email_id" type="text" placeholder="Enter Email ID">
                                <span id="email_id_error"></span>                              
                            </div>
                            <div class="form-group">
                                    <label for="exampleInputEmail1">hotels Description</label>
                                    <textarea class="form-control" name="description" rows="3"></textarea>
                                    <span class="text-danger"><?= form_error('description') ? form_error('description') : "" ?></span>
                                </div>
                            <button class="btn btn-primary" type="button" id="submit_spa_master_details_submit">Next</button>
                        </div>

                        <div class="col-lg-12" id="spa_image_tab">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Image Upload</label>
                                <input class="form-control" id="image_to_upload" name="image_to_upload[]" multiple type="file">
                                <span id="image_to_upload_error"></span>                           
                            </div>
                            <div class="form-group">
                                <label for="exampleSelect1">Payment Method Select</label>
                                <select class="form-control" name="payment_method">
                                    <option value="1">Paid</option>
                                    <option value="2">Free</option>
                                    <option>2</option>
                                </select>
                            </div>
                            <button class="btn btn-primary" type="button" id="spa_image_tab_submit">Next</button>
                        </div>

                        <div class="col-lg-12" id="spa_profile_location_tab">
                            <div class="form-group">
                                <label for="exampleSelect1">Select Country</label>
                                <select class="form-control" id="select_country" name="fk_counry_id">
                                    <option value="">---Select Country---</option>
                                    <?php foreach ($all_country_key as $key => $all_country_data) : ?>
                                        <option value="<?= $all_country_data->id ?>"><?= $all_country_data->country_name ?></option>
                                    <?php endforeach ; ?>
                                </select>
                                <span id="select_country_error"></span>
                            </div>
                            <div class="form-group">
                                <label for="exampleSelect1">Select City</label>
                                <select class="form-control" id="city_select" name="fk_city_id">
                                    
                                </select>
                                <span id="city_select_error"></span>
                            </div>
                            <div class="form-group">
                                <label for="exampleSelect1">Select Area</label>
                                <select class="form-control" id="area_select" name="fk_area_id">
                                    <option value="">---Select Area---</option>
                                </select>
                                <span id="area_select_error"></span>
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <textarea class="form-control" id="address" name="address" rows="5"></textarea>
                                <span id="address_error"></span>
                            </div>
                            <div class="form-group">
                                <label>google map Url</label>
                                <input class="form-control" type="text" required name="map_url">
                            </div>
                            <div class="form-group">
                                <label>Pincode</label>
                                <input class="form-control" type="text" id="pincode" name="pincode" required>
                                <span id="pincode_error"></span>
                            </div>
                            <button class="btn btn-primary" type="button" id="spa_profile_location_submit">Next</button>
                        </div>
                        <div class="col-lg-12" id="spa_profile_services_category_tab">
                            <div class="form-group">
                                <label for="exampleSelect1">Select category</label>
                                <select class="form-control" id="select_category" name="fk_category_id">
                                    <option value="">---Select Category---</option>
                                    <?php foreach ($all_category_key as $key => $all_category_data) : ?>
                                        <option value="<?= $all_category_data->id ?>"><?= $all_category_data->category_name ?></option>
                                    <?php endforeach ; ?>
                                </select>
                                <span id="select_category_error"></span>
                            </div>
                            <div class="form-group">
                                <label for="exampleSelect1">Select services</label>
                                <select class="form-control" id="select_services" name="fk_services_id">
                                    <option value="">---Select Services---</option>
                                    <?php foreach ($all_services_key as $key => $all_services_data) : ?>
                                        <option value="<?= $all_services_data->id ?>"><?= $all_services_data->services_name ?></option>
                                    <?php endforeach ; ?>
                                </select>
                                <span id="select_services_error"></span>
                            </div>
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                        <?= form_close() ?>
                    </div>
                </div>
            </div>
        </main>
        <?php $this->load->view('common/js') ?>
        <script src="<?= base_url('assets') ?>/js/spa_post.js"></script>
        <script src="https://cdn.ckeditor.com/4.10.0/standard/ckeditor.js"></script>
        <script type="text/javascript" src="<?= base_url('assets') ?>/js/plugins/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="<?= base_url('assets') ?>/js/plugins/dataTables.bootstrap.min.js"></script>
        <script type="text/javascript">
            $( document ).ready(function() {
                $("#spa_image_tab").hide();
                $("#spa_profile_location_tab").hide();
                $("#spa_profile_services_category_tab").hide();
            });
            CKEDITOR.replace( 'description' );

            var success_profile = '<?= $this->session->flashdata('success_profile') ? $this->session->flashdata('success_profile') : "" ?>';
            var error_profile = '<?= $this->session->flashdata('error_profile') ? $this->session->flashdata('error_profile') : "" ?>';

            if (error_profile) {
                swal("Success", error_profile, "error");
            }
            if (success_profile) {
                swal("Opss..!!", success_profile, "success");
            }
        </script>
    </body>
</html>