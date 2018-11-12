<section class="content">

	<div class="row">
		<div class="col-md-9">
			<div class="box box-info">

				<ul class="nav nav-tabs">
					<li class="active"><a data-toggle="tab" href="#seo">Seo</a></li>
					<li><a data-toggle="tab" href="#logo">Logo</a></li>
					<li><a data-toggle="tab" href="#menu2">Menu 2</a></li>
				</ul>

				<div class="tab-content">
					<div id="seo" class="tab-pane fade in active">
						<div class='row'>
							<div class="col-md-9">
								<div class="box-body">

									<?php if($this->session->flashdata('msg')): ?>
									<p>
										<?php echo $this->session->flashdata('msg'); ?>
									</p>
									<?php endif; ?>
									<form role="form" method="POST" action='<?php echo site_url('admin/settings/save_seo')?>'> <?php foreach($seo
									 as $obj){ $name=ucwords(implode(" ",explode('_',$obj->code)));
									echo" <div class='form-group'>
										<label for='exampleInputEmail1'>$name</label>
										<input type='hidden' name='id[]' value='$obj->id'>
										<input type='text' class='form-control' name='value[]' placeholder='' value='$obj->value'>
								</div>
								";

								}

								?>




								<div class="box-footer">
									<button type="submit" class="btn btn-primary"><i class="fa fa-check" aria-hidden="true"></i> Save</button>
								</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<div id="logo" class="tab-pane fade">
				<div class='row'>
							<div class="col-md-9">
								<div class="box-body">

									<?php if($this->session->flashdata('logo')): ?>
									<p>
										<?php echo $this->session->flashdata('logo'); ?>
									</p>
									<?php endif; ?>
									<form role="form" method="POST" action='<?php echo site_url('admin/settings/save_new_logo')?>'> <?php foreach($logo
									 as $obj){ $name=ucwords(implode(" ",explode('_',$obj->name)));
									echo" 	
									<label for='exampleInputEmail1'>$name</label>
									<div class='input-group'>
									<input type='hidden' name='id' value='$obj->id'>
									<input type='text' readonly class='form-control' placeholder='Recipient's username' aria-describedby='basic-addon2' name='path'
									 id='image_link' value='$obj->path'>
									 <span  style='background: #009fff;color: white;' class=' btn btn-primary input-group-addon' role='button' id='basic-addon2' data-toggle='modal' data-target='#myModal'><i class='fa fa-search'></i> Upload</span>
								</div>
								<br>

								<img src='$obj->path' style='width:200px;height:150px;     border-radius: 10px;'>
								";

								}

								?>


								</div>

								<div class="box-footer">
									<button type="submit" class="btn btn-primary"><i class="fa fa-check" aria-hidden="true"></i> Save</button>
								</div>
								</form>
							</div>
						</div>
				</div>
				<div id="menu2" class="tab-pane fade">
					<h3>Menu 2</h3>
					<p>Some content in menu 2.</p>
				</div>
			</div>



		</div>
		<!-- /.box -->

		
		<div class="modal fade" id="myModal" tabindex="1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<iframe width="900" height="550" frameborder="0" src="<?php echo base_url('assets/')?>filemanager/dialog.php?type=1&field_id=image_link&akey=<?php echo $this->config->item('file_manager_key');?>">
						</iframe>
					</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</div>


	</div>
	</div>

</section>