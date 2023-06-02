<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Product List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
              <li class="breadcrumb-item"><a href="admin/dashboard/add_product">Add Product</a></li>
              <li class="breadcrumb-item active">Product List</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">          
          	<div class="col-md-12">
          	 <div class="card">
            	<div class="card-header">
              		<h3 class="card-title">Product List</h3>
            	</div>
            <div class="card-body">

              <form action="" method="GET">
              <div class="row">
              <div class="form-group col-md-4">
                  
                  <input type="text" name='name' class="form-control" value="<?=(isset($_GET['name']))?$_GET['name']:''?>" placeholder="Search by Product Name">

              </div>
              <div class="form-group col-md-2">
                  
                  <button type="submit" class="btn btn-primary">Search</button>                  
              </div>
              </div>
              </form>

              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sno.</th>
                  <th>Image</th>
                  <th>Name</th>
                  <th>Category</th>
                  <th width="16%">Action</th>
                </tr>
                </thead>
                <tbody>
        		<?php $num=1;
        		if(!empty($tblResult)){
        		foreach($tblResult as $key){ ?>
	                <tr>
                      <td><?=$num?></td>
                      <td>
                      <?php if(file_exists($key->pro_image)){ ?>
                          <img src="<?=$key->pro_image?>" height="100px" width="100px"  >
                        <?php }else{ ?>
                          <img src="uploads/noimg.png" height="100px" width="100px">
                        <?php } ?>
                      </td>
                      <td><?=$key->name?></td>
                      <td><?=$this->db->where('id',$key->cat_id)->get('category')->row_array()['name'];?></td>
                      <td>

                      <a class="btn btn-info btn-sm" href="admin/dashboard/add_product/<?=$key->id?>"><i class="fas fa-pencil-alt"></i></a>


                      <a class="btn btn-danger btn-sm" href="admin/dashboard/delete_product/<?= $key->id ?>" onclick="return confirm('Are you sure you want to delete');"><i class="fas fa-trash"></i>  </a>
                      </td>
		                </tr>
                <?php $num++; } } ?>
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
          </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  