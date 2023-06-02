<?php
    function upload_single_image($index,$folder){
        $this1 = &get_instance();
        if (!is_dir($folder)) {
            mkdir($folder);
        }
        $this1->load->library('upload');
        $config['upload_path'] = $folder;
        $config['overwrite'] = TRUE;
        $config['remove_spaces'] = TRUE;
        $config['allowed_types'] = 'jpg|jpeg|png';
        
        $this1->upload->initialize($config);

        if (!$this1->upload->do_upload($index)) {
            $data = false;
        } else {
            $data = $this1->upload->data();
        }

        return $data;
    }   

   
    function upload_multiple_image($index,$folder)
    {
        $this1 = &get_instance();
        $insertedids = array();
        if (!is_dir($folder)) {
            mkdir($folder);
        }
    
        $config = array(
            'upload_path' => $folder,
            'allowed_types' => 'jpg|jpeg|png',
            'overwrite' => TRUE,
            'remove_spaces' => TRUE
        );
        $this1->upload->initialize($config);

        $filesCount = count($_FILES[$index]['name']);
        for($i = 0; $i < ($filesCount); $i++){
            $_FILES['userFile']['name'] = $_FILES[$index]['name'][$i];
            $_FILES['userFile']['type'] = $_FILES[$index]['type'][$i];
            $_FILES['userFile']['tmp_name'] = $_FILES[$index]['tmp_name'][$i];
            $_FILES['userFile']['error'] = $_FILES[$index]['error'][$i];
            $_FILES['userFile']['size'] = $_FILES[$index]['size'][$i];

            if($this1->upload->do_upload('userFile')){
                $upload_data =$this1->upload->data();
                $full_path = substr($config['upload_path'],2).'/'.$upload_data['file_name'];
                $this1->db->insert('tbl_image',array('image_path'=>$full_path));
                $insertedids[] = $this1->db->insert_id();
            }else{
                $error = array('error' => $this1->upload->display_errors());
            }
        }
        return $ids = implode('|', $insertedids);
     
    }
?> 