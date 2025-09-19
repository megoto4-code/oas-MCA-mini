<?php

class Common_model extends CI_Model {

    function get_site_info($item) {
        /* This function return whether the whole student i.e default
         * site is activated or blocked.
         */
        $this->db->select($item);
        $this->db->where('site', 'student');
        $query = $this->db->get('site_settings');
        foreach ($query->result() as $row) {
            $data = $row->$item;
        }
        return $data;
    }
    function set_site_url($url) {
        $this->db->where('site', 'student');
        $data = array (
            'url'=> $url
        );
        $this->db->update('site_settings',$data);
    }

}