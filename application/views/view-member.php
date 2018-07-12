<input type="hidden" name="id"/>
<div class="modal-header">
   <button type="button" class="close" data-dismiss="modal">&times;</button>
   <h4 class="modal-title">Anggota Team</h4>
</div>
<div class="modal-body">
   <table class="table table-bordered table-responsive data">
      <thead>
         <tr>
            <th>Kartu Identitas</th>
            <th>Nama Lengkap</th>
            <th>Tanggal Lahir</th>
            <th>Email</th>
            <th>Nomer Kontak</th>
         </tr>
      </thead>
      <tbody>
         <?php foreach ($groupmembers as $groupmember) {?>
         <tr>
            <td>
               <a target="_blank" href="<?php echo base_url();?>userdata/<?php echo $groupmember->photo;?>">
                  <img class="photo" src="<?php echo base_url();?>userdata/<?php echo $groupmember->photo;?>" width="250px" height="auto">
               </a>
            </td>
            <td><?php echo $groupmember->fullname; ?></td>
            <td><?php echo date('d-m-Y', strtotime($groupmember->birthday)); ?></td>
            <td><?php echo $groupmember->email; ?></td>
            <td><?php echo $groupmember->contact; ?></td>
         </tr>
         <?php } ?>
      </tbody>
   </table>
</div>
<div class="modal-footer">
   <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>