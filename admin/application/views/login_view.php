<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <?php $this->load->view('common/css') ?>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <section class="material-half-bg">
            <div class="cover"></div>
        </section>
        <section class="login-content">
            <div class="logo">
                <h1>Vali</h1>
            </div>
            <div class="login-box">
                <?= form_open('account/login',array('class' => 'login-form')) ?>
                    <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN IN</h3>
                    <div class="form-group">
                        <label class="control-label">Email</label>
                        <input class="form-control" type="text" value="<?=  set_value('email') ?>" name="email" placeholder="Email" autofocus>
                        <span class="text-danger"><?= form_error('email') ? form_error('email') : "" ; ?></span>
                    </div>
                    <div class="form-group">
                        <label class="control-label">PASSWORD</label>
                        <input class="form-control" type="password" name="password" placeholder="Password">
                        <span class="text-danger"><?= form_error('password') ? form_error('password') : "" ?></span>
                    </div>
                    <div class="form-group">
                        <div class="utility">
                            <div class="animated-checkbox">
                                <label>
                                <input type="checkbox"><span class="label-text">Stay Signed in</span>
                                </label>
                            </div>
                            <p class="semibold-text mb-2"><a href="#" data-toggle="flip">Forgot Password ?</a></p>
                        </div>
                    </div>
                    <div class="form-group btn-container">
                        <button class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN</button>
                    </div>
                </form>
                <form class="forget-form" action="index.html">
                    <h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>Forgot Password ?</h3>
                    <div class="form-group">
                        <label class="control-label">EMAIL</label>
                        <input class="form-control" type="text" placeholder="Email">
                    </div>
                    <div class="form-group btn-container">
                        <button class="btn btn-primary btn-block"><i class="fa fa-unlock fa-lg fa-fw"></i>RESET</button>
                    </div>
                    <div class="form-group mt-3">
                        <p class="semibold-text mb-0"><a href="#" data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i> Back to Login</a></p>
                    </div>
                </form>
            </div>
        </section>
       	<?php $this->load->view('common/js') ?>
        <script type="text/javascript">
            $('.login-content [data-toggle="flip"]').click(function() {
            	$('.login-box').toggleClass('flipped');
            	return false;
            });

            var login_error = '<?= isset($login_erro) ? $login_erro : "" ?>';
            if (login_error) {
            	swal("Error", login_error, "error");
            }
            debugger ;
        </script>
    </body>
</html>