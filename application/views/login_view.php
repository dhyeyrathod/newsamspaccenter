<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Spa in India, Spa Treatments in India</title>
        <META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
        <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">
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
                            <img src="<?= base_url('assets') ?>/images/inner-banner.jpeg" />
                        </div>
                    </div>
                </section>
                <section class="font-1 p-0 mt-5 mb-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="container ">
                                    <div class="row mb-6 text-center">
                                        <div class="col">
                                            <h3 class="fs-2 fs-md-3">Login</h3>
                                            <hr class="short" data-zanim="{&quot;from&quot;:{&quot;opacity&quot;:0,&quot;width&quot;:0},&quot;to&quot;:{&quot;opacity&quot;:1,&quot;width&quot;:&quot;4.20873rem&quot;},&quot;duration&quot;:0.8}" style="width: 4.20873rem; opacity: 1;">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-7 m-auto border">
                                            <div class="background-white radius-secondary p-2 p-md-5 mt-0" data-zanim="{&quot;delay&quot;:0.1}" style="opacity: 1; transform: matrix(1, 0, 0, 1, 0, 0);">
                                                <h4 class="text-uppercase fs-0 fs-md-1">Sign Up with Sam Spa Center</h4>
                                                <?= form_open('account/login') ?>
                                                <form class="text-left mt-4">
                                                    <div class="row align-items-center">
                                                        <div class="col-12">
                                                            <div class="input-group">
                                                                <div class="input-group-addon background-11 fs-2"><span class="fa fa-user"></span></div>
                                                                <input class="form-control" type="text" name="email" placeholder="Email" />
                                                            </div>
                                                            <?= form_error('email') ?>
                                                        </div>
                                                        <div class="col-12 mt-2 mt-sm-4">
                                                            <div class="input-group">
                                                                <div class="input-group-addon background-11 fs-2"><span class="fa fa-lock"></span></div>
                                                                <input  class="form-control" type="password" name="password" placeholder="Password" value="" />
                                                            </div>
                                                            <?= form_error('password') ?>
                                                        </div>
                                                    </div>
                                                    <div class="row align-items-center mt-3">
                                                        <div class="col-8">
                                                            <a href="#"><span class="ftpd">Forgot password?</span></a>
                                                        </div>
                                                        <div class="col-4 mt-2 mt-sm-3">
                                                            <button class="btn btn-primary btn-block" type="submit">Login</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <?php $this->load->view('common/footer') ?>
                <div class="rightfixed">
                    <a href="<?= base_url('members/dashboard') ?>" class="frilst "></a>
                    <a  href="customer-care.html" class="cscare "></a>
                </div>
            </div>
        </main>
        <?php $this->load->view('common/js') ?>
        <script type="text/javascript">
            var success = '<?= $this->session->flashdata('success') ? $this->session->flashdata('success') : "" ?>';
            var error = '<?= $this->session->flashdata('error') ? $this->session->flashdata('error') : "" ?>';
            if (success) {
                swal("Success", success, "success");
            }
            if (error) {
                swal("Opps..!!", error, "error");
            }
        </script>
    </body>
</html>