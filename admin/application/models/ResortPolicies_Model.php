<?php

class ResortPolicies_model extends CI_Model {
    
    function insert_into_db() {
//        display($_POST);
//        exit;
        
        $arrPostData = (true == isset($_POST['params'])) ? $_POST['params'] : array();
        
       // $arrPostData = $_POST['params'];
        
        $strheading              = (true == isset($arrPostData['heading']) && true == valStr($arrPostData['heading'])) ? $arrPostData['heading'] : NULL;
        $strDescription         = (true == isset($arrPostData['Description']) && true == valStr($arrPostData['Description'])) ? $arrPostData['Description'] : NULL;

//         if($this->session->userdata('id') == 1){
//            $query = $this->db->query("SELECT * FROM branches ORDER BY id DESC LIMIT 1")->row_array();
            $data = array(
                'heading' => $strheading,
                'Description' => $strDescription,
                'Created_on' => date('Y-m-d h:i:s'),
//                'createdBy' => $strFirstName,
//                'createdOn' => $strEmployeeTypeId,
//               // 'updatedBy' => $strAddressLine1,
//                'updatedOn' => $strMobileNo,
        );
            
//        }else{
//             $data = array(
//                'first_name' => $strFirstName,
//                'employee_type_id' => $strEmployeeTypeId,
//                'address_line1' => $strAddressLine1,
//                'mobile_no' => $strMobileNo,
//        );
//        }
       
        
        $this->db->insert('tbl_policies', $data);
        
        return ($this->db->affected_rows() != 1) ? false : true;
    }
    function updateResortPolicies() {
        
        $arrPostData = (true == isset($_POST['params'])) ? $_POST['params'] : array();
        
        $intId = (true == isset($arrPostData['id']) && true == valStr($arrPostData['id'])) ? $arrPostData['id'] : NULL;
        
        if (false == valStr($intId)) {
            $this->session->flashdata(array('message' => 'RoomPolicies Id not an numbric value.'));
            return false;
        }
        
        $query = $this->db->get_where('tbl_policies', array('id' => $intId));
        $objEmployee = (true == valArr($query->result())) ? current($query->result()) : NULL;
        
        if (false == valObj($objEmployee, 'stdClass')) {
            $this->session->flashdata(array('message' => 'Hotel details are not found in DB.'));
            return false;
        }
        
       $arrPostData = (true == isset($_POST['params'])) ? $_POST['params'] : array();
        
        
        $strheading         = (true == isset($arrPostData['heading']) && true == valStr($arrPostData['heading'])) ? $arrPostData['heading'] : NULL;
        $strDescription     = (true == isset($arrPostData['Description']) && true == valStr($arrPostData['Description'])) ? $arrPostData['Description'] : NULL;
//         if($this->session->userdata('id') == 1){
//            $query = $this->db->query("SELECT * FROM branches ORDER BY id DESC LIMIT 1")->row_array();
            $data = array(
                //'resortId' => $strResort,
                'heading' => $strheading,
                'Description' => $strDescription,
                'Updated_on' => date('Y-m-d h:i:s'),
                
                
        );
        
        $this->db->where(array('id' => $intId));
        $this->db->update('tbl_policies', $data);
        
        return ($this->db->affected_rows() != 1) ? false : true;
    }
     function delete($intResortPoliciesId) {
        return $this->db->delete('tbl_policies', array('id' => $intResortPoliciesId));
}
function downloadStudentDetails() {
       /* $this->db->select('p.*, CONCAT(cl.first_name, \' \', cl.last_name) as client_name, CONCAT(e.first_name, \' \', e.last_name) as employee_name');
        $this->db->from('payments p');
        $this->db->join('challanes c', 'c.id = p.challan_id');
        $this->db->join('clients cl', 'cl.id = p.client_id');
        $this->db->join('employees e', 'e.id = p.employee_id');
        $query = $this->db->get();*/
        $query = $this->db->get('tbl_rooms');
        $arrData = array();
        foreach ($query->result() as $row) {
            $arrData[$row->id] = $row;
        }
        return $arrData;
    }
}

