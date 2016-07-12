    <?php

    class RoomType_model extends CI_Model {

        function insert_into_db() {

            $arrPostData = (true == isset($_POST['params'])) ? $_POST['params'] : array();

            $strName                = (true == isset($arrPostData['name']) && true == valStr($arrPostData['name'])) ? $arrPostData['name'] : NULL;
            $strDescription         = (true == isset($arrPostData['description']) && true == valStr($arrPostData['description'])) ? $arrPostData['description'] : NULL;

            $data = array(
                'name' => $strName,
                'description' => $strDescription,
                'created_by' => (true == valStr($this->session->userdata('id'))) ? $this->session->userdata('id') : 1,
                'created_on' => date('Y-m-d h:i:s'),
                'updated_by' => (true == valStr($this->session->userdata('id'))) ? $this->session->userdata('id') : 1,
                'updated_on' => date('Y-m-d h:i:s')
            );

            $this->db->insert('employee_types', $data);

            return ($this->db->affected_rows() != 1) ? false : true;
        }
        
    function updateRoomType() {
        
        $arrPostData = (true == isset($_POST['params'])) ? $_POST['params'] : array();
        
        $intId = (true == isset($arrPostData['id']) && true == valStr($arrPostData['id'])) ? $arrPostData['id'] : NULL;
        
        if (false == valStr($intId)) {
            $this->session->flashdata(array('message' => 'Employee tyee Id not an numbric value.'));
            return false;
        }
        
        $query = $this->db->get_where('employee_types', array('id' => $intId));
        $objEmployeeType = (true == valArr($query->result())) ? current($query->result()) : NULL;
        
        if (false == valObj($objEmployeeType, 'stdClass')) {
            $this->session->flashdata(array('message' => 'Employee tyee details are not found in DB.'));
            return false;
        }
        
       $arrPostData = (true == isset($_POST['params'])) ? $_POST['params'] : array();

            $strName                = (true == isset($arrPostData['name']) && true == valStr($arrPostData['name'])) ? $arrPostData['name'] : $objEmployeeType->name;
            $strDescription         = (true == isset($arrPostData['description']) && true == valStr($arrPostData['description'])) ? $arrPostData['description'] : $objEmployeeType->description;

            $data = array(
                'name' => $strName,
                'description' => $strDescription,
                'created_by' => (true == valStr($this->session->userdata('id'))) ? $this->session->userdata('id') : null,
                'created_on' => date('Y-m-d h:i:s'),
                'updated_by' => (true == valStr($this->session->userdata('id'))) ? $this->session->userdata('id') : null,
                'updated_on' => date('Y-m-d h:i:s')
            );
        
        $this->db->where(array('id' => $intId));
        $this->db->update('employee_types', $data);
        
        return ($this->db->affected_rows() != 1) ? false : true;
    }
        function delete($intEmployeeTypeId) {
            return $this->db->delete('employee_types', array('id' => $intEmployeeTypeId));
        }
        
        
   function getEmployeeTypeDetails() {
  
        $query = $this->db->get('employee_types');
        $arrData = array();
        foreach ($query->result() as $row) {
            $arrData[$row->id] = $row;
        }
        return $arrData;
      
    }
    }
