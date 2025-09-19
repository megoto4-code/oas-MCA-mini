<?php

require_once 'pages_private.php';

class Admission_receipt extends Pages_private {

    function __construct() {
        parent::__construct();
        if ($this->private_model->check_user_status($_SESSION['logged_in']) != 4)
            redirect('');
    }

    function index() {
        $data['control_id'] = $this->private_model->get_control_id($_SESSION['logged_in']);
        $this->_tpl('receipt', $data);
    }

    function generate($control_id) {
        if (!isset($control_id))
            redirect('admission_receipt');
        $this->load->helper('date');
        $data = array(
            'per' => $this->private_model->get_student_personnel($_SESSION['logged_in']),
            'qua' => $this->private_model->get_student_qualification($_SESSION['logged_in']),
            'con' => $this->private_model->get_student_contact($_SESSION['logged_in']),
            'pay' => $this->private_model->get_student_payment($_SESSION['logged_in']),
            'control_id' => $control_id,
            'user_email' => $_SESSION['logged_in']
        );
        $this->load->view('admission/gen_receipt', $data);
    }

    public function _tpl($loc, $site_data) {
        $site_data['site_title'] = $this->common_model->get_site_info('title');
        $site_data['user_email'] = $_SESSION['logged_in'];
        $this->load->view('tpl/header_private_admission', $site_data);
        $this->load->view('admission/' . $loc, $site_data);
        $this->load->view('tpl/footer_private', $site_data);
    }

}