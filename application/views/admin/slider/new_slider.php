

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
				<form role="form" method="POST" action='<?php echo site_url('admin/slider/save_new_slider')?>'> <div class="box-body">

					<div class="form-group">
						<label for="exampleInputPassword1">Name</label>
						<input type="text" class="form-control" name='name' placeholder="">
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">Slug</label>
						<input type="text" class="form-control" name='slug' placeholder="">
					</div>

					<!-- Color Picker -->
					<div class="form-group">
						<div id='list-category'>


							<div class='checkbox'>
								<label>
									<input name='publish' class='id_category' type='checkbox' value='1'>
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


