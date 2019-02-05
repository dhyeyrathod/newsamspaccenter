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
                    <h1>Edit User Profile</h1>
                </div>
                <ul class="app-breadcrumb breadcrumb">
                    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                    <li class="breadcrumb-item"><a href="#">Blank Page</a></li>
                </ul>
            </div>
            <div class="row" id="spa_master_details">
                <div class="col-md-12">
                    <div class="tile">
                        <?= form_open_multipart('spa_profile/edit_profile'); ?>
                        <div class="col-lg-12" id="spa_profile_details_tab">
                            <input type="hidden" value="0" id="spa_id" name="spa_id">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Title</label>
                                <input class="form-control" disabled value="<?= $profile_data->title ?>" name="title" type="text">                             
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Contact Number</label>
                                <input class="form-control" disabled name="contact_number" value="<?= $profile_data->contact_number ?>" type="text">
                            </div>
                            
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email Id</label>
                                <input class="form-control" disabled value="<?= $profile_data->email_id ?>" name="email_id" type="text">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Image Upload</label>
                                <input class="form-control" id="image_to_upload" name="image_to_upload[]" multiple type="file">
                                <span id="image_to_upload_error"></span>                           
                            </div>
                            <div class="col-md-12">
                                <?php foreach ($profile_images as $key => $profile_image_data) : ?>
                                    <img class="col-md-3 tile" src="<?= base_url('spa_image') ?>/<?= $profile_image_data->image_name ?>" style="width: 100%;height: 100%;padding-bottom: 10px;">
                                <?php endforeach ;  ?>
                            </div>
                            <input type="hidden" value="<?= $profile_data->id ?>" name="profile_id">
                            <button class="btn btn-primary" type="submit">submit</button>
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