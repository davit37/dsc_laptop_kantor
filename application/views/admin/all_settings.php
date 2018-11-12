<?php include('header.php')?>

<section class="content">

	<div class="row">
		<div class="col-md-9">
			<div class="box box-info">

				<ul class="nav nav-tabs">
					<li class="active"><a data-toggle="tab" href="#seo">Seo</a></li>
					<li><a data-toggle="tab" href="#menu1">Menu 1</a></li>
					<li><a data-toggle="tab" href="#menu2">Menu 2</a></li>
				</ul>

				<div class="tab-content">
					<div id="seo" class="tab-pane fade in active">
						<div class='row'>
							<div class="col-md-12">
								
									<div class="box-header with-border">
										<h3 class="box-title">Seo Settings</h3>
									</div>
									<!-- /.box-header -->
									<div class="box-body">
										<table class="table table-bordered">
											<tbody>
												<tr>
													
													<th>Code</th>
													<th width='40%'>Val</th>
													<th width='20%'></th>

												</tr>
                                                <?php 
                                                    foreach($seo as $obj){
														$url=site_url('admin/edit_seo/'.$obj->id);  

                                                        echo"
                                                        <tr>
                                                            <td>$obj->code</td>
                                                            <td>$obj->value</td>
															<td>
															<a title='edit Post' href='$url'  role='button' class='btn btn-warning btn-sm editBarang'><i class='fa fa-pencil'></i></a>
												<button title='Delete Seo Settings' triger='delete_seo' data-toggle='modal' data-target='#edit' id='$obj->id' type='button' class='btn btn-danger btn-sm delete'><i class='fa fa-trash'></i> </button>
											   </td>
                                                        
                                                            

                                                            
                                                        </tr>
                                                        
                                                        ";
                                                            }

                                                    ?>
												
											</tbody>
										</table>
									</div>
									<!-- /.box-body -->
									<div class="box-footer clearfix">
										<ul class="pagination pagination-sm no-margin pull-right">
											<li><a href="#">«</a></li>
											<li><a href="#">1</a></li>
											<li><a href="#">2</a></li>
											<li><a href="#">3</a></li>
											<li><a href="#">»</a></li>
										</ul>
									</div>
							
							</div>
						</div>

					</div>
					<div id="menu1" class="tab-pane fade">
						<h3>Menu 1</h3>
						<p>Some content in menu 1.</p>
					</div>
					<div id="menu2" class="tab-pane fade">
						<h3>Menu 2</h3>
						<p>Some content in menu 2.</p>
					</div>
				</div>



			</div>
			<!-- /.box -->


		</div>
	</div>

</section>
<?php include('footer.php')?>
