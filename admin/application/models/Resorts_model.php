<?php

class Resorts_model extends CI_Model {
    
    function insert_into_db() {
//        display($_POST);
//        exit;
        
        $arrPostData = (true == isset($_POST['params'])) ? $_POST['params'] : array();
        
       // $arrPostData = $_POST['params'];
        
        $strFirstName           = (true == isset($arrPostData['First_name']) && true == valStr($arrPostData['First_name'])) ? $arrPostData['First_name'] : NULL;
        $strMiddleName          = (true == isset($arrPostData['Middle_name']) && true == valStr($arrPostData['Middle_name'])) ? $arrPostData['Middle_name'] : NULL;
        $strLastName            = (true == isset($arrPostData['Last_name']) && true == valStr($arrPostData['Last_name'])) ? $arrPostData['Last_name'] : NULL;
        $strCountry_id          = (true == isset($arrPostData['Country_id']) && true == valStr($arrPostData['Country_id'])) ? $arrPostData['Country_id'] : NULL;
        $strState_id            = (true == isset($arrPostData['State_id']) && true == valStr($arrPostData['State_id'])) ? $arrPostData['State_id'] : NULL;
        $strCity_id             = (true == isset($arrPostData['City_id']) && true == valStr($arrPostData['City_id'])) ? $arrPostData['City_id'] : NULL;
        $strAddress             = (true == isset($arrPostData['Address']) && true == valStr($arrPostData['Address'])) ? $arrPostData['Address'] : NULL;
        $strStar_rating         = (true == isset($arrPostData['Star_rating']) && true == valStr($arrPostData['Star_rating'])) ? $arrPostData['Star_rating'] : NULL;
        $strDescription         = (true == isset($arrPostData['Description']) && true == valStr($arrPostData['Description'])) ? $arrPostData['Description'] : NULL;
        $strXcoordinate         = (true == isset($arrPostData['Xcoordinate']) && true == valStr($arrPostData['Xcoordinate'])) ? $arrPostData['Xcoordinate'] : NULL;
        $strYcoordinate         = (true == isset($arrPostData['Ycoordinate']) && true == valStr($arrPostData['Ycoordinate'])) ? $arrPostData['Ycoordinate'] : NULL;
        
//         if($this->session->userdata('id') == 1){
//            $query = $this->db->query("SELECT * FROM branches ORDER BY id DESC LIMIT 1")->row_array();
            $data = array(
                'first_name' => $strFirstName,
                'middle_name' => $strMiddleName,
                'last_name' => $strLastName,
                'country_id' => $strCountry_id,
                'state_id' => $strState_id ,
                'city_id' => $strCity_id,
                'address' => $strAddress ,
                'star_rating' => $strStar_rating ,
                'Description' => $strDescription, 
                'Xcoordinate' => $strXcoordinate,
                'Ycoordinate' => $strYcoordinate,
               
      //          'created_by' => (true == valStr($this->session->userdata('id'))) ? $this->session->userdata('id') : 1,
      //          'created_on' => date('Y-m-d h:i:s'),
      //          'updated_by' => (true == valStr($this->session->userdata('id'))) ? $this->session->userdata('id') : 1,
      //          'updated_on' => date('Y-m-d h:i:s')
        );
      
        $this->db->insert('resorts', $data);
        
        return ($this->db->affected_rows() != 1) ? false : true;
    }
    function delete($intMenuid) {
        return $this->db->delete('resorts', array('id' => $intMenuid));
    }
}