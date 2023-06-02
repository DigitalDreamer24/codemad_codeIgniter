<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?= (isset($subcat_data) ? "Update" : "Add") ?> SubCategory</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
              <li class="breadcrumb-item active"><?= (isset($subcat_data) ? "Update" : "Add") ?> SubCategory</li>
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
                <h3 class="card-title"><?= (isset($subcat_data) ? "Update" : "Add") ?> SubCategory</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="admin/dashboard/<?= (isset($subcat_data) ? "edit_subcategory_request" : "add_subcategory_request") ?>" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <?php echo $this->session->flashdata('subcat_msg'); ?>
                  <div class="form-group">
                    <label>Select Category</label>
                    <select name="cat_id" class="form-control" required>
                        <option value="">Select Category</option>
                        <?php foreach ($all_subcat_data as $data) { ?>
                          <option value=<?= $data->id ?> <?= isset($subcat_data) ? (($data->id == $subcat_data['cat_id']) ? "selected" : "") : "" ?>><?= $data->name ?></option>
                        <?php } ?>

                    </select>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">SubCategory Name</label>
                    <input type="hidden" name="id" value="<?= (isset($subcat_data) ? $subcat_data['id'] : "") ?>">

                    <input type="text" name="sub_name" required class="form-control" id="exampleInputEmail1" placeholder="Enter Subcategory" value="<?= (isset($subcat_data) ? $subcat_data['sub_name'] : "") ?>">
                  </div>
                  

                    
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary"><?= (isset($subcat_data) ? "Update" : "Add") ?></button>
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