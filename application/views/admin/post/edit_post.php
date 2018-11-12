<?php 
$this->load->helper('function');
?>


<section class="content">
	<div class="row">
		<div class="col-md-9">
			<div class="box box-info">
				<div class="box-header">
					<h3 class="box-title">
						Edit
					</h3>
					<a role="button" id='btn-simpan' href='<?php echo site_url('admin/post/all_post')?>' class="btn btn-info pull-right"><i class='fa fa-mail-reply '></i> Back</a>
					<!-- tools box -->
					
					<!-- /. tools -->
				</div>
				<!-- /.box-header -->
				<form method="POST" action='<?php echo site_url('admin/save_new_post')?>'> <div class="box-body pad">
                    <input type="hidden" id="id-post" value='<?php echo $post[0]->id?>'>
					<input class="form-control" type="text" placeholder="Enter Title" id="title" value='<?php echo $post[0]->title?>'><br>
					<textarea id="editor1" name="editor1" rows="10" cols="80" style="visibility: hidden; display: none;"><?php echo $post[0]->content?>  </textarea> <br>
					<div class="input-group">
					<input type="text" class="form-control" placeholder="Recipient's username" aria-describedby="basic-addon2" name='image' id="image_link" value='<?php echo $post[0]->image?>'>
					<span  style="background: #009fff;color: white;" class=" btn btn-primary input-group-addon" role='button' id="basic-addon2" data-toggle="modal" data-target="#myModal"><i class='fa fa-search'></i> Upload</span>
					</div>
					<br>


					<div class='col-md-6'>Create At  <strong><?php echo konfersi_waktu($post[0]->create_at)?></strong></div>
					<div class='col-md-6'>Modify At  <strong><?php echo konfersi_waktu($post[0]->modify_at)?></strong></div>
			</div>

			<div class="modal fade" id="myModal" tabindex="1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<iframe width="900" height="550" frameborder="0" src="<?php echo base_url('assets/')?>filemanager/dialog.php?type=1&field_id=image_link&akey=<?php echo $this->config->item('file_manager_key')?> ">
						</iframe>
					</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</div>

			<div class="box-footer">
				<button type="button" id='btn-edit' class="btn btn-primary"><i class="fa fa-check" aria-hidden="true"></i> Save</button>
			</div>
			
		</div>
		<!-- /.box -->


	</div>

	<div class="col-md-3">


		<!-- /.box -->

		<div class="box box-info">
			<div class="box-header">
				<h3 class="box-title">Catrgory</h3>
			</div>
			<div class="box-body">
				<!-- Color Picker -->
				<div class="form-group">
				<div id='list-category'>
				<?php 
						$i=0;

						foreach($data as $obj){
							$str=$obj->id;
							
							if (in_array($str, array_column($check_category, 'category_id'))) {
								echo"
								<div class='checkbox'>
									<label>
										<input value='$obj->id' class='id_category' type='checkbox' checked>
										$obj->name
									</label>
								</div>
								
								";
							}else{
								echo"
								<div class='checkbox'>
									<label>
										<input value='$obj->id' class='id_category' type='checkbox'>
										$obj->name
									</label>
								</div>
								
								";
							}
							$i++;								
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
				<button type="button" class="btn btn-primary" id="btn-kategori"><i class="fa fa-check" aria-hidden="true"></i> Save</button>
			</div>
		</div>
		<!-- /.box -->

	</div>
	<!-- /.col-->
	</div>
	<!-- ./row -->
</section>

