<!DOCTYPE html>
<html>
   <head>
      <title>Halaman tidak ada</title>
      <!--fav icon-->
      <link rel="icon" type="image/jpg" href="<?php echo base_url();?>assets/images/logo2.png">
      <!--css-->
      <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
      <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet" type="text/css" media="all" />
      <link href="<?php echo base_url();?>assets/css/animate.min.css" rel="stylesheet" type="text/css" media="all" />
      <!--Font-->
      <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
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
      <!--HEADER WEBSITE-->
      <div id="bgpic-contents" >
         <div class="container">
            <div class="row">
               <div class="col-md-3 hidden-sm hidden-xs"></div>
               <div class="col-md-6 col-sm-12 col-xs-12 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
                  <img src="<?php echo base_url();?>assets/images/logo2.png" class="img-pad">
                  <?php echo $error;?>
                  <div class="box wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="700ms">
                     <form method="post" enctype="multipart/form-data" action="<?php echo base_url();?>AuthAdm/login">
                     <div class="box-head">
                        
                     </div>
                     <div class="box-body">
                        <h3 align="center">----Halaman yang anda cari tidak ada----</h3>
                     </div>
                     <div class="box-foot" align="right">
                        
                     </div>
                     </form>
                  </div>
               </div>
               <div class="col-md-3 hidden-sm hidden-xs"></div>
            </div>
         </div>
      </div>
      <!--//HEADER WEBSITE-->
      <div id="footer">
         <p>&copy; Information Technology Creative Competition 2016 | <a href="http://tecart.id">Technology Artisan</a></p>
      </div>
   </body>
</html>