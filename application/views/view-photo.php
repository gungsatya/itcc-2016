<input type="hidden" name="id"/>
<div class="modal-header">
   <button type="button" class="close" data-dismiss="modal">&times;</button>
   <h4 class="modal-title">Photo - <?php echo $fullname;?></h4>
</div>
<div class="modal-body" align="center" >
   <img style="width:300px;height:auto" src="<?php echo base_url();?>userdata/<?php echo $photo;?>">
</div>
<div class="modal-footer">
   <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>