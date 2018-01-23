<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>


        <h1> Bienvenu <?= $_SESSION['nom'];   ?></h1>

  <div class="row">
        <div class="col-md-3">
         <div class="thumbnail">
            <a href=""><img src="<?= base_url('assets/img/projets.jpg') ?> " style="width:100%" alt=""></a>
            <div class="caption">
              <h3 >
                <a href="#">Projets</a>
              </h3>
              <p class="card-text">Consultation et création de projet</p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
         <div class="thumbnail">
            <a href="<?= site_url('accueil/clients') ?>"><img  src="<?= base_url('assets/img/clients.png') ?>" style="width:100%" alt=""></a>
            <div class="caption">
              <h3 >
                <a href="<?= site_url('accueil/clients') ?>">Clients</a>
              </h4>
              <p class="card-text">Consultation et création de client</p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
         <div class="thumbnail">
            <a href="<?= site_url('accueil/mon_profil') ?>"><img  src="<?= base_url('assets/img/user.png') ?>" style="width:100%" alt=""></a>
            <div class="caption">
              <h3 >
                <a href="<?= site_url('accueil/mon_profil') ?>">Mon compte</a>
              </h4>
              <p class="card-text">Consulter mon compte</p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
         <div class="thumbnail">
            <a href=""><img  src="<?= base_url('assets/img/plan.png') ?>" style="width:100%" alt=""></a>
            <div class="caption">
              <h3 >
                <a href="#">Plans</a>
              </h4>
              <p class="card-text">Consulter les plans ( coming soon !)</p>
            </div>
          </div>
        </div>
        
  </div>
  <!-- /.row -->
<p><?php echo anchor('login', 'Try it again!'); ?></p>

<p><?= anchor('login/logout', 'Déconnexion'); ?></p>
