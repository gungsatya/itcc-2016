<!DOCTYPE html>
<html>
   <head>
      <title>Log Unggah - Admin</title>
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
               <a href="<?php echo base_url();?>AuthAdm/logout"><i class="glyphicon glyphicon-log-out" title="Keluar" alt="Keluar"></i></a>
            </div>
         </div>
      </div>
      <div id="mySidenav" class="sidenav">
         <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
         <a href="<?php echo base_url();?>dashboard-admin"><i class="glyphicon glyphicon-dashboard"></i> Dashboard</a>
         <a href="<?php echo base_url();?>verifikasi-admin"><i class="glyphicon glyphicon-list-alt"></i> Verifikasi</a>
         <a href="<?php echo base_url();?>uploadlogs"><i class="glyphicon glyphicon-cloud-upload"></i> Log Unggah</a>
      </div>
      <div id="bg-contents" >
         <div class="container">
            <div class="row">
               <div class="col-md-1 hidden-sm hidden-xs"></div>
               <div class="col-md-10 col-sm-12 col-xs-12 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
                  <div class="box wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="700ms">
                     <div class="box-head">
                        <h3>Log Unggah</h3>
                     </div>
                     <div class="box-body">
                        
                          <table class="table table-striped table-bordered table-responsive data">
                            <thead>
                              <tr>
                                <th>Kode</th>
                                <th>Nama</th>
                                <?php if($this->session->userdata('category')=='LCC'||$this->session->userdata('category')=='IDEA'){?>
                                <th>Nama Tim</th>
                                <?php }?>
                                <th>Instansi</th>
                                <th>Email</th>
                                <th>Kontak</th>
                                <th>Terakhir Unggah</th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php foreach($uploadlogs as $uploadlog){ ?>
                              <tr>
                                <td><?php echo $uploadlog->code; ?></td>
                                <td><?php echo $uploadlog->fullname; ?></td>
                                <?php if($this->session->userdata('category')=='LCC'||$this->session->userdata('category')=='IDEA'){?>
                                <td><?php echo $uploadlog->groupname; ?></td>
                                <?php }?>
                                <td><?php echo $uploadlog->institution; ?></td>
                                <td><?php echo $uploadlog->email; ?></td>
                                <td><?php echo $uploadlog->contact; ?></td>
                                <td><?php if(is_null($uploadlog->upload_at)){ 
                                            echo "<small>belum mengunggah</small>";
                                          }
                                          else
                                          {
                                            echo "<a href='".base_url()."fileupload/".$this->session->userdata('category')."/".$uploadlog->filename."'> ".date('d M Y', strtotime($uploadlog->upload_at))."</a>";
                                          }
                                     ?>
                                </td>
                              </tr>
                            <?php } ?>
                            </tbody>
                          </table>
                        <br>
                     </div>
                     <div class="box-foot" align="right">
                     </div>
                  </div>
               </div>
               <div class="col-md-1 hidden-sm hidden-xs"></div>
            </div>
         </div>
      </div>
      <script type="text/javascript">
        $(document).ready(function() {
          $('.data').DataTable();
        });
      </script>
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