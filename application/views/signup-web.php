<!DOCTYPE html>
<html>
   <head>
      <title>Pendaftaran - Desain Web - ITCC 2016</title>
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
      <meta property   ="og:url" content="#"/>
      <meta property   ="og:image" itemprop="image" content="#" />
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
               <div class="col-md-3 hidden-sm hidden-xs"></div>
               <div class="col-md-6 col-sm-12 col-xs-12 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
                  <?php echo $errormsg; ?>
                  <div class="box">
                     <form action="<?php echo base_url();?>Auth/signup/web" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                     <div class="box-head">
                        <h3>Form Pendaftaran Desain Web</h3>
                     </div>
                     <div class="box-body">
                        <div class="box-body-col">
                           <h4>Data Diri</h4>
                           <div class="form-group">
                             <label class="control-label col-md-3">Asal Sekolah</label>
                             <div class="col-md-9">
                                 <input class="form-control" placeholder="ex. 'SMA/SMK Permata'" name="institution" required="required" type="text" value="<?php echo $institution;?>">
                             </div>
                           </div>
                           <div class="form-group">
                             <label class="control-label col-md-3">Nama Lengkap</label>
                             <div class="col-md-9">
                                 <input class="form-control" placeholder="ex. 'Nama Brata'" name="fullname" required="required" type="text" value="<?php echo $fullname;?>">
                             </div>
                           </div>
                           <div class="form-group">
                             <label class="control-label col-md-3">Tanggal Lahir</label>
                             <div class="col-md-9">
                                 <input class="form-control" placeholder="ex. '1995/12/27'" name="birthday" required="required" type="date" value="<?php echo $birthday;?>">
                             </div>
                           </div>
                           <div class="form-group">
                             <label class="control-label col-md-3">Email</label>
                             <div class="col-md-9">
                                 <input class="form-control" placeholder="ex. 'mail@site.com'" name="email" required="required" type="email" value="<?php echo $email;?>">
                             </div>
                           </div>
                           <div class="form-group">
                             <label class="control-label col-md-3">Nomer Kontak</label>
                             <div class="col-md-9">
                                 <input class="form-control" placeholder="ex. '081632111111'" name="contact" required="required" type="text" value="<?php echo $contact;?>">
                             </div>
                           </div>
                           <div class="form-group">
                             <label class="control-label col-md-3">Vegetarian</label>
                             <div class="col-md-9">
                                <label><input type="radio" value="Y" name="vegetarian" required="required"> Iya </label> <label><input type="radio" value="N" name="vegetarian" required="required"> Tidak</label>
                             </div>
                           </div>
                           <div class="form-group">
                              <label class="control-label col-md-3">Kartu Identitas</label>
                              <div class="col-md-9">
                                  <input name="photo" type="file" class="form-control" accept="image/*">
                                  <small>Gambar dalam bentuk file .jpg</small>
                              </div>
                            </div>
                        </div>
                        <div class="box-body-col">
                           <h4>Data Autentifikasi</h4>
                           <div class="form-group">
                             <label class="control-label col-md-3">Username</label>
                             <div class="col-md-9">
                                 <input class="form-control" placeholder="nama pengguna" name="username" required="required" type="text" value="<?php echo $username;?>">
                             </div>
                           </div>
                           <div class="form-group">
                             <label class="control-label col-md-3">Password</label>
                             <div class="col-md-9">
                                 <input class="form-control" placeholder="kata sandi" name="password" id="pass" required="required" type="password">
                             </div>
                           </div>
                           <div class="form-group">
                             <label class="control-label col-md-3">Konfirmasi Password</label>
                             <div class="col-md-9">
                                 <input class="form-control" placeholder="ulangi kata sandi" name="passconf" id="pass2nd" required="required" type="password">
                                 <span id='message'></span>
                             </div>
                           </div>
                        </div>
                        <script type="text/javascript">
                           $('#pass2nd').on('keyup', function () {
                                 if ($(this).val() == $('#pass').val()) {
                                     $('#message').html('Konfirmasi Password Cocok').css('color', 'green');
                              } 
                              else $('#message').html('Konfirmasi Password Tidak Cocok').css('color', 'red');
                           });
                        </script>   
                     </div>
                     <div class="box-foot" align="right">
                        <input type="submit" name="submit" value="Daftar" class="btn btn-info">
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