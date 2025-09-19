<?php

require_once 'private_page.php';

class Admin extends Private_page {

    function index() {
        $data = array(
            'user' => array(
                'level0' => $this->admin_model->get_user_statistics('0'),
                'level1' => $this->admin_model->get_user_statistics('1'),
                'level2' => $this->admin_model->get_user_statistics('2'),
                'level3' => $this->admin_model->get_user_statistics('3'),
                'level4' => $this->admin_model->get_user_statistics('4'),
                'level5' => $this->admin_model->get_user_statistics('5'),
            ),
            'recent_user' => $this->admin_model->recent_user(6),
            'recent_enroled' => $this->admin_model->recent_enroled(6)
        );
        $this->_tpl('admin', $data);
    }

    function settings() {
        $data['title'] = $this->admin_model->get_site_info('title');
        $data['message'] = $this->admin_model->get_site_info('message');
        $this->_tpl('site_settings', $data);
    }

    function programmes($action) {
        /* To list the available programmes
         * and to add a new programme
         */
        if (!isset($action)) {
            redirect('admin/admin/programmes/all');
        }
        $data['programmes'] = $this->admin_model->get_programmes();
        if ($action == 'all') {
            $this->_tpl('programmes', $data);
        } elseif ($action == 'add') {
            if ($this->form_validation->run('programme') == FALSE) {
                $this->validation_appearance();
                $this->_tpl('programmes', $data);
            } else {
                $this->admin_model->add_programme();
                redirect('admin/admin/programmes/all');
            }
        } else {
            redirect('admin/admin/programmes/all');
        }
    }

    function delete($code) {
        /* To delete a programme
         * 
         */
        if (!isset($code)) {
            redirect('admin/admin/programmes/all');
        }
        $this->admin_model->delete_programme($code);
        redirect('admin/admin/programmes/all');
    }

    function update($item) {
        /* To update admission site info
         * like site message, site title etc.
         */
        if (!isset($item))
            redirect($_SERVER['HTTP_REFERER']);
        elseif ($item == 'title' || $item == 'message') {
            $this->admin_model->update_site_info($item);
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    function admission_on_off($action) {
        /* To activate or block admission site
         * 
         */
        if (!isset($action))
            redirect('');
        elseif ($action == 'activated' || $action == 'blocked') {
            $this->admin_model->admission_on_off($action);
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    function profile_settings() {
        $this->validation_appearance();
        $data['admins'] = $this->admin_model->get_admins();
        if ($this->form_validation->run('current_profile') == FALSE) {
            $this->_tpl('profile_settings', $data);
        } else {
            $this->admin_model->profile_settings();
            redirect('admin/admin/profile_settings');
        }
    }
    function add() {
        $this->validation_appearance();
        if ($this->form_validation->run('add_profile') == FALSE) {
            $this->_tpl('add_profile', '');
        } else {
            $this->admin_model->add_profile();
            $_SESSION['msg'] = 'A new profile is created';
            redirect('admin/admin/add');
        }
    }

}