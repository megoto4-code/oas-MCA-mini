<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Online Admission - Administration</title>
        <?php echo link_tag('assets/bootstrap.min.css'); ?>
        <style>
            #search {
                margin:5px 5px -10px;
            }
        </style>
    </head>
    <body>

        <div class="navbar navbar-static-top">
            <div class="navbar-inner">                             
                <?php echo anchor('admin', 'Online Admission System - Administration', 'class="brand"'); ?>   
                <ul class="nav pull-right"> 
                    <li><?php echo anchor('admin','<i class="icon-home"></i> Home'); ?></li>
                    <li class="dropdown" id="accountmenu">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon-wrench"></i> Manage<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><?php echo anchor('admin/admin/settings','Site settings'); ?></li>
                            <li><?php echo anchor('admin/admin/programmes','Organize Programmes'); ?></li>
                        </ul>
                    </li>
                    <li><?php echo anchor('admin/users','<i class="icon-user"></i> All Users'); ?></li>
                    <?php
                    $atts = array('class' => 'navbar-search', 'id' => 'search');
                    echo form_open('admin/users/user', $atts);
                    ?>
                    <div class="input-append">
                        <input name="email" id="appendedInputButton" type="text" placeholder="Search with user email" />
                        <input class="btn btn-primary" type="submit" value="Go" />
                    </div>
                    </form>
                    <li class="dropdown" id="accountmenu">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo '<i class="icon-user"></i> <em><strong>' . $admin_email . '</strong></em>'; ?><b class="caret"></b></a>
                        <ul class="dropdown-menu">                                    
                            <li><?php echo anchor('admin/admin/profile_settings', 'Profile settings'); ?></li>
                            <li class="divider"></li>                                    
                            <li><?php echo anchor('admin/admin/logout', 'Logout'); ?></li>
                        </ul>
                    </li>
                </ul>                                 
            </div>
        </div>      
        <div class="container" id="container">
            <div class="row">