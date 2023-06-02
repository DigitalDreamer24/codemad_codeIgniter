<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>List Banner</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
              <li class="breadcrumb-item active">List Banner</li>
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
                <h3 class="card-title">List Banner</h3>

              </div>
              <div class="card-body">
                
                  <form role="form" action="" method="get">
                    <div class="row">
                      <div class="form-group col-md-4">
                         <input type="text" name="title" class="form-control" placeholder="Search by Banner Title">
                      </div>
                      <div class="form-group col-md-2">
                        <button id="search_cat" type="submit" class="btn btn-warning">Search</button>
                      </div>
                    </div>
                  </form>
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th style="white-space:nowrap;">Sr No.</th>
                      <th>Title</th>
                      <th>Heading</th>
                      <th>Image</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $c = 1+$offset;
                      foreach ($result as $value) { ?>

                    <tr>
                      <td><?= $c ?></td>
                      <td><?= $value->title ?></td>
                      <td><?= $value->description ?></td>
                      
                      <td>
                        <img src="<?=(file_exists($value->image))?$value->image:'front/img/no-img.png'?>" height="100" width="100" >
                      </td>
                      <td><a href="admin/dashboard/add_banner/<?= $value->id ?>">Edit</a>&nbsp;&nbsp;<a href="admin/dashboard/delete_banner/<?= $value->id ?>" onclick="return confirm('Are you sure you want to delete');">Delete</a></td>
                    </tr>
                    <?php $c++; } ?>
                  </tbody>
                </table>
                
                <div class="pagination-btn">
                    <ul class="pagination pagination-sm">
                        <?php foreach ($links as $link) { ?>
                        <li><?=$link?></li>
                        <?php } ?>
                    </ul>
                </div>
              </div>
              <!-- /.card-body -->
              
            </div>            </div>
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