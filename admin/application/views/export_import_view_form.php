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
                    <h1><i class="fa fa-dashboard"></i>Import Export</h1>
                </div>
                <ul class="app-breadcrumb breadcrumb">
                    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                    <li class="breadcrumb-item"><a href="<?= base_url('export_import') ?>">Import Export</a></li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="tile">
                        <div class="col-lg-12">
                            <?php if (isset($error)) : ?>
                            <div class="alert alert-danger text-center">
                                <strong><?= $error ?></strong>
                            </div>
                            <?php endif ; ?>
                            <?php if (isset($success)) : ?>
                            <div class="alert alert-success text-center">
                                <strong><?= $success ?></strong>
                            </div>
                            <?php endif ; ?>
                            <?= form_open_multipart('Export_import/index') ?>
                                <div class="form-group">
                                    <label for="exampleSelect1">Excel Type</label>
                                    <select class="form-control" name="option">
                                        <option value="">---Select type---</option>
                                        <option value="country">Country</option>
                                        <option value="city">City</option>
                                        <option value="area">Area</option>
                                        <option value="profile">Profile</option>
                                    </select>
                                    <span class="text-danger"><?= form_error('option') ? form_error('option') : "" ; ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Select Excel file</label>
                                    <input class="form-control" name="excel_sheet" type="file">
                                    <span class="text-danger"><?= form_error('excel_sheet') ? form_error('excel_sheet') : "" ; ?></span>
                                </div>
                                <button class="btn btn-primary" type="submit">Submit</button>
                            <?= form_close() ?> 
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