<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        session_start();
        if (isset($_SESSION['admin_logged_in']))
            if ($_SESSION['admin_logged_in'] == TRUE)
                redirect('admin');
        $this->load->model('public_model');
    }

    function index() {
        $this->validation_appearance();
        if ($this->form_validation->run('login') == FALSE) {
            $this->_tpl('login', '');
        } else {
            $_SESSION['admin_logged_in'] = TRUE;
            $_SESSION['admin'] = xss_clean($this->input->post('email'));
            redirect('admin');
        }
    }

    function _admin_email($str) {
        if ($this->public_model->login_verify('email', $str) == FALSE) {
            $this->form_validation->set_message('_admin_email', 'Incorrect email');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    function _admin_password($str) {
        if ($this->public_model->login_verify('password', $str) == FALSE) {
            $this->form_validation->set_message('_admin_password', 'Incorrect password');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function _tpl($loc, $data) {
        $this->load->view('tpl/header_public', $data);
        $this->load->view($loc, $data);
        $this->load->view('tpl/footer_public', $data);
    }

    function validation_appearance() {
        $this->form_validation->set_error_delimiters('
            <div class="alert alert-error">
                <button type="button" class="close" data-dismiss="alert">&times;</button>', '</div>');
    }

}