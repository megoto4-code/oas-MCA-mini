<?php

class private_model extends CI_Model {

    function check_user_status($user_email) {
        /* To check a user having email '$user_email' has
         * status TRUE or FALSE.
         */
        $this->db->where('email', $user_email);
        $query = $this->db->get('student_login');
        if ($query->num_rows == 1) {
            foreach ($query->result() as $row) {
                $status = $row->status;
            }
            return $status;
        }
    }

    function get_programmes() {
        /* This function is used for returning the programme codes
         * to the admission view dynamically.
         */
        $this->db->order_by('code');
        return $this->db->get('programme')->result();
    }

    function admission($user_email) {
        /* This is the admission function whose task is to insert in-enroled
         * student details to three seperate tables namely: 
         *      1. student_qualification
         *      2. student_contact and
         *      3. student_personnel
         */
        $id = $this->get_user_id($user_email);
        $qualification = array(
            'user_id' => $id,
            'programme' => $this->input->post('programme'),
            'qualification' => $this->input->post('qualification'),
            'subjects' => $this->input->post('subjects'),
            'passing_year' => $this->input->post('passing_year'),
            'percentage' => $this->input->post('percentage'),
            'board' => $this->input->post('board')
        );
        if (!($this->db->insert('student_qualification', $qualification)))
            return FALSE;
        $contact = array(
            'phone' => $this->input->post('phone'),
            'address' => $this->input->post('address'),
            'city' => $this->input->post('city'),
            'district' => $this->input->post('district'),
            'state' => $this->input->post('state'),
            'pin' => $this->input->post('pin'),
            'user_id' => $id
        );
        if (!($this->db->insert('student_contact', $contact)))
            return FALSE;
        $dob = $this->input->post('year') . '-' .
                $this->input->post('month') . '-' .
                $this->input->post('day');
        $personnel = array(
            'name' => $this->input->post('name'),
            'dob' => $dob,
            'gender' => $this->input->post('gender'),
            'category' => $this->input->post('category'),
            'guardian' => $this->input->post('guardian'),
            'religion' => $this->input->post('religion'),
            'user_id' => $id
        );
        if (!($this->db->insert('student_personnel', $personnel)))
            return FALSE;
        return TRUE;
    }

    function change_user_status($user_email, $status) {
        /* This function is used to change the status
         * of a user.
         */
        $data = array(
            'status' => $status
        );
        $this->db->where('email', $user_email);
        $this->db->update('student_login', $data);
    }

    function get_user_id($user_email) {
        /* This function returns the auto increamented id
         * of a user having email id as '$user_email'.
         */
        $this->db->where('email', $user_email);
        $query = $this->db->get('student_login');
        if ($query->num_rows == 1) {
            foreach ($query->result() as $row) {
                $id = $row->id;
            }
            return $id;
        }
    }

    function has_control_id($user_email) {
        /* Tis function checks whether a user is assigned
         * with a control id, so that it can be used as the
         * filename prefix for the user documets and for 
         * the control number generation for receipt identification.
         */
        $this->db->where('email', $user_email);
        $query = $this->db->get('student_login');
        if ($query->num_rows() == 1) {
            foreach ($query->result() as $row) {
                if ($row->control_id === NULL)
                    return FALSE;
                else {
                    return TRUE;
                }
            }
        }
    }

    function assign_control_id($user_email) {
        /* This function assigns an unique control id to users
         * who does not have their control id. This function executes
         * on FALSE result of function 'has_control()'.
         */
        $id = uniqid('oas');
        $this->db->where('email', $user_email);
        $data1 = array(
            'control_id' => $id
        );
        $this->db->update('student_login', $data1);
        $data2 = array(
            'user_id' => $this->get_user_id($user_email)
        );
        $this->db->insert('student_uploads', $data2);
    }

    function get_control_id($user_email) {
        /* This function returns the control id of an user to be
         * used for assigning to attached file names and for receipt 
         * control number use.
         */
        $this->db->where('email', $user_email);
        $query = $this->db->get('student_login');
        if ($query->num_rows == 1) {
            foreach ($query->result() as $row) {
                $control_id = $row->control_id;
            }
            return $control_id;
        }
    }

    function get_upload_status($type, $user_email) {
        $this->db->where('user_id', $this->get_user_id($user_email));
        $query = $this->db->get('student_uploads');
        if ($query->num_rows == 1) {
            foreach ($query->result() as $row) {
                $status = $row->$type;
            }
            if ($status == 1) {
                return FALSE;
            } else {
                return TRUE;
            }
        }
    }

    function change_upload_status($type, $user_email) {
        $data = array(
            $type => '1'
        );
        $this->db->where('user_id', $this->get_user_id($user_email));
        $this->db->update('student_uploads', $data);
    }

    function is_upload_completed($user_email) {
        $this->db->where('user_id', $this->get_user_id($user_email));
        $query = $this->db->get('student_uploads');
        if ($query->num_rows == 1) {
            foreach ($query->result() as $row) {
                $doc = $row->doc;
                $photo = $row->photo;
                $signature = $row->signature;
            }
            if ($doc == 1 && $photo == 1 && $signature == 1) {
                return TRUE;
            } else {
                return FALSE;
            }
        }
    }

    function get_admission_fee($user_email) {
        $this->db->where('user_id', $this->get_user_id($user_email));
        $query = $this->db->get('student_qualification');
        if ($query->num_rows == 1) {
            foreach ($query->result() as $row) {
                $programme = $row->programme;
            }
            $this->db->where('code', $programme);
            $query = $this->db->get('programme');
            if ($query->num_rows == 1) {
                foreach ($query->result() as $row) {
                    $fee = $row->fee;
                }
                return $fee;
            }
        }
    }

    function set_admission_payment($user_email) {
        $data = array(
            'amount' => $this->get_admission_fee($user_email),
            'draft_no' => $this->input->post('draft_no'),
            'draft_date' => $this->input->post('year') . '-' .
            $this->input->post('month') . '-' .
            $this->input->post('day'),
            'bank' => $this->input->post('bank'),
            'user_id' => $this->get_user_id($user_email)
        );
        if ($this->db->insert('student_payments', $data)) {
            return TRUE;
        }
    }

    function get_student_personnel($user_email) {
        $this->db->where('user_id', $this->get_user_id($user_email));
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

    function get_student_qualification($user_email) {
        $this->db->where('user_id', $this->get_user_id($user_email));
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

    function get_student_contact($user_email) {
        $this->db->where('user_id', $this->get_user_id($user_email));
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

    function get_student_payment($user_email) {
        $this->db->where('user_id', $this->get_user_id($user_email));
        $query = $this->db->get('student_payments');
        if ($query->num_rows() == 1) {
            foreach ($query->result() as $row) {
                $data = array(
                    'draft_no' => $row->draft_no,
                    'draft_date' => $row->draft_date,
                    'bank' => $row->bank
                );
            }
            return $data;
        }
    }
    
    function get_enrolment_details($user_email) {
        $this->db->where('id', $this->get_user_id($user_email));
        $query = $this->db->get('student_login');
        if ($query->num_rows() == 1) {
            foreach ($query->result() as $row) {
                $data = array(
                    'enrolment_no' => $row->enrolment_no,
                    'enroled_on' => $row->enroled_on,
                    'status' => $row->status
                );
            }
            return $data;
        }
    }

}

