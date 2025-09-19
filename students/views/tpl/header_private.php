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
                    <h1 class="text-center"><?php echo $site_title; ?></h1></div>
                <ul class="nav nav-tabs">
                    <li<?php $name = 'Home';
                        if ($name == $page) echo ' class="active"'; ?>>
                        <?php echo anchor('', $name); ?></li>
                    <li class="pull-right">
                        <?php echo anchor('home/logout', 'Logout'); ?></li>
                </ul>
                <div class="row">

