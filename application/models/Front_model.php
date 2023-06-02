<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front_model extends CI_Model {
    public function get_banner_model() 
    {
        $query = $this->db->get("banner");
        return $query->result();
    }

    public function get_about_model() 
    {
        $query = $this->db->get("about");
        return $query->row_array();
    }

    public function get_testimonials_model() 
    {
        $query = $this->db->get("testimonial");
        return $query->result();
    }

    public function get_blog_model() 
    {
        $query = $this->db->order_by('id','DESC')->limit(2)->get("blog");
        return $query->result();
    }
    public function get_all_blog_model($start,$limit) 
    {
        $this->db->limit($limit, $start);
        $query = $this->db->order_by('update_datetime','DESC')->get("blog");
        return $query->result();
    }
    public function get_team_model() 
    {
        $query = $this->db->get("team");
        return $query->result();
    }
    public function get_division_model() 
    {
        $query = $this->db->get("division");
        return $query->result();
    }

    public function get_settings_model() 
    {
        $query = $this->db->get("settings");
        return $query->row_array();
    }
    
    
}   
