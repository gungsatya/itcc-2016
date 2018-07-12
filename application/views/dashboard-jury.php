<!DOCTYPE html>
<html>
   <head>
      <title>Dashboard - Juri</title>
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
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs-3.3.6/jqc-1.12.3/dt-1.10.12/cr-1.3.2/r-2.1.0/rr-1.1.2/sc-1.4.2/datatables.min.css"/>
 
      <script type="text/javascript" src="https://cdn.datatables.net/v/bs-3.3.6/jqc-1.12.3/dt-1.10.12/cr-1.3.2/r-2.1.0/rr-1.1.2/sc-1.4.2/datatables.min.js"></script>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!--Swal-->
      <script src="<?php echo base_url();?>assets/swal/dist/sweetalert-dev.js"></script> 
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/swal/dist/sweetalert.css">
   </head>
   <body>
      <script type="text/javascript">
        <?php echo $welmsg; ?>
      </script>
      <br>
      <div class="preloader"></div>
      <div id="navibar">
         <div class="container">
            <div class="navi-icon pull-left ">
               <img src="<?php echo base_url();?>assets/images/ti.png" class="logo-by" title="Jurusan Teknologi Informasi">
               <img src="<?php echo base_url();?>assets/images/logo2.png" class="logo-by" title="ITCC 2016">
            </div>
            <div class="pull-right dashnav">
               <a href="<?php echo base_url();?>AuthJury/logout"><i class="glyphicon glyphicon-log-out" title="Keluar" alt="Keluar"></i></a>
            </div>
         </div>
      </div>
      <div id="bg-contents" >
         <div class="container">
            <div class="row">
               <div class="col-md-1 hidden-sm hidden-xs"></div>
               <div class="col-md-10 col-sm-12 col-xs-12 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
                  <div class="box wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="700ms">
                     <div class="box-head">
                        <h3>Daftar Karya Peserta</h3>
                     </div>
                     <div class="box-body">
                        
                          <table class="table table-striped table-bordered table-responsive data">
                            <thead>
                              <tr>
                                <th>Instansi</th>
                                <th>Tim</th>
                                <th>Judul Ide</th>
                                <th>Total Nilai</th>
                                <th>Aksi</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php foreach ($objects as $object) {?>
                                <tr>
                                  <td><?php echo $object->institution; ?></td>
                                  <td><?php echo $object->groupname; ?></td>
                                  <td><?php echo $object->title; ?></td>
                                  <td><?php if($object->score==NULL){ echo "Belum ternilai"; }else{ echo $object->score;} ?></td>
                                  <td><?php if($object->score==NULL){ ?> 
                                          <a href="<?php echo base_url(); ?>form-penilaian/<?php echo $object->id; ?>" class="btn btn-sm btn-success nilai">Menilai</a>
                                      <?php }else{ ?>
                                          <a href="<?php echo base_url(); ?>form-penilaian/<?php echo $object->id; ?>" class="btn btn-sm btn-warning nilai">Ulang Menilai</a>
                                      <?php } ?>
                                  </td>
                                </tr>
                              <?php } ?>
                            </tbody>
                          </table>
                     </div>
                     <div class="box-foot" align="right">
                        <a href="<?php echo base_url();?>AuthJury/rekap" class="btn btn-info btn-block btn-lg"><b>Rekap Nilai</b></a>
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
      <script type="text/javascript">
        $(document).ready(function() {
          $('.data').DataTable();
        });
      </script>
   </body>
</html>