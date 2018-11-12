<?php 
$this->load->helper('function');

?>

<section class="content">
	<div class="row">
	

		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
          <h3 class="box-title">ALL POST</h3>
          <a role="button" style='margin-left:10px' id='btn-simpan' href='<?php echo site_url("admin/slider/new_slider")?>' class="btn btn-info btn-sm pull-Left">Add New</a>
				</div>
				<!-- /.box-header -->
			
        
        <div class="box-body">
              <table id="table_id" class="table table-bordered table-hover">
                <thead>
                <tr>
                <th width='40%'>Name</th>
								<th>Slug</th>
								
                <th>Date</th>
                <th></th>
                </tr>
                </thead>
                <tbody>
                <?php 
                foreach($data as $obj){
                  $url=site_url('admin/slider/edit_slider/'.$obj->id);
                  $view=site_url('admin/slider/all_slide/'.$obj->id);    
                  $waktu=konfersi_waktu($obj->create_at);            

                    echo"
                    <tr>
                        <td>$obj->name</td>
                        <td>$obj->slug</td>

                        <td>".$waktu." </td>
                    
                        <td>
                        <a title='view' href='$view'  role='button' class='btn btn-info btn-sm '><i class='fa  fa-eye'></i></a>
					              <a title='edit Post' href='$url'  role='button' class='btn btn-warning btn-sm editBarang'><i class='fa fa-pencil'></i></a>
                        <button title='Delete Post' triger='slider/delete_slider' data-toggle='modal' data-target='#edit' id='$obj->id' type='button' class='btn btn-danger btn-sm delete'><i class='fa fa-trash'></i> </button>
	                    </td>

                    </tr>
                    
                    ";
                        }

                ?>
                </tbody>
                
              </table>
            </div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->


			<!-- /.box -->
		</div>
		<!-- /.col -->
	</div>
	<!-- /.row -->
</section>



