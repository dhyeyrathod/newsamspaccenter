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
                                <strong><?= $this->session->flashdata('success') ?></strong>
                            </div>
                            <?php endif ; ?>
                            <table id="mytable" class="table table-bordred table-striped">
                                <thead>
                                    <tr>
                                        <th>Profile</th>
                                        <th>Title</th>
                                        <th>Location</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($user_profile as $key => $profile_data) :  ?>
                                        <tr>
                                            <td><img src="<?= base_url('admin/spa_image') ?>/<?= isset($profile_data->image) ? $profile_data->image : 'default.jpg' ?>" style="width: 100px;height: 80px" >
                                            </td>
                                            <td><?= $profile_data->title ?></td>
                                            <td><?= $profile_data->city_name ?></td>
                                            <td>
                                                <a href="<?= base_url('members/edit_profile') ?>/<?= $this->friend->base64url_encode($profile_data->id) ?>"><p data-placement="top" data-toggle="tooltip" title="" data-original-title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></p></a>
                                            </td>
                                            <td>
                                                <a href="<?= base_url('members/delete_profile') ?>/<?= $this->friend->base64url_encode($profile_data->id) ?>"><p data-placement="top" data-toggle="tooltip" title="" data-original-title="Delete">    <i class="fa fa-trash-o fa-1x" aria-hidden="true"></i></p></a>
                                            </td>
                                        </tr>
                                    <?php endforeach ; ?>
                                </tbody>
                            </table>
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