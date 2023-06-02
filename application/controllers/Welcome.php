<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function __construct() {
		parent :: __construct();
	//    $this->load->model('front_model');
    }

	public function index()
	{		
		$this->load->view('header');
		$this->load->view('index');
		$this->load->view('footer');
	}

	public function about()
	{		
		$this->load->view('header');
		$this->load->view('about');
		$this->load->view('footer');
	}
	public function contactus()
	{		
		$this->load->view('header');
		$this->load->view('contact');
		$this->load->view('footer');
	}
    
    public function software_development_services()
	{		
		$this->load->view('header');
		$this->load->view('software_development_services');
		$this->load->view('footer');
	}

    public function web_development_services()
	{		
		$this->load->view('header');
		$this->load->view('web_development_services');
		$this->load->view('footer');
	}

    public function website_design_services()
	{		
		$this->load->view('header');
		$this->load->view('website_design_services');
		$this->load->view('footer');
	}

    public function search_engine_optimization()
	{		
		$this->load->view('header');
		$this->load->view('search_engine_optimization');
		$this->load->view('footer');
	}

    public function social_media_marketing_services()
	{		
		$this->load->view('header');
		$this->load->view('social_media_marketing_services');
		$this->load->view('footer');
	}

    public function ppc_services()
	{		
		$this->load->view('header');
		$this->load->view('ppc_services');
		$this->load->view('footer');
	}

    public function content_writing_services()
	{		
		$this->load->view('header');
		$this->load->view('content_writing_services');
		$this->load->view('footer');
	}

    public function email_marketing_services()
	{		
		$this->load->view('header');
		$this->load->view('email_marketing_services');
		$this->load->view('footer');
	}

    public function project_detail()
	{		
		$this->load->view('header');
		$this->load->view('project_detail');
		$this->load->view('footer');
	}

    public function blog_single()
	{		
		$this->load->view('header');
		$this->load->view('blog_single');
		$this->load->view('footer');
	}
   
    
    
    

	// send email when contact us form filled
    public function sendcontactmailtoadmin($id){
   		$useremail= $this->db->where('id',$id)->get('contactus')->row_array();

         // Load PHPMailer library
         $this->load->library('phpmailer_lib');
        
         // PHPMailer object
         $mail = $this->phpmailer_lib->load();
        
         // SMTP configuration
         $mail->IsSMTP();
         //   $mail->SMTPDebug = SMTP::DEBUG_SERVER; // for detailed debug output
         $mail->Host     = '';
         $mail->SMTPAuth = true;
         $mail->Username = '';
         $mail->Password = '';
         $mail->SMTPSecure = 'tls';
         $mail->Port     = 587;
        
         $mail->setFrom('info@meallay.ca', 'meallay');
         $mail->addReplyTo('info@meallay.ca', 'meallay');
        
        
         $to = 'info@meallay.ca';
        
         $from = 'info@meallay.ca';
         $mail->addAddress($to, $from);
         // Email subject
         $mail->Subject = 'Contact us Form';
        
         // Set email format to HTML
         $mail->isHTML(true);
        
        
         $mesg="";
         $data11=array();
         $data11=array(
             'uname'=>$useremail['name'],
             'email'=>$useremail['email'],
             'phone'=>$useremail['phonenum'],
             'subject'=>$useremail['subject'],
             'message'=>$useremail['message'],
         );
        
         $mesg.=$this->load->view('emailtemplate/contactform',$data11,TRUE);
        
         $headers  = 'MIME-Version: 1.0' . "\r\n";
         $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        
         // Create email headers
         $headers .= 'From: '.$from."\r\n".
         'Reply-To: '.$from."\r\n" .
         'X-Mailer: PHP/' . phpversion();
        
         $mail->Body = $mesg;
        
         // Send email
         if($mail->send()){
             return 1;
         }else{
             return 0;
         }
    
	}


}
