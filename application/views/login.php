<!DOCTYPE html>
<html>
   <head>
      <title>Masuk - ITCC 2016</title>
      <!--fav icon-->
      <link rel="icon" type="image/jpg" href="<?php echo base_url();?>assets/images/logo2.png">
      <!--css-->
      <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
      <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet" type="text/css" media="all" />
      <link href="<?php echo base_url();?>assets/css/animate.min.css" rel="stylesheet" type="text/css" media="all" />
      <!--Font-->
      <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
      <!--Meta Tag-->
      <meta name       ="description" content="Official Website dari Information Technology Creative Competition 2016 - Jurusan Teknologi Informasi - Fakultas Teknik - Universitas Udayana">
      <meta name       ='keywords' content="ITCC 2016, TI Udayana, Fakultas Teknik, Universitas Udayana"/>
      <meta http-equiv ="content-type" content="text/html;charset=UTF-8">
      <meta property   ="og:type" content="website" />
      <meta property   ="og:title" content="ITCC 2016" />
      <meta property   ="og:site_name" content="ITCC 2016"/>
      <meta property   ="og:url" content="<?php echo base_url();?>"/>
      <meta property   ="og:image" itemprop="image" content="<?php echo base_url();?>assets/images/capture.jpg" />
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
              <img src="<?php echo base_url();?>assets/images/ti.png" class="logo-by">
              <img src="<?php echo base_url();?>assets/images/logo2.png" class="logo-by">
            </div>
            <nav class="navbar navbar-light bg-faded navi-link pull-right">
               <div class="navbar-header" align="center">
                  <a class="navbar-toggle collapsed btn" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                     <span class="glyphicon glyphicon-menu-hamburger"></span> Menu
                  </a>
               </div>
               <div id="navbar" class="navbar-collapse collapse ">
                  <ul class="nav navbar-nav">
                   <li class="nav-item active">
                     <a class="nav-link" href="<?php echo base_url();?>">Beranda</a>
                   </li>
                   <li class="nav-item">
                     <a class="nav-link" href="<?php echo base_url();?>Auth">Masuk</a>
                   </li>
                   <li class="nav-item">
                     <a class="nav-link" href="<?php echo base_url();?>Auth/signup">Pendaftaran</a>
                   </li>
                    <li class="nav-item">
                     <a class="nav-link" href="<?php echo base_url();?>faq">FAQ</a>
                   </li>
                 </ul>
               </div>
            </nav>
         </div>
      </div>
      <!--HEADER WEBSITE-->
      <div id="bgpic-contents" >
         <div class="container">
            <div class="row">
               <div class="col-md-4 hidden-sm hidden-xs"></div>
               <div class="col-md-4 col-sm-12 col-xs-12 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
                  <img src="<?php echo base_url();?>assets/images/logo2.png" class="img-pad">
                  <?php echo $error;?>
                  <div class="box wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="700ms">
                     <form method="post" enctype="multipart/form-data" action="<?php echo base_url();?>Auth/login">
                     <div class="box-head">
                        <h4>Login Peserta</h4>
                     </div>
                     <div class="box-body">
                        <div class="input-group">
                           <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                           <input type="text" class="form-control" placeholder="username" name="uname">
                        </div>
                        <br>
                        <div class="input-group">
                           <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                           <input type="password" class="form-control" placeholder="kata sandi" name="pword">
                        </div>
                     </div>
                     <div class="box-foot" align="right">
                        <input type="submit" value="Masuk" class="btn btn-info btn-sm"></input>
                     </div>
                     </form>
                  </div>
               </div>
               <div class="col-md-4 hidden-sm hidden-xs"></div>
            </div>
         </div>
      </div>
      <!--//HEADER WEBSITE-->
      <div id="footer">
         <p>&copy; Information Technology Creative Competition 2016 | <a href="http://tecart.id">Technology Artisan</a></p>
      </div>
   </body>
</html>