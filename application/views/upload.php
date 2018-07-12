<!DOCTYPE html>
<html>
   <head>
      <title>Upload Item Lomba - ITCC 2016</title>
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
                        <h3>Upload Item Lomba</h3>
                     </div>
                     <div class="box-body">
                        <div class="row">
                           <div class="col-md-6">
                              <div class="box-body-col" style="min-height:250px;" align="left">
                                <h4>Upload File</h4>
                                <?php echo $form;?>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="box-body-col" style="min-height:250px;">
                                 <h4>Notifikasi</h4>
                                 <div class="alert alert-success">
                                    <p style="font-weight:bold">Hai, <?php echo $this->session->userdata('fullname');?>.</p>
                                    <p style="text-align: justify;text-justify: inter-word;">Data yang diunggah dalam bentuk rar/zip. Pastikan kelengkapan data yang kamu kirim.</p>
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