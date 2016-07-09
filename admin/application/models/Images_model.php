<?php

class Images_model extends CI_Model {
    
    function uploadfiles(){

$target_dir =  BASE_URL."assets/uploaded/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);

$temp = explode(".", $_FILES["file"]["name"]);

$newfilename = round(microtime(true)) . '.' . end($temp);
$files_uploaded = move_uploaded_file($_FILES["file"]["tmp_name"],  $_SERVER['DOCUMENT_ROOT']."/ayurveda/admin/assets/uploaded/gallery_images/" . $newfilename);

$data = array(
              
                'image_name'      => $newfilename,
                'created_by'     => $this->session->userdata('id'),
                'created_on'     => date('Y-m-d h:i:s'),
                'updated_by'     => $this->session->userdata('id'),
                'updated_on'     => date('Y-m-d h:i:s')
        );
        
        
        $this->db->insert('tbl_resort_images', $data);


 return ($files_uploaded != 1) ? false : $_FILES["file"];

    }
    
    function delete($intMenuid) {

        $this->db->select('b.*');
        $this->db->from('tbl_resort_images b');
        $this->db->where('b.id', $intMenuid);
        
        $query = $this->db->get();
        
        $arrBranch = array();
        foreach ($query->result() as $row) {
            $arrBranch = $row;
        }
      
         $Image_name = $arrBranch->Image_name;
        
        $result = unlink($_SERVER['DOCUMENT_ROOT']."/ayurveda/admin/assets/uploaded/gallery_images/".$Image_name);

        if($result == 1)
        {
             $return_value =  $this->db->delete('tbl_resort_images', array('id' => $intMenuid));
                return  $return_value;
        }

    }
    
}
