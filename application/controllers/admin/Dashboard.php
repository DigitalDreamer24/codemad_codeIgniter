<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	
	public function __construct() {
		parent :: __construct();
		if($this->session->userdata('admin_id')==''){
			redirect(base_url('login'));
		}

	   $this->load->helper('upload_image_helper');
	   $this->load->model('admin_model');
    }

    // Dashboard Controller
	public function index()
	{
		redirect('admin/dashboard/settings');
	}

	// Logout
	public function logout(){
        $this->session->unset_userdata('admin_id');
        redirect(base_url('admin/login'));
    }

	// Category Controller
	public function add_category($id='')
	{	
		$data[] = "";
		if($id != "" || $id != 0){
			$data['cat_data'] = $this->db->where('id', $id)->get('category')->row_array();
		}

		$data1['catMo'] = "menu-open";
		$data1["catActive"] = "active";
		$data1["addcatActive"] = "active";
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar',$data1);
		$this->load->view('admin/add_category',$data);
		$this->load->view('admin/footer');
	}
	public function list_category()
	{	
		$this->load->library("pagination");
		if(isset($_GET['name']) && $_GET['name'] != ""){
            $this->db->like("name", $_GET['name']);
       }
		$count= $this->db->count_all_results('category');

		$page = (isset($_GET['page']))?$_GET['page'] : "1";
        $config["total_rows"] = $count;
        $config["per_page"] = 10;
        $config['use_page_numbers'] = TRUE;
        $config['num_links'] = 3;
        $config['cur_tag_open'] = '&nbsp;<a class="active">';
        $config['cur_tag_close'] = '</a>';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Prev';
        $config['display_pages'] = TRUE;
        $config['query_string_segment'] = 'page';
        $config['page_query_string'] = TRUE;

        $name=isset($_GET['name']) ? $_GET['name'] : "";

       	$config['base_url'] = base_url('admin/dashboard/list_category?name='.$name);
       
        $this->pagination->initialize($config);

        if ($page>1) {
           $x = $page*$config["per_page"];
           $i= $x-$config["per_page"];
        }else{
           $i=0;
        }

        $data["page"] = $page;
        $data["offset"] = $i;
        $data["per_page"] =10;
       	$data["result"]= $this->admin_model->get_category_model($i,$config["per_page"]);
        $data["links"] = explode('&nbsp;',$this->pagination->create_links());

      
		$data1['catMo'] = "menu-open";
		$data1["catActive"] = "active";
		$data1["listcatActive"] = "active";
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar',$data1);
		$this->load->view('admin/list_category',$data);
		$this->load->view('admin/footer');
	}
	public function add_category_request()
	{
		$this->admin_model->add_category_request();
	}
	public function edit_category_request()
	{
		$this->admin_model->edit_category_request();
	}
	public function delete_cat($id)
	{
		$this->admin_model->delete_category_request($id);
	}




	// Subcategory Controller
	public function add_subcategory($id='')
	{	
		$data[] = "";

		if($id != "" || $id != 0){
			$data['subcat_data'] = $this->db->where('id', $id)->get('sub_category')->row_array();
		}

		$subcat_data = $this->admin_model->get_all_category_model();
		$data['all_subcat_data'] = $subcat_data;
		$data1['subcatMo'] = "menu-open";
		$data1["subcatActive"] = "active";
		$data1["addsubcatActive"] = "active";

		$this->load->view('admin/header');
		$this->load->view('admin/sidebar',$data1);
		$this->load->view('admin/add_subcategory',$data);
		$this->load->view('admin/footer');
	}
	public function list_subcategory()
	{	
		$this->load->library("pagination");
		if(isset($_GET['sub_name']) && $_GET['sub_name'] != ""){
            $this->db->like("sub_name", $_GET['sub_name']);
       }
		$count= $this->db->count_all_results('sub_category');

		$page = (isset($_GET['page']))?$_GET['page'] : "1";
        $config["total_rows"] = $count;
        $config["per_page"] = 10;
        $config['use_page_numbers'] = TRUE;
        $config['num_links'] = 3;
        $config['cur_tag_open'] = '&nbsp;<a class="active">';
        $config['cur_tag_close'] = '</a>';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Prev';
        $config['display_pages'] = TRUE;
        $config['query_string_segment'] = 'page';
        $config['page_query_string'] = TRUE;

        $sub_name=isset($_GET['sub_name']) ? $_GET['sub_name'] : "";

       	$config['base_url'] = base_url('admin/dashboard/list_subcategory?sub_name='.$sub_name);
       
        $this->pagination->initialize($config);

        if ($page>1) {
           $x = $page*$config["per_page"];
           $i= $x-$config["per_page"];
        }else{
           $i=0;
        }

        $data["page"] = $page;
        $data["offset"] = $i;
        $data["per_page"] =10;
        $data["result"]= $this->admin_model->get_subcategory_model($i,$config["per_page"]);
        $data["links"] = explode('&nbsp;',$this->pagination->create_links());

      
		$data1['subcatMo'] = "menu-open";
		$data1["subcatActive"] = "active";
		$data1["listsubcatActive"] = "active";
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar',$data1);
		$this->load->view('admin/list_subcategory',$data);
		$this->load->view('admin/footer');
	}
	public function add_subcategory_request()
	{
		$this->admin_model->add_subcategory_request();
	}
	public function edit_subcategory_request()
	{
		$this->admin_model->edit_subcategory_request();
	}
	public function delete_subcat($id)
	{
		$this->admin_model->delete_subcategory_request($id);
	}



	// Banner Controller
	public function add_banner($id='')
	{	
		$data[] = "";
		if($id != "" || $id != 0){
			$data['banner_data'] = $this->db->where('id', $id)->get('banner')->row_array();
		}

		$data1['bannerMo'] = "menu-open";
		$data1["bannerActive"] = "active";
		$data1["addbannerActive"] = "active";
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar',$data1);
		$this->load->view('admin/add_banner',$data);
		$this->load->view('admin/footer');
	}
	public function add_banner_request()
	{
		$this->admin_model->add_banner_request();
	}
	public function list_banner()
	{	
		$this->load->library("pagination");
		if(isset($_GET['title']) && $_GET['title'] != ""){
            $this->db->like("title", $_GET['title']);
       }
		$count= $this->db->count_all_results('banner');

		$page = (isset($_GET['page']))?$_GET['page'] : "1";
        $config["total_rows"] = $count;
        $config["per_page"] = 10;
        $config['use_page_numbers'] = TRUE;
        $config['num_links'] = 3;
        $config['cur_tag_open'] = '&nbsp;<a class="active">';
        $config['cur_tag_close'] = '</a>';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Prev';
        $config['display_pages'] = TRUE;
        $config['query_string_segment'] = 'page';
        $config['page_query_string'] = TRUE;

        $title=isset($_GET['title']) ? $_GET['title'] : "";

       	$config['base_url'] = base_url('admin/dashboard/list_banner?title='.$title);
       
        $this->pagination->initialize($config);

        if ($page>1) {
           $x = $page*$config["per_page"];
           $i= $x-$config["per_page"];
        }else{
           $i=0;
        }

        $data["page"] = $page;
        $data["offset"] = $i;
        $data["per_page"] =10;
       	$data["result"]= $this->admin_model->get_banner_model($i,$config["per_page"]);
        $data["links"] = explode('&nbsp;',$this->pagination->create_links());

      $data1['bannerMo'] = "menu-open";
		$data1["bannerActive"] = "active";
		$data1["listbannerActive"] = "active";
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar',$data1);
		$this->load->view('admin/list_banner',$data);
		$this->load->view('admin/footer');
	}
	public function edit_banner_request()
	{
		$this->admin_model->edit_banner_request();
	}
	public function delete_banner($id)
	{
		$this->admin_model->delete_banner_request($id);
	}




	// Product Controller
	public function add_product($id='')
	{	
		if($id != "" || $id != 0){
			$data['data'] = $this->db->where('id', $id)->get('products')->row_array();
		}

		$data['catResult'] = $this->db->get("category")->result();
		$data1['productMo'] = "menu-open";
		$data1["productActive"] = "active";
		$data1["addproductActive"] = "active";

		$this->load->view('admin/header');
		$this->load->view('admin/sidebar',$data1);
		$this->load->view('admin/add_product',$data);
		$this->load->view('admin/footer');
	}

	public function productAdd()
    {
        $this->admin_model->productAdd();
    }

    public function productUpdate()
    {
        $this->admin_model->productUpdate();
    }
    public function list_product()
    {
        $data['productMo']='menu-open';
        $data['productListActive']='active';
        $data['productActive']='active';
        $data['current']=$this;
    

        if(isset($_GET['name'])&&$_GET['name']!=''){
            $this->db->like('name',$_GET['name']);
        }
        $count = $this->db->count_all_results('products');

               
        $page = (isset($_GET['page']))?$_GET['page'] : "1";
        $config["total_rows"] = $count;
        $config["per_page"] =12;
        $config['use_page_numbers'] = TRUE;
        $config['num_links'] = 3;
        $config['cur_tag_open'] = '&nbsp;<a class="active">';
        $config['cur_tag_close'] = '</a>';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Prev';
        $config['display_pages'] = TRUE;
        $config['query_string_segment'] = 'page';
        $config['page_query_string'] = TRUE;
        
        $config['base_url'] = base_url('admin/dashboard/list_product');
        $this->pagination->initialize($config);

        if ($page>1) {
           $x = $page*$config["per_page"];
           $i= $x-$config["per_page"];
        }else{
           $i=0;
        }
        $data["page"] = $page;
        $data["per_page"] =12;

        
        $data['tblResult'] = $this->admin_model->getProducts($i,$config["per_page"]);
        $data["links"] = explode('&nbsp;',$this->pagination->create_links());
        
        $this->load->view('admin/header',$data);
        $this->load->view('admin/sidebar',$data);
        $this->load->view('admin/list_product',$data);
        $this->load->view('admin/footer',$data);
    }
    
    public function delete_product($id)
	 {
		  $this->admin_model->delete_product_request($id);
	 }
     public function removeProGallery()
    {
        $this->admin_model->removeProGallery();
    }



	// Testimonial Controller
	public function add_testimonial($id='')
	{	
		$data[] = "";
		if($id != "" || $id != 0){
			$data['testimonial_data'] = $this->db->where('id', $id)->get('testimonial')->row_array();
		}

		$data1['testimonialMo'] = "menu-open";
		$data1["testimonialActive"] = "active";
		$data1["addtestimonialActive"] = "active";
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar',$data1);
		$this->load->view('admin/add_testimonial',$data);
		$this->load->view('admin/footer');
	}
	public function add_testimonial_request()
	{
		$this->admin_model->add_testimonial_request();
	}
	public function edit_testimonial_request()
	{
		$this->admin_model->edit_testimonial_request();
	}
	public function list_testimonial()
	{	
		$this->load->library("pagination");
		if(isset($_GET['testimonial_name']) && $_GET['testimonial_name'] != ""){
            $this->db->like("testimonial_name", $_GET['testimonial_name']);
       }
		$count= $this->db->count_all_results('testimonial');

		$page = (isset($_GET['page']))?$_GET['page'] : "1";
        $config["total_rows"] = $count;
        $config["per_page"] = 10;
        $config['use_page_numbers'] = TRUE;
        $config['num_links'] = 3;
        $config['cur_tag_open'] = '&nbsp;<a class="active">';
        $config['cur_tag_close'] = '</a>';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Prev';
        $config['display_pages'] = TRUE;
        $config['query_string_segment'] = 'page';
        $config['page_query_string'] = TRUE;

        $name=isset($_GET['testimonial_name']) ? $_GET['testimonial_name'] : "";

       	$config['base_url'] = base_url('admin/dashboard/list_testimonial?testimonial_name='.$name);
       
        $this->pagination->initialize($config);

        if ($page>1) {
           $x = $page*$config["per_page"];
           $i= $x-$config["per_page"];
        }else{
           $i=0;
        }

        $data["page"] = $page;
        $data["offset"] = $i;
        $data["per_page"] =10;
       $data["result"]= $this->admin_model->get_testimonial_model($i,$config["per_page"]);
        $data["links"] = explode('&nbsp;',$this->pagination->create_links());

      
		$data1['testimonialMo'] = "menu-open";
		$data1["testimonialActive"] = "active";
		$data1["listtestimonialActive"] = "active";
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar',$data1);
		$this->load->view('admin/list_testimonial',$data);
		$this->load->view('admin/footer');
	}
	public function delete_testimonial($id)
	{
		$this->admin_model->delete_testimonial_request($id);
	}




	// Team Controller
	public function add_team($id='')
	{	
		$data[] = "";
		if($id != "" || $id != 0){
			$data['team_data'] = $this->db->where('id', $id)->get('team')->row_array();
		}

		$data1['teamMo'] = "menu-open";
		$data1["teamActive"] = "active";
		$data1["addteamActive"] = "active";
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar',$data1);
		$this->load->view('admin/add_team',$data);
		$this->load->view('admin/footer');
	}
	public function add_team_request()
	{
		$this->admin_model->add_team_request();
	}
	public function list_team()
	{	
		$this->load->library("pagination");
		if(isset($_GET['name']) && $_GET['name'] != ""){
            $this->db->like("name", $_GET['name']);
       }
		$count= $this->db->count_all_results('team');

		$page = (isset($_GET['page']))?$_GET['page'] : "1";
        $config["total_rows"] = $count;
        $config["per_page"] = 10;
        $config['use_page_numbers'] = TRUE;
        $config['num_links'] = 3;
        $config['cur_tag_open'] = '&nbsp;<a class="active">';
        $config['cur_tag_close'] = '</a>';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Prev';
        $config['display_pages'] = TRUE;
        $config['query_string_segment'] = 'page';
        $config['page_query_string'] = TRUE;

        $title=isset($_GET['name']) ? $_GET['name'] : "";

       	$config['base_url'] = base_url('admin/dashboard/list_team?name='.$title);
       
        $this->pagination->initialize($config);

        if ($page>1) {
           $x = $page*$config["per_page"];
           $i= $x-$config["per_page"];
        }else{
           $i=0;
        }

        $data["page"] = $page;
        $data["offset"] = $i;
        $data["per_page"] =10;
       	$data["result"]= $this->admin_model->get_team_model($i,$config["per_page"]);
        $data["links"] = explode('&nbsp;',$this->pagination->create_links());

      $data1['teamMo'] = "menu-open";
		$data1["teamActive"] = "active";
		$data1["listteamActive"] = "active";
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar',$data1);
		$this->load->view('admin/list_team',$data);
		$this->load->view('admin/footer');
	}
	public function edit_team_request()
	{
		$this->admin_model->edit_team_request();
	}
	public function delete_team($id)
	{
		$this->admin_model->delete_team_request($id);
	}



	// Division Controller
	public function add_division($id='')
	{	
		$data[] = "";
		if($id != "" || $id != 0){
			$data['division_data'] = $this->db->where('id', $id)->get('division')->row_array();
		}

		$data1['divisionMo'] = "menu-open";
		$data1["divisionActive"] = "active";
		$data1["adddivisionActive"] = "active";
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar',$data1);
		$this->load->view('admin/add_division',$data);
		$this->load->view('admin/footer');
	}
	public function add_division_request()
	{
		$this->admin_model->add_division_request();
	}
	public function list_division()
	{	
		$this->load->library("pagination");
		// if(isset($_GET['name']) && $_GET['name'] != ""){
  //           $this->db->like("name", $_GET['name']);
  //      }
		$count= $this->db->count_all_results('division');

		$page = (isset($_GET['page']))?$_GET['page'] : "1";
        $config["total_rows"] = $count;
        $config["per_page"] = 10;
        $config['use_page_numbers'] = TRUE;
        $config['num_links'] = 3;
        $config['cur_tag_open'] = '&nbsp;<a class="active">';
        $config['cur_tag_close'] = '</a>';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Prev';
        $config['display_pages'] = TRUE;
        $config['query_string_segment'] = 'page';
        $config['page_query_string'] = TRUE;

        // $title=isset($_GET['name']) ? $_GET['name'] : "";

       	$config['base_url'] = base_url('admin/dashboard/list_division');
       
        $this->pagination->initialize($config);

        if ($page>1) {
           $x = $page*$config["per_page"];
           $i= $x-$config["per_page"];
        }else{
           $i=0;
        }

        $data["page"] = $page;
        $data["offset"] = $i;
        $data["per_page"] =10;
        $data["result"]= $this->admin_model->get_division_model($i,$config["per_page"]);
        $data["links"] = explode('&nbsp;',$this->pagination->create_links());

      $data1['divisionMo'] = "menu-open";
		$data1["divisionActive"] = "active";
		$data1["listdivisionActive"] = "active";
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar',$data1);
		$this->load->view('admin/list_division',$data);
		$this->load->view('admin/footer');
	}
	public function edit_division_request()
	{
		$this->admin_model->edit_division_request();
	}
	public function delete_division($id)
	{
		$this->admin_model->delete_division_request($id);
	}



	// Blog Controller
	public function add_blog($id='')
	{	
		$data[] = "";
		if($id != "" || $id != 0){
			$data['blog_data'] = $this->db->where('id', $id)->get('blog')->row_array();
		}

		$data1['blogMo'] = "menu-open";
		$data1["blogActive"] = "active";
		$data1["addblogActive"] = "active";
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar',$data1);
		$this->load->view('admin/add_blog',$data);
		$this->load->view('admin/footer');
	}
	public function add_blog_request()
	{
		$this->admin_model->add_blog_request();
	}
	public function list_blog()
	{	
		$this->load->library("pagination");
		if(isset($_GET['title']) && $_GET['title'] != ""){
            $this->db->like("title", $_GET['title']);
       }
		$count= $this->db->count_all_results('blog');

		$page = (isset($_GET['page']))?$_GET['page'] : "1";
        $config["total_rows"] = $count;
        $config["per_page"] = 10;
        $config['use_page_numbers'] = TRUE;
        $config['num_links'] = 3;
        $config['cur_tag_open'] = '&nbsp;<a class="active">';
        $config['cur_tag_close'] = '</a>';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Prev';
        $config['display_pages'] = TRUE;
        $config['query_string_segment'] = 'page';
        $config['page_query_string'] = TRUE;

        $title=isset($_GET['title']) ? $_GET['title'] : "";

       	$config['base_url'] = base_url('admin/dashboard/list_blog?title='.$title);
       
        $this->pagination->initialize($config);

        if ($page>1) {
           $x = $page*$config["per_page"];
           $i= $x-$config["per_page"];
        }else{
           $i=0;
        }

        $data["page"] = $page;
        $data["offset"] = $i;
        $data["per_page"] =10;
        $data["result"]= $this->admin_model->get_blog_model($i,$config["per_page"]);
        $data["links"] = explode('&nbsp;',$this->pagination->create_links());

      $data1['blogMo'] = "menu-open";
		$data1["blogActive"] = "active";
		$data1["listblogActive"] = "active";
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar',$data1);
		$this->load->view('admin/list_blog',$data);
		$this->load->view('admin/footer');
	}
	public function edit_blog_request()
	{
		$this->admin_model->edit_blog_request();
	}
	public function delete_blog($id)
	{
		$this->admin_model->delete_blog_request($id);
	}



	// About_Us Controller
	public function about_us($id='')
	{	
		$data[] = "";
		$data['about_data'] = $this->db->get('about')->row_array();
		$data1['aboutMo'] = "active";
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar',$data1);
		$this->load->view('admin/about',$data);
		$this->load->view('admin/footer');
	}
	public function add_about_request()
	{
		$this->admin_model->add_about_request();
	}
	public function edit_about_request()
	{
		$this->admin_model->edit_about_request();
	}



	// Settings Controller
	public function settings($id='')
	{	
		$data[] = "";
		$data['settings_data'] = $this->db->get('settings')->row_array();
		$data1['settingsMo'] = "active";
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar',$data1);
		$this->load->view('admin/settings',$data);
		$this->load->view('admin/footer');
	}
	public function add_settings_request()
	{
		$this->admin_model->add_settings_request();
	}
	public function edit_settings_request()
	{
		$this->admin_model->edit_settings_request();
	}

	// seo tags
	public function seo_tags()
   {        
      if(isset($_GET['page'])&&$_GET['page']!=''){
          $data['data'] = $this->db->where('page',$_GET['page'])->get("seo_tags")->row_array();
      }
      $data['gd']='this';
      $data['seoTags']='active';

      $this->load->view('admin/header',$data);
      $this->load->view('admin/sidebar',$data);
      $this->load->view('admin/seo_tags',$data);
      $this->load->view('admin/footer',$data);
   }
   public function updateSeoTags()
    {
        $this->admin_model->updateSeoTags();
    }

}

