<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct() {
        parent::__construct();
        if($this->session->userdata('admin_id')){
			redirect(base_url('admin/dashboard'));
		}
    }

	public function index()
	{
		$this->load->view('admin/login');
	}
	public function login_request()
	{
		$this->db->where('username', $_POST['username']);  
		$query = $this->db->get('admin');  
        if ($query->num_rows() == 1)  
        {  
            $this->db->where('username', $_POST['username'])->where('password', $_POST['password']);  
			$query1 = $this->db->get('admin')->row_array(); 
			if (isset($query1)){
				$data = array(  
                	'admin_id' => $query1['id'] , 
                );    
				$this->session->set_userdata($data); 
				$this->session->set_flashdata('msg','Login Successfully'); 
				redirect('admin/dashboard/settings');
			}
			else{
				$this->session->set_flashdata('msg',"Invalid Username and Password"); 
				redirect('login');
			}
        } else {  
        	$this->session->set_flashdata('msg',"Invalid Username"); 
        	redirect('login');
        }  
	}

	// public function adminLoginRequest(){
        
 //        $count = $this->db->where('username',$_POST['admin_email'])->count_all_results('admin');
 //        if($count==1){
 //            $userData = $this->db->where('username',$_POST['admin_email'])->where('password',md5($_POST['admin_password']))->get('admin')->row_array();
       
 //            if(!empty($userData)){
 //                $this->session->set_userdata('admin_id',$userData['id']);
 //                $this->session->set_userdata('admin_name',$userData['name']);
 //                $res['status'] = true;
 //                $res['msg'] = "Successfully Login!";
 //                $res['url'] ='admin/dashboard/product_list';
 //            }elseif($this->session->userdata('admin_id')){
 //                $res['status'] = true;
 //                $res['msg'] = "Successfully Login!";
 //                $res['url'] ='admin/dashboard/product_list';
 //            }else{
 //                $res['status'] = false;
 //                $res['msg'] = "You've entered wrong password";
 //            }
 //        }else{
 //            $res['status'] = false;
 //            $res['msg'] = "User does not exist!";
 //        }
 //        echo json_encode($res);
 //    }
}
