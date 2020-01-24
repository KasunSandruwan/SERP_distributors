
<?php
/**
 * Created by PhpStorm.
 * User: welcome
 * Date: 9/6/2018
 * Time: 10:07 AM
 */

class account_model extends CI_Model
{

    function insert_account($idaccount_category)
    {

        $data = array(

            'account_name' => $this->input->post('account_name', true),
            'account_code' => $this->input->post('account_number', true),
            'account_category_idaccount_category' =>$idaccount_category,
        );

        $this->db->insert('account', $data);

        return $this->db->insert_id();


    }


}