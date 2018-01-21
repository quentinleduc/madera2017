<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>


        <h1> Bienvenu <?= $_SESSION['nom'];   ?></h1>

 <div class="row">
        <div class="col-lg-4 portfolio-item">
          <div class="card h-100">
            <a href=""><img class="card-img-top" src="<?= base_url('assets/img/projets.jpg') ?> " alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="#">Projets</a>
              </h4>
              <p class="card-text">Consultation et création de projet</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 portfolio-item">
          <div class="card h-100">
            <a href="#"><img class="card-img-top" src="<?= base_url('assets/img/clients.png') ?>" alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="#">Clients</a>
              </h4>
              <p class="card-text">Consultation et création de client</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 portfolio-item">
          <div class="card h-100">
            <a href=""><img class="card-img-top" src="<?= base_url('assets/img/plan.png') ?>" alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="#">Plans</a>
              </h4>
              <p class="card-text">Consulter les plans ( coming soon !)</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 portfolio-item">
          <div class="card h-100">
            <a href="<?= site_url('accueil/mon_profil') ?>"><img class="card-img-top" src="<?= base_url('assets/img/user.png') ?>" alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="<?= site_url('accueil/mon_profil') ?>">Mon compte</a>
              </h4>
              <p class="card-text">Consulter mon compte</p>
            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->
<p><?php echo anchor('login', 'Try it again!'); ?></p>

<p><?= anchor('login/logout', 'Déconnexion'); ?></p>
