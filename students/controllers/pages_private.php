<?php

require_once 'pages.php';

class Pages_private extends Pages {

    function __construct() {
        parent::__construct();
        if ($_SESSION['logged_in'] == FALSE)
            redirect('/login');
        $this->load->model('private_model');
    }

    function logout() {
        session_destroy();
        redirect('');
    }

    public function _tpl($loc, $site_data) {
        $site_data['site_title'] = $this->common_model->get_site_info('title');
        $site_data['user_email'] = $_SESSION['logged_in'];
        $this->load->view('tpl/header_private', $site_data);
        $this->load->view($loc, $site_data);
        $this->load->view('tpl/footer_private', $site_data);
    }

}