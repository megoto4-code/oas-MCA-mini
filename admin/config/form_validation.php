<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

$config = array(
    'login' => array(
        array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'required|valid_email|callback__admin_email'
        ),
        array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'required|callback__admin_password'
        )
    ),
    'programme' => array(
        array(
            'field' => 'pcode',
            'label' => 'Programme code',
            'rules' => 'required|is_unique[programme.code]'
        ),
        array(
            'field' => 'pname',
            'label' => 'Programme code',
            'rules' => 'required'
        ),
        array(
            'field' => 'semesters',
            'label' => 'Semester',
            'rules' => 'required|is_natural_no_zero'
        ),
        array(
            'field' => 'fee',
            'label' => 'Fee',
            'rules' => 'required|numeric'
        ),
    ),
    'current_profile' => array(
        array(
            'field' => 'c_email',
            'label' => 'Current email',
            'rules' => 'required|valid_email|callback__admin_email'
        ),
        array(
            'field' => 'c_password',
            'label' => 'Current password',
            'rules' => 'required|callback__admin_password'
        ),
        array(
            'field' => 'n_email',
            'label' => 'New email',
            'rules' => 'required|valid_email|is_unique[administrator.email]'
        ),
        array(
            'field' => 'n_password',
            'label' => 'New password',
            'rules' => 'required|min_length[6]|matches[rn_password]'
        ),
    ),
    'add_profile' => array(
        array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'required|valid_email|is_unique[administrator.email]'
        ),
        array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'required|min_length[6]|matches[rpassword]'
        ),
    ),
);

