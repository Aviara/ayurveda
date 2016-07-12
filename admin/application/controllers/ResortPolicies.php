<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ResortPolicies extends CI_Controller {

    public function index() {
        $this->load->view('includes/header');
        $this->load->view('includes/sidebar');
        $this->load->view('branches/branches-add');
        $this->load->view('includes/footer');
    }

    public function getPoliciesById($intResortPoliciesId) {
        $query = $this->db->get_where('tbl_policies', array('id' => $intResortPoliciesId));
        
        $arrResortPoliciesId = array();
        foreach ($query->result() as $row) {
            $arrResortPoliciesId = $row;
        }
        
        echo json_encode($arrResortPoliciesId);
        exit;
    }
    
//    public function getEmployeeType($intEmployeeTypeId) {
//        $query = $this->db->get_where('employee_types', array('id' => $intEmployeeTypeId));
//        
//        $arrEmployee = array();
//        foreach ($query->result() as $row) {
//            $arrEmployee = $row;
//        }
//        
//        echo json_encode($arrEmployee);
//        exit;
//    }

   
    
    public function getAllPoliciesByResottId() {   //***** Where is the id ?? *******//
        $query = $this->db->get('tbl_policies');

        $arrData = array();
        foreach ($query->result() as $row) {
            $arrData[$row->id] = $row;
        }
        
        echo json_encode( $arrData);
        exit;
    }

    public function saveResortPolicies() {
        $this->load->model('ResortPolicies_Model');
            $intInsert = $this->ResortPolicies_Model->insert_into_db();

        echo json_encode(array('success' => $intInsert));
        exit;
    }
    
//    public function saveEmployeeType() {
//        $this->load->model('ResortPolicies_Model');
//        $intInsert = $this->employeetype_model->insert_into_db();
//
//        echo json_encode(array('success' => $intInsert));
//        exit;
//    }

    public function editResortPolicies() {
          $this->load->model('ResortPolicies_Model');
        $intInsert = $this->ResortPolicies_Model->updateResortPolicies();

        echo json_encode(array('success' => $intInsert));
        exit;
    }
    
//     public function editEmployeeType() {
//          $this->load->model('stud_model');
//        $intInsert = $this->employeetype_model->updateEmployeeType();
//
//        echo json_encode(array('success' => $intInsert));
//        exit;
//    }

    public function deleteResortPolicies($deleteRoomPolicies) {
        $this->load->model('ResortPolicies_Model');
        $boolDeleted = $this->ResortPolicies_Model->delete($deleteRoomPolicies);
        
        echo json_encode(array('success' => $boolDeleted));
        exit;
    }
    
//    public function deleteEmployeeType($intEmployeeTypeId) {
//        $this->load->model('employeetype_model');
//        $boolDeleted = $this->employeetype_model->delete($intEmployeeTypeId);
//        
//        echo json_encode(array('success' => $boolDeleted));
//        exit;
//    }
    
    
public function downloadStudentDetails() {

        //$this->load->library('phpexcel');
        require_once APPPATH . "third_party/PHPExcel.php";

        $objPHPExcel = new PHPExcel();

        $objPHPExcel->getProperties()->setCreator("Laundry")
                ->setLastModifiedBy("Laundry")
                ->setTitle("Office 2007 XLSX Laundry Document")
                ->setSubject("Office 2007 XLSX Laundry Document")
                ->setDescription("Laundry Payment document for The Laundry.")
                ->setKeywords("office 2007 openxml php")
                ->setCategory("Payment");

        $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A1', 'ID')
                ->setCellValue('B1', 'Name')
                ->setCellValue('C1', 'Mobile No');
                
        /* Paymenet details and render into sheet Code is Strat From Here */
        $this->load->model('stud_model');
        $arrobjStudent = $this->stud_model->downloadStudentDetails();

        $rowid = 2;
        foreach ($arrobjStudent as $objEmployee) {
            $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A' . $rowid, $objEmployee->id)
                    ->setCellValue('B' . $rowid, $objEmployee->First_name)
                    ->setCellValue('C' . $rowid, $objEmployee->Mob_no);
                   
                 $rowid++;
        }

        $objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle('B1')->getFont()->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle('C1')->getFont()->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle('D1')->getFont()->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle('E1')->getFont()->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle('F1')->getFont()->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle('G1')->getFont()->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle('H1')->getFont()->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle('I1')->getFont()->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle('J1')->getFont()->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle('K1')->getFont()->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle('L1')->getFont()->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle('M1')->getFont()->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle('N1')->getFont()->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle('O1')->getFont()->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle('P1')->getFont()->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle('Q1')->getFont()->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle('R1')->getFont()->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle('S1')->getFont()->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle('T1')->getFont()->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle('U1')->getFont()->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle('V1')->getFont()->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle('W1')->getFont()->setBold(true);

        $objPHPExcel->setActiveSheetIndex(0);
        
        $pathInfo = pathinfo(__FILE__);
        $strFileName = str_replace('.php', '.xlsx', $pathInfo['dirname'] . '\\' . $pathInfo['basename']);
        $strDownloadFile = basename($strFileName);
        
        header('Content-Description: File Transfer');
        header("Content-Type: application/vnd.ms-excel; charset=utf-8");
        header('Content-Disposition: attachment; filename=' . $strDownloadFile);
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Pragma: public');
        header('Cache-Control: max-age=0');
        
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
	//$objWriter->save(str_replace('.php', '.xls', __FILE__));
        ob_end_clean();
        $objWriter->save('php://output');
        exit;
    }

    
public function downloadEmployeeTypeDetails() {

        //$this->load->library('phpexcel');
        require_once APPPATH . "third_party/PHPExcel.php";

        $objPHPExcel = new PHPExcel();

        $objPHPExcel->getProperties()->setCreator("Laundry")
                ->setLastModifiedBy("Laundry")
                ->setTitle("Office 2007 XLSX Laundry Document")
                ->setSubject("Office 2007 XLSX Laundry Document")
                ->setDescription("Laundry Payment document for The Laundry.")
                ->setKeywords("office 2007 openxml php")
                ->setCategory("Payment");

        $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A1', 'ID')
                ->setCellValue('B1', 'Name')
                ->setCellValue('C1', 'Description')
                ->setCellValue('D1', 'Created By')
                ->setCellValue('E1', 'Created On')
                ->setCellValue('F1', 'Updated By')
                ->setCellValue('G1', 'Updated On'); 
               
                
        /* Paymenet details and render into sheet Code is Strat From Here */
        $this->load->model('employeetype_model');
        $arrobjEmployee = $this->employeetype_model->getEmployeeTypeDetails();

        $rowid = 2;
        foreach ($arrobjEmployee as $objEmployee) {
            $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A' . $rowid, $objEmployee->id)
                    ->setCellValue('B' . $rowid, $objEmployee->name)
                    ->setCellValue('C' . $rowid, $objEmployee->description)
                    ->setCellValue('D' . $rowid, $objEmployee->created_by)
                    ->setCellValue('E' . $rowid, $objEmployee->created_on)
                    ->setCellValue('F' . $rowid, $objEmployee->updated_by)
                    ->setCellValue('G' . $rowid, $objEmployee->updated_on);
                 $rowid++;
        }

        $objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle('B1')->getFont()->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle('C1')->getFont()->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle('D1')->getFont()->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle('E1')->getFont()->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle('F1')->getFont()->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle('G1')->getFont()->setBold(true);
      
        $objPHPExcel->setActiveSheetIndex(0);
        
        $pathInfo = pathinfo(__FILE__);
        $strFileName = str_replace('.php', '.xlsx', $pathInfo['dirname'] . '\\' . $pathInfo['basename']);
        $strDownloadFile = basename($strFileName);
        
        header('Content-Description: File Transfer');
        header("Content-Type: application/vnd.ms-excel; charset=utf-8");
        header('Content-Disposition: attachment; filename=' . $strDownloadFile);
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Pragma: public');
        header('Cache-Control: max-age=0');
        
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
	//$objWriter->save(str_replace('.php', '.xls', __FILE__));
        ob_end_clean();
        $objWriter->save('php://output');
        exit;
    }
 }

