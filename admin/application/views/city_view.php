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
            <div class="row">
                <div class="col-md-12">
                    <div class="tile">
                        <div class="col-lg-12">
                            <?= form_open('location/city') ?>
                                <div class="form-group">
                                    <label for="exampleSelect1">Select Country</label>
                                    <select class="form-control" name="country">
                                        <option value="">---Select City---</option>
                                        <?php foreach ($all_country_key as $key => $all_country_data) : ?>
                                            <option <?php if (set_value('country') == $all_country_data->id): echo "selected " ; endif ; ?> value="<?= $all_country_data->id ?>"><?= $all_country_data->country_name ?></option>
                                        <?php endforeach ; ?>
                                    </select>
                                    <span class="text-danger"><?= form_error('country') ? form_error('country') : "" ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">City Name</label>
                                    <input class="form-control" id="new_city" name="new_city" type="text" placeholder="Enter New category" autofocus>
                                    <span class="text-danger"><?= form_error('new_city') ? form_error('new_city') : "" ?></span>                                    
                                </div>
                                <input type="hidden" value="0" id="city_id" name="city_id">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            <?= form_close() ?> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="tile">
                        <div class="tile-body">
                            <table class="table table-hover table-bordered" id="sampleTable">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>City Name</th>
                                        <th>Country Name</th>
                                        <th>Created Date</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($all_city_key as $key => $all_city_data) : ?>
                                        <tr>
                                            <td><?= $key + 1 ?></td>
                                            <td><?= $all_city_data->city_name ?></td>
                                            <td><?= $all_city_data->country_name ?></td>
                                            <td><?= $all_city_data->created_date ?></td>
                                            <td><a href="<?= base_url('location/delete_city') ?>/<?= $this->friend->base64url_encode($all_city_data->id) ?>"><button class="btn btn-danger">Delete</button></a></td>
                                        </tr>    
                                    <?php endforeach ; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!-- Essential javascripts for application to work-->
        <?php $this->load->view('common/js') ?>
        <script src="https://cdn.ckeditor.com/4.10.0/standard/ckeditor.js"></script>
        <script type="text/javascript" src="<?= base_url('assets') ?>/js/plugins/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="<?= base_url('assets') ?>/js/plugins/dataTables.bootstrap.min.js"></script>
        <script type="text/javascript">$('#sampleTable').DataTable();</script>
        <script type="text/javascript">
            var success_city = '<?= $this->session->flashdata('success_city') ? $this->session->flashdata('success_city') : "" ?>';
            var error_city = '<?= $this->session->flashdata('error_city') ? $this->session->flashdata('error_city') : "" ?>';
            if (success_city) {
                swal("Success", success_city, "success");
            }
            if (error_city) {
                swal("Opssss..!!", error_city, "error");
            }
        </script>
    </body>
</html>