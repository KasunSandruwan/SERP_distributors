<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 3/28/2018
 * Time: 12:56 PM
 */

class File_upload_controller extends CI_Controller
{

    public function upload_exsel()
    {
        $id = $this->session->userdata('companyID');

        if (isset($_POST)) {
            if (isset($_FILES["file"])) {

                //  if there was an error uploading the file

                if ($_FILES["file"]["error"] > 0) {
                    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
                } else {
                    if (file_exists($_FILES["file"]["name"])) {
                        unlink($_FILES["file"]["name"]);
                    }
                    $storagename = "Attend/" . $id . "_attend.xls";
                    move_uploaded_file($_FILES["file"]["tmp_name"], $storagename);
                    echo "upload don";
                }
            } else {
                echo "No file selected";
            }
        }

    }


    function excel_content_load()
    {

        set_include_path(get_include_path() . PATH_SEPARATOR . 'Classes/');
        include 'PHPExcel/IOFactory.php';

        $id = $this->session->userdata('companyID');

        // This is the file path to be uploaded.
        $inputFileName = 'Attend/' . $id . '_attend.xls';

        try {
            $objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
        } catch (Exception $e) {
            die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME) . '": ' . $e->getMessage());
        }

        $allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
        $arrayCount = count($allDataInSheet);  // Here get total count of row in that Excel sheet

        $data = [];

        for ($i = 2; $i <= $arrayCount; $i++) {


            // new Edit Line............................................................................................

            $formatnumber = sprintf('%04u', $allDataInSheet[$i]["C"]);
            $employee_id = trim($formatnumber);

            $date = strtotime($allDataInSheet[$i]["I"]);
            $dateformat = date('M-Y-d', $date);

            $name = trim($allDataInSheet[$i]["D"]);

            $timeformat = date('h:i:sa', $date);


            $this->load->model('attendenc/attendence_sheet_models');
            $result = $this->attendence_sheet_models->search_all_ready_add_attendance_sheet($employee_id,$dateformat);

            if($result === false){

                $this->load->model('attendenc/attendence_sheet_models');
                $this->attendence_sheet_models-> insert_attendance_sheet($employee_id,$name,$dateformat,$timeformat);

            }else{

                $idattendence_sheet =$result->idattendence_sheet;

                $this->load->model('attendenc/attendence_sheet_models');
                $this->attendence_sheet_models->update_attendance_sheet($idattendence_sheet,$timeformat);

            }

        }


        $this->load->model('attendenc/attendence_sheet_models');
        $attendence_sheet_result=$this->attendence_sheet_models->all_search_attendance_sheet();


        foreach ($attendence_sheet_result as $row){


            $time1 = strtotime($row->in_time);
            $time2 = strtotime($row->out_time);

            $difference = round($time2 - $time1);

            $hours = $difference / 3600; // 3600 seconds in an hour
            $minutes = ($hours - floor($hours)) * 60;
            $final_hours = round($hours, 0);
            $final_minutes = round($minutes);

            array_push($data, [
                'A' => $row->employee_id,
                'B' => $row->name,
                'C' => $row->in_time,
                'D' => $row->out_time,
                'E' => $row->date,
                'difference' => "h" . $final_hours . "m" . $final_minutes,

            ]);

        }

        header('Content-Type: application/json');
        $encode_data = json_encode($data);
        echo $encode_data;

    }


}