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
                            <?= form_open('location/area') ?>
                                <div class="form-group">
                                    <label for="exampleSelect1">Select Country</label>
                                    <select class="form-control" id="select_country" name="country">
                                        <option value="">---Select City---</option>
                                        <?php foreach ($all_country_key as $key => $all_country_data) : ?>
                                            <option value="<?= $all_country_data->id ?>"><?= $all_country_data->country_name ?></option>
                                        <?php endforeach ; ?>
                                    </select>
                                    <span class="text-danger"><?= form_error('country') ? form_error('country') : "" ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleSelect1">Select City</label>
                                    <select class="form-control" id="city_select" name="city">
                                        <option value="">---Select City---</option>
                                    </select>
                                    <span class="text-danger"><?= form_error('city') ? form_error('city') : "" ?></span>
                                </div>
                                <div class="form-group" id="area_name_input" style="display: none;">
                                    <label for="exampleInputEmail1">Area Name</label>
                                    <input class="form-control" id="area_name" name="area_name" type="text" placeholder="Enter New Area" autofocus>
                                    <span class="text-danger"><?= form_error('area_name') ? form_error('area_name') : "" ?></span>                                    
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
                                        <th>Area Name</th>
                                        <th>City Name</th>
                                        <th>Country Name</th>
                                        <th>Created Date</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($all_area_key as $key => $all_area_data) : ?>
                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td><?= $all_area_data->area_name ?></td>
                                        <td><?= $all_area_data->city_name ?></td>
                                        <td><?= $all_area_data->country_name ?></td>
                                        <td><?= $all_area_data->created_date ?></td>
                                        <td><a href="<?= base_url('location/delete_area') ?>/<?= $this->friend->base64url_encode($all_area_data->id) ?>"><button class="btn btn-danger">Delete</button></a></td>
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
            var success_area = '<?= $this->session->flashdata('success_area') ? $this->session->flashdata('success_area') : "" ?>';
            var error_area = '<?= $this->session->flashdata('error_area') ? $this->session->flashdata('error_area') : "" ?>';
            if (success_area) {
                swal("Success", success_area, "success");
            }
            if (error_area) {
                swal("Opssss..!!", error_area, "error");
            }
            $("#select_country").change(function(){
                $("#area_name_input").css("display","none");
                var country_id = $("#select_country").val();
                var ajex_url = base_url + "location/getCity";
                $.ajax({
                    type: "POST",
                    url: ajex_url,
                    data: {country_id : country_id},
                    success: function (respons) {
                        if (respons.status == "success") {
                            $("#city_select").html('');
                            var html_str = '<option value="">---Select City---</option>';
                            for (var i = 0 ; i < respons.data.length ; i++ )
                            {
                                html_str += '<option value="'+ respons.data[i].id +'">'+ respons.data[i].city_name +'</option>';
                            }
                            $("#city_select").html(html_str);
                            $("#area_name_input").css("display","block");
                        } else {
                            alert(respons.message);
                        }
                    },
                    error : function (respons) {

                    }
                });
            });
        </script>
    </body>
</html>