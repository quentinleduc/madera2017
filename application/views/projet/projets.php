<?php if(!defined('BASEPATH')) exit('Direct Access Not Allowed');?>

<h1>Projets</h1>

<div id="msg">
    <!-- on affiche le message de notifications !-->
    <?php if($this->session->flashdata('msg')){ echo $this->session->flashdata('msg'); } ?>
</div>
<div id="erreur_msg">
    <!-- on affiche le message d'erreur !-->
    <?php if($this->session->flashdata('error_msg')){ echo $this->session->flashdata('error_msg'); } ?>
  </div>
<br>
<br>
<a href="projet/ajouter_projet" class="btn btn-primary" role="button">Ajouter un Projet</a>
<br>
<br>
<?php
  if(isset($listeProjets) ){
    ?>
<div style="overflow-x:auto;">
  <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th>Reférence</th>
              <th>Nom</th>
              <th>Prenom</th>
              <th>Adresse</th>
              <th>Code postale</th>
              <th>Téléphone</th>
              <th>Email</th>
            </tr>
          </thead>
          <tfoot>
              <tr>
                <th>Reférence</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Adresse</th>
                <th>Code postale</th>
                <th>Téléphone</th>
                <th>Email</th>
              </tr>
          </tfoot>
          <tbody>
               
                 <?php foreach ($listeProjets as $cli){ 

                      for($i = 0;$i<count($cli);$i++){
                        $id = $cli[$i]['id_cli']; ?>
              <tr>
                  <td><?= anchor('modifier_client/'.$id,$cli[$i]['ref_cli']) ?></td>
                  <td><?= $cli[$i]['nom_cli']  ?></td>
                  <td><?= $cli[$i]['prenom_cli']  ?></td>
                  <td><?= $cli[$i]['adresse_cli']  ?></td>
                  <td><?= $cli[$i]['code_postal_cli']  ?></td>
                  <td><?= $cli[$i]['telephone_cli']  ?></td>
                  <td><?= $cli[$i]['email_cli'] ?></td>
                  <?php } ?>
              </tr>
              <?php }?>
              




               
          </tbody>
  </table>
</div>
<?php }
else{?>
        <p><b>Aucun Projet n'est disponible !</b></p>
    <?php } ?>
