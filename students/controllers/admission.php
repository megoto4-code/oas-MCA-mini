<?php

require_once 'pages_private.php';

class Admission extends Pages_private {

    function __construct() {
        parent::__construct();
        if ($this->private_model->check_user_status($_SESSION['logged_in']) != 1)
            redirect('');
    }

    function index() {
        $data['programme'] = $this->private_model->get_programmes();
        $this->admission_validation();
        if ($this->form_validation->run('admission') == FALSE) {
            $this->_tpl('admission', $data);
            return FALSE;
        } else {
            if ($this->private_model->admission($_SESSION['logged_in'])) {
                $this->private_model->change_user_status($_SESSION['logged_in'], 2);
                redirect('');
            }
        }
    }

    public function _tpl($loc, $site_data) {
        $site_data['site_title'] = $this->common_model->get_site_info('title');
        $site_data['user_email'] = $_SESSION['logged_in'];
        $this->load->view('tpl/header_private_admission', $site_data);
        $this->load->view('admission/' . $loc, $site_data);
        $this->load->view('tpl/footer_private', $site_data);
    }

    function admission_validation() {
        $this->form_validation->set_error_delimiters('
            <div class="span4"><div class="alert">
                <button type="button" class="close" data-dismiss="alert">&times;</button>', '</div></div>');
    }

}