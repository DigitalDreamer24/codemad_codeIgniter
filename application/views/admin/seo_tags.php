<div class="content-wrapper">
    <section class="content-header">
      	<div class="container-fluid">
	        <div class="row mb-2">
	          <div class="col-sm-6">
	            <h1>SEO Tags</h1>
	          </div>
	          <div class="col-sm-6">
	            <ol class="breadcrumb float-sm-right">
	              <li class="breadcrumb-item">Home</li>
	              <li class="breadcrumb-item active">SEO Tags</li>
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
                <h3 class="card-title">SEO Tags</h3>
              </div>
              <?=$this->session->flashdata("msg")?>
              <form action="admin/dashboard/updateSeoTags" method="post" enctype="multipart/form-data">
                <div class="card-body">

                <div class="form-group">
                      <label>Select Page</label>
                      <select class="form-control js-example-basic-single" name="page" required onchange="window.location.href='admin/dashboard/seo_tags?page='+this.value">
                        <option value="">Select Page</option>
                        <option value="home" <?=(isset($_GET['page'])&&$_GET['page']=='home')?'selected':''?>>Home</option>
                        <option value="about" <?=(isset($_GET['page'])&&$_GET['page']=='about')?'selected':''?>>About Us</option>
                        <option value="contact" <?=(isset($_GET['page'])&&$_GET['page']=='contact')?'selected':''?>>Contact Us</option>
                      </select>
                </div>

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

                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
