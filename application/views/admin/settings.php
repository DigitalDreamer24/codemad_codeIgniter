<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Settings</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
              <li class="breadcrumb-item active">Settings</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Settings</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                    <?php echo $this->session->flashdata('cat_msg'); ?>
              <form role="form" action="admin/dashboard/<?= (isset($settings_data) ? "edit_settings_request" : "add_settings_request") ?>" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" required name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter Name" value="<?= (isset($settings_data) ? $settings_data['name'] : "") ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="hidden" name="id" value="<?= (isset($settings_data) ? $settings_data['id'] : "") ?>">
                    <input type="email" required name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Email" value="<?= (isset($settings_data) ? $settings_data['email'] : "") ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Contact</label>
                    <input type="text" required name="contact" class="form-control" id="exampleInputEmail1" placeholder="Enter Contact Number" value="<?= (isset($settings_data) ? $settings_data['contact'] : "") ?>">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Address</label>
                    <input type="text" required name="address" class="form-control" id="exampleInputEmail1" placeholder="Enter Address" value="<?= (isset($settings_data) ? $settings_data['address'] : "") ?>">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Facebook Link</label>
                    <input type="text" required name="facebook" class="form-control" id="exampleInputEmail1" placeholder="Enter Facebook Link" value="<?= (isset($settings_data) ? $settings_data['facebook'] : "") ?>">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Instagram Link</label>
                    <input type="text" required name="instagram" class="form-control" id="exampleInputEmail1" placeholder="Enter Instagram Link" value="<?= (isset($settings_data) ? $settings_data['instagram'] : "") ?>">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Twitter Link</label>
                    <input type="text" required name="twitter" class="form-control" id="exampleInputEmail1" placeholder="Enter Twitter Link" value="<?= (isset($settings_data) ? $settings_data['twitter'] : "") ?>">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Youtube Link</label>
                    <input type="text" required name="youtube" class="form-control" id="exampleInputEmail1" placeholder="Enter Youtube Link" value="<?= (isset($settings_data) ? $settings_data['youtube'] : "") ?>">
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputFile">Logo</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input id="uploadImage" type="file" accept="image/*" name="logo" class="custom-file-input">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                      </div>
                    </div>
                  </div>

                    <?php if(isset($settings_data)) { ?>
                      <img id="uploaded_img" src="<?= (isset($settings_data) ? $settings_data['logo'] : "") ?>" height="200" width="200">
                    <?php } else { ?>
                      <img id="uploaded_img">
                      <?php } ?><br>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

           

          </div>
          <!--/.col (left) -->
          <!-- right column -->
          
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>