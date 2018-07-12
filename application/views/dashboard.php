<!DOCTYPE html>
<html>
   <head>
      <title>Dashboard - ITCC 2016</title>
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
                        <h3>Data Peserta</h3>
                     </div>
                     <div class="box-body">
                        <div class="row">
                           <div class="col-md-6">
                              <div class="box-body-col" style="min-height:250px;">
                                 <h4>Data Tim</h4>
                                 <div class="tabel-container">
                                    <table class="table table-bordered table-responsive">
                                       <tbody>
                                          <tr>
                                             <td class="col-xs-4"><b>Kode</b></td>
                                             <td class="col-xs-8">#<?php echo $this->session->userdata('groupcode');?></td>
                                          </tr>
                                          <tr>
                                             <td><b>Nama Tim</b></td>
                                             <td><?php echo $this->session->userdata('groupname');?></td>
                                          </tr>
                                          <tr>
                                             <td><b>Asal Institusi</b></td>
                                             <td><?php echo $this->session->userdata('institution');?></td>
                                          </tr>
                                          <tr>
                                             <td><b>Status</b></td>
                                             <td>
                                                <?php if($verified=='N'){ ?>
                                                Belum Terverifikasi <i class="glyphicon glyphicon-remove" style="color:red"></i><br>
                                                <?php }elseif($verified=='Y'){ ?>
                                                Telah Terverifikasi <i class="glyphicon glyphicon-ok" style="color:green"></i>
                                                <?php } ?>
                                             </td>
                                          </tr>
                                       </tbody>
                                    </table>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="box-body-col" style="min-height:250px;">
                                 <h4>Notifikasi</h4>
                                 <div class="alert alert-success">
                                    <p style="font-weight:bold">Hai, <?php echo $this->session->userdata('fullname');?>.</p>
                                    <p style="text-align: justify;text-justify: inter-word;">Pastikan kamu sudah melengkapi data peserta, membayar dan memverifikasikan data ke panitia ITCC 2016. Salam hangat dari admin ITCC 2016. Semangat dan sukses ! </p>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="box-body-col" align="right">
                           <h4>Data Anggota Tim</h4>
                           <div class="tabel-container">
                              <table class="table table-bordered table-responsive table-striped">
                                 <thead>
                                    <tr>
                                       <th>Kartu Identitas</th>
                                       <th>Nomer Peserta</th>
                                       <th>Nama Lengkap</th>
                                       <th>Tanggal Lahir</th>
                                       <th>Email</th>
                                       <th>Nomer Kontak</th>
                                       <th>Veget</th>
                                       
                                       <th>Aksi</th>
                                     
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php foreach ($groupmembers as $groupmember) {?>
                                    <tr>
                                       <td><img class="photo" src="<?php echo base_url();?>userdata/<?php echo $groupmember->photo;?>" width="80px" height="auto" data-zoom-image="<?php echo base_url();?>userdata/<?php echo $groupmember->photo;?>"></td>
                                       <td><?php echo $groupmember->code; ?></td>
                                       <td><?php echo $groupmember->fullname; ?></td>
                                       <td><?php echo date('d-m-Y', strtotime($groupmember->birthday)); ?></td>
                                       <td><?php echo $groupmember->email; ?></td>
                                       <td><?php echo $groupmember->contact; ?></td>
                                       <td><?php if($groupmember->vegetarian=='Y'){echo "<span class='label label-success'>Ya</span>";}
                                       else{echo "<span class='label label-danger'>Tidak</span>";}?></td>
                                       
                                       <td><a class="btn btn-info btn-sm edit" title="Edit" style="margin:2px;" data-id="<?php echo $groupmember->id;?>"><i class="glyphicon glyphicon-pencil" data-toggle="modal" data-target="#myModal"></i></a> 
                                          <a href="<?php echo base_url();?>Backend/deleteMember/<?php echo $groupmember->id; ?>" class="btn btn-danger btn-sm" style="margin:2px;" title="Hapus" onclick="return confirm('Anda Yakin menghapus data ini?')" ><i class="glyphicon glyphicon-trash"></i></a>
                                       </td>
                                       
                                    </tr>
                                    <?php } ?>
                                 </tbody>
                              </table>
                           </div>
                           <br>
                           <?php if($verified=='N'){ echo $buttonAdd;} ?>
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
      <script type="text/javascript">
        $(document).ready(function() {
          $('.data').DataTable();
          $(".photo").elevateZoom({zoomWindowPosition: 16, scrollZoom : true});
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
      <script>
         $(function(){
           $(document).on('click','.edit',function(e){
             e.preventDefault();
             $("#myModal").modal('show');
             $.post
             (
               'Backend/viewEditMember',
               {id:$(this).attr('data-id')},
               function(html)
               {
                 $(".modal-content").html(html);
               }   
             );
           });
            $(document).on('click','.add',function(e){
             e.preventDefault();
             $("#myModal").modal('show');
             $.post
             (
               'Backend/viewAddMember',
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