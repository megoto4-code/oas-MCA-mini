<?php

require_once 'pages_private.php';

class Admission_uploads extends Pages_private {

    function __construct() {
        parent::__construct();
        if ($this->private_model->check_user_status($_SESSION['logged_in']) != 2)
            redirect('');
        if ($this->private_model->has_control_id($_SESSION['logged_in']) == FALSE)
            $this->private_model->assign_control_id($_SESSION['logged_in']);
        if ($this->private_model->is_upload_completed($_SESSION['logged_in'])){
            $this->private_model->change_user_status($_SESSION['logged_in'],3);
            redirect('admission_payment');
        }         
    }

    function index() {
        $this->_tpl('uploads', '');
    }

    function doc() {
        /* Configurations for uploading
         * Relevent documets.
         */
        $control_id = $this->private_model->get_control_id($_SESSION['logged_in']);
        $config['upload_path'] = './uploads/student_files/';
        $control_id = $control_id . '_document';
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = '200';
        $config['file_name'] = $control_id;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload()) {
            $data = array('doc_error' => $this->upload->display_errors());
            $this->_tpl('uploads', $data);
        } else {
            $this->private_model->change_upload_status('doc', $_SESSION['logged_in']);
            redirect('admission_uploads');
        }
    }

    function photo() {
        /* Configurations for uploading
         * photo of student.
         */
        $control_id = $this->private_model->get_control_id($_SESSION['logged_in']);
        $config['upload_path'] = './uploads/student_files/';
        $control_id = $control_id . '_photo';
        $config['allowed_types'] = 'jpg';
        $config['max_size'] = '50';
        $config['max_width'] = '200';
        $config['max_height'] = '250';
        $config['file_name'] = $control_id;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload()) {
            $data = array('photo_error' => $this->upload->display_errors());
            $this->_tpl('uploads', $data);
        } else {
            $this->private_model->change_upload_status('photo', $_SESSION['logged_in']);
            redirect('admission_uploads');
        }
    }

    function signature() {
        /* Configurations for uploading
         * signature scan of students.
         */
        $control_id = $this->private_model->get_control_id($_SESSION['logged_in']);
        $config['upload_path'] = './uploads/student_files/';
        $control_id = $control_id . '_signature';
        $config['allowed_types'] = 'jpg';
        $config['max_size'] = '10';
        $config['max_width'] = '200';
        $config['max_height'] = '50';
        $config['file_name'] = $control_id;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload()) {
            $data = array('signature_error' => $this->upload->display_errors());
            $this->_tpl('uploads', $data);
        } else {
            $this->private_model->change_upload_status('signature', $_SESSION['logged_in']);
            redirect('admission_uploads');
        }
    }

    public function _tpl($loc, $site_data) {
        $site_data['site_title'] = $this->common_model->get_site_info('title');
        $site_data['doc'] = $this->private_model->get_upload_status('doc', $_SESSION['logged_in']);
        $site_data['photo'] = $this->private_model->get_upload_status('photo', $_SESSION['logged_in']);
        $site_data['signature'] = $this->private_model->get_upload_status('signature', $_SESSION['logged_in']);
        $site_data['user_email'] = $_SESSION['logged_in'];
        $this->load->view('tpl/header_private_admission', $site_data);
        $this->load->view('admission/' . $loc, $site_data);
        $this->load->view('tpl/footer_private', $site_data);
    }

}