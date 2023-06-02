<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?= (isset($testimonial_data) ? "Update" : "Add") ?> Testimonial</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
              <li class="breadcrumb-item active"><?= (isset($testimonial_data) ? "Update" : "Add") ?> Testimonial</li>
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
                <h3 class="card-title"><?= (isset($testimonial_data) ? "Update" : "Add") ?> Testimonial</h3>
              </div>
              <form role="form" action="admin/dashboard/<?= (isset($testimonial_data) ? "edit_testimonial_request" : "add_testimonial_request") ?>" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <?php echo $this->session->flashdata('cat_msg'); ?>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Testimonial Name</label>
                    <input type="hidden" name="id" value="<?= (isset($testimonial_data) ? $testimonial_data['id'] : "") ?>">
                    <input type="text" required name="testimonial_name" class="form-control" id="exampleInputEmail1" placeholder="Enter Testimonial Name" value="<?= (isset($testimonial_data) ? $testimonial_data['testimonial_name'] : "") ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Testimonial Tag</label>
                    <input type="text" required name="testimonial_tag" class="form-control" id="exampleInputEmail1" placeholder="Enter Testimonial Description" value="<?= (isset($testimonial_data) ? $testimonial_data['testimonial_tag'] : "") ?>">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Testimonial Description</label>
                    <input type="text" required name="testimonial_desc" class="form-control" id="exampleInputEmail1" placeholder="Enter Testimonial Description" value="<?= (isset($testimonial_data) ? $testimonial_data['testimonial_desc'] : "") ?>">
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputFile">Testimonial Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input id="uploadImage" type="file" accept="image/*" name="testimonial_image" class="custom-file-input">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                      </div>
                    </div>
                  </div>
                  
                    <?php if(isset($testimonial_data)&&file_exists($testimonial_data['testimonial_image'])) { ?>
                      <img id="uploaded_img" src="<?= (isset($testimonial_data) ? $testimonial_data['testimonial_image'] : "") ?>" height="200" width="200">
                    <?php } else { ?>
                      <img id="uploaded_img">
                      <?php } ?><br>

                    
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary"><?= (isset($testimonial_data) ? "Update" : "Add") ?></button>
                </div>
              </form>
            </div>   
        </div>  
      </div>
    </div>
  </section>
</div>