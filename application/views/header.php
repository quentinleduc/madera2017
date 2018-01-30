<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Madera</title>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="">

	<!-- css -->

	<link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/jquery.dataTables.min.css') ?>">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
	
</head>

<body>

	 <?php if(isset($_SESSION['logged_in'])){
    echo '
    <!-- Navigation -->
    <nav class="navbar navbar-default">

    <div class="navbar-header">
            <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="'.site_url('accueil').'" class="navbar-brand">Madera</a>
        </div>

    <div id="navbarCollapse" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="'.site_url('projet').'">Projets</a></li>
                <li><a href="'.site_url('client').'">Clients</a></li>
                <li><a href="'.site_url('client').'">Plans</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="'.site_url('accueil/mon_profil').'">Mon profil</a></li>
                <li><a href="'.site_url('login/logout').'">Déconnexion</a></li>
            </ul>
        </div>
    </nav>
</div>';
  }
  ?>
	
	
	<div class="container">