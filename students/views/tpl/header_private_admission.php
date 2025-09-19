<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title><?php echo $site_title; ?></title>
        <?php require_once 'header_info.php'; ?>
    </head>
    <body>
        <div id="wrap">
            <div class="container">
                <div class="page-header">
                    <h1 class="text-center"><?php echo $site_title; ?> 
                    </h1></div>
                <div class="navbar">
                    <div class="navbar-inner">
                        <a class="brand" href="#">Online Admission System</a>
                        <ul class="nav pull-right">
                            <li class="dropdown" id="accountmenu">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $user_email; ?><b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><?php echo anchor('', ('Logged in as <em><strong>' . $user_email . '</strong></em>')); ?></li>
                                    <li class="divider"></li>                                    
                                    <li><?php echo anchor('pages_private/logout', 'Logout'); ?></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row">
