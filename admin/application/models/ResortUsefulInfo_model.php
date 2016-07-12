<?php

class ResortUsefulInfo_model extends CI_Model {
    
    function insert_into_db() {
//        display($_POST);
//        exit;
        
        $arrPostData = (true == isset($_POST['paramsr'])) ? $_POST['paramsr'] : array();
        
       // $arrPostData = $_POST['params'];
        
        
                   $strresortId  = (true == isset($arrPostData['resortId']) && true == valStr($arrPostData['resortId'])) ? $arrPostData['resortId'] : NULL;
            $strheading    = (true == isset($arrPostData['heading']) && true == valStr($arrPostData['heading'])) ? $arrPostData['heading'] : NULL;
        $strDescription    = (true == isset($arrPostData['Description']) && true == valStr($arrPostData['Description'])) ? $arrPostData['Description'] : NULL;
        
        $data = array(
                'resortId' => $strresortId,
                'heading' => $strheading,
                'Description' => $strDescription,
                'Created_by' => (true == valStr($this->session->userdata('id'))) ? $this->session->userdata('id') : 1,
                'Created_on' => date('Y-m-d h:i:s'),
                'Updated_by' => (true == valStr($this->session->userdata('id'))) ? $this->session->userdata('id') : 1,
                'Updated_on' => date('Y-m-d h:i:s')
        );
            
       
       
        
        $this->db->insert('tbl_useful_info', $data);
        
        return ($this->db->affected_rows() != 1) ? false : true;
    }
    function updateResortUsefulInfo() {
//                display($_POST);
//        exit;
        $arrPostData = (true == isset($_POST['paramsr'])) ? $_POST['paramsr'] : array();
        
        $intId = (true == isset($arrPostData['id']) && true == valStr($arrPostData['id'])) ? $arrPostData['id'] : NULL;
        
        if (false == valStr($intId)) {
            $this->session->flashdata(array('message' => 'resort Id not an numbric value.'));
            return false;
        }
        
        $query = $this->db->get_where('tbl_useful_info', array('id' => $intId));
        $objresort = (true == valArr($query->result())) ? current($query->result()) : NULL;
        
        if (false == valObj($objresort, 'stdClass')) {
            $this->session->flashdata(array('message' => 'resort details are not found in DB.'));
            return false;
        }
        
       $arrPostData = (true == isset($_POST['paramsr'])) ? $_POST['paramsr'] : array();
        
        
             $strresortId  = (true == isset($arrPostData['resortId']) && true == valStr($arrPostData['resortId'])) ? $arrPostData['resortId'] : $objresort->id;
            $strheading    = (true == isset($arrPostData['heading']) && true == valStr($arrPostData['heading'])) ? $arrPostData['heading'] : $objresort->id;
        $strDescription    = (true == isset($arrPostData['Description']) && true == valStr($arrPostData['Description'])) ? $arrPostData['Description'] : $objresort->id;
        
        $data = array(
                'resortId' => $strresortId,
                'heading' => $strheading,
                'Description' => $strDescription,
                'created_by' => (true == valStr($this->session->userdata('id'))) ? $this->session->userdata('id') : 1,
                'created_on' => date('Y-m-d h:i:s'),
                'updated_by' => (true == valStr($this->session->userdata('id'))) ? $this->session->userdata('id') : 1,
                'updated_on' => date('Y-m-d h:i:s')
        );
        
        $this->db->where(array('id' => $intId));
        $this->db->update('tbl_useful_info', $data);
        
        return ($this->db->affected_rows() != 1) ? false : true;
    }
    function delete($intMenuid) {
        return $this->db->delete('tbl_useful_info', array('id' => $intMenuid));
    }

}
