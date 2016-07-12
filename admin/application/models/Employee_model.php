<?php

class Employee_model extends CI_Model {
    
    function insert_into_db() {
//        display($_POST);
//        exit;
        
        $arrPostData = (true == isset($_POST['params'])) ? $_POST['params'] : array();
        
       // $arrPostData = $_POST['params'];
        
        $strFirstName           = (true == isset($arrPostData['first_name']) && true == valStr($arrPostData['first_name'])) ? $arrPostData['first_name'] : NULL;
        $strMiddleName          = (true == isset($arrPostData['middle_name']) && true == valStr($arrPostData['middle_name'])) ? $arrPostData['middle_name'] : NULL;
        $strLastName            = (true == isset($arrPostData['last_name']) && true == valStr($arrPostData['last_name'])) ? $arrPostData['last_name'] : NULL;
        $strEmployeeTypeId      = (true == isset($arrPostData['employee_type_id']) && true == valStr($arrPostData['employee_type_id'])) ? $arrPostData['employee_type_id'] : NULL;
        $strAddressLine1        = (true == isset($arrPostData['address_line1']) && true == valStr($arrPostData['address_line1'])) ? $arrPostData['address_line1'] : NULL;
        $strAge                 = (true == isset($arrPostData['age']) && true == valStr($arrPostData['age'])) ? $arrPostData['age'] : NULL;
        $strBirthDate           = (true == isset($arrPostData['birth_date']) && true == valStr($arrPostData['birth_date'])) ? $arrPostData['birth_date'] : NULL;
        $strGender              = (true == isset($arrPostData['gender']) && true == valStr($arrPostData['gender'])) ? $arrPostData['gender'] : NULL;
        $strEmailId             = (true == isset($arrPostData['email_id']) && true == valStr($arrPostData['email_id'])) ? $arrPostData['email_id'] : NULL;
        $strOfficeEmailId       = (true == isset($arrPostData['office_email_id']) && true == valStr($arrPostData['office_email_id'])) ? $arrPostData['office_email_id'] : NULL;
        $strMobileNo            = (true == isset($arrPostData['mobile_no']) && true == valStr($arrPostData['mobile_no'])) ? $arrPostData['mobile_no'] : NULL;
        $strPassword            = (true == isset($arrPostData['password']) && true == valStr($arrPostData['password'])) ? md5($arrPostData['password']) : NULL;
        $strOldPassword         = (true == isset($arrPostData['old_password']) && true == valStr($arrPostData['old_password'])) ? md5($arrPostData['old_password']) : NULL;
      
       
            $data = array(
                'first_name' => $strFirstName,
                'middle_name' => $strMiddleName,
                'last_name' => $strLastName,
                'employee_type_id' => $strEmployeeTypeId,
                'address_line1' => $strAddressLine1,
                'age' => $strAge,
                'birth_date' => $strBirthDate,
                'gender' => $strGender,
                'email_id' => $strEmailId,
                'office_email_id' => $strOfficeEmailId,
                'mobile_no' => $strMobileNo,
                'password' => $strPassword,
                'old_password' => $strOldPassword,
                'created_by' => (true == valStr($this->session->userdata('id'))) ? $this->session->userdata('id') : 1,
                'created_on' => date('Y-m-d h:i:s'),
                'updated_by' => (true == valStr($this->session->userdata('id'))) ? $this->session->userdata('id') : 1,
                'updated_on' => date('Y-m-d h:i:s')
        );
            
        
        $this->db->insert('tbl_employees', $data);
        
        return ($this->db->affected_rows() != 1) ? false : true;
    }
    function updateEmployee() {
        
        $arrPostData = (true == isset($_POST['params'])) ? $_POST['params'] : array();
        
        $intId = (true == isset($arrPostData['id']) && true == valStr($arrPostData['id'])) ? $arrPostData['id'] : NULL;
        
        $arrPostData = (true == isset($_POST['params'])) ? $_POST['params'] : array();
        
        
        $strFirstName           = (true == isset($arrPostData['first_name']) && true == valStr($arrPostData['first_name'])) ? $arrPostData['first_name'] : NULL;
        $strMiddleName          = (true == isset($arrPostData['middle_name']) && true == valStr($arrPostData['middle_name'])) ? $arrPostData['middle_name'] : NULL;
        $strLastName            = (true == isset($arrPostData['last_name']) && true == valStr($arrPostData['last_name'])) ? $arrPostData['last_name'] : NULL;
        $strEmployeeTypeId      = (true == isset($arrPostData['employee_type_id']) && true == valStr($arrPostData['employee_type_id'])) ? $arrPostData['employee_type_id'] : NULL;
        $strAddressLine1        = (true == isset($arrPostData['address_line1']) && true == valStr($arrPostData['address_line1'])) ? $arrPostData['address_line1'] : NULL;
        $strAge                 = (true == isset($arrPostData['age']) && true == valStr($arrPostData['age'])) ? $arrPostData['age'] : NULL;
        $strBirthDate           = (true == isset($arrPostData['birth_date']) && true == valStr($arrPostData['birth_date'])) ? $arrPostData['birth_date'] : NULL;
        $strGender              = (true == isset($arrPostData['gender']) && true == valStr($arrPostData['gender'])) ? $arrPostData['gender'] : NULL;
        $strEmailId             = (true == isset($arrPostData['email_id']) && true == valStr($arrPostData['email_id'])) ? $arrPostData['email_id'] : NULL;
        $strOfficeEmailId       = (true == isset($arrPostData['office_email_id']) && true == valStr($arrPostData['office_email_id'])) ? $arrPostData['office_email_id'] : NULL;
        $strMobileNo            = (true == isset($arrPostData['mobile_no']) && true == valStr($arrPostData['mobile_no'])) ? $arrPostData['mobile_no'] : NULL;
        $strPassword            = (true == isset($arrPostData['password']) && true == valStr($arrPostData['password'])) ? md5($arrPostData['password']) : NULL;
        $strOldPassword         = (true == isset($arrPostData['old_password']) && true == valStr($arrPostData['old_password'])) ? md5($arrPostData['old_password']) : NULL;
      
       
            $data = array(
                'first_name' => $strFirstName,
                'middle_name' => $strMiddleName,
                'last_name' => $strLastName,
                'employee_type_id' => $strEmployeeTypeId,
                'address_line1' => $strAddressLine1,
                'age' => $strAge,
                'birth_date' => $strBirthDate,
                'gender' => $strGender,
                'email_id' => $strEmailId,
                'office_email_id' => $strOfficeEmailId,
                'mobile_no' => $strMobileNo,
                'password' => $strPassword,
                'old_password' => $strOldPassword,
                'created_by' => (true == valStr($this->session->userdata('id'))) ? $this->session->userdata('id') : 1,
                'created_on' => date('Y-m-d h:i:s'),
                'updated_by' => (true == valStr($this->session->userdata('id'))) ? $this->session->userdata('id') : 1,
                'updated_on' => date('Y-m-d h:i:s')
        );
            
        $this->db->where(array('id' => $intId));
        $this->db->update('tbl_employees', $data);
        
        return ($this->db->affected_rows() != 1) ? false : true;
    }
    function delete($intMenuid) {
        return $this->db->delete('tbl_employees', array('id' => $intMenuid));
    }
function downloadEmployeeDetails() {
       /* $this->db->select('p.*, CONCAT(cl.first_name, \' \', cl.last_name) as client_name, CONCAT(e.first_name, \' \', e.last_name) as employee_name');
        $this->db->from('payments p');
        $this->db->join('challanes c', 'c.id = p.challan_id');
        $this->db->join('clients cl', 'cl.id = p.client_id');
        $this->db->join('employees e', 'e.id = p.employee_id');
        $query = $this->db->get();*/
        $query = $this->db->get('tbl_employees');
        $arrData = array();
        foreach ($query->result() as $row) {
            $arrData[$row->id] = $row;
        }

        return $arrData;
    }
}
