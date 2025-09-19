<?php

class Admin_model extends CI_Model {

    function get_admins() {
        return $this->db->get('administrator')->result();
    }

    function get_programmes() {
        return $this->db->get('programme')->result();
    }

    function add_programme() {
        $data = array(
            'code' => $this->input->post('pcode'),
            'name' => $this->input->post('pname'),
            'semesters' => $this->input->post('semesters'),
            'fee' => $this->input->post('fee')
        );
        $this->db->insert('programme', $data);
    }

    function delete_programme($code) {
        $this->db->where('code', $code);
        $this->db->delete('programme');
    }

    function profile_settings() {
        $data = array(
            'email' => $this->input->post('n_email'),
            'password' => $this->input->post('n_password')
        );
        $this->db->where('email', $this->input->post('c_email'));
        $this->db->update('administrator', $data);
    }
    
    function add_profile() {
        $data = array(
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password')
        );
        $this->db->insert('administrator', $data);
    }

    function recent_user($limit) {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit);
        return $this->db->get('student_login')->result();
    }

    function recent_enroled($limit) {
        $this->db->where('status', 5);
        $this->db->order_by('enrolment_no', 'desc');
        $this->db->limit($limit);
        return $this->db->get('student_login')->result();
    }

    function enroler() {
        /* To generate enrolment no automatically
         * 
         */
        $query = $this->db->get('student_login');
        $no = 0;
        $empty = TRUE;
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                if ($row->enrolment_no !== NULL) {
                    $empty = FALSE;
                }
            }
            if ($empty == FALSE) {
                foreach ($query->result() as $row) {
                    if ($row->enrolment_no > $no) {
                        $no = $row->enrolment_no;
                    }
                }
                $no++;
            } else {
                $no = date('Y') . 10001;  // This is the enrolment no format.
            }
        }
        return $no;
    }

    function enrol_student($id) {
        $data = array(
            'enrolment_no' => $this->enroler(),
            'enroled_on' => date('Y-m-d')
        );
        $this->db->where('id', $id);
        $this->db->update('student_login', $data);
    }

    function admission_on_off($action) {
        $this->db->where('site', 'student');
        $data = array(
            'status' => $action,
            'status_changed_at' => date('Y-m-d')
        );
        $this->db->update('site_settings', $data);
    }

    function get_users($per_page, $uri_segments) {
        return $this->db->get('student_login', $per_page, $uri_segments)->result();
    }

    function get_user_statistics($status) {
        if ($status != 0)
            $this->db->where('status', $status);
        return $this->db->get('student_login')->num_rows();
    }

    function get_user($email) {
        $this->db->where('email', $email);
        $query = $this->db->get('student_login');
        if ($query->num_rows() == 1) {
            foreach ($query->result() as $row) {
                $id = $row->id;
            }
            return $id;
        } else {
            return FALSE;
        }
    }

    function total_users() {
        return $this->db->get('student_login')->num_rows();
    }

    function get_site_info($item) {
        $this->db->where('site', 'student');
        $query = $this->db->get('site_settings');
        foreach ($query->result() as $row) {
            $status = $row->$item;
        }
        return $status;
    }

    function update_site_info($item) {
        $this->db->where('site', 'student');
        $data = array(
            $item => $this->input->post($item)
        );
        $this->db->update('site_settings', $data);
    }

    function get_student_personnel($id) {
        $this->db->where('user_id', $id);
        $query = $this->db->get('student_personnel');
        if ($query->num_rows() == 1) {
            foreach ($query->result() as $row) {
                $data = array(
                    'name' => $row->name,
                    'dob' => $row->dob,
                    'gender' => $row->gender,
                    'category' => $row->category,
                    'guardian' => $row->guardian,
                    'religion' => $row->religion
                );
            }
            return $data;
        }
    }

    function get_student_qualification($id) {
        $this->db->where('user_id', $id);
        $query = $this->db->get('student_qualification');
        if ($query->num_rows() == 1) {
            foreach ($query->result() as $row) {
                $data = array(
                    'programme' => $row->programme,
                    'qualification' => $row->qualification,
                    'subjects' => $row->subjects,
                    'passing_year' => $row->passing_year,
                    'percentage' => $row->percentage,
                    'board' => $row->board
                );
            }
            return $data;
        }
    }

    function get_student_contact($id) {
        $this->db->where('user_id', $id);
        $query = $this->db->get('student_contact');
        if ($query->num_rows() == 1) {
            foreach ($query->result() as $row) {
                $data = array(
                    'phone' => $row->phone,
                    'address' => $row->address,
                    'city' => $row->city,
                    'district' => $row->district,
                    'state' => $row->state,
                    'pin' => $row->pin
                );
            }
            return $data;
        }
    }

    function get_user_details($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('student_login');
        if ($query->num_rows() == 1) {
            foreach ($query->result() as $row) {
                $data = array(
                    'id' => $row->id,
                    'email' => $row->email,
                    'password' => $row->password,
                    'status' => $row->status,
                    'enrolment_no' => $row->enrolment_no,
                    'enroled_on' => $row->enroled_on,
                    'control_id' => $row->control_id,
                    'created_on' => $row->created_on
                );
            }
            return $data;
        }
    }

    function get_student_payment($id) {
        $this->db->where('user_id', $id);
        $query = $this->db->get('student_payments');
        if ($query->num_rows == 1) {
            foreach ($query->result() as $row) {
                $data = array(
                    'amount' => $row->amount,
                    'draft_no' => $row->draft_no,
                    'draft_date' => $row->draft_date,
                    'bank' => $row->bank,
                    'payment_date' => $row->payment_date
                );
            }
            return $data;
        }
    }

    function get_control_id($id) {
        /* This function returns the control id of an user to be
         * used for assigning to attached file names and for receipt 
         * control number use.
         */
        $this->db->where('id', $id);
        $query = $this->db->get('student_login');
        if ($query->num_rows() == 1) {
            foreach ($query->result() as $row) {
                $control_id = $row->control_id;
            }
            return $control_id;
        }
    }

    function exist_payment($id) {
        $this->db->where('user_id', $id);
        $query = $this->db->get('student_payments');
        if ($query->num_rows() == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function payment_confirmed($id) {
        $data = array(
            'payment_date' => date('Y-m-d')
        );
        $this->db->where('user_id', $id);
        if ($this->db->update('student_payments', $data)) {
            $this->change_user_status($id, 5);
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function change_user_status($id, $status) {
        /* This function is used to change the status
         * of a user.
         */
        $data = array(
            'status' => $status
        );
        $this->db->where('id', $id);
        $this->db->update('student_login', $data);
    }

    function get_user_status($id) {
        /* This function is used to get the status
         * of a user.
         */
        $this->db->where('id', $id);
        $query = $this->db->get('student_login');
        if ($query->num_rows() == 1) {
            foreach ($query->result() as $row) {
                $status = $row->status;
            }
            return $status;
        }
    }

    function student_status() {
        return $this->db->get('student_status')->result();
    }

}