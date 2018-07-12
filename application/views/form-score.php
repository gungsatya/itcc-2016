<!DOCTYPE html>
<html>
   <head>
      <title>Form Penilaian - ITCC 2016</title>
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
      <style type="text/css">
        .category{
          text-align: center;
          font-weight: bold;
          font-style: italic;
          background-color : #E0E0E0;
        }
      </style>
      <!--Swal-->
      <script src="<?php echo base_url();?>assets/swal/dist/sweetalert.min.js"></script> 
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/swal/dist/sweetalert.css">
   </head>
   <body>
      <div class="preloader"></div>
      <div id="navibar">
         <div class="container">
            <div class="navi-icon pull-left">
               <img src="<?php echo base_url();?>assets/images/ti.png" class="logo-by" title="Jurusan Teknologi Informasi">
               <img src="<?php echo base_url();?>assets/images/logo2.png" class="logo-by" title="ITCC 2016">
            </div>
            <div class="pull-right dashnav">
               <a href="<?php echo base_url();?>dashboard-juri" title="Dashboard"><i class="glyphicon glyphicon-home"></i></a>
               <a href="<?php echo base_url();?>AuthJury/logout" title="Keluar"><i class="glyphicon glyphicon-log-out" title="Keluar" alt="Keluar"></i></a>
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
                        <h3>Data Karya Peserta</h3>
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
                                             <td class="col-sm-4"><b>Nama Tim</b></td>
                                             <td class="col-sm-8"><?php echo $group_info['groupname'];?></td>
                                          </tr>
                                          <tr>
                                             <td><b>Asal Institusi</b></td>
                                             <td><?php echo $group_info['institution'];?></td>
                                          </tr>
                                          <tr>
                                             <td><b>Judul Karya</b></td>
                                             <td><?php echo $object_info['title'];?></td>
                                          </tr>
                                       </tbody>
                                    </table>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="box-body-col" style="min-height:250px;">
                                 <h4>Data Anggota Tim</h4>
                                 <div class="tabel-container">
                                    <table class="table table-bordered table-responsive">
                                      <thead>
                                        <tr>
                                          <th class="col-sm-4">No. Peserta</th>
                                          <th class="col-sm-8">Nama</th>
                                        </tr>
                                      </thead>
                                       <tbody>
                                          <?php foreach ($group_members as $group_member) {?>
                                          <tr>
                                             <td><?php echo $group_member->code;?></td>
                                             <td><?php echo $group_member->fullname;?></td>
                                          </tr>
                                          <?php } ?>
                                       </tbody>
                                    </table>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="box-body-col" align="right">
                           <h4>Form Penilaian Peserta</h4>
                           <div class="alert alert-success" role="alert" align="center">
                              <p><b>Perhatian</b></p>
                              <p>Sebelum mengisi form penilaian, harap untuk membuka karya peserta dengan menekan tombol dibawah ini.</p>
                              <br>
                              <a href="<?php echo base_url(); ?>object/<?php echo $this->session->userdata('category'); ?>/<?php echo $object_info['link'];?>" class="btn btn-primary" target="_blank">Proposal</a> <a href="<?php echo base_url(); ?>/object/<?php echo $this->session->userdata('category'); ?>/<?php echo $object_info['etc'];?>" class="btn btn-info" target="_blank">Lampiran</a>
                          </div>
                          <?php echo $errormsg; ?>
                              <form action="<?php echo base_url();?>form-penilaian/<?php echo $object_id;?>" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8" id="form-penilaian">
                              <input type="hidden" name="object_id" value="<?php echo $object_id;?>">
                              <table class="table table-bordered table-striped table-hover table-responsive">
                                <thead>
                                  <tr>
                                    <th class="col-xs-1 col-sm-1">No.</th>
                                    <th class="col-xs-8 col-sm-9">Aspek Penilaian</th>
                                    <th class="col-xs-3 col-sm-2">Nilai</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td colspan="3" class="category">Kesesuaian</td>
                                  </tr>
                                  <tr>
                                    <td>a</td>
                                    <td>Kesesuaian dengan tema “Empower People With Smart Green ICT”</td>
                                    <td>
                                      <input type="hidden" name="form[]" value="a">
                                      <input type="number" name="score[]" class="form-control" placeholder="Maks. 35" min="1" max="35" required="required" value="<?php echo $scored['a'];?>">
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>b</td>
                                    <td>Kreativitas, inovasi dan ide usaha yang ditawarkan”</td>
                                    <td>
                                      <input type="hidden" name="form[]" value="b">
                                      <input type="number" name="score[]" class="form-control" placeholder="Maks. 40" min="1" max="40" required="required" value="<?php echo $scored['b'];?>">
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>c</td>
                                    <td>Sistematika penyajian dan detail pembahasan secara keseluruhan</td>
                                    <td>
                                      <input type="hidden" name="form[]" value="c">
                                      <input type="number" name="score[]" class="form-control" placeholder="Maks. 35" min="1" max="35" required="required" value="<?php echo $scored['c'];?>">
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="3" class="category">Produk/Layanan</td>
                                  </tr>
                                  <tr>
                                    <td>d</td>
                                    <td>Memaparkan dengan jelas produk/layanan yang ditawarkan </td>
                                    <td>
                                      <input type="hidden" name="form[]" value="d">
                                      <input type="number" name="score[]" class="form-control" placeholder="Maks. 25" min="1" max="25" required="required" value="<?php echo $scored['d'];?>">
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>e</td>
                                    <td>Produk/layanan yang sangat menarik/atraktif/up-to-date</td>
                                    <td>
                                      <input type="hidden" name="form[]" value="e">
                                      <input type="number" name="score[]" class="form-control" placeholder="Maks. 25" min="1" max="25" required="required" value="<?php echo $scored['e'];?>">
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>f</td>
                                    <td>Value proposition yang kuat kepada end-user/consumer </td>
                                    <td>
                                      <input type="hidden" name="form[]" value="f">
                                      <input type="number" name="score[]" class="form-control" placeholder="Maks. 25" min="1" max="25" required="required" value="<?php echo $scored['f'];?>">
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="3" class="category">Pasar(Market)</td>
                                  </tr>
                                  <tr>
                                    <td>g</td>
                                    <td>Mampu mengidentifikasi peluang pasar yang besar</td>
                                    <td>
                                      <input type="hidden" name="form[]" value="g">
                                      <input type="number" name="score[]" class="form-control" placeholder="Maks. 25" min="1" max="25" required="required" value="<?php echo $scored['g']?>">
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>h</td>
                                    <td>Mampu mengidentikasi kebutuhan customer dengan tepat</td>
                                    <td>
                                      <input type="hidden" name="form[]" value="h">
                                      <input type="number" name="score[]" class="form-control" placeholder="Maks. 25" min="1" max="25" required="required" value="<?php echo $scored['h'];?>">
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>i</td>
                                    <td>Mampu menentukan target market dengan tepat</td>
                                    <td>
                                      <input type="hidden" name="form[]" value="i">
                                      <input type="number" name="score[]" class="form-control" placeholder="Maks. 25" min="1" max="25" required="required" value="<?php echo $scored['i'];?>">
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>j</td>
                                    <td>Mampu mengenali competitor</td>
                                    <td>
                                      <input type="hidden" name="form[]" value="j">
                                      <input type="number" name="score[]" class="form-control" placeholder="Maks. 25" min="1" max="25" required="required" value="<?php echo $scored['j'];?>">
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="3" class="category">Strategi Bisnis</td>
                                  </tr>
                                  <tr>
                                    <td>k</td>
                                    <td>Business plan yang baik dan sustainable</td>
                                    <td>
                                      <input type="hidden" name="form[]" value="k">
                                      <input type="number" name="score[]" class="form-control" placeholder="Maks. 25" min="1" max="25" required="required" value="<?php echo $scored['k'];?>">
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>l</td>
                                    <td>Strategi penjualan dan marketing yang berkualitas</td>
                                    <td>
                                      <input type="hidden" name="form[]" value="l">
                                      <input type="number" name="score[]" class="form-control" placeholder="Maks. 25" min="1" max="25" required="required" value="<?php echo $scored['l'];?>">
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>m</td>
                                    <td>Melakukan financial forecast dan planning dengan benar</td>
                                    <td>
                                      <input type="hidden" name="form[]" value="m">
                                      <input type="number" name="score[]" class="form-control" placeholder="Maks. 25" min="1" max="25" required="required" value="<?php echo $scored['m'];?>">
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>n</td>
                                    <td>Mampu mengidentifikasi key risks/mitigations</td>
                                    <td>
                                      <input type="hidden" name="form[]" value="n">
                                      <input type="number" name="score[]" class="form-control" placeholder="Maks. 25" min="1" max="25" required="required" value="<?php echo $scored['n'];?>">
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="3" class="category">Anggota Perusahaan</td>
                                  </tr>
                                  <tr>
                                    <td>o</td>
                                    <td>Perusahaan yang memiliki anggota yang solid yang memiliki kualifikasi dan kompetensi yang tepat untuk menjadikan bisnis ini sukses</td>
                                    <td>
                                      <input type="hidden" name="form[]" value="o">
                                      <input type="number" name="score[]" class="form-control" placeholder="Maks. 20" min="1" max="20" required="required" value="<?php echo $scored['o'];?>">
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="3" class="category">Daya Tarik (Traction)</td>
                                  </tr>
                                  <tr>
                                    <td>p</td>
                                    <td>Hasil/pekerjaan yang telah dilakukan hingga saat ini</td>
                                    <td>
                                      <input type="hidden" name="form[]" value="p">
                                      <input type="number" name="score[]" class="form-control" placeholder="Maks. 25" min="1" max="25" required="required" value="<?php echo $scored['p'];?>">
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>q</td>
                                    <td>Hasil penjualan, jumlah pelanggan/user, surat kerjasama, kemitraan</td>
                                    <td>
                                      <input type="hidden" name="form[]" value="q">
                                      <input type="number" name="score[]" class="form-control" placeholder="Maks. 25" min="1" max="25" required="required" value="<?php echo $scored['q'];?>">
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="3" class="category">Poster</td>
                                  </tr>
                                  <tr>
                                    <td>r</td>
                                    <td>Poster yang dibuat mudah dimengerti oleh masyarakat</td>
                                    <td>
                                      <input type="hidden" name="form[]" value="r">
                                      <input type="number" name="score[]" class="form-control" placeholder="Maks. 15" min="1" max="15" required="required" value="<?php echo $scored['r'];?>">
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>s</td>
                                    <td>Poster memberikan informasi yang berguna bagi masyarakat</td>
                                    <td>
                                      <input type="hidden" name="form[]" value="s">
                                      <input type="number" name="score[]" class="form-control" placeholder="Maks. 15" min="1" max="15" required="required" value="<?php echo $scored['s'];?>">
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>t</td>
                                    <td>Poster bersifat persuasif/mengajak masyarakat sesuai dengan ide yang dituangkan di dalam poster</td>
                                    <td>
                                      <input type="hidden" name="form[]" value="t">
                                      <input type="number" name="score[]" class="form-control" placeholder="Maks. 15" min="1" max="15" required="required" value="<?php echo $scored['t'];?>">
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                              <input type="submit" class="btn btn-lg btn-success" value="Submit" onclick="return confirm('Apakah anda yakin ?')">
                            </form>  
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
   </body>
</html>