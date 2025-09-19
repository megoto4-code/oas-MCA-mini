<?php

class Public_model extends CI_Model {

    function login_verify($field, $value) {
        $this->db->where($field,$value);
        $query = $this->db->get('administrator');
        if($query->num_rows == 1) {
            return TRUE;
        }else {
            return FALSE;
        }
    }

}