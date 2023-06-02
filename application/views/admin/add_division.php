<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?= (isset($division_data) ? "Update" : "Add") ?> Division</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
              <li class="breadcrumb-item active"><?= (isset($division_data) ? "Update" : "Add") ?> Division</li>
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
                <h3 class="card-title"><?= (isset($division_data) ? "Update" : "Add") ?> Division</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="admin/dashboard/<?= (isset($division_data) ? "edit_division_request" : "add_division_request") ?>" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <?php echo $this->session->flashdata('cat_msg'); ?>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Link</label>
                    <input type="hidden" name="id" value="<?= (isset($division_data) ? $division_data['id'] : "") ?>">
                    <input type="text" required name="link" class="form-control" id="exampleInputEmail1" placeholder="Enter Link" value="<?= (isset($division_data) ? $division_data['link'] : "") ?>">
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputFile">Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input id="uploadImage" type="file" accept="image/*" name="image" class="custom-file-input">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                      </div>
                    </div>
                  </div>
                  
                    <?php if(isset($division_data)) { ?>
                      <img id="uploaded_img" src="<?= (isset($division_data) ? $division_data['image'] : "") ?>" height="200" width="200">
                    <?php } else { ?>
                      <img id="uploaded_img">
                      <?php } ?><br>

                    
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary"><?= (isset($division_data) ? "Update" : "Add") ?></button>
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