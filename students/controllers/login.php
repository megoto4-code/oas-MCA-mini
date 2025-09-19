<?php

require_once 'pages_public.php';

class Login extends Pages_public {

    function __construct() {
        parent::__construct();
        $this->validation_appearance();
    }

    function index() {
        /* This denotes login page.
         * This page will be loaded by default if a user
         * did not log in.
         */

        $data['page'] = 'Home';
        $this->form_validation->set_message('valid_email', 'You have to give your correct email address.');
        if ($this->form_validation->run('login') == FALSE) {
            $this->_tpl('login', $data);
        } else {
            $_SESSION['logged_in'] = $this->input->post('email');
            redirect('');
        }
    }

    function register() {
        /* This page denotes the Create account or register
         * page which will be used by the user/ student to register
         * himself.
         */
        $data['page'] = 'Register';
        $this->form_validation->set_message('valid_email', 'You have to give a vaid email address.');
        $this->form_validation->set_message('is_unique', 'Your choosen email address is already used.');
        $this->form_validation->set_message('min_length', 'The password have to be minimum of 6 characters.');
        $this->form_validation->set_message('matches', 'The passwords did not match.');
        if ($this->form_validation->run('register') == FALSE) {
            $this->_tpl('register', $data);
        } else {
            if ($this->public_model->register()) {
                $_SESSION['account_creation'] = 'Your account is successfully created';
                redirect('');
            }
        }
    }

    function _user_exist($str) {
        /* Callback function to find if the email enterd by an user
         * is registered or not.
         */
        if ($this->public_model->user_exist($str)) {
            $this->form_validation->set_message('_user_exist', 'Unregistered email address.');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    function _correct_password($str) {
        /* Callback function to find whether the correct 
         * password is entered for the given email address.
         */
        if ($this->public_model->correct_password($str)) {
            $this->form_validation->set_message('_correct_password', 'Incorrect email or password.');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    function validation_appearance() {
        $this->form_validation->set_error_delimiters('
            <div class="alert alert-error">
                <button type="button" class="close" data-dismiss="alert">&times;</button>', '</div>');
    }

    function forgot() {
        $data['page'] = 'Recover password';
        if ($this->form_validation->run('forgot') == FALSE) {
            $this->_tpl('forgot', $data);
        } else {
            $this->load->library('email');
            $this->email->from('oas@oas.com', 'Online Admission System');
            $this->email->to($this->input->post('email'));
            $this->email->subject('Online Admission Password recovery');
            $this->email->message('Your password is <strong>' . $this->public_model->get_password($this->input->post('email')) . '</strong>.');
            if ($this->email->send()) {
                $_SESSION['p_send'] = TRUE;
            } else {
                $_SESSION['p_send'] = FALSE;
            }
            redirect('login/forgot');
        }
    }

}