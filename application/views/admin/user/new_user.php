

<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add New User</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
            <form role="form" method="POST" action='<?php echo site_url('admin/user/save_new_user')?>'>
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Name</label>
                  <input type="text" class="form-control" name='display_name' placeholder="">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Username</label>
                  <input type="text" class="form-control" name='user_login' id="exampleInputPassword1" >
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" name='user_password' placeholder="Password">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" class="form-control" name='user_email' placeholder="Enter email">
                </div>
               
            
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary"><i class="fa fa-check" aria-hidden="true"></i> Save</button>
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

