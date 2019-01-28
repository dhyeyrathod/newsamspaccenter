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
                    <h1><i class="fa fa-dashboard"></i>services</h1>
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
                            <?= form_open('services') ?>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">services Name</label>
                                    <input class="form-control" id="services_name" name="services_name" type="text" placeholder="Enter New services" autofocus>
                                    <span class="text-danger"><?= form_error('services_name') ? form_error('services_name') : "" ?></span> </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">services Description</label>
                                    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                                    <span class="text-danger"><?= form_error('description') ? form_error('description') : "" ?></span>                                    
                                </div>
                                <div class="form-group">
                                    <label for="exampleSelect1">Select Status</label>
                                    <select class="form-control" name="status">
                                        <option value="1">Active</option>
                                        <option value="0">inactive</option>
                                    </select>
                                    <span class="text-danger"><?= form_error('status') ? form_error('status') : "" ?></span>    
                                </div>
                                <input type="hidden" value="0" id="services_id" name="services_id">
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
                                        <th>services Name</th>
                                        <th>status</th>
                                        <!-- <th>Edit</th> -->
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($all_services_key as $key => $all_services_data) : ?>
                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td><?= $all_services_data->services_name ?></td>
                                        <td><?= $all_services_data->status ?></td>
                                        <!-- <td><button onclick="get_services_data('<?= $all_services_data->id ?>')" class="btn btn-primary">Edit</button></td> -->
                                        <td><a href="<?= base_url('services/delete_services') ?>/<?= $this->friend->base64url_encode($all_services_data->id) ?>"><button class="btn btn-danger">Delete</button></a></td>
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
            var success_services = '<?= $this->session->flashdata('success_services') ? $this->session->flashdata('success_services') : "" ?>';

            var error_services = '<?= $this->session->flashdata('error_services') ? $this->session->flashdata('error_services') : "" ?>';
            if (success_services) {
                swal("Success", success_services, "success");
            }
            if (error_services) {
                swal("Opss..!!", error_services, "error");
            }
            CKEDITOR.replace( 'description' );
        </script>
    </body>
</html>