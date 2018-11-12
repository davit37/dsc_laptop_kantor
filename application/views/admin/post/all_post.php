<?php 
$this->load->helper('function');

?>

<section class="content">
	<div class="row">
	

		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
          <h3 class="box-title">ALL POST</h3>
          <a role="button" style='margin-left:10px' id='btn-simpan' href='<?php echo site_url("admin/post")?>' class="btn btn-info btn-sm pull-Left"><i class='fa  fa-plus'></i> Add New</a>
				</div>
				<!-- /.box-header -->
			
        
        <div class="box-body">
              <table id="table_id" class="table table-bordered table-hover">
                <thead>
                <tr>
                <th width='40%'>Title</th>
								<th>Author</th>
								<th width='15%'>Categories</th>
                <th>Date</th>
                <th></th>
                </tr>
                </thead>
                <tbody>
                <?php 
                foreach($data as $obj){
                  $url=site_url('admin/post?id='.$obj->id);    
                  $waktu=konfersi_waktu($obj->create_at);            

                    echo"
                    <tr>
                        <td>$obj->title</td>
                        <td>$obj->display_name</td>
                        <td> $obj->category_name</td>
                        <td>".$waktu." </td>
                    
                        <td>
					            	 <a title='edit Post' href='$url'  role='button' class='btn btn-warning btn-sm editBarang'><i class='fa fa-pencil'></i></a>
                         <button title='Delete Post' triger='post/delete_post' data-toggle='modal' data-target='#edit' id='$obj->id' type='button' class='btn btn-danger btn-sm delete'><i class='fa fa-trash'></i> </button>
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


