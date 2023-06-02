<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>About Us</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
              <li class="breadcrumb-item active">About Us</li>
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
                <h3 class="card-title">About Us</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="admin/dashboard/<?= (isset($about_data) ? "edit_about_request" : "add_about_request") ?>" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <?php echo $this->session->flashdata('cat_msg'); ?>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <input type="hidden" name="id" value="<?= (isset($about_data) ? $about_data['id'] : "") ?>">
                    <input type="text" required name="title" class="form-control" id="exampleInputEmail1" placeholder="Enter Title" value="<?= (isset($about_data) ? $about_data['title'] : "") ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Description 1</label>
                    <textarea class="form-control" placeholder="Comments(*)" type="text" name="description1" id="description1_desc">
                      <?= (isset($about_data) ? $about_data['description1'] : "") ?>
                    </textarea>
                    <script>
                        CKEDITOR.replace('description1_desc'); 
                        CKEDITOR.instances['description1_desc'].on('change', function() {
                            /alert('value changed!!')/
                            CKEDITOR.instances['description1_desc'].updateElement(); 
                        });
                    </script>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Description 2</label>
                    <textarea class="form-control" placeholder="Comments(*)" type="text" name="description2" id="description2_desc">
                      <?= (isset($about_data) ? $about_data['description2'] : "") ?>
                    </textarea>
                    <script>
                        CKEDITOR.replace('description2_desc'); 
                        CKEDITOR.instances['description2_desc'].on('change', function() {
                            /alert('value changed!!')/
                            CKEDITOR.instances['description2_desc'].updateElement(); 
                        });
                    </script>
                  </div>
                  <br>

                    
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