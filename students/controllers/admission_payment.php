<?php

require_once 'pages_private.php';

class Admission_payment extends Pages_private {

    function __construct() {
        parent::__construct();
        if ($this->private_model->check_user_status($_SESSION['logged_in']) != 3)
            redirect('');
    }

    function index() {
        if ($this->form_validation->run('payment') == FALSE) {
            $this->_tpl('payment', '');
            return FALSE;
        } else {
            if ($this->private_model->set_admission_payment($_SESSION['logged_in'])) {
                $this->private_model->change_user_status($_SESSION['logged_in'], 4);
                redirect();
            }
        }
    }

    public function _tpl($loc, $site_data) {
        $site_data['site_title'] = $this->common_model->get_site_info('title');
        $site_data['user_email'] = $_SESSION['logged_in'];
        $site_data['fee'] = $this->private_model->get_admission_fee($_SESSION['logged_in']);
        $this->load->view('tpl/header_private_admission', $site_data);
        $this->load->view('admission/' . $loc, $site_data);
        $this->load->view('tpl/footer_private', $site_data);
    }

}