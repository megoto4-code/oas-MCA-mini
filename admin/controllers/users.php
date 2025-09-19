<?php

require_once 'private_page.php';

class Users extends Private_page {

    function index() {
        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'admin/users/index';
        $config['total_rows'] = $this->admin_model->total_users();
        $config['per_page'] = 10;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['users'] = $this->admin_model->get_users($config['per_page'], $this->uri->segment(3));
        $data['s_status'] = $this->admin_model->student_status();
        $this->_tpl('users', $data);
    }

    function user() {
        $email = $this->input->post('email');
        if ($email == '') {
            redirect($_SERVER['HTTP_REFERER']);
        }
        if ($this->admin_model->get_user($email)) {
            $id = $this->admin_model->get_user($email);
            redirect('admin/users/user_detail/' . $id);
        } else {
            redirect('admin/not_found');
        }
    }

    function payment_confirmed($id) {
        if ($this->admin_model->payment_confirmed($id)) {
            $this->admin_model->enrol_student($id);
            redirect('admin/users/user_detail/' . $id);
        }
    }

    function user_detail($id) {
        if (!isset($id))
            redirect('admin/users');
        $data = array(
            'per' => $this->admin_model->get_student_personnel($id),
            'qua' => $this->admin_model->get_student_qualification($id),
            'con' => $this->admin_model->get_student_contact($id),
            'pay' => $this->admin_model->get_student_payment($id),
            'control_id' => $this->admin_model->get_control_id($id),
            'user' => $this->admin_model->get_user_details($id),
            'status' => $this->admin_model->get_user_status($id),
            'exist_payment' => $this->admin_model->exist_payment($id)
        );
        $this->_tpl('user_details', $data);
    }

}
