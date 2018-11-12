

<section class="content">
	<div class="row">
		<!-- left column -->
		<div class="col-md-6">
			<!-- general form elements -->
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Add New Slider</h3>
				</div>
				<!-- /.box-header -->
				<!-- form start -->
				<form role="form" method="POST" action='<?php echo site_url('admin/slider/save_edit_slider')?>'> <div class="box-body">
                <input type="hidden" name="id" value='<?php echo $data[0]->id ?>'>
					<div class="form-group">
						<label for="exampleInputPassword1">Name</label>
						<input type="text" class="form-control" name='name' placeholder="" value='<?php echo $data[0]->name?>'>
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">Slug</label>
						<input type="text" class="form-control" name='slug' placeholder="" value='<?php echo $data[0]->slug?>'>
					</div>

					<!-- Color Picker -->
					<div class="form-group">
						<div id='list-category'>


							<div class='checkbox'>
								<label>
                                    <?php 
                                        if($data[0]->publish==0){
                                            echo "<input name='publish' class='id_category' type='checkbox' value='1'>";
                                        }else{
                                            echo "<input name='publish' class='id_category' type='checkbox' value='1' checked>";
                                        }
                                    ?>
									
									Publish
								</label>
							</div>

						</div>


						<!-- /.box-body -->

						<div class="box-footer">
							<button type="submit" class="btn btn-primary"><i class="fa fa-check" aria-hidden="true"></i> Submit</button>
							<a class='btn btn-success ' role='button' href='<?php echo site_url('admin/slider')?>'>Cancel</a>
						</div>
				</form>
			</div>
			<!-- /.box -->




			<!-- /.box -->

		</div>
		<!--/.col (left) -->
		<!-- right column -->

		<!--/.col (right) -->
	</div>
	<!-- /.row -->
</section>


