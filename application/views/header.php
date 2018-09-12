<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin Page</title>

    <link href="<?php echo base_url();?>assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/nprogress/nprogress.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/iCheck/skins/flat/green.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="#" class="site_title"><i class="fa fa-home"></i> <span>Admin Page</span></a>
                </div>

                <div class="clearfix"></div>
                <br />

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <ul class="nav side-menu">
                            <li><a><i class="fa fa-user"></i> Admin <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu" style="display: block">
                                    <li class="<?php if($this->uri->segment(2) == 'admin_page') { echo 'current-page'; };?>"><a href="<?php echo base_url('dashboard/admin_page');?>">Tabel Admin</a></li>
                                    <li class="<?php if($this->uri->segment(2) == 'form_admin') { echo 'current-page'; };?>"><a href="<?php echo base_url('dashboard/form_admin');?>">Form Admin</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- /sidebar menu -->

            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <nav>
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li>
                                    <a href="<?php echo base_url('dashboard/logout');?>" onclick="return confirm('Apakah anda yakin ingin keluar?')">
                                        <i class="fa fa-sign-out pull-right"></i> Log Out
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->