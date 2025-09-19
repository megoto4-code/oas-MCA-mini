<?php

require_once 'pages.php';

class Pages_public extends Pages {

    function __construct() {
        parent::__construct();
        if (isset($_SESSION['logged_in']))
            if ($_SESSION['logged_in'] == TRUE)
                redirect('/');
        $this->load->model('public_model');
    }

    public function _tpl($loc, $site_data) {
        $site_data['site_title'] = $this->common_model->get_site_info('title');
        $site_data['admission_notices'] = $this->public_model->get_admission_notices();
        $this->load->view('tpl/header_public', $site_data);
        $this->load->view($loc, $site_data);
        $this->load->view('tpl/footer_public', $site_data);
    }

}
