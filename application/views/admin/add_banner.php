<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?= (isset($banner_data) ? "Update" : "Add") ?> Banner</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
              <li class="breadcrumb-item active"><?= (isset($banner_data) ? "Update" : "Add") ?> Banner</li>
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
                <h3 class="card-title"><?= (isset($banner_data) ? "Update" : "Add") ?> Banner</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="admin/dashboard/<?= (isset($banner_data) ? "edit_banner_request" : "add_banner_request") ?>" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <?php echo $this->session->flashdata('cat_msg'); ?>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Banner Title</label>
                    <input type="hidden" name="id" value="<?= (isset($banner_data) ? $banner_data['id'] : "") ?>">
                    <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="Enter Title" value="<?= (isset($banner_data) ? $banner_data['title'] : "") ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Banner Heading</label>
                    <input type="text" name="description" class="form-control" id="exampleInputEmail1" placeholder="Enter Description" value="<?= (isset($banner_data) ? $banner_data['description'] : "") ?>">
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputFile">Banner Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input id="uploadImage" type="file" accept="image/*" name="image" class="custom-file-input" required="">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                      </div>
                    </div>
                  </div>
                  
                    <?php if(isset($banner_data)) { ?>
                      <img id="uploaded_img" src="<?= (isset($banner_data) ? $banner_data['image'] : "") ?>" height="200" width="200">
                    <?php } else { ?>
                      <img id="uploaded_img">
                      <?php } ?><br>

                    
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary"><?= (isset($banner_data) ? "Update" : "Add") ?></button>
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