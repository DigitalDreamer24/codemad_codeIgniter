<div class="content-wrapper">
    <section class="content-header">
      	<div class="container-fluid">
	        <div class="row mb-2">
	          <div class="col-sm-6">
	            <h1>Add Product</h1>
	          </div>
	          <div class="col-sm-6">
	            <ol class="breadcrumb float-sm-right">
	              <li class="breadcrumb-item">Home</li>
	              <li class="breadcrumb-item active">Add Product</li>
	            </ol>
	          </div>
	        </div>
      	</div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Product</h3>
              </div>
              <?=$this->session->flashdata("msg")?>
              <form action="admin/dashboard/<?=(isset($data))?'productUpdate':'productAdd'?>" method="post" enctype="multipart/form-data">
                <div class="card-body">

				<div class="form-group">
                      <label>Select Category</label>
                      <select class="form-control js-example-basic-single" name="cat_id" required>
                      	<option value="">Select Category</option>
                        <?php
                        foreach($catResult as $key){ ?>
                            <option value="<?=$key->id?>" <?=(isset($data)&&$key->id==$data['cat_id'])?'selected':''?>><?=$key->name?>
                            </option>
                         <?php } ?>
                      </select>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Product Name</label>
                    <input type="text" name='name' class="form-control" value="<?=(isset($data))?$data['name']:''?>">
                </div>


                <div class="form-group">
                    <label for="exampleInputEmail1">Product Image</label>
                    <input type="file" name='file' class="form-control" >
                    <input type="hidden" name='id' value="<?=(isset($data))?$data['id']:''?>">
                    <input type="hidden" name='pro_image' value="<?=(isset($data))?$data['pro_image']:''?>">
                </div>
                
                <?php if(isset($data)&&file_exists($data['pro_image'])){ ?>
	                <div class="form-group">
	                  <img src="<?=(isset($data))?$data['pro_image']:''?>" height='150px' width='150px'>
	                </div>
	            <?php } ?>

				<div class="form-group">
                    <label for="exampleInputEmail1">Description</label>
                    <textarea name='pro_desc' id='pro_desc' class="form-control"><?=(isset($data))?$data['desction']:''?></textarea>
                    <script>
		                CKEDITOR.replace('pro_desc'); 
		                CKEDITOR.instances['pro_desc'].on('change', 	function() {
		                CKEDITOR.instances['pro_desc'].updateElement(); 
		                });
	                </script> 
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Product Catelog (PDF)</label>
                    <input type="file" name='file1' class="form-control" accept="application/pdf">
                    <input type="hidden" name='catalogue' value="<?=(isset($data))?$data['catalogue']:''?>" >
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Add Video Link</label>
                    <input type="text" name='video' class="form-control" value="<?=(isset($data)&&$data['video']!='')?'https://www.youtube.com/watch?v='.$data['video']:''?>">
                </div>
                
                <?php if(isset($data)&&file_exists($data['catalogue'])){ ?>
	                <div class="form-group">
	                  	<a href="<?=(isset($data))?$data['catalogue']:''?>"  target='_blank'>Catalogue </a>
	                </div>
	            <?php } ?>
                
                
				        <div class="form-group">
                    <label for="exampleInputEmail1">SEO Title</label>
                    <input type="text" name='seo_title' class="form-control" value="<?=(isset($data))?$data['seo_title']:''?>">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">SEO Keyword</label>
                    <input type="text" name='seo_keyword' class="form-control" value="<?=(isset($data))?$data['seo_keyword']:''?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">SEO Description</label>
                    <textarea name='seo_desc' class="form-control"><?=(isset($data))?$data['seo_desc']:''?></textarea>
                    
                </div>


                <div id='gallryDiv' >
	                <div class="row" >
	            		<div class="form-group col-md-6">
	                    	<label for="exampleInputEmail1">Add More Product Images</label>
	                    	<input type="file" name='gallery[]' class="form-control" >
	                	</div>
	                	<div class="col-md-2">
	                		<label for="exampleInputEmail1">&nbsp;</label>
	                    	<button type="button" class="btn btn-primary addGalleryRow">Add</button>
	                	</div>
	                </div>
                </div>

	                <div class="row" >
	                <?php if(isset($data)&&$data['gallery']!=''){
	                	$galleryData = explode("|",$data['gallery']);
	                	for($i=0;$i<count($galleryData);$i++){
	                	$img = $this->db->where('image_id',$galleryData[$i])->get('tbl_image')->row_array(); ?>
		                <div class="form-group col-md-2">
		                  	<a href="<?=(isset($img))?$img['image_path']:'javascript:void(0);'?>" target='_blank'><img src="<?=(isset($img))?$img['image_path']:''?>" height='100px' width='100px'></a><br>
		                  	<a href="admin/dashboard/removeProGallery?id=<?=$img['image_id']?>&pro_id=<?=$data['id']?>" onclick="return confirm('Are you sure?')">Delete</a>
		                </div>
		            <?php } } ?>
	                </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary"><?=(isset($data))?'Update':'Submit'?></button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
