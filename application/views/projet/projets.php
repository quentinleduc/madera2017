<?php if(!defined('BASEPATH')) exit('Direct Access Not Allowed');?>

<h1>Projets et Devis</h1>

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
<a href="projet/ajouter_projet" class="btn btn-primary" role="button">Ajouter un Devis</a>
<br>
<br>
<?php
  if(isset($listeProjets) ){
    ?>
<div style="overflow-x:auto;">
  <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th>Nom du projet</th>
              <th>Référence du projet</th>
              <th>Référence du client</th>
              <th>Date création</th>
            </tr>
          </thead>
          <tfoot>
              <tr>
                <th>Nom du projet</th>
                <th>Référence du projet</th>
                <th>Référence du client</th>
                <th>Date création</th>
              </tr>
          </tfoot>
          <tbody>
               
                
              <?php  for($i = 0;$i<count($listeProjets);$i++){
                        $id = $listeProjets[$i]['id_projet']; ?>
              <tr>
                  <td><?= anchor('projet/consulter_projet/'.$id,$listeProjets[$i]['nom_projet']) ?></td>
                  <td><?= $listeProjets[$i]['ref_projet']  ?></td>
                  <td><?=  anchor('client/modifier_client/'.$listeProjets[$i]['id_cli'],$listeProjets[$i]['nom_cli'])  ?></td>
                  <td><?= $listeProjets[$i]['date_projet']  ?></td>
                  <?php } ?>
              </tr>
              




               
          </tbody>
  </table>
</div>
<?php }
else{?>
        <p><b>Aucun Projet n'est disponible !</b></p>
    <?php } ?>
