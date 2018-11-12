


<section class="content">
	<div class="row">
		<div class="col-md-9">
			<div class="box box-info">
				<div class="box-header">
					<h3 class="box-title">
						Add New Post
					</h3>
					<a role="button" href='<?php echo site_url('admin/post/all_post')?>' id='btn-simpan' class="btn btn-info pull-right"><i class='fa fa-mail-reply '></i> Back</a>



				</div>
				<!-- /.box-header -->
				<form method="POST" action='<?php echo site_url('admin/save_new_post')?>'> <div class="box-body pad">

					<input class="form-control" type="text" placeholder="Enter Title" id="title"><br>
					<textarea id="editor1" name="editor1" rows="10" cols="80" style="visibility: hidden; display: none;">  </textarea><br>
				
					<div class="input-group">
					<input type="text" class="form-control" placeholder="Recipient's username" aria-describedby="basic-addon2" name='image' id="image_link" readonly>
					<span  style="background: #009fff;color: white;" class=" btn btn-primary input-group-addon" role='button' id="basic-addon2" data-toggle="modal" data-target="#myModal"><i class='fa fa-search'></i> Upload</span>
					</div>
			</div>

			<div class="modal fade" id="myModal" tabindex="1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<iframe width="765" height="550" frameborder="0" src="<?php echo base_url('assets/')?>filemanager/dialog.php?type=1&field_id=image_link&akey=<?php echo $this->config->item('file_manager_key')?> ">
						</iframe>
					</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</div>

			<div class="box-footer">
				<button type="button" id='btn-simpan' class="btn btn-primary"><i class="fa fa-check" aria-hidden="true"></i> Save</button>
			</div>

		</div>
		<!-- /.box -->


	</div>

	<div class="col-md-3">


		<!-- /.box -->

		<div class="box box-info">
			<div class="box-header">
				<h3 class="box-title">Category</h3>
			</div>
			<div class="box-body">
				<!-- Color Picker -->
				<div class="form-group">
					<div id='list-category'>
						<?php 
						foreach($data as $obj){
												

								echo"
								<div class='checkbox'>
									<label>
										<input value='$obj->id' class='id_category' type='checkbox'>
										$obj->name
									</label>
								</div>
								
								";
										}

						?>
					</div>


					</form>
					<input type="text" class="form-control " placeholder="Add New Category" id="name_of_category">
				</div>

				<!-- /.form group -->


			</div>
			<!-- /.box-body -->
			<div class="box-footer">
				<button type="button" class="btn btn-primary" id="btn-kategori"> <i class="fa fa-check" aria-hidden="true"></i>Save</button>
			</div>
		</div>
		<!-- /.box -->

	</div>
	<!-- /.col-->
	</div>
	<!-- ./row -->
</section>

