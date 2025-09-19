<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

$config = array(
    'login' => array(
        array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'required|valid_email|callback__user_exist' //|callback__is_user_blocked'
        ),
        array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'required|callback__correct_password'
        )
    ),
    'register' => array(
        array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'required|valid_email|is_unique[student_login.email]'
        ),
        array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'required|min_length[6]|matches[rpassword]'
        )
    ),
    'forgot' => array(
        array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'required|valid_email|callback__user_exist'
        )
    ),
    'admission' => array(
        array(
            'field' => 'programme',
            'label' => 'Programme',
            'rules' => 'required'
        ),
        array(
            'field' => 'qualification',
            'label' => 'Qualification',
            'rules' => 'required'
        ),
        array(
            'field' => 'subjects',
            'label' => 'Subjects',
            'rules' => 'required'
        ),
        array(
            'field' => 'passing_year',
            'label' => 'Passing year',
            'rules' => 'required'
        ),
        array(
            'field' => 'percentage',
            'label' => 'Percentage',
            'rules' => 'required'
        ),
        array(
            'field' => 'board',
            'label' => 'Board',
            'rules' => 'required'
        ),
        array(
            'field' => 'address',
            'label' => 'Address',
            'rules' => 'required'
        ),
        array(
            'field' => 'city',
            'label' => 'City',
            'rules' => 'required'
        ),
        array(
            'field' => 'district',
            'label' => 'District',
            'rules' => 'required'
        ),
        array(
            'field' => 'state',
            'label' => 'State',
            'rules' => 'required'
        ),
        array(
            'field' => 'pin',
            'label' => 'Pin code',
            'rules' => 'required'
        ),
        array(
            'field' => 'phone',
            'label' => 'Phone',
            'rules' => 'required|is_unique[student_contact.phone]'
        ),
        array(
            'field' => 'name',
            'label' => 'Name',
            'rules' => 'required'
        ),
        array(
            'field' => 'year',
            'label' => 'Year',
            'rules' => 'required'
        ),
        array(
            'field' => 'month',
            'label' => 'Month',
            'rules' => 'required'
        ),
        array(
            'field' => 'day',
            'label' => 'Day',
            'rules' => 'required'
        ),
        array(
            'field' => 'gender',
            'label' => 'Gender',
            'rules' => 'required'
        ),
        array(
            'field' => 'category',
            'label' => 'Category',
            'rules' => 'required'
        ),
        array(
            'field' => 'religion',
            'label' => 'Religion',
            'rules' => 'required'
        ),
        array(
            'field' => 'guardian',
            'label' => 'Guardian',
            'rules' => 'required'
        ),
    ),
    'payment' => array(
        array(
            'field' => 'draft_no',
            'label' => 'Draft number',
            'rules' => 'required|is_natural|exact_length[6]' 
        ),
        array(
            'field' => 'bank',
            'label' => 'Bank name',
            'rules' => 'required'
        ),
        array(
            'field' => 'year',
            'label' => 'Year',
            'rules' => 'required'
        ),
        array(
            'field' => 'month',
            'label' => 'Month',
            'rules' => 'required'
        ),
        array(
            'field' => 'day',
            'label' => 'Day',
            'rules' => 'required'
        ),
    ),
);

