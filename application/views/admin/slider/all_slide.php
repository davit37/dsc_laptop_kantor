<?php 
$this->load->helper('function');

?>

<section class="content">
	<div class="row">
	

		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
          <h3 class="box-title"></h3>
          <a role="button" style='margin-left:10px' id='btn-simpan' href='<?php echo site_url("admin/slider/new_slider_image?id=").$id?>' class="btn btn-info btn-sm pull-Left">Add New</a>
				</div>
				<!-- /.box-header -->
			
        
        <div class="box-body">
              <table id="table_id" class="table table-bordered table-hover">
                <thead>
                <tr>
                <th width='50%'>Title</th>
								<th width='30%'>Image</th>
								
              
                <th width='20%'></th>
                </tr>
                </thead>
                <tbody>
                <?php 
                foreach($data as $obj){
                  $url=site_url('admin/slider/edit_sliderimage/'.$obj->id);
                
                    echo"
                    <tr>
                        <td>$obj->title</td>
                        <td><img src='$obj->image' style='width: 200px;margin: 0 auto;align-items: center;'></td>

                        <td>
                      
					     <a title='edit Post' href='$url'  role='button' class='btn btn-warning btn-sm editBarang'><i class='fa fa-pencil'></i></a>
                         <button title='Delete Post' triger='slider/delete_sliderimage' data-toggle='modal' data-target='#edit' id='$obj->id' type='button' class='btn btn-danger btn-sm delete'><i class='fa fa-trash'></i> </button>
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



