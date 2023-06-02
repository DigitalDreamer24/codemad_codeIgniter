<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

    // Create Slug
    public static function slugify($text, string $divider = '-')
    {
      // replace non letter or digits by divider
      $text = preg_replace('~[^\pL\d]+~u', $divider, $text);

      // transliterate
      $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

      // remove unwanted characters
      $text = preg_replace('~[^-\w]+~', '', $text);

      // trim
      $text = trim($text, $divider);

      // remove duplicate divider
      $text = preg_replace('~-+~', $divider, $text);

      // lowercase
      $text = strtolower($text);

      if (empty($text)) {
        return 'n-a';
      }

      return $text;
    }

    public function image_upload($index,$multiple=false,$getpath=false,$page="",$uploadPath='')
    {
        $insertedids = array();
        $foldername= date("Y-m-d-h");
        /*if (!is_dir("uploads")) {
            mkdir("uploads");
        }
        if (!is_dir("uploads/images")) {
            mkdir("uploads/images");
        }
        if (!is_dir("uploads/images/".$foldername)) {
            mkdir("uploads/images/".$foldername);
        }*/

        $config = array(
            'upload_path' => $uploadPath,
            'allowed_types' => 'jpg|jpeg|png|mp4|WMV|wmv|mp3|doc|docx|ppt|xls|pdf|xlsx|csv|xls',
            'overwrite' => TRUE,
            //'file_name' => time().rand(0,999),
            //'encrypt_name' => TRUE,
            'overwrite' => TRUE,
            'max_size' => 10000,
            'remove_spaces' => TRUE
        );
        $this->upload->initialize($config);

        if($multiple){
            
            $filesCount = count($_FILES[$index]['name']);
            for($i = 0; $i < ($filesCount); $i++){

                $_FILES['userFile']['name'] = $_FILES[$index]['name'][$i];
                $_FILES['userFile']['type'] = $_FILES[$index]['type'][$i];
                $_FILES['userFile']['tmp_name'] = $_FILES[$index]['tmp_name'][$i];
                $_FILES['userFile']['error'] = $_FILES[$index]['error'][$i];
                $_FILES['userFile']['size'] = $_FILES[$index]['size'][$i];

                if($this->upload->do_upload('userFile')){
                    $upload_data =$this->upload->data();
                    $full_path = substr($config['upload_path'],2).'/'.$upload_data['file_name'];
                    
                    /*
                    $imgConfig['image_library'] = 'gd2';
                    $imgConfig['source_image'] = substr($config['upload_path'],2).'/'.$upload_data['file_name'];  
                    $imgConfig['create_thumb'] = FALSE;
                    $imgConfig['maintain_ratio'] = FALSE;
                    $imgConfig['new_image'] = substr($config['upload_path'],2).'/'.$upload_data['file_name']; 
                    if($page=="breeding"){
                        $imgConfig['height'] = "500";
                        $imgConfig['width'] = "900";
                    }else{
                        $imgConfig['width']            = 907;                  
                        $imgConfig['height']           = 467;    
                    }
                    $this->load->library('image_lib');  
                    $this->image_lib->initialize($imgConfig);
    
                    $this->image_lib->resize();
                   */
                     
                if($page=='about' || $page=='product'){
                    //Medium Image
                    $imgConfig['image_library'] = 'gd2';
                    $imgConfig['source_image'] = substr($config['upload_path'],2).'/'.$upload_data['file_name'];  
                    $imgConfig['create_thumb'] = FALSE;
                    $imgConfig['maintain_ratio'] = FALSE;
                    $imgConfig['new_image'] = $uploadPath.'/'.$upload_data['file_name']; 
                    $imgConfig['width']            = 350;                  
                    $imgConfig['height']           = 370;   
                    
                    $this->load->library('image_lib');  
                    $this->image_lib->initialize($imgConfig);
                    $this->image_lib->resize();
                }           


                $this->db->insert('tbl_image',array('image_path'=>$full_path,'image_timestamp'=>date('Y-m-d H:i:s')));
                    $insertedids[] = $this->db->insert_id();
                }else{
                    $error = array('error' => $this->upload->display_errors());
                }
            }
        }else{
            if($this->upload->do_upload($index)){
                $upload_data =$this->upload->data();
                $full_path = substr($config['upload_path'],2).'/'.$upload_data['file_name'];

                $ext = pathinfo($upload_data['file_name'], PATHINFO_EXTENSION);
                $exp = explode("/",$upload_data['file_name']); 
                if($ext!='mp4' && $ext!='mp3' && $ext!='MP4'){

                    if($page=='category' || $page=='product'){

                        $imgConfig['image_library'] = 'gd2';
                        $imgConfig['source_image'] = substr($config['upload_path'],2).'/'.$upload_data['file_name'];  
                        $imgConfig['create_thumb'] = FALSE;
                        $imgConfig['maintain_ratio'] = FALSE;
                        $imgConfig['new_image'] = $uploadPath.'/'.$upload_data['file_name']; 
                        
                        $imgConfig['width']            = 350;                  
                        $imgConfig['height']           = 370;    
                        $this->load->library('image_lib');  
                        $this->image_lib->initialize($imgConfig);
                        $this->image_lib->resize();
                    }
                    if($page=='testimonial'){
                        $imgConfig['image_library'] = 'gd2';
                        $imgConfig['source_image'] = substr($config['upload_path'],2).'/'.$upload_data['file_name'];  
                        $imgConfig['create_thumb'] = FALSE;
                        $imgConfig['maintain_ratio'] = FALSE;
                        $imgConfig['new_image'] = $uploadPath.'/'.$upload_data['file_name']; 
                        
                        $imgConfig['width']            = 160;                  
                        $imgConfig['height']           = 160;    
                        $this->load->library('image_lib');  
                        $this->image_lib->initialize($imgConfig);
                        $this->image_lib->resize();
                    }
                }
                if($getpath){
                    return $full_path;
                }else{
                    $this->db->insert('tbl_image',array('image_path'=>$full_path,'image_timestamp'=>date('Y-m-d H:i:s')));
                    $insertedids[] = $this->db->insert_id();
                }
            }else{
                $error = array('error' => $this->upload->display_errors());
            }
        }
        return $ids = implode('|', $insertedids);
      
    }

    // category model
	public function add_category_request()
	{
        /*if($_FILES['image']['name'] != ""){
            $upload_image_data = upload_single_image('image','images/');
            $data['image'] = 'images/'.$upload_image_data['file_name'];
        }*/
        $data['name'] = $_POST['name'];
        $data['seo_title'] = $_POST['seo_title'];
        $data['seo_keyword'] = $_POST['seo_keyword'];
        $data['seo_desc'] = $_POST['seo_desc'];
        $data['cat_slug']=$this->slugify($_POST['name']);
        $this->db->insert('category',$data);
        $this->session->set_flashdata('cat_msg',"Category Added Successfully"); 
        redirect('admin/dashboard/add_category');
	}
    public function edit_category_request()
    {
        /*if($_FILES['image']['name'] != ""){
            $upload_image_data = upload_single_image('image','images/');
            $data['image'] = 'images/'.$upload_image_data['file_name'];
        }*/
        $data['name'] = $_POST['name'];
        $data['seo_title'] = $_POST['seo_title'];
        $data['seo_keyword'] = $_POST['seo_keyword'];
        $data['seo_desc'] = $_POST['seo_desc'];
        $data['cat_slug']=$this->slugify($_POST['name']);
        $this->db->where('id', $_POST['id']);
        $this->db->update('category', $data);
        $this->session->set_flashdata('cat_msg',"Category Updated Successfully"); 
        redirect('admin/dashboard/add_category/'.$_POST['id']);
    }
    
	public function delete_category_request($id)
    {
        $this -> db -> where('id', $id)-> delete('category');
        redirect('admin/dashboard/list_category');
    }
    
    
    public function get_category_model($start,$limit) 
    {
        if(isset($_GET['name']) && $_GET['name'] != ""){
            $this->db->like("name", $_GET['name']);
        }
        $this->db->limit($limit, $start);
        $query = $this->db->get("category");
        return $query->result();
    }



    // For Subcategory
    public function get_all_category_model() 
    {
        $query = $this->db->get("category");
        return $query->result();
    }

    public function add_subcategory_request()
    {   
        $data['sub_name'] = $_POST['sub_name'];
        $data['cat_id'] = $_POST['cat_id'];

        $this->db->insert('sub_category',$data);
        $this->session->set_flashdata('subcat_msg',"SubCategory Added Successfully"); 
        redirect('admin/dashboard/add_subcategory');
    }

    public function edit_subcategory_request()
    {
        $data['sub_name'] = $_POST['sub_name'];
        $data['cat_id'] = $_POST['cat_id'];
        $this->db->where('id', $_POST['id']);
        $this->db->update('sub_category', $data);
        $this->session->set_flashdata('cat_msg',"SubCategory Updated Successfully"); 
        redirect('admin/dashboard/add_subcategory/'.$_POST['id']);
    }

    public function get_subcategory_model($start,$limit) 
    {
        if(isset($_GET['name']) && $_GET['name'] != ""){
            $this->db->like("name", $_GET['name']);
        }
        $this->db->limit($limit, $start);
        $query = $this->db->join('sub_category', 'category.id = sub_category.cat_id')->get("category");
        return $query->result();
    }
    public function delete_subcategory_request($id)
    {
        $this -> db -> where('id', $id)-> delete('sub_category');
        redirect('admin/dashboard/list_subcategory');
    }



    // Banner Model
    public function add_banner_request()
    {
        if($_FILES['image']['name'] != ""){
            $upload_image_data = upload_single_image('image','images/');
            $data['image'] = 'images/'.$upload_image_data['file_name'];;
        }
        $data['title'] = $_POST['title'];
        $data['description'] = $_POST['description'];
        $this->db->insert('banner',$data);
        $this->session->set_flashdata('cat_msg',"Banner Added Successfully"); 
    

        redirect('admin/dashboard/add_banner');
    }
    public function get_banner_model($start,$limit) 
    {
        if(isset($_GET['title']) && $_GET['title'] != ""){
            $this->db->like("title", $_GET['title']);
        }
        $this->db->limit($limit, $start);
        $query = $this->db->get("banner");
        return $query->result();
    }

    public function edit_banner_request()
    {
        echo $_FILES['image']['name'];
        if($_FILES['image']['name'] != ""){
            $upload_image_data = upload_single_image('image','images/');
            $data['image'] = 'images/'.$upload_image_data['file_name'];
        }
        $data['title'] = $_POST['title'];
        $data['description'] = $_POST['description'];
        $this->db->where('id', $_POST['id']);
        $this->db->update('banner', $data);
        $this->session->set_flashdata('cat_msg',"Banner Updated Successfully"); 
        redirect('admin/dashboard/add_banner/'.$_POST['id']);
    }
    public function delete_banner_request($id)
    {
        $this -> db -> where('id', $id)-> delete('banner');
        redirect('admin/dashboard/list_banner');
    }
    
    
    // Testimonial Model
    public function add_testimonial_request()
    {
        echo $_FILES['testimonial_image']['name'];
        if($_FILES['testimonial_image']['name'] != ""){
            $upload_image_data = upload_single_image('testimonial_image','images/');
            print_r($upload_image_data);
            $data['testimonial_image'] = 'images/'.$upload_image_data['file_name'];
        }
        $data['testimonial_name'] = $_POST['testimonial_name'];
        $data['testimonial_tag'] = $_POST['testimonial_tag'];
        $data['testimonial_desc'] = $_POST['testimonial_desc'];
        $this->db->insert('testimonial',$data);
        $this->session->set_flashdata('cat_msg',"Testimonial Added Successfully"); 
        redirect('admin/dashboard/add_testimonial');
    }
    public function get_testimonial_model($start,$limit) 
    {
        if(isset($_GET['testimonial_name']) && $_GET['testimonial_name'] != ""){
            $this->db->like("testimonial_name", $_GET['testimonial_name']);
        }
        $this->db->limit($limit, $start);
        $query = $this->db->get("testimonial");
        return $query->result();
    }
    public function edit_testimonial_request()
    {
        echo $_FILES['testimonial_image']['name'];
        if($_FILES['testimonial_image']['name'] != ""){
            $upload_image_data = upload_single_image('testimonial_image','images/');
            $data['testimonial_image'] = 'images/'.$upload_image_data['file_name'];
        }
        $data['testimonial_name'] = $_POST['testimonial_name'];
        $data['testimonial_tag'] = $_POST['testimonial_tag'];
        $data['testimonial_desc'] = $_POST['testimonial_desc'];
        $this->db->where('id', $_POST['id']);
        $this->db->update('testimonial', $data);
        $this->session->set_flashdata('cat_msg',"Testimonial Updated Successfully"); 
        redirect('admin/dashboard/add_testimonial/'.$_POST['id']);
    }
     public function delete_testimonial_request($id)
    {
        $this -> db -> where('id', $id)-> delete('testimonial');
        redirect('admin/dashboard/list_testimonial');
    }
    


    // Settings Model 
    public function add_settings_request()
    {
        echo $_FILES['logo']['name'];
        if($_FILES['logo']['name'] != ""){
            $upload_image_data = upload_single_image('logo','images/');
            print_r($upload_image_data);
            $data['logo'] = 'images/'.$upload_image_data['file_name'];
        }
        $data['email'] = $_POST['email'];
        $data['contact'] = $_POST['contact'];
        $data['name'] = $_POST['name'];
        $data['address'] = $_POST['address'];
        $data['facebook'] = $_POST['facebook'];
        $data['instagram'] = $_POST['instagram'];
        $data['twitter'] = $_POST['twitter'];
        $data['youtube'] = $_POST['youtube'];
        $this->db->insert('settings',$data);
        $this->session->set_flashdata('cat_msg',"Settings Added Successfully"); 
        redirect('admin/dashboard/settings');
    }

    public function edit_settings_request()
    {
        echo $_FILES['logo']['name'];
        if($_FILES['logo']['name'] != ""){
            $upload_image_data = upload_single_image('logo','images/');
            $data['logo'] = 'images/'.$upload_image_data['file_name'];
        }
        $data['email'] = $_POST['email'];
        $data['address'] = $_POST['address'];
        $data['contact'] = $_POST['contact'];
        $data['name'] = $_POST['name'];
        $data['facebook'] = $_POST['facebook'];
        $data['instagram'] = $_POST['instagram'];
        $data['twitter'] = $_POST['twitter'];
        $data['youtube'] = $_POST['youtube'];
        $this->db->where('id', $_POST['id']);
        $this->db->update('settings', $data);
        $this->session->set_flashdata('cat_msg',"Settings Updated Successfully"); 
        redirect('admin/dashboard/settings');
    }  


    // About Us Model 
    public function add_about_request()
    {
        $data['title'] = $_POST['title'];
        $data['description1'] = $_POST['description1'];
        $data['description2'] = $_POST['description2'];
        $this->db->insert('about',$data);
        $this->session->set_flashdata('cat_msg',"About_Us Added Successfully"); 
        redirect('admin/dashboard/about_us');
    }

    public function edit_about_request()
    {
        $data['title'] = $_POST['title'];
        $data['description1'] = $_POST['description1'];
        $data['description2'] = $_POST['description2'];
        $this->db->where('id', $_POST['id']);
        $this->db->update('about', $data);
        $this->session->set_flashdata('cat_msg',"About Us Updated Successfully"); 
        redirect('admin/dashboard/about_us');
    }  


    // Team Model
    public function add_team_request()
    {
        echo $_FILES['image']['name'];
        if($_FILES['image']['name'] != ""){
            $upload_image_data = upload_single_image('image','images/');
            $data['image'] = 'images/'.$upload_image_data['file_name'];
        }
        $data['name'] = $_POST['name'];
        $data['designation'] = $_POST['designation'];
        $data['description'] = $_POST['description'];
        $this->db->insert('team',$data);
        $this->session->set_flashdata('cat_msg',"Team Member Added Successfully"); 
        redirect('admin/dashboard/add_team');
    }
    public function get_team_model($start,$limit) 
    {
        if(isset($_GET['name']) && $_GET['name'] != ""){
            $this->db->like("name", $_GET['name']);
        }
        $this->db->limit($limit, $start);
        $query = $this->db->get("team");
        return $query->result();
    }

    public function edit_team_request()
    {
        echo $_FILES['image']['name'];
        if($_FILES['image']['name'] != ""){
            $upload_image_data = upload_single_image('image','images/');
            $data['image'] = 'images/'.$upload_image_data['file_name'];
        }
        $data['name'] = $_POST['name'];
        $data['designation'] = $_POST['designation'];
        $data['description'] = $_POST['description'];
        $this->db->where('id', $_POST['id']);
        $this->db->update('team', $data);
        $this->session->set_flashdata('cat_msg',"Team Member Updated Successfully"); 
        redirect('admin/dashboard/add_team/'.$_POST['id']);
    }
    public function delete_team_request($id)
    {
        $this -> db -> where('id', $id)-> delete('team');
        redirect('admin/dashboard/list_team');
    }



    // Division Model
    public function add_division_request()
    {
        echo $_FILES['image']['name'];
        if($_FILES['image']['name'] != ""){
            $upload_image_data = upload_single_image('image','images/');
            $data['image'] = 'images/'.$upload_image_data['file_name'];
        }
        $data['link'] = $_POST['link'];
        $this->db->insert('division',$data);
        $this->session->set_flashdata('cat_msg',"Division Added Successfully"); 
        redirect('admin/dashboard/add_division');
    }
    public function get_division_model($start,$limit) 
    {
        $this->db->limit($limit, $start);
        $query = $this->db->get("division");
        return $query->result();
    }

    public function edit_division_request()
    {
        echo $_FILES['image']['name'];
        if($_FILES['image']['name'] != ""){
            $upload_image_data = upload_single_image('image','images/');
            $data['image'] = 'images/'.$upload_image_data['file_name'];
        }
        $data['link'] = $_POST['link'];
        $this->db->where('id', $_POST['id']);
        $this->db->update('division', $data);
        $this->session->set_flashdata('cat_msg',"Division Updated Successfully"); 
        redirect('admin/dashboard/add_division/'.$_POST['id']);
    }
    public function delete_division_request($id)
    {
        $this -> db -> where('id', $id)-> delete('division');
        redirect('admin/dashboard/list_division');
    }


    // blog model
    public function add_blog_request()
    {
        if($_FILES['image']['name'] != ""){
            $upload_image_data = upload_single_image('image','images/');
            $data['image'] = 'images/'.$upload_image_data['file_name'];

            $imgConfig['image_library'] = 'gd2';
            $imgConfig['source_image'] = $data['image'];  
            $imgConfig['create_thumb'] = FALSE;
            $imgConfig['maintain_ratio'] = FALSE;
            $imgConfig['new_image'] = $data['image']; 
            $imgConfig['width']            = 970;                  
            $imgConfig['height']           = 750;     
            
            $this->load->library('image_lib');  
            $this->image_lib->initialize($imgConfig);
            $this->image_lib->resize();

        }

        $data['title'] = $_POST['title'];
        $data['blog_slug']=$this->slugify($_POST['title']);
        $data['tag'] = $_POST['tag'];
        $data['description'] = $_POST['description'];
        $this->db->insert('blog',$data);
        $this->session->set_flashdata('cat_msg',"Blog Added Successfully"); 
        redirect('admin/dashboard/add_blog');
    }
    public function get_blog_model($start,$limit) 
    {
        if(isset($_GET['title']) && $_GET['title'] != ""){
            $this->db->like("title", $_GET['title']);
        }
        $this->db->limit($limit, $start);
        $query = $this->db->get("blog");
        return $query->result();
    }

    public function edit_blog_request()
    {
        echo $_FILES['image']['name'];
        if($_FILES['image']['name'] != ""){
            $upload_image_data = upload_single_image('image','images/');
            $data['image'] = 'images/'.$upload_image_data['file_name'];


            $imgConfig['image_library'] = 'gd2';
            $imgConfig['source_image'] = $data['image'];  
            $imgConfig['create_thumb'] = FALSE;
            $imgConfig['maintain_ratio'] = FALSE;
            $imgConfig['new_image'] = $data['image']; 
            $imgConfig['width']            = 970;                  
            $imgConfig['height']           = 750;   
            
            $this->load->library('image_lib');  
            $this->image_lib->initialize($imgConfig);
            $this->image_lib->resize();
        }
        $data['title'] = $_POST['title'];
        $data['blog_slug']=$this->slugify($_POST['title']);
        $data['tag'] = $_POST['tag'];
        $data['description'] = $_POST['description'];
        $this->db->where('id', $_POST['id']);
        $this->db->update('blog', $data);
        $this->session->set_flashdata('cat_msg',"Blog Updated Successfully"); 
        redirect('admin/dashboard/add_blog/'.$_POST['id']);
    }
    public function delete_blog_request($id)
    {
        $this -> db -> where('id', $id)-> delete('blog');
        redirect('admin/dashboard/list_blog');
    }

    // product model
    public function productAdd()
    {
        //$aboutus = $this->db->get("products")->row_array()['gallery'];
        
        if($_FILES['file']['name']==""){            
                $pro_image ='';
        }else{
            $pro_image = $this->image_upload('file',false,true,'product','./uploads/product');
        }

        if($_FILES['file1']['name']==""){
            
                $catalogue ='';
             
        }else{
            $catalogue = $this->image_upload('file1',false,true,'product','./uploads/product');
        }

        if(count($_FILES['gallery']['name'])>0){
            $gallery =$this->image_upload('gallery',true,false,'product','./uploads/product');
        }else{
            $gallery = '';
        }

        if($_POST['video']!= ""){
            $url = $_POST['video'];
            parse_str( parse_url( $url, PHP_URL_QUERY ), $my_array_of_vars );
            $video = $my_array_of_vars['v'];
        }
        else{
            $video = "";
        }

        $arrayName=array(
            'pro_image'=>$pro_image,
            'catalogue'=>$catalogue,
            'cat_id'=>$_POST['cat_id'],
            'name'=>$_POST['name'],
            'video'=>$video,
            'pro_slug'=>$this->slugify($_POST['name']),
            'desction'=>$_POST['pro_desc'],
            'seo_title'=>$_POST['seo_title'],
            'seo_keyword'=>$_POST['seo_keyword'],
            'seo_desc'=>$_POST['seo_desc'],
            'gallery'=>$gallery,
            'insertdate'=>date("Y-m-d H:i:s")
        );
        
        $this->db->insert("products",$arrayName);       

        $this->session->set_flashdata("msg","<font color='green' id='alert-msg'><center>Product added successfully</center></font>");
        redirect('admin/dashboard/add_product');
        
    }
    public function productUpdate()
    {
        $galleryIDs = $this->db->where('id',$_POST['id'])->get("products")->row_array()['gallery'];
        
        if($_FILES['file']['name']==""){
            if($_POST['pro_image']!=""){
                $pro_image =$_POST['pro_image'];
            }
        }else{
            $pro_image = $this->image_upload('file',false,true,'product','./uploads/product');
        }

        if($_FILES['file1']['name']==""){
            if($_POST['catalogue']!=""){
                $catalogue =$_POST['catalogue'];
            }
        }else{
            $catalogue = $this->image_upload('file1',false,true,'product','./uploads/product');
        }

        if(count($_FILES['gallery']['name'])>0&&$_FILES['gallery']['name'][0]!=''){
            if($galleryIDs!=""){
                $gallery = $galleryIDs."|".$this->image_upload('gallery',true,false,'product','./uploads/product');
            }else{
                $gallery = $this->image_upload('gallery',true,false,'product','./uploads/product');
            }
        }else{
            $gallery = $galleryIDs;
        }

        if($_POST['video']!= ""){
            $url = $_POST['video'];
            parse_str( parse_url( $url, PHP_URL_QUERY ), $my_array_of_vars );
            $video = $my_array_of_vars['v'];
        }
        else{
            $video = "";
        }
        
        $arrayName=array(
            'pro_image'=>$pro_image,
            'catalogue'=>$catalogue,
            'cat_id'=>$_POST['cat_id'],
            'name'=>$_POST['name'],
            'video'=>$video,
            'pro_slug'=>$this->slugify($_POST['name']),
            'desction'=>$_POST['pro_desc'],
            'seo_title'=>$_POST['seo_title'],
            'seo_keyword'=>$_POST['seo_keyword'],
            'seo_desc'=>$_POST['seo_desc'],
            'gallery'=>$gallery,
            'modifydate'=>date("Y-m-d H:i:s")
        );
        
        $this->db->where('id',$_POST['id'])->update("products",$arrayName);       

        $this->session->set_flashdata("msg","<font color='green' id='alert-msg'><center>Product updated successfully</center></font>");
        redirect('admin/dashboard/add_product/'.$_POST['id']);
        
    }
    public function getProducts($offset, $limit){
        
        if(isset($_GET['name'])&&$_GET['name']!=''){
            $this->db->like('name',$_GET['name']);
        }
        $this->db->limit($limit);
        $this->db->offset($offset);
        $this->db->order_by('id','desc');

        $data = $this->db->get('products')->result();
        //echo $this->db->last_query();
        return $data;
    }
    public function removeProGallery()
    {
        $aboutus = $this->db->where('id',$_GET['pro_id'])->get("products")->row_array()['gallery'];
        $gallery = explode("|",$aboutus);

        $newGallery=[];
        for ($i=0; $i <count($gallery); $i++) { 
            if($gallery[$i]!=$_GET['id']){
                $newGallery[]=$gallery[$i];
            }
        }

        $this->db->where('id',$_GET['pro_id'])->update("products",array('gallery'=>implode("|",$newGallery)));
        $banner = $this->db->where('image_id',$_GET['id'])->get("tbl_image")->row_array();
        if($banner['image_path']!=""){
            unlink($banner['image_path']);
        }
        $this->db->where('image_id',$_GET['id'])->delete("tbl_image");
        $this->session->set_flashdata("msg","<font color='green' id='alert-msg'><center>Updated successfully</center></font>");

        redirect("admin/dashboard/add_product/".$_GET['pro_id']);
    }
    public function delete_product_request($id)
    {
        $this -> db -> where('id', $id)-> delete('products');
        redirect('admin/dashboard/list_product');
    }
    
    // SEO tags
    public function updateSeoTags()
    {
        $arrayName=array(
            'seo_title'=>$_POST['seo_title'],
            'seo_keyword'=>$_POST['seo_keyword'],
            'seo_desc'=>$_POST['seo_desc'],
            'insertdate'=>date("Y-m-d H:i:s")
        );
        $this->db->where('page',$_POST['page'])->update("seo_tags",$arrayName);
        $this->session->set_flashdata("msg","<font color='green' id='alert-msg'><center>SEO Tags updated successfully</center></font>");
        redirect('admin/dashboard/seo_tags?page='.$_POST['page']);
        
    }

}   



