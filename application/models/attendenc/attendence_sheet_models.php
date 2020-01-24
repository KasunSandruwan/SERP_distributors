<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 7/11/2018
 * Time: 9:58 AM
 */

class attendence_sheet_models extends  CI_Model
{

    function search_all_ready_add_attendance_sheet($employee_id,$dateformat){


        $this->db->where('employee_id',$employee_id);
        $this->db->where('date',$dateformat);
        $this->db->where('status','in');

        $query = $this->db->get('attendence_sheet');

        if ($query->result()) {
            return $query->row(0);
        } else {
            return false;

        }

    }

    function insert_attendance_sheet($employee_id,$name,$date,$in_time){


        $data = array(

            'employee_id' => $employee_id,
            'name' => $name,
            'date' =>$date,
            'in_time'=>$in_time,
            'status'=>'in',
            'is_upload'=>'not',

        );

        $this->db->insert('attendence_sheet', $data);

        return true;

    }

    function update_attendance_sheet($idattendence_sheet,$out_time){


        $this->db->set('out_time',$out_time);
        $this->db->set('status','out');

        $this->db->where('idattendence_sheet', $idattendence_sheet);
        $this->db->update('attendence_sheet');

        return true;


    }

    function all_search_attendance_sheet(){

        $this->db->where('is_upload','not');
        $query = $this->db->get('attendence_sheet');
        return $query->result();

    }


    function attendance_sheet_upload_change_status($employee_id,$dateformat){

        $this->db->set('is_upload','yes');


        $this->db->where('employee_id',$employee_id);
        $this->db->where('date',$dateformat);
        $this->db->where('status','out');


        $this->db->update('attendence_sheet');

    }



}