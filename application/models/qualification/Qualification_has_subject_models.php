<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 3/2/2018
 * Time: 11:40 AM
 */

class Qualification_has_subject_models extends CI_Model
{

    // Qualification has subject insert return true pass qualification_id and subject_id....................................

    function  insert_qualification_has_subject($qualification_id ,$subject_id){

        $data = array(

            'qualification_idqualification'=>$qualification_id,
            'subject_idsubject'=>$subject_id,


        );

        $this->db->insert('qualification_has_subject', $data);

        return true;

    }



    // All Search Qualification has subject return result......................................................

    function all_search_Qualification_value()
    {

        $query = $this->db->get('qualification_has_subject');
        return $query->result();


    }



    // Where Search Qualification has subject pass Qualification ID  return result......................................................

    function where_search_qualification_has_subject_pass_qualification_id($value){

        $this->db->where('qualification_idqualification', $value);
        $query = $this->db->get('qualification_has_subject');

        return  $query->result();

    }



    // Where Search Qualification has subject pass Subject ID  return result......................................................

    function where_search_qualification_has_subject_pass_subject_id($value)
    {

        $this->db->where('subject_idsubject', $value);
        $query = $this->db->get('qualification_has_subject');

        return $query->result();

    }


    // Where Search Qualification has subject pass Qualification has subject ID................................................

    function where_search_qualification_has_subject_pass_qualification_has_subject_id($value)
    {

        $this->db->where('qualification_has_subjectcol', $value);
        $query = $this->db->get('qualification_has_subject');

        if($query->num_rows() == 1){
            return$query->row(0);
        }else{
            return false;
        }


    }


}