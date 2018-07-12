<!DOCTYPE html>
<html>
   <head>
      <title>Information Technology Creative Competition (ITCC 2016)</title>
      <!--fav icon-->
      <link rel="icon" type="image/jpg" href="<?php echo base_url();?>assets/images/logo2.png">
      <!--css-->
      <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
      <link href="<?php echo base_url();?>assets/css/smoothDivScroll.css"rel="stylesheet" type="text/css" />
      <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet" type="text/css" media="all" />
      <link href="<?php echo base_url();?>assets/css/animate.min.css" rel="stylesheet" type="text/css" media="all" />
      <!--Font-->
      <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
      <!--Meta Tag-->
      <meta name       ="description" content="Information Technology Creative Competition (ITCC) adalah kompetisi bidang Teknologi Informasi yang diselenggarakan oleh Himpunan Mahasiswa Teknologi Informasi (HMTI), Fakultas Teknik, Universitas Udayana.">
      <meta name       ='keywords' content="ITCC 2016, TI Udayana, Fakultas Teknik, Universitas Udayana, ITCC Unud, ITCC Udayana"/>
      <meta http-equiv ="content-type" content="text/html;charset=UTF-8">
      <meta property   ="og:type" content="website" />
      <meta property   ="og:title" content="ITCC 2016" />
      <meta property   ="og:site_name" content="ITCC 2016"/>
      <meta property   ="og:url" content="<?php echo base_url();?>"/>
      <meta property   ="og:image" itemprop="image" content="<?php echo base_url();?>assets/images/capture.jpg" />
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!--javascript-->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
      <script src="<?php echo base_url();?>assets/js/smooth-scroll.min.js" type="text/javascript"></script>
      <script src="<?php echo base_url();?>assets/js/wow.js" type="text/javascript"></script>
      <script src="<?php echo base_url();?>assets/js/bootstrap.js" type="text/javascript"></script>
      <script src="<?php echo base_url();?>assets/js/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
      <script src="<?php echo base_url();?>assets/js/jquery.mousewheel.min.js" type="text/javascript"></script>
      <script src="<?php echo base_url();?>assets/js/jquery.kinetic.min.js" type="text/javascript"></script>
      <script src="<?php echo base_url();?>assets/js/jquery.smoothdivscroll-1.3-min.js" type="text/javascript"></script> 
      <script src="<?php echo base_url();?>assets/js/style.js" type="text/javascript"></script> 
      <script>
         smoothScroll.init();
      </script>
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
      <script type="text/javascript">
         $(document).ready(function () {
            $("div#makeMeScrollable").smoothDivScroll({
               autoScrollingMode: "onStart"
            });
         });
      </script>
      
   </head>
   <body>
      <div class="preloader"></div>
      <div id="navibar">
         <div class="container">
            <div class="navi-icon pull-left ">
               <img src="<?php echo base_url();?>assets/images/ti.png" class="logo-by" title="Teknologi Informasi">
               <img src="<?php echo base_url();?>assets/images/logo2.png" class="logo-by" title="ITCC 2016">
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
                     <a class="nav-link" href="#header" data-scroll>Beranda</a>
                   </li>
                   <li class="nav-item">
                     <a class="nav-link" href="#profile" data-scroll>Profil</a>
                   </li>
                   <li class="nav-item">
                     <a class="nav-link" href="#lomba" data-scroll>Lomba</a>
                   </li>
                   <li class="nav-item">
                     <a class="nav-link" href="#jadwal" data-scroll>Jadwal</a>
                   </li>
                   <li class="nav-item">
                     <a class="nav-link" href="#kontak" data-scroll>Kontak</a>
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
      <div id="header" >
       
         <div class="container">
            <div class="wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
               <div class="header" align="center">
                  <h3 class="logo-text">Information Technology Creative Competition</h3>
                  <h2 class="logo-slogan">Empower People with Smart Green ICT !</h2>
                  <img src="<?php echo base_url();?>assets/images/gambar1.png" class="logo-img">
                  <br>
                  <br>
                  <a href="<?php echo base_url();?>signup" class="btn-danger btn btn-lg "><b>Pendaftaran</b></a>
                  <a href="<?php echo base_url();?>login" class="btn-success btn btn-lg "><b>Masuk</b></a>
               </div>
            </div>
         </div>
      </div>
      <!--//HEADER WEBSITE-->
      <!--KONTEN WEBSITE-->
      <div id="content">
         <!--Bagian apa itu ITCC-->
         <div class="about-us-section" id="profile">
            <div class="about-us wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
               <div class="container">
                  <div class="row">
                     <div class="col-md-12">
                        <h1>Apa itu <span>ITCC ?</span></h1>
                        <hr class="style-two">
                     </div>
                     <div class="col-md-6">
                        <div class="video-container" >
                           <div onclick="thevid=document.getElementById('thevideo'); thevid.style.display='block'; this.style.display='none'">
                              <img class="img-responsive" src="<?php echo base_url();?>assets/images/imgvid.jpg" style="padding:0;margin:0 0 0 0;cursor:pointer;">
                           </div>
                           <div id="thevideo" style="display:none;">
                              <iframe width="560" height="315" src="https://www.youtube.com/embed/qKeQ6eIDeew?rel=0&amp;showinfo=0;" frameborder="0" allowfullscreen></iframe>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <p>Information Technology Creative Competition (ITCC) adalah kompetisi bidang Teknologi Informasi yang diselenggarakan oleh Himpunan Mahasiswa Teknologi Informasi (HMTI) Universitas Udayana. ITCC memiliki tujuan untuk menjaring kompetensi serta menumbuhkan inovasi dan kreativitas anak bangsa khususnya dalam bidang Teknologi Informasi. ITCC 2016 merupakan kegiatan ITCC yang kelima kalinya, dimana Tema dari ITCC 2016 adalah</p>
                        <br>
                        <p><i><b>"Empower people with Smart Green ICT !"</b></i></p>
                        <br>
                        <p>Melalui ITCC 2016 kita wujudkan era global yang kreatif, inovatif, kompetitif dan peduli terhadap lingkungan hidup.</p>
                     </div>
                  </div>
               </div>
               <div class="image-line hidden-sm hidden-xs" id="makeMeScrollable">
                  <img src="<?php echo base_url();?>assets/images/slider/3.JPG" >
                  <img src="<?php echo base_url();?>assets/images/slider/4.JPG" >
                  <img src="<?php echo base_url();?>assets/images/slider/5.JPG" >
                  <img src="<?php echo base_url();?>assets/images/slider/6.JPG" >
                  <img src="<?php echo base_url();?>assets/images/slider/7.JPG" >
                  <img src="<?php echo base_url();?>assets/images/slider/8.JPG" >
                  <img src="<?php echo base_url();?>assets/images/slider/9.JPG" >
                  <img src="<?php echo base_url();?>assets/images/slider/10.JPG" >
                  <img src="<?php echo base_url();?>assets/images/slider/11.JPG" >
               </div>
            </div>
         </div>
         <!--END//Bagian apa itu ITCC-->
         <!--Bagian Lomba-->
         <div class="competition-section" id="lomba">
            <div class="competition-section-head">
               <h1>Kategori <span>Lomba</span></h1>
            </div>
            <div class="competition-section-body">
               <div class="container">
                  <div class="row">
                     <div class="col-sm-12 col-md-6 col-lg-3">
                        <div class="competition-box fadeInUp wow" data-wow-duration="1000ms" data-wow-delay="300ms">
                           <div class="competition-box-head">
                              <h3>Cerdas Cermat</h3>
                           </div>
                           <div class="competition-box-body">
                              <img src="<?php echo base_url();?>assets/images/cerdascermat.png" class="picture-box">
                              <input type="checkbox" class="read-more-state" id="post-1" />
                              <p class="read-more-wrap text-justify">
                                 Cerdas Cermat bidang Teknologi Informasi tingkat SMA/SMK sederajat Se-Bali merupakan <span class="read-more-target">salah satu kategori lomba baru yang diselenggarakan pada kegiatan ITCC 2016 untuk menjaring siswa/siswi SMA/SMK sederajat di seluruh Bali yang memiliki kompetensi dalam bidang Ilmu Teknologi Informasi.</span>
                              </p>
                              <label for="post-1" class="read-more-trigger">
                           </div>
                           <div class="competition-box-foot">
                              <a href="<?php echo base_url();?>doc/LCC.pdf" class="btn btn-danger btn-block" target="_blank"><b>Baca Peraturan Lengkap</b></a>
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-12 col-md-6 col-lg-3">
                        <div class="competition-box fadeInUp wow" data-wow-duration="1000ms" data-wow-delay="500ms">
                           <div class="competition-box-head">
                              <h3>Desain Web</h3>
                           </div>
                           <div class="competition-box-body">
                              <img src="<?php echo base_url();?>assets/images/webdesign.png" class="picture-box">
                              <input type="checkbox" class="read-more-state" id="post-2" />
                              <p class="read-more-wrap text-justify">Desain Web tingkat SMA/SMK sederajat Se-Bali merupakan salah satu lomba yang <span class="read-more-target"> ada dalam kegiatan ITCC 2016. Lomba ini mengambil Tema “Empower People with Smart Green ICT”. Peserta diharapkan dapat menuangkan ide, kreatifitas, dan inovasinya ke dalam sebuah halaman web yang didesain secara unik dan menarik serta sesuai dengan tema yang ditentukan.</span></p>
                              <label for="post-2" class="read-more-trigger">
                           </div>
                           <div class="competition-box-foot">
                              <a href="<?php echo base_url();?>doc/WEB.pdf" class="btn btn-danger btn-block" target="_blank"><b>Baca Peraturan Lengkap</b></a>
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-12 col-md-6 col-lg-3">
                        <div class="competition-box fadeInUp wow" data-wow-duration="1000ms" data-wow-delay="700ms">
                           <div class="competition-box-head">
                              <h3>Pemrograman</h3>
                           </div>
                           <div class="competition-box-body">
                              <img src="<?php echo base_url();?>assets/images/programming.png" class="picture-box">
                              <input type="checkbox" class="read-more-state" id="post-3" />
                              <p class="read-more-wrap text-justify">Pemrograman tingkat SMA/SMK sederajat Se-Bali merupakan salah satu perlombaan yang <span class="read-more-target">ada dalam kegiatan ITCC 2016 untuk menjaring siswa/siswi SMA, SMK ataupun jenjang yang sederajat seluruh Bali yang memiliki kompetensi di bidang komputer khususnya logika komputasi dan pemrograman.</span></p>
                              <label for="post-3" class="read-more-trigger">
                           </div>
                           <div class="competition-box-foot">
                              <a href="<?php echo base_url();?>doc/PROG.pdf" class="btn btn-danger btn-block" target="_blank"><b>Baca Peraturan Lengkap</b></a>
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-12 col-md-6 col-lg-3">
                        <div class="competition-box fadeInUp wow" data-wow-duration="1000ms" data-wow-delay="900ms">
                           <div class="competition-box-head">
                              <h3>Pengembangan Ide Bisnis TIK</h3>
                           </div>
                           <div class="competition-box-body">
                              <img src="<?php echo base_url();?>assets/images/inkubasi.png" class="picture-box">
                              <input type="checkbox" class="read-more-state" id="post-4" />
                              <p class="read-more-wrap text-justify">Pengembangan Ide Bisnis TIK merupakan salah satu perlombaan yang baru <span class="read-more-target"> diselenggarakan pada kegiatan ITCC 2016 untuk mengajak masyarakat Indonesia (khususnya Bali, Jawa dan Nusra) mengembangkan bisnis melalui produk TIK. Lomba ini diperuntukkan untuk umum (maksimal umur 24 tahun) dengan cara membuat proposal bisnis serta prototype produk.</span></p>
                              <label for="post-4" class="read-more-trigger">
                           </div>
                           <div class="competition-box-foot">
                              <a href="<?php echo base_url();?>doc/IDEA.pdf" class="btn btn-danger btn-block" target="_blank"><b>Baca Peraturan Lengkap</b></a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!--END//Bagian lomba-->
         <!--Bagian Timeline-->
         <div class="timeline-section" id="jadwal">
            <div class="container">
               <div class="page-header">
                  <h1>Jadwal</h1>
               </div>
               <ul class="timeline">
                  <li class="slideInRight wow" data-wow-duration="1000ms" data-wow-delay="300ms">
                     <div class="timeline-badge success"><i class="glyphicon glyphicon-check"></i></div>
                     <div class="timeline-panel">
                        <div class="timeline-heading">
                           <h4 class="timeline-title" title="Tanggal pelaksanaan" style="font-weight:bold">1 Agustus 2016 - 6 November 2016</h4>
                           <p><small class="text-muted" title="Untuk cabang lomba"><i class="glyphicon glyphicon-list-alt"></i> Desain Web, Cerdas Cermat, Pemrograman</small></p>
                        </div>
                        <div class="timeline-body">
                           <p>Pendaftaran online peserta pada halaman web ITCC 2016.</p>
                        </div>
                     </div>
                  </li>
                  <li class="timeline-inverted slideInLeft wow" data-wow-duration="1000ms" data-wow-delay="300ms">
                     <div class="timeline-badge"><i class="glyphicon glyphicon-cloud-upload"></i></div>
                     <div class="timeline-panel">
                        <div class="timeline-heading">
                           <h4 class="timeline-title" title="Tanggal pelaksanaan" style="font-weight:bold">1 September 2016 – 30 September 2016</h4>
                           <p><small class="text-muted" title="Untuk cabang lomba"><i class="glyphicon glyphicon-list-alt"></i> Pengembangan Ide Bisnis TIK</small></p>
                        </div>
                        <div class="timeline-body">
                           <p>Pengiriman proposal bisnis dan poster dalam bentuk file rar/zip secara online.</p>
                        </div>
                     </div>
                  </li>
                  <li class="slideInRight wow" data-wow-duration="1000ms" data-wow-delay="300ms">
                     <div class="timeline-badge warning"><i class="glyphicon glyphicon-bullhorn"></i></div>
                     <div class="timeline-panel">
                        <div class="timeline-heading">
                           <h4 class="timeline-title" title="Tanggal pelaksanaan" style="font-weight:bold">10 Oktober 2016</h4>
                           <p><small class="text-muted" title="Untuk cabang lomba"><i class="glyphicon glyphicon-list-alt"></i> Pengembangan Ide Bisnis TIK</small></p>
                        </div>
                        <div class="timeline-body">
                           <p>Pengumuman lolos Babak Final.</p>
                        </div>
                     </div>
                  </li>
                  <li class="timeline-inverted slideInLeft wow" data-wow-duration="1000ms" data-wow-delay="300ms">
                     <div class="timeline-badge"><i class="glyphicon glyphicon-cloud-upload"></i></div>
                     <div class="timeline-panel">
                        <div class="timeline-heading">
                           <h4 class="timeline-title" title="Tanggal pelaksanaan" style="font-weight:bold">16 Oktober 2016 – 29 Oktober 2016</h4>
                           <p><small class="text-muted" title="Untuk cabang lomba"><i class="glyphicon glyphicon-list-alt"></i> Desain Web</small></p>
                        </div>
                        <div class="timeline-body">
                           <p>Pengumpulan bahan lomba dalam bentuk file rar/zip ke halaman web ITCC 2016.</p>
                        </div>
                     </div>
                  </li>
                  <li class="slideInRight wow" data-wow-duration="1000ms" data-wow-delay="300ms">
                     <div class="timeline-badge info"><i class="glyphicon glyphicon-info-sign"></i></div>
                     <div class="timeline-panel">
                        <div class="timeline-heading">
                           <h4 class="timeline-title" title="Tanggal pelaksanaan" style="font-weight:bold">6 November 2016</h4>
                           <p><small class="text-muted" title="Untuk cabang lomba"><i class="glyphicon glyphicon-list-alt"></i> Pemrograman, Desain Web, Cerdas Cermat</small></p>
                        </div>
                        <div class="timeline-body">
                           <p>Technical meeting yang diselenggarakan di Kampus Teknologi Informasi, Bukit Jimbaran.</p>
                        </div>
                     </div>
                  </li>
                  <li class="timeline-inverted slideInLeft wow" data-wow-duration="1000ms" data-wow-delay="300ms">
                     <div class="timeline-badge warning"><i class="glyphicon glyphicon-console"></i></div>
                     <div class="timeline-panel">
                        <div class="timeline-heading">
                           <h4 class="timeline-title" title="Tanggal pelaksanaan" style="font-weight:bold">10 November 2016</h4>
                           <p><small class="text-muted" title="Untuk cabang lomba"><i class="glyphicon glyphicon-list-alt"></i> Pemrograman, Desain Web, Cerdas Cermat</small></p>
                        </div>
                        <div class="timeline-body">
                           <p>Babak Penyisihan cabang lomba Pemrograman dan Desain Web. Pada cabang lomba Cerdas Cermat akan diselenggarakan Babak Penyisihan, Semi Final Sesi 1 dan Semi Final Sesi 2</p>
                        </div>
                     </div>
                  </li>
                  <li class="slideInRight wow" data-wow-duration="1000ms" data-wow-delay="300ms">
                     <div class="timeline-badge danger"><i class="glyphicon glyphicon-gift"></i></div>
                     <div class="timeline-panel">
                        <div class="timeline-heading">
                           <h4 class="timeline-title" title="Tanggal pelaksanaan" style="font-weight:bold">11 November 2016</h4>
                           <p><small class="text-muted" title="Untuk cabang lomba"><i class="glyphicon glyphicon-list-alt"></i> Semua cabang lomba</small></p>
                        </div>
                        <div class="timeline-body">
                           <p>Puncak Acara - Semi Final Sesi 3 dan 4 untuk cabang lomba Cerdas Cermat. Babak Final untuk semua cabang lomba.</p>
                        </div>
                     </div>
                  </li>
               </ul>
            </div>
            <hr class="style-two">
         </div>
         <!--END//Bagian Timeline-->

         <!--Bagian Penyelengara-->
         <div class="map-section">
            <iframe style="position:absolute;" 
            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1971.443973499977!2d115.17586!3d-8.796597000000002!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x2987c2fa4d855e33!2sUniversitas+Udayana-Teknologi+Informasi!5e0!3m2!1sid!2sid!4v1471060569870" 
            width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
         </div>
         <div class="contact-section" id="kontak">
            <div class="contact-section-body">
               <div class="container">
                  <div class="row">
                     <div class="col-sm-12 col-md-4 ">
                        <div class="contact-box wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
                           <div class="contact-box-head">
                              <h3>Contact</h3>
                           </div>
                           <div class="contact-box-body" align="left">
                              <ul>
                                 <li><i>Pande Nengah</i> ( +62 81 999 046 677 )</li>
                                 <li><i>Kris Sanjaya</i> ( +62 89 688 604 302 )</li>
                              </ul>
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-12 col-md-2">
                        <div class="contact-box wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="700ms">
                           <div class="contact-box-head">
                              <h3>In Touch</h3>
                           </div>
                           <div class="contact-box-body">
                              <div class="sosmed">
                                 <a href="https://www.facebook.com/ITCC.Udayana" ><img src="<?php echo base_url();?>assets/images/fb.jpg" class="sosmed-icon"></a>
                                 <a href="https://twitter.com/ITCCUdayana" ><img src="<?php echo base_url();?>assets/images/twitter.png" class="sosmed-icon"></a>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-12 col-md-6">
                        <div class="contact-box wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="700ms">
                           <div class="contact-box-head">
                              <h3>Media Partner</h3>
                           </div>
                           <div class="contact-box-body" style="padding:20px;">
                              <img title="Codepolitan" src="<?php echo base_url();?>assets/images/logo_codepolitan.png" style="width:auto;height:50px;float:left;margin:2px;">
                              <img title="Info Singaraja" src="<?php echo base_url();?>assets/images/logo_infosingaraja.png" style="width:auto;height:30px;float:left;margin:2px;">
                              <img title="Info Jembrana" src="<?php echo base_url();?>assets/images/logo_infojembrana.jpg" style="width:auto;height:30px;float:left;margin:2px;">
                              <img title="Info Denpasar" src="<?php echo base_url();?>assets/images/logo_infodenpasar.jpg" style="width:auto;height:30px;float:left;margin:2px;">
                              <img title="Info Badung" src="<?php echo base_url();?>assets/images/logo_infobadung.jpg" style="width:auto;height:30px;float:left;margin:2px;">
                              <img title="Info Gianyar" src="<?php echo base_url();?>assets/images/logo_infogianyar.jpg" style="width:auto;height:30px;float:left;margin:2px;">
                              <img title="Halo Denpasar" src="<?php echo base_url();?>assets/images/logo_halodenpasar.jpg" style="width:auto;height:30px;float:left;margin:2px;">
                              <img title="Acara Bali" src="<?php echo base_url();?>assets/images/logo_acara_bali.jpg" style="width:auto;height:30px;float:left;margin:2px;">
                              <img title="Acara Jogja" src="<?php echo base_url();?>assets/images/logo_acara_jogja.jpg" style="width:auto;height:30px;float:left;margin:2px;">
                              <img title="Acara Malang" src="<?php echo base_url();?>assets/images/logo_acara_malang.jpg" style="width:auto;height:30px;float:left;margin:2px;">
                           </div>
                        </div>                    
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!--END//Bagian Penyelengara-->
      </div>
      <!--//KONTEN WEBSITE-->
      <div id="footer">
         <p>&copy; Information Technology Creative Competition 2016 | <a href="http://tecart.id">Technology Artisan</a></p>
      </div>
   </body>
</html>