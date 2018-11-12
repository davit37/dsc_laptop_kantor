

<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Change Password</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST" action='<?php echo site_url('admin/save_new_user')?>'>
              <div class="box-body">
              
                <div class="form-group">
                  <label for="exampleInputPassword1">Current Password</label>
                  <input type="password" class="form-control" name='user_password' placeholder="Password">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">New Password</label>
                  <input type="password" class="form-control" name='user_password' placeholder="Password">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Confirm New Password</label>
                  <input type="password" class="form-control" name='user_password' placeholder="Password">
                </div>
               
            
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
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


