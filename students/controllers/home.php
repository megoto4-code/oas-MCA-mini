<?php

require_once 'pages_private.php';

class Home extends Pages_private {

    function __construct() {
        parent::__construct();
        echo $this->private_model->check_user_status($_SESSION['logged_in']);
        
        if ($this->private_model->check_user_status($_SESSION['logged_in']) == 1)
            redirect('admission');
        elseif ($this->private_model->check_user_status($_SESSION['logged_in']) == 2)
            redirect('admission_uploads');
        elseif ($this->private_model->check_user_status($_SESSION['logged_in']) == 3)
            redirect('admission_payment');
        elseif ($this->private_model->check_user_status($_SESSION['logged_in']) == 4)
            redirect('admission_receipt');
    }

    public function index() {
        $data['page'] = 'Home';
        $data['student'] = $this->private_model->get_enrolment_details($_SESSION['logged_in']);
        $this->_tpl('home', $data);
    }

}
