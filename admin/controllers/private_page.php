<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Private_page extends CI_Controller {

    function __construct() {
        parent::__construct();
        session_start();
        if ($_SESSION['admin_logged_in'] == FALSE)
            redirect('admin/login');
        $this->load->model('admin_model');
        $prev_url = current_url();
        $this->load->model('public_model');
    }

    function logout() {
        session_destroy();
        redirect('admin');
    }

    public function _tpl($loc, $data) {
        $data['admin_email'] = $_SESSION['admin'];
        $data['site_name'] = $this->admin_model->get_site_info('title');
        $data['site_url'] = $this->admin_model->get_site_info('url');
        $data['site_status'] = $this->admin_model->get_site_info('status');
        $data['status_changed_at'] = $this->admin_model->get_site_info('status_changed_at');
        $data['site_visits'] = $this->admin_model->get_site_info('visits');
        $this->load->view('tpl/header_private', $data);
        $this->load->view($loc, $data);
        $this->load->view('tpl/footer_private', $data);
    }
    function validation_appearance() {
        $this->form_validation->set_error_delimiters('
            <div class="alert alert-error">
                <button type="button" class="close" data-dismiss="alert">&times;</button>', '</div>');
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

}
