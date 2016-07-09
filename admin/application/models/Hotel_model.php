<?php

class Hotel_model extends CI_Model {
    
    function insert_into_db() {
//        display($_POST);
//        exit;
        
        $arrPostData = (true == isset($_POST['params'])) ? $_POST['params'] : array();
        
       // $arrPostData = $_POST['params'];
        
        $strResort              = (true == isset($arrPostData['resortId']) && true == valStr($arrPostData['resortId'])) ? $arrPostData['resortId'] : NULL;
        $strroomTypeId          = (true == isset($arrPostData['roomTypeId']) && true == valStr($arrPostData['roomTypeId'])) ? $arrPostData['roomTypeId'] : NULL;
        $strbedcost             = (true == isset($arrPostData['costForExtraBed']) && true == valStr($arrPostData['costForExtraBed'])) ? $arrPostData['costForExtraBed'] : NULL;
        $strromnumber           = (true == isset($arrPostData['roomNumber']) && true == valStr($arrPostData['roomNumber'])) ? $arrPostData['roomNumber'] : NULL;
        $strcstpernight         = (true == isset($arrPostData['costPerNight']) && true == valStr($arrPostData['costPerNight'])) ? $arrPostData['costPerNight'] : NULL;
        $strsize                = (true == isset($arrPostData['size']) && true == valStr($arrPostData['size'])) ? $arrPostData['size'] : NULL;
        $strdiscription         = (true == isset($arrPostData['bedDiscription']) && true == valStr($arrPostData['bedDiscription'])) ? $arrPostData['bedDiscription'] : NULL;
        $strview                = (true == isset($arrPostData['view']) && true == valStr($arrPostData['view'])) ? $arrPostData['view'] : NULL;
        $strnoofrooms           = (true == isset($arrPostData['noofRooms']) && true == valStr($arrPostData['noofRooms'])) ? $arrPostData['noofRooms'] : NULL; 
        $strroomstatus          = (true == isset($arrPostData['roomStatus']) && true == valStr($arrPostData['roomStatus'])) ? $arrPostData['roomStatus'] : NULL; 
//         if($this->session->userdata('id') == 1){
//            $query = $this->db->query("SELECT * FROM branches ORDER BY id DESC LIMIT 1")->row_array();
            $data = array(
                'resortId' => $strResort,
                'roomTypeId' => $strroomTypeId,
                'costForExtraBed' => $strbedcost,
                'roomNumber' =>  $strromnumber,
                'costPerNight' =>  $strcstpernight,
                'size' => $strsize,
                'bedDiscription' => $strdiscription,
                'view' => $strview,
                'noofRooms' => $strnoofrooms,
                'roomStatus' => $strroomstatus,
                 'createdOn' => date('Y-m-d h:i:s'),
                'updatedOn' =>date('Y-m-d h:i:s'),
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
        $strroomTypeId          = (true == isset($arrPostData['roomTypeId']) && true == valStr($arrPostData['roomTypeId'])) ? $arrPostData['roomTypeId'] : NULL;
        $strbedcost             = (true == isset($arrPostData['costForExtraBed']) && true == valStr($arrPostData['costForExtraBed'])) ? $arrPostData['costForExtraBed'] : NULL;
        $strromnumber           = (true == isset($arrPostData['roomNumber']) && true == valStr($arrPostData['roomNumber'])) ? $arrPostData['roomNumber'] : NULL;
        $strcstpernight         = (true == isset($arrPostData['costPerNight']) && true == valStr($arrPostData['costPerNight'])) ? $arrPostData['costPerNight'] : NULL;
        $strsize                = (true == isset($arrPostData['size']) && true == valStr($arrPostData['size'])) ? $arrPostData['size'] : NULL;
        $strdiscription         = (true == isset($arrPostData['bedDiscription']) && true == valStr($arrPostData['bedDiscription'])) ? $arrPostData['bedDiscription'] : NULL;
        $strview                = (true == isset($arrPostData['view']) && true == valStr($arrPostData['view'])) ? $arrPostData['view'] : NULL;
        $strnoofrooms           = (true == isset($arrPostData['noofRooms']) && true == valStr($arrPostData['noofRooms'])) ? $arrPostData['noofRooms'] : NULL; 
        $strroomstatus          = (true == isset($arrPostData['roomStatus']) && true == valStr($arrPostData['roomStatus'])) ? $arrPostData['roomStatus'] : NULL; 
//         if($this->session->userdata('id') == 1){
//            $query = $this->db->query("SELECT * FROM branches ORDER BY id DESC LIMIT 1")->row_array();
            $data = array(
                //'resortId' => $strResort,
                'roomTypeId' => $strroomTypeId,
                'costForExtraBed' => $strbedcost,
                'roomNumber' =>  $strromnumber,
                'costPerNight' =>  $strcstpernight,
                'size' => $strsize,
                'bedDiscription' => $strdiscription,
                'view' => $strview,
                'noofRooms' => $strnoofrooms,
                'roomStatus' => $strroomstatus,
                
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

