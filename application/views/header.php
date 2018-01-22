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
	<link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
	<link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/css/simplePagination.css') ?>" rel="stylesheet">
	<link href="<?= base_url('assets/css/2-col-portfolio.css') ?>" rel="stylesheet">
	
</head>
<header>
	<?php if(isset($_SESSION['logged_in'])){
		echo '
		<!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="'.site_url('accueil').'">Madera</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item ">
              <a class="nav-link" href="'.site_url('accueil').'">Projets
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="'.site_url('accueil/clients').'">Clients</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Plans</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="'.site_url('accueil/mon_profil').'">Mon profil</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>';
	}
	?>
		 
	
</header>

<body>

	
	
	
	<div class="container">