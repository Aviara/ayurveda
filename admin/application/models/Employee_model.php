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
        $strCityId              = (true == isset($arrPostData['city_id']) && true == valStr($arrPostData['city_id'])) ? $arrPostData['city_id'] : NULL;
        $strPanNo               = (true == isset($arrPostData['pan_no']) && true == valStr($arrPostData['pan_no'])) ? $arrPostData['pan_no'] : NULL;
        $strAddressLine1        = (true == isset($arrPostData['address_line1']) && true == valStr($arrPostData['address_line1'])) ? $arrPostData['address_line1'] : NULL;
        $strAddressLine2        = (true == isset($arrPostData['address_line2']) && true == valStr($arrPostData['address_line2'])) ? $arrPostData['address_line2'] : NULL;
        $strDrivingListienNo    = (true == isset($arrPostData['driving_listien_no']) && true == valStr($arrPostData['driving_listien_no'])) ? $arrPostData['driving_listien_no'] : NULL;
        $strAdharNo             = (true == isset($arrPostData['adhar_no']) && true == valStr($arrPostData['adhar_no'])) ? $arrPostData['adhar_no'] : NULL;
        $strAge                 = (true == isset($arrPostData['age']) && true == valStr($arrPostData['age'])) ? $arrPostData['age'] : NULL;
        $strBirthDate           = (true == isset($arrPostData['birth_date']) && true == valStr($arrPostData['birth_date'])) ? $arrPostData['birth_date'] : NULL;
        $strGender              = (true == isset($arrPostData['gender']) && true == valStr($arrPostData['gender'])) ? $arrPostData['gender'] : NULL;
        $strEmailId             = (true == isset($arrPostData['email_id']) && true == valStr($arrPostData['email_id'])) ? $arrPostData['email_id'] : NULL;
        $strOfficeEmailId       = (true == isset($arrPostData['office_email_id']) && true == valStr($arrPostData['office_email_id'])) ? $arrPostData['office_email_id'] : NULL;
        $strCity                = (true == isset($arrPostData['city']) && true == valStr($arrPostData['city'])) ? $arrPostData['city'] : NULL;
        $strLocation            = (true == isset($arrPostData['location']) && true == valStr($arrPostData['location'])) ? $arrPostData['location'] : NULL;
        $strArea                = (true == isset($arrPostData['area']) && true == valStr($arrPostData['area'])) ? $arrPostData['area'] : NULL;
        $strMobileNo            = (true == isset($arrPostData['mobile_no']) && true == valStr($arrPostData['mobile_no'])) ? $arrPostData['mobile_no'] : NULL;
        $strHomeNo              = (true == isset($arrPostData['home_no']) && true == valStr($arrPostData['home_no'])) ? $arrPostData['home_no'] : NULL;
        $strPassword            = (true == isset($arrPostData['password']) && true == valStr($arrPostData['password'])) ? md5($arrPostData['password']) : NULL;
        $strOldPassword         = (true == isset($arrPostData['old_password']) && true == valStr($arrPostData['old_password'])) ? md5($arrPostData['old_password']) : NULL;
      
         if($this->session->userdata('id') == 1){
            $query = $this->db->query("SELECT * FROM branches ORDER BY id DESC LIMIT 1")->row_array();
            $data = array(
                'first_name' => $strFirstName,
                'middle_name' => $strMiddleName,
                'last_name' => $strLastName,
                'branch_id' => $query['id']+1,
                'employee_type_id' => $strEmployeeTypeId,
                'city_id' => $strCityId,
                'pan_no' => $strPanNo,
                'address_line1' => $strAddressLine1,
                'address_line2' => $strAddressLine2,
                'driving_listien_no' => $strDrivingListienNo,
                'adhar_no' => $strAdharNo,
                'age' => $strAge,
                'birth_date' => $strBirthDate,
                'gender' => $strGender,
                'email_id' => $strEmailId,
                'office_email_id' => $strOfficeEmailId,
                'city' => $strCity,
                'location' => $strLocation,
                'area' => $strArea,
                'mobile_no' => $strMobileNo,
                'home_no' => $strHomeNo,
                'password' => $strPassword,
                'old_password' => $strOldPassword,
                'created_by' => (true == valStr($this->session->userdata('id'))) ? $this->session->userdata('id') : 1,
                'created_on' => date('Y-m-d h:i:s'),
                'updated_by' => (true == valStr($this->session->userdata('id'))) ? $this->session->userdata('id') : 1,
                'updated_on' => date('Y-m-d h:i:s')
        );
            
        }else{
             $data = array(
                'first_name' => $strFirstName,
                'middle_name' => $strMiddleName,
                'last_name' => $strLastName,
                'branch_id' => (true == valStr($this->session->userdata('branch_id'))) ? $this->session->userdata('branch_id') : 1,
                'employee_type_id' => $strEmployeeTypeId,
                'city_id' => (true == valStr($this->session->userdata('city_id'))) ? $this->session->userdata('city_id') : 1,
                'pan_no' => $strPanNo,
                'address_line1' => $strAddressLine1,
                'address_line2' => $strAddressLine2,
                'driving_listien_no' => $strDrivingListienNo,
                'adhar_no' => $strAdharNo,
                'age' => $strAge,
                'birth_date' => $strBirthDate,
                'gender' => $strGender,
                'email_id' => $strEmailId,
                'office_email_id' => $strOfficeEmailId,
                'city' => $strCity,
                'location' => $strLocation,
                'area' => $strArea,
                'mobile_no' => $strMobileNo,
                'home_no' => $strHomeNo,
                'password' => $strPassword,
                'old_password' => $strOldPassword,
                'created_by' => (true == valStr($this->session->userdata('id'))) ? $this->session->userdata('id') : 1,
                'created_on' => date('Y-m-d h:i:s'),
                'updated_by' => (true == valStr($this->session->userdata('id'))) ? $this->session->userdata('id') : 1,
                 'updated_on' => date('Y-m-d h:i:s')
        );
        }
       
        
        $this->db->insert('employees', $data);
        
        return ($this->db->affected_rows() != 1) ? false : true;
    }
    function updateEmployee() {
        
        $arrPostData = (true == isset($_POST['params'])) ? $_POST['params'] : array();
        
        $intId = (true == isset($arrPostData['id']) && true == valStr($arrPostData['id'])) ? $arrPostData['id'] : NULL;
        
        if (false == valStr($intId)) {
            $this->session->flashdata(array('message' => 'Employee Id not an numbric value.'));
            return false;
        }
        
        $query = $this->db->get_where('employees', array('id' => $intId));
        $objEmployee = (true == valArr($query->result())) ? current($query->result()) : NULL;
        
        if (false == valObj($objEmployee, 'stdClass')) {
            $this->session->flashdata(array('message' => 'Employee details are not found in DB.'));
            return false;
        }
        
       $arrPostData = (true == isset($_POST['params'])) ? $_POST['params'] : array();
        
        $strFirstName           = (true == isset($arrPostData['first_name']) && true == valStr($arrPostData['first_name'])) ? $arrPostData['first_name'] : $objEmployee->first_name;
        $strMiddleName          = (true == isset($arrPostData['middle_name']) && true == valStr($arrPostData['middle_name'])) ? $arrPostData['middle_name'] : $objEmployee->middle_name;
        $strLastName            = (true == isset($arrPostData['last_name']) && true == valStr($arrPostData['last_name'])) ? $arrPostData['last_name'] : $objEmployee->last_name;
        $strEmployeeTypeId      = (true == isset($arrPostData['employee_type_id']) && true == valStr($arrPostData['employee_type_id'])) ? $arrPostData['employee_type_id'] : $objEmployee->address_line1;
        $strPanNo                = (true == isset($arrPostData['pan_no']) && true == valStr($arrPostData['pan_no'])) ? $arrPostData['pan_no'] : $objEmployee->pan_no;
        $strAddressLine1        = (true == isset($arrPostData['address_line1']) && true == valStr($arrPostData['address_line1'])) ? $arrPostData['address_line1'] : $objEmployee->address_line1;
        $strAddressLine2        = (true == isset($arrPostData['address_line2']) && true == valStr($arrPostData['address_line2'])) ? $arrPostData['address_line2'] : $objEmployee->address_line2;
        $strDrivingListienNo    = (true == isset($arrPostData['driving_listien_no']) && true == valStr($arrPostData['driving_listien_no'])) ? $arrPostData['driving_listien_no'] : $objEmployee->driving_listien_no;
        $strAdharNo             = (true == isset($arrPostData['adhar_no']) && true == valStr($arrPostData['adhar_no'])) ? $arrPostData['adhar_no'] : $objEmployee->adhar_no;
        $strAge                 = (true == isset($arrPostData['age']) && true == valStr($arrPostData['age'])) ? $arrPostData['age'] : $objEmployee->age;
        $strBirthDate           = (true == isset($arrPostData['birth_date']) && true == valStr($arrPostData['birth_date'])) ? $arrPostData['birth_date'] : $objEmployee->birth_date;
        $strGender              = (true == isset($arrPostData['gender']) && true == valStr($arrPostData['gender'])) ? $arrPostData['gender'] : $objEmployee->gender;
        $strEmailId             = (true == isset($arrPostData['email_id']) && true == valStr($arrPostData['email_id'])) ? $arrPostData['email_id'] : $objEmployee->email_id;
        $strOfficeEmailId       = (true == isset($arrPostData['office_email_id']) && true == valStr($arrPostData['office_email_id'])) ? $arrPostData['office_email_id'] : $objEmployee->office_email_id;
        $strCity                = (true == isset($arrPostData['city']) && true == valStr($arrPostData['city'])) ? $arrPostData['city'] : $objEmployee->city;
        $strLocation            = (true == isset($arrPostData['location']) && true == valStr($arrPostData['location'])) ? $arrPostData['location'] : $objEmployee->location;
        $strArea                = (true == isset($arrPostData['area']) && true == valStr($arrPostData['area'])) ? $arrPostData['area'] : $objEmployee->area;
        $strMobileNo            = (true == isset($arrPostData['mobile_no']) && true == valStr($arrPostData['mobile_no'])) ? $arrPostData['mobile_no'] : $objEmployee->mobile_no;
        $strHomeNo              = (true == isset($arrPostData['home_no']) && true == valStr($arrPostData['home_no'])) ? $arrPostData['home_no'] : $objEmployee->home_no;
        $strPassword            = (true == isset($arrPostData['password']) && true == valStr($arrPostData['password'])) ? $arrPostData['password'] : $objEmployee->password;
        $strOldPassword         = (true == isset($arrPostData['old_password']) && true == valStr($arrPostData['old_password'])) ? $arrPostData['old_password'] : $objEmployee->old_password;
        
        $data = array(
            'first_name' => $strFirstName,
            'middle_name' => $strMiddleName,
            'last_name' => $strLastName,
            'employee_type_id' => $strEmployeeTypeId,
            'pan_no' => $strPanNo,
            'address_line1' => $strAddressLine1,
            'address_line2' => $strAddressLine2,
            'driving_listien_no' => $strDrivingListienNo,
            'adhar_no' => $strAdharNo,
            'age' => $strAge,
            'birth_date' => $strBirthDate,
            'gender' => $strGender,
            'email_id' => $strEmailId,
            'office_email_id' => $strOfficeEmailId,
            'city' => $strCity,
            'location' => $strLocation,
            'area' => $strArea,
            'mobile_no' => $strMobileNo,
            'home_no' => $strHomeNo,
            'updated_by' => (true == valStr($this->session->userdata('id'))) ? $this->session->userdata('id') : 1,
            'updated_on' => date('Y-m-d h:i:s')
        );
        
        $this->db->where(array('id' => $intId));
        $this->db->update('employees', $data);
        
        return ($this->db->affected_rows() != 1) ? false : true;
    }
    function delete($intMenuid) {
        return $this->db->delete('employees', array('id' => $intMenuid));
    }
function downloadEmployeeDetails() {
       /* $this->db->select('p.*, CONCAT(cl.first_name, \' \', cl.last_name) as client_name, CONCAT(e.first_name, \' \', e.last_name) as employee_name');
        $this->db->from('payments p');
        $this->db->join('challanes c', 'c.id = p.challan_id');
        $this->db->join('clients cl', 'cl.id = p.client_id');
        $this->db->join('employees e', 'e.id = p.employee_id');
        $query = $this->db->get();*/
        $query = $this->db->get('employees');
        $arrData = array();
        foreach ($query->result() as $row) {
            $arrData[$row->id] = $row;
        }

        return $arrData;
    }
}
