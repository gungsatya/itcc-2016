<!DOCTYPE html>
<html>
   <head>
      <title>Setting- ITCC 2016</title>
      <!--fav icon-->
      <link rel="icon" type="image/jpg" href="<?php echo base_url();?>assets/images/logo2.png">
      <!--css-->
      <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
      <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet" type="text/css" media="all" />
      <link href="<?php echo base_url();?>assets/css/animate.min.css" rel="stylesheet" type="text/css" media="all" />
      <!--Font-->
      <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>

      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!--javascript-->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
      <script src="<?php echo base_url();?>assets/js/wow.js" type="text/javascript"></script>
      <script src="<?php echo base_url();?>assets/js/bootstrap.js" type="text/javascript"></script>
      <script src="<?php echo base_url();?>assets/js/style.js" type="text/javascript"></script> 
      <script>
         wow = new WOW(
          {
          boxClass:     'wow',      // default
          animateClass: 'animated', // default
          offset:       10,          // default
          mobile:       false,       // default
          live:         true        // default
         }
         )
         wow.init();
      </script>
   </head>
   <body>
      <div class="preloader"></div>
      <div id="navibar">
         <div class="container">
            <div class="navi-icon pull-left ">
               <span title="Menu Sidebar"class="btn" style="font-size:20px;cursor:pointer; margin-right:10px;" onclick="openNav()">☰</span>
               <img src="<?php echo base_url();?>assets/images/ti.png" class="logo-by" title="Jurusan Teknologi Informasi">
               <img src="<?php echo base_url();?>assets/images/logo2.png" class="logo-by" title="ITCC 2016">
            </div>
            <div class="pull-right dashnav">
               <a href="<?php echo base_url();?>Auth/logout"><i class="glyphicon glyphicon-log-out" title="Keluar" alt="Keluar"></i></a>
            </div>
         </div>
      </div>
      <div id="mySidenav" class="sidenav">
         <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
         <a href="<?php echo base_url();?>dashboard"><i class="glyphicon glyphicon-dashboard"></i> Dashboard</a>
         <a href="<?php echo base_url();?>verifikasi"><i class="glyphicon glyphicon-list-alt"></i> Verifikasi</a>
         <a href="<?php echo base_url();?>upload"><i class="glyphicon glyphicon-cloud-upload"></i> Upload Data</a>
         <a href="<?php echo base_url();?>setting"><i class="glyphicon glyphicon-cog"></i> Setting</a>
      </div>
      <div id="bg-contents" >
         <div class="container">
            <div class="row">
               <div class="col-md-1 hidden-sm hidden-xs"></div>
               <div class="col-md-10 col-sm-12 col-xs-12 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
                  <div class="box wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="700ms">
                     <div class="box-head">
                        <h3>Setting</h3>
                     </div>
                     <div class="box-body">
                        <div class="row">
                           <div class="col-md-6">
                              <div class="box-body-col" style="min-height:250px;" align="right">
                                <h4>Ubah Password</h4>
                                <form action="<?php echo base_url();?>Backend/setting" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                                 <div class="form-group">
                                    <label class="control-label col-xs-2">Lama</label>
                                    <div class="col-md-10">
                                        <input name="oldpassword" type="password" class="form-control" placeholder="Kata Sandi Lama">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-xs-2">Baru</label>
                                    <div class="col-md-10">
                                        <input name="password" type="password" class="form-control" id="pass" placeholder="Kata Sandi Baru">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-xs-2"></label>
                                    <div class="col-md-10">
                                        <input name="passconf" type="password" class="form-control" id="pass2nd" placeholder="Ulangi Kata Sandi Baru">
                                    </div>
                                </div>
                                <span id='message'></span>
                                <input type="submit" class="btn btn-success btn-sm" value="Ganti">
                                 </form>
                                 <script type="text/javascript">
                                    $('#pass2nd').on('keyup', function () {
                                          if ($(this).val() == $('#pass').val()) {
                                              $('#message').html('Konfirmasi Password Cocok').css('color', 'green');
                                       } 
                                       else $('#message').html('Konfirmasi Password Tidak Cocok').css('color', 'red');
                                    });
                                 </script>
                                 <br>
                                 <?php echo $errormsg; ?>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="box-body-col" style="min-height:250px;">
                                 <h4>Notifikasi</h4>
                                 <div class="alert alert-success">
                                    <p style="font-weight:bold">Hai, <?php echo $this->session->userdata('fullname');?>.</p>
                                    <p style="text-align: justify;text-justify: inter-word;">Apakah data anda sudah terisi lengkap ? Silahkan dilanjutkan dengan pembayaran uang lomba dengan transfer ke rekening yang telah ditentukan. Lalu kirim bukti pembayarannya disini. Panitia akan segera memverifikasi data anda. </p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="box-foot" align="right">
                     </div>
                  </div>
               </div>
               <div class="col-md-1 hidden-sm hidden-xs"></div>
            </div>
         </div>
      </div>
      <!--//HEADER WEBSITE-->
      <div id="footer">
         <p>&copy; Information Technology Creative Competition 2016 | <a href="http://tecart.id">Technology Artisan</a></p>
      </div>
      <!-- Modal -->
      <div class="modal fade" id="myModal" role="dialog">
         <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
               
            </div>
         </div>
      </div>
   </body>
</html>