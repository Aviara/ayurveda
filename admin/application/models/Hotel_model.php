<?php

class Hotel_model extends CI_Model {
    
    function insert_into_db() {
//        display($_POST);
//        exit;
        
        $arrPostData = (true == isset($_POST['params'])) ? $_POST['params'] : array();
        
       // $arrPostData = $_POST['params'];
        
        $strResort              = (true == isset($arrPostData['resortId']) && true == valStr($arrPostData['resortId'])) ? $arrPostData['resortId'] : NULL;
        $strroomTypeId          = (true == isset($arrPostData['room_type_id']) && true == valStr($arrPostData['room_type_id'])) ? $arrPostData['room_type_id'] : NULL;
        $strbedcost             = (true == isset($arrPostData['Cost_for_extra_bed']) && true == valStr($arrPostData['Cost_for_extra_bed'])) ? $arrPostData['Cost_for_extra_bed'] : NULL;
        $strromnumber           = (true == isset($arrPostData['roomno']) && true == valStr($arrPostData['roomno'])) ? $arrPostData['roomno'] : NULL;
        $strcstpernight         = (true == isset($arrPostData['Cost_per_night']) && true == valStr($arrPostData['Cost_per_night'])) ? $arrPostData['Cost_per_night'] : NULL;
        $strsize                = (true == isset($arrPostData['size']) && true == valStr($arrPostData['size'])) ? $arrPostData['size'] : NULL;
        $strdiscription         = (true == isset($arrPostData['Description']) && true == valStr($arrPostData['Description'])) ? $arrPostData['Description'] : NULL;
        $strview                = (true == isset($arrPostData['Window_view']) && true == valStr($arrPostData['Window_view'])) ? $arrPostData['Window_view'] : NULL;
        $strnoofbeds           = (true == isset($arrPostData['Number_of_beds']) && true == valStr($arrPostData['Number_of_beds'])) ? $arrPostData['Number_of_beds'] : NULL; 
//        $strroomstatus          = (true == isset($arrPostData['Status']) && true == valStr($arrPostData['Status'])) ? $arrPostData['Status'] : NULL; 
//         if($this->session->userdata('id') == 1){
//            $query = $this->db->query("SELECT * FROM branches ORDER BY id DESC LIMIT 1")->row_array();
            $data = array(
                'resortId' => $strResort,
                'room_type_Id' => $strroomTypeId,               
                'roomno' => $strromnumber,
                'Status' =>  'Availabal',
                'Number_of_beds' =>  $strnoofbeds,
                'Cost_for_extra_bed' => $strbedcost,
                'Cost_per_night' => $strcstpernight,
                'size' => $strsize,
                'Description' => $strdiscription ,
                'Window_view' => $strview,
                 'Created_on' => date('Y-m-d h:i:s'),
                //'updatedOn' =>date('Y-m-d h:i:s'),
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
       
        
        $this->db->insert('tbl_rooms', $data);
        
        return ($this->db->affected_rows() != 1) ? false : true;
    }
    function updateRoom() {
        
        $arrPostData = (true == isset($_POST['params'])) ? $_POST['params'] : array();
        
        $intId = (true == isset($arrPostData['id']) && true == valStr($arrPostData['id'])) ? $arrPostData['id'] : NULL;
        
        if (false == valStr($intId)) {
            $this->session->flashdata(array('message' => 'Hotel Id not an numbric value.'));
            return false;
        }
        
        $query = $this->db->get_where('tbl_rooms', array('id' => $intId));
        $objEmployee = (true == valArr($query->result())) ? current($query->result()) : NULL;
        
        if (false == valObj($objEmployee, 'stdClass')) {
            $this->session->flashdata(array('message' => 'Hotel details are not found in DB.'));
            return false;
        }
        
       $arrPostData = (true == isset($_POST['params'])) ? $_POST['params'] : array();
        
        $strResort              = (true == isset($arrPostData['resortId']) && true == valStr($arrPostData['resortId'])) ? $arrPostData['resortId'] : NULL;
        $strroomTypeId          = (true == isset($arrPostData['room_type_Id']) && true == valStr($arrPostData['room_type_Id'])) ? $arrPostData['room_type_Id'] : NULL;
        $strbedcost             = (true == isset($arrPostData['Cost_for_extra_bed']) && true == valStr($arrPostData['Cost_for_extra_bed'])) ? $arrPostData['Cost_for_extra_bed'] : NULL;
        $strromnumber           = (true == isset($arrPostData['roomno']) && true == valStr($arrPostData['roomno'])) ? $arrPostData['roomno'] : NULL;
        $strcstpernight         = (true == isset($arrPostData['Cost_per_night']) && true == valStr($arrPostData['Cost_per_night'])) ? $arrPostData['Cost_per_night'] : NULL;
        $strsize                = (true == isset($arrPostData['size']) && true == valStr($arrPostData['size'])) ? $arrPostData['size'] : NULL;
        $strdiscription         = (true == isset($arrPostData['Description']) && true == valStr($arrPostData['Description'])) ? $arrPostData['Description'] : NULL;
        $strview                = (true == isset($arrPostData['Window_view']) && true == valStr($arrPostData['Window_view'])) ? $arrPostData['Window_view'] : NULL;
        $strnoofbeds           = (true == isset($arrPostData['Number_of_beds']) && true == valStr($arrPostData['Number_of_beds'])) ? $arrPostData['Number_of_beds'] : NULL; 
        $strroomstatus          = (true == isset($arrPostData['Status']) && true == valStr($arrPostData['Status'])) ? $arrPostData['Status'] : NULL; 
////         if($this->session->userdata('id') == 1){
//            $query = $this->db->query("SELECT * FROM branches ORDER BY id DESC LIMIT 1")->row_array();
            $data = array(
                //'resortId' => $strResort,
                'roomno' => $strromnumber,
                'room_type_Id' => $strroomTypeId,
                'Status' =>  $strroomstatus,
                'Number_of_beds' =>  $strnoofbeds,
                'Cost_for_extra_bed' => $strbedcost,
                'Cost_per_night' => $strcstpernight,
                'size' => $strsize,
                'Description' => $strdiscription ,
                'Window_view' => $strview,
                'Updated_on' => date('Y-m-d h:i:s'),       
        );
        
        $this->db->where(array('id' => $intId));
        $this->db->update('tbl_rooms', $data);
        
        return ($this->db->affected_rows() != 1) ? false : true;
    }
     function delete($intStudentId) {
        return $this->db->delete('tbl_rooms', array('id' => $intStudentId));
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

