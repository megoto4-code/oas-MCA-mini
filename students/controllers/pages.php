<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pages extends CI_Controller {

    public $site_data;
    function __construct() {
        parent::__construct();
        session_start();
        base_url();
        $this->load->model('common_model');
        $status = $this->common_model->get_site_info('status');
        if ($status != 'activated') {
            session_destroy();
            $this->load->view('tpl/site_unavailable');
            exit('<center><h1>Site is temporarily suspended by the administrator.</h1>
                <hr/><p>Thank you for visiting.</p></center>');
        }
        $this->common_model->set_site_url(base_url());
    }

}
