<?php // echo "<pre>";print_r($profile_data);exit(); ?> 
<!DOCTYPE html>
<html lang="en-US" class="js flexbox flexboxlegacy canvas canvastext webgl no-touch geolocation postmessage websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers no-applicationcache svg inlinesvg smil svgclippaths chrome blink">
<head>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="theme-color" content="#ffffff">
        <?php $this->load->view('common/css') ?>
    </head>
</head>

<body data-spy="scroll" data-offset="60">
    <main class=" box-shadow-wide">
        <div class="main-box">
            <section class="font-1 p-0">
                <div class="container">
                    <?php $this->load->view('common/header') ?>
                </div>
            </section>
            <section class="dashboard light-blue">
            <div class="container">
               <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                     <div class="dashboard-main-disc">
                        <div class="heading-inner">
                           <a class="btn btn-primary" href="<?= base_url('members/new_profile') ?>">Add New Profile</a>
                           <a class="btn btn-primary" href="<?= base_url('members/Profile_list') ?>">Profile List</a>
                           <a class="btn btn-primary" href="<?= base_url('members/dashboard') ?>">Dashboard</a>
                        </div>
                        <?php if ($this->session->flashdata('success')) : ?>
                            <div class="alert alert-success">
                                <strong>Success!</strong> <?= $this->session->flashdata('success') ?>.
                            </div>
                        <?php endif ; ?>
                        
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
        $(document).ready(function(){
            var category_id = '<?= $profile_data->category_id ?>'; 
            $("#category_id").val(category_id).change();

            var services_id = '<?= $profile_data->services_id ?>'; 
            $("#services_id").val(services_id).change();

            var country_id = '<?= $profile_data->counry_id ?>';
            $("#select_country").val(country_id).change();
            setTimeout(function(){ 
                var city_id = '<?= $profile_data->city_id ?>';
                $("#city_drop_select").val(city_id).change();       
            },3000);
            setTimeout(function(){ 
                var area_id = '<?= $profile_data->area_id ?>';
                $("#area_select").val(area_id).change();       
            },5000);  
        });
        $("#select_country").change(function(){
            var country_id = $("#select_country").val();
            var ajax_url = base_url + "members/get_city";
            $.ajax({
                type: "POST",
                url: ajax_url,
                data: {country_id:country_id},
                success: function (response) {
                    if (response.status == "success") {
                        $("#city_drop_select").html('');
                        var html_str = '<option value="">Select Option</option>';
                        for (var i = 0 ; i < response.data.length ; i++ )
                        {
                            html_str += '<option value="'+ response.data[i].id +'">'+ response.data[i].city_name +'</option>';
                        }
                        $("#city_drop_select").html(html_str);
                    } else {
                        alert(response.message);
                    }   
                },
                error : function (response) {
                    debugger ;
                }
            });
        });
        $("#city_drop_select").change(function(){
        var city_id = $("#city_drop_select").val();
        var ajax_url = base_url + "members/get_area";
        $.ajax({
            type: "POST",
            url: ajax_url,
            data: {city_id:city_id},
            success: function (response) {
                if (response.status == "success") {
                    $("#area_select").html('');
                    var html_str = '<option value="">---Select Area---</option>';
                    for (var i = 0 ; i < response.data.length ; i++ )
                    {
                        html_str += '<option value="'+ response.data[i].id +'">'+ response.data[i].area_name +'</option>';
                    }
                    $("#area_select").html(html_str);
                } else {
                    alert(response.message);
                }   
            },
            error : function (response) {
                debugger ;
            }
        });
    });
    </script>
</body>

</html>
