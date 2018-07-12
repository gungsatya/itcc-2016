<!DOCTYPE html>
<html>
   <head>
      <title>Rekap Penilaian - Juri <?php echo $this->session->userdata('fullname'); ?></title>
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

      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/dt-1.10.12/fc-3.2.2/fh-3.1.2/r-2.1.0/datatables.min.css"/>
 
      <script type="text/javascript" src="https://cdn.datatables.net/v/bs/dt-1.10.12/fc-3.2.2/fh-3.1.2/r-2.1.0/datatables.min.js"></script>



      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!--Swal-->
      <script src="<?php echo base_url();?>assets/swal/dist/sweetalert-dev.js"></script> 
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/swal/dist/sweetalert.css">
   </head>
   <body>
      <div class="preloader"></div>
      <div id="navibar">
         <div class="container">
            <div class="navi-icon pull-left ">
               <img src="<?php echo base_url();?>assets/images/ti.png" class="logo-by" title="Jurusan Teknologi Informasi">
               <img src="<?php echo base_url();?>assets/images/logo2.png" class="logo-by" title="ITCC 2016">
            </div>
            <div class="pull-right dashnav">
               <a href="<?php echo base_url();?>dashboard-juri" title="Dashboard"><i class="glyphicon glyphicon-home"></i></a>
               <a href="<?php echo base_url();?>AuthJury/logout"><i class="glyphicon glyphicon-log-out" title="Keluar" alt="Keluar"></i></a>
            </div>
         </div>
      </div>
      <div id="bg-contents" >
         <div class="container">
            <div class="row">
               <div class="col-md-12 col-sm-12 col-xs-12 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
                  <div class="box wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="700ms">
                     <div class="box-head">
                        <h4>Rekap Penilaian - Juri <?php echo $this->session->userdata('fullname'); ?></h4>
                     </div>
                     <div class="box-body">
                            
                          <table class="table table-striped table-bordered table-responsive data table-hover">
                            <thead>
                              <tr>
                                <th rowspan="2">Institusi</th>
                                <th rowspan="2">Tim</th>
                                <th rowspan="2">Judul Ide</th>
                                <th colspan="20"><center>Nilai Bagian</center></th>
                                <th rowspan="2">Total Nilai</th>
                              </tr>
                              <tr>
                                <?php if($this->session->userdata('category')=='IDEA'){ ?>
                                  <th>a</th>
                                  <th>b</th>
                                  <th>c</th>
                                  <th>d</th>
                                  <th>e</th>
                                  <th>f</th>
                                  <th>g</th>
                                  <th>h</th>
                                  <th>i</th>
                                  <th>j</th>
                                  <th>k</th>
                                  <th>l</th>
                                  <th>m</th>
                                  <th>n</th>
                                  <th>o</th>
                                  <th>p</th>
                                  <th>q</th>
                                  <th>r</th>
                                  <th>s</th>
                                  <th>t</th>
                                <?php } ?>
                              </tr>
                            </thead>
                            <tbody>
                              <?php foreach($objects as $object){ ?>
                                <tr>
                                  <td><?php echo $object->institution; ?></td>
                                  <td><?php echo $object->groupname; ?></td>
                                  <td><?php echo $object->title; ?></td>
                                  <?php $score_detail=null;
                                  foreach ($object->score_details as $score_detail){ ?>
                                  <td><?php echo $score_detail; ?></td>
                                  <?php } ?>
                                  <td><?php if($object->score==NULL){ echo "0"; }else{ echo $object->score;} ?></td>
                                </tr>
                              <?php } ?>
                            </tbody>
                          </table>

                     </div>
                     <div class="box-foot" align="right">
                        
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!--//HEADER WEBSITE-->
      <div id="footer">
         <p>&copy; Information Technology Creative Competition 2016 | <a href="http://tecart.id">Technology Artisan</a></p>
      </div>
      <script type="text/javascript">
        $(document).ready(function() {
          var table = $('.data').DataTable( {
              scrollY:        "50vh",
              scrollX:        true,
              scrollCollapse: true,
              paging:         false,
              fixedColumns:   {
                  leftColumns: 3
              }
          } );
        });
      </script>
   </body>
</html>