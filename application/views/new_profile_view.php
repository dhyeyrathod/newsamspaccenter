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
            <section class="dashboard light-blue">
            <div class="container">
               <div class="row">
                  
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                     <div class="dashboard-main-disc">
                        <div class="heading-inner">
                           <p class="title">Edit Profile</p>
                        </div>
                        <?= form_open('') ?>
                        <div class="row">
                           
                              <div class="col-md-6 col-sm-12">
                                 <div class="form-group">
                                    <label>First Name <span class="required">*</span></label>
                                    <input placeholder="" class="form-control" type="text">
                                 </div>
                              </div>
                              <div class="col-md-6 col-sm-12">
                                 <div class="form-group">
                                    <label>Date Of Birth <span class="required">*</span></label>
                                    <input placeholder="" class="form-control" type="text">
                                 </div>
                              </div>
                              <div class="col-md-6 col-sm-12">
                                 <div class="form-group">
                                    <label>Email <span class="required">*</span></label>
                                    <input placeholder="" class="form-control" type="email">
                                 </div>
                              </div>
                              <div class="col-md-6 col-sm-12">
                                 <div class="form-group">
                                    <label>Phone <span class="required">*</span></label>
                                    <input placeholder="" class="form-control" type="text">
                                 </div>
                              </div>
                              <div class="col-md-6 col-sm-12">
                                 <div class="form-group">
                                    <label>Country </label>
                                    <select class="select-general form-control select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                                       <option label="Select Option"></option>
                                       <option value="0">France</option>
                                       <option value="1">   United States</option>
                                       <option value="2">China</option>
                                       <option value="3">Spain</option>
                                       <option value="4">Spain</option>
                                       <option value="5">Turkey</option>
                                       <option value="6">   United Kingdom</option>
                                       <option value="7">Germany</option>
                                       <option value="8">Malaysia</option>
                                    </select><span class="select2 select2-container select2-container--default" dir="ltr" style="width: 340px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-djw6-container"><span class="select2-selection__rendered" id="select2-djw6-container"><span class="select2-selection__placeholder">Choose</span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                 </div>
                              </div>
                              <div class="col-md-6 col-sm-12">
                                 <div class="form-group">
                                    <label>City </label>
                                    <select class="select-general form-control select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                                       <option label="Select Option"></option>
                                       <option value="0">London</option>
                                       <option value="1">Birmingham</option>
                                       <option value="2">Manchester</option>
                                       <option value="3">Glasgow</option>
                                       <option value="4">Liverpool</option>
                                       <option value="5">Bristol</option>
                                       <option value="6">Edinburgh</option>
                                       <option value="7">Nottingham</option>
                                       <option value="8">Cardiff</option>
                                    </select><span class="select2 select2-container select2-container--default" dir="ltr" style="width: 340px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-hmr0-container"><span class="select2-selection__rendered" id="select2-hmr0-container"><span class="select2-selection__placeholder">Choose</span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                 </div>
                              </div>
                              <div class="col-md-6 col-sm-12">
                                 <div class="form-group">
                                    <label>You are: <span class="required">*</span></label>
                                    <select class="select-general form-control select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                                       <option label="Select Option"></option>
                                       <option value="0">Dealer</option>
                                       <option value="1">   Individual</option>
                                    </select><span class="select2 select2-container select2-container--default" dir="ltr" style="width: 340px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-8qc5-container"><span class="select2-selection__rendered" id="select2-8qc5-container"><span class="select2-selection__placeholder">Choose</span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                 </div>
                              </div>
                              <div class="col-md-12 col-sm-12">
                                 <div class="form-group">
                                    <label>Address </label>
                                    <input placeholder="" class="form-control" type="text">
                                 </div>
                              </div>
                              <div class="col-md-12 col-sm-12">
                                 <div class="form-group">
                                    <label>About yourself </label>
                                    <textarea cols="6" rows="8" placeholder="" class="form-control"></textarea>
                                 </div>
                              </div>

                              <div class="col-md-12 col-sm-12">
                                 <button class="btn btn-default pull-right"><i class="fa fa-save"></i> Save Profile </button>
                              </div>
                         
                        </div>
                          </form>
                     </div>
                  </div>
               </div>
            </div>
          </section>
            
        </div>
    </main>
    <script type="text/javascript">
        var base_url = '<?= base_url() ?>';
    </script>
    <?php $this->load->view('common/js') ?>
</body>

</html>