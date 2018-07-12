<!DOCTYPE html>
<html>
   <head>
      <title>Daftar Request Verifikasi - Admin</title>
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
      <script src="<?php echo base_url();?>assets/js/jquery.elevatezoom.js" type="text/javascript"></script> 

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
                        <h3>Daftar Request Verifikasi</h3>
                     </div>
                     <div class="box-body">
                        
                          <table class="table table-striped table-bordered table-responsive data">
                            <thead>
                              <tr>
                                <th>Nama Tim</th>
                                <th>Instansi</th>
                                <th>Nominal (Rp)</th>
                                <th>Bukti Bayar</th>
                                <th>Tanggal</th>
                                <th>Note</th>
                                <th>Aksi</th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php foreach($verified_reqs as $verified_req){ ?>
                              <tr>
                                <td><a class="view" href="" data-id="<?php echo $verified_req->group_id; ?>"><?php echo '#'.$verified_req->group_id.'-'.$verified_req->groupname; ?></a></td>
                                <td><?php echo $verified_req->institution; ?></td>
                                <td><?php if($this->session->userdata('category')=='WEB'||$this->session->userdata('category')=='PROG'){echo (int)80000+(int)$verified_req->group_id;}else{echo (int)125000+(int)$verified_req->group_id;} ?></td>
                                <td><img class="photo" src="<?php echo base_url();?>fileverifikasi/<?php echo $this->session->userdata('category'); ?>/<?php echo $verified_req->filename; ?>" width="150px" height="auto" data-zoom-image="<?php echo base_url();?>fileverifikasi/<?php echo $this->session->userdata('category'); ?>/<?php echo $verified_req->filename; ?>"></td>
                                <td><?php echo date('d M Y', strtotime($verified_req->request_at));?></td>
                                <td><?php echo $verified_req->note; ?></td>
                                <td><a href="<?php echo base_url();?>BackendAdm/verifyingGroup/<?php echo $verified_req->group_id;?>" class="btn btn-success btn-sm" onclick="return confirm('Anda Yakin ?')">Verifikasi</a></td>
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
          $(".photo").elevateZoom({zoomWindowPosition: 10, scrollZoom : true});
        });
      </script>
      <!--//HEADER WEBSITE-->
      <div id="footer">
         <p>&copy; Information Technology Creative Competition 2016 | <a href="http://tecart.id">Technology Artisan</a></p>
      </div>
      <!-- Modal -->
      <div class="modal fade" id="myModal" role="dialog">
         <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
               
            </div>
         </div>
      </div>
      <script>
         $(function(){
           $(document).on('click','.view',function(e){
             e.preventDefault();
             $("#myModal").modal('show');
             $.post
             (
               'BackendAdm/viewGroupMembers',
               {id:$(this).attr('data-id')},
               function(html)
               {
                 $(".modal-content").html(html);
               }   
             );
           });
           $(".modal").on("hidden.bs.modal", function(){
             $(".modal-body").html("");
           });
         });
      </script>
   </body>
</html>