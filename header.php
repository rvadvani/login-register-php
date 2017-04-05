<?php
/**
 * Created by www.coderseven.com
 * User: rvadvani | coder seven
 * Date: 30th March 2017
 * Time: 12:34 AM
 */
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title><?= SITE_TITLE; ?> | <?= SITE_TAG_LINE; ?></title>
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <link rel="icon" href="favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="vendor/css/bootstrap.min.css">
        <link rel="stylesheet" href="vendor/css/main.css">
        <link rel="stylesheet" type="text/css" href="vendor/font-awesome/css/font-awesome.min.css">
        <script src="vendor/js/jquery-3.1.1.min.js"></script>
        <script src="vendor/js/bootstrap.min.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Coder Seven</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li><a href="#">Home</a></li>
                        <li class="active"><a href="#">Demo</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Demo
                            <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                              <li><a href="#">Login & Register</a></li>
                              <li><a href="#">Chat in PHP</a></li>
                              <li><a href="#">Multiple file Upload</a></li>
                            </ul>
                          </li>
                        <li><a href="#"><span class="glyphicon glyphicon-download"></span> Download</a></li>
                    </ul>
                </div>
            </div>
        </nav>
