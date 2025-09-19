<?php

class Public_model extends CI_Model {

    function get_admission_notices() {
        /* This function returns the home page textual contents
         * such as notices or news for the students or site visitors.
         */
        $this->db->select('message');
        $this->db->where('site', 'student');
        $query = $this->db->get('site_settings');
        foreach ($query->result() as $row) {
            $msg = $row->message;
        }
        return $msg;
    }

    function register() {
        /* This function creates new user(student} accounts
         * based on their choosen email address and password.
         */
        $data = array(
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password')
        );
        if ($this->db->insert('student_login', $data)) {
            return TRUE;
        }
    }

    function user_exist($str) {
        /* For callback _user_exist:
         * This function checks whether a email enterd
         * is registered or not.
         */
        $this->db->where('email', $str);
        $query = $this->db->get('student_login');
        if ($query->num_rows() == 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function correct_password($str) {
        /* For callback _correct_password:
         * This function checks whether correct password is
         * entered or not.
         */
        $this->db->where('email', $this->input->post('email'));
        $query = $this->db->get('student_login');
        if ($query->num_rows() == 1) {
            foreach ($query->result() as $row) {
                $password = $row->password;
            }
            if ($password == $str) {
                return FALSE;
            } else {
                return TRUE;
            }
        }
    }

    function get_password($user_email) {
        /* This function is used to recover password
         * based on a registered email.
         */
        $this->db->where('email', $user_email);
        $query = $this->db->get('student_login');
        if ($query->num_rows() == 1) {
            foreach ($query->result() as $row) {
                $password = $row->password;
            }
        }
        if ($password) {
            return $password;
        } else {
            return FALSE;
        }
    }

}