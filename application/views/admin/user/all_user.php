

<section class="content">
	<div class="row">
		<div class="col-xs-12">
		
			<!-- /.box -->

			<div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">User</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <thead><tr>
                  <th style="width: 10px">Username</th>
                  <th>Name</th>
                  <th>Email</th>
                  <td>Opsi</td>                 
                </tr>
               
                </thead>
              <tbody>
                <?php 
                foreach($data as $obj){
                  $url=site_url('admin/user/edit_user/'.$obj->id);                

                    echo"
                    <tr>
                        <td>$obj->user_login</td>
                        <td>$obj->display_name</td>

                        <td>".$obj->user_email." </td>
                        <td>
													<a title='edit Post' href='$url'  role='button' class='btn btn-warning btn-sm editBarang'><i class='fa fa-pencil'></i></a>
                         <button title='Delete User' triger='user/delete_user'data-toggle='modal' data-target='#edit' id='$obj->id' type='button' class='btn btn-danger btn-sm delete'><i class='fa fa-trash'></i> </button>
													
													</td>

                        
                    </tr>
                    
                    ";
                        }

                ?>

              </tbody></table>
            </div>
            <!-- /.box-body -->
           
          </div>
			<!-- /.box -->
		</div>
		<!-- /.col -->
	</div>
	<!-- /.row -->
</section>


