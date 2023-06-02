<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?= (isset($blog_data) ? "Update" : "Add") ?> Blog</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
              <li class="breadcrumb-item active"><?= (isset($blog_data) ? "Update" : "Add") ?> Blog</li>
            </ol>
          </div>
        </div>
      </div>
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
                <h3 class="card-title"><?= (isset($blog_data) ? "Update" : "Add") ?> Blog</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="admin/dashboard/<?= (isset($blog_data) ? "edit_blog_request" : "add_blog_request") ?>" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <?php echo $this->session->flashdata('cat_msg'); ?>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <input type="hidden" name="id" value="<?= (isset($blog_data) ? $blog_data['id'] : "") ?>">
                    <input type="text" required name="title" class="form-control" id="exampleInputEmail1" placeholder="Enter Title" value="<?= (isset($blog_data) ? $blog_data['title'] : "") ?>">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Tag</label>
                    <input type="text" required name="tag" class="form-control" id="exampleInputEmail1" placeholder="Enter Tag" value="<?= (isset($blog_data) ? $blog_data['tag'] : "") ?>">
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Description</label>
                    <textarea class="form-control" placeholder="Comments(*)" type="text" name="description" id="description_desc">
                      <?= (isset($blog_data) ? $blog_data['description'] : "") ?>
                    </textarea>
                    <script>
                        CKEDITOR.replace('description_desc'); 
                        CKEDITOR.instances['description_desc'].on('change', function() {
                            /alert('value changed!!')/
                            CKEDITOR.instances['description_desc'].updateElement(); 
                        });
                    </script>
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
                  
                    <?php if(isset($blog_data)) { ?>
                      <img id="uploaded_img" src="<?= (isset($blog_data) ? $blog_data['image'] : "") ?>" height="200" width="200">
                    <?php } else { ?>
                      <img id="uploaded_img">
                      <?php } ?><br>

                    
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary"><?= (isset($blog_data) ? "Update" : "Add") ?></button>
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