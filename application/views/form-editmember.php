<form action="<?php echo base_url();?>Backend/editMember" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
   <input type="hidden" value="<?php echo $id;?>" name="id"/>
   <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Edit Informasi Anggota</h4>
   </div>
   <div class="modal-body">
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
            <input class="form-control" placeholder="ex. '081632111111'" name="contact" required="required" type="number" value="<?php echo $contact;?>">
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
         </div>
       </div>
   </div>
   <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      <input type="submit" value="Edit" class="btn btn-success">
   </div>
</form>