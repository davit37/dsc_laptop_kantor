


<section class="content">
	<div class="row">
		<div class="col-md-9">
			<div class="box box-info">
				<div class="box-header">
					<h3 class="box-title">
						Add New image
					</h3>


				</div>
				<!-- /.box-header -->
				<form method="POST" action='<?php echo site_url('admin/slider/save_new_sliderimage')?>'> <div class="box-body pad">
					<input type="hidden" name="id_slider" value="<?php echo $_GET['id']?>">
					<input class="form-control" type="text" placeholder="Enter Title" name="title"><br>



					<div class="input-group">
						<input type="text" class="form-control" placeholder="Recipient's username" aria-describedby="basic-addon2" name='image'
						 id="image_link">
						 <span  style="background: #009fff;color: white;" class=" btn btn-primary input-group-addon" role='button' id="basic-addon2" data-toggle="modal" data-target="#myModal"><i class='fa fa-search'></i> Upload</span>
					</div>

			</div>

			<div class="modal fade" id="myModal" tabindex="1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<iframe width="900" height="550" frameborder="0" src="<?php echo base_url('assets/')?>filemanager/dialog.php?type=1&field_id=image_link&akey=<?php echo $this->config->item('file_manager_key');?>">
						</iframe>
					</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</div>

			<div class="box-footer">
				<button type="submit"  class="btn btn-primary"><i class="fa fa-check" aria-hidden="true"></i> Save</button>
				<a class='btn btn-success ' role='button' href='<?php echo site_url('admin/all_slide/'.$_GET['id'])?>'>Cancel </a>
				 </div>
		 </form> </div> <!-- /.box -->


			</div>


			<!-- /.col-->
		</div>
	</div>
	<!-- ./row -->
</section>