<?php if(!defined('BASEPATH')) exit('Direct Access Not Allowed');?>

<div id="msg">
    <!-- on affiche le message de notifications !-->
    <?php if($this->session->flashdata('msg')){ echo $this->session->flashdata('msg'); } ?>
</div>
<h1>Consultation projet et devis</h1>

<a href="<?=site_url('projet')?>" class="btn btn-sm btn-primary btn-create" role="button">Retour</a>
<br>
<br>
<div class="panel-group">
	<div class="panel panel-primary">
      <div class="panel-heading">Devis</div>
      <div class="panel-body">
      	<?php
		 if(isset($devis)){
		  ?>
	      	<p>Etat devis : <?= $devis->etat_devis ?></p> 
	      	<p>Référence  : <?= $devis->ref_devis ?></p>
	      	<p>Montant  : <?= $devis->montant_devis_ht .'€'?></p>
	      	<?php if($devis->etat_devis == 'Brouillon'){?>
		      	<a href="http://localhost/madera/index.php/projet/valider_devis/<?= $devis->id_devis ?>/<?= $projet->id_projet ?>" class="btn btn-sm btn-primary btn-create" role="button">Valider le devis</a>
			                  
	      	<?php }else if($devis->etat_devis == 'Validé'){?>
		      	<a href="" class="btn btn-sm btn-primary btn-create" role="button">Générer le PDF</a>
			    <a href="http://localhost/madera/index.php/projet/annuler_devis/<?= $devis->id_devis ?>/<?= $projet->id_projet ?>" class="btn btn-sm btn-primary btn-create" role="button">Annuler</a>             
	      	<?php }


	      	 else if($devis->etat_devis == 'Annulé'){?>
		      	<a href="http://localhost/madera/index.php/projet/valider_devis/<?= $devis->id_devis ?>/<?= $projet->id_projet ?>" class="btn btn-sm btn-primary btn-create" role="button">Valider</a>             
	      	<?php }?>

      	<?php }?>
      </div>
    </div>
    <div class="panel panel-primary">
      <div class="panel-heading">Le projet</div>
      <div class="panel-body">
      	<p>Nom projet : <?= $projet->nom_projet ?></p> 
      	<p>Client: <?= $client->nom_cli.' '.$client->prenom_cli ?></p>  
      	<p>Date de création du projet : <?= $projet->date_projet ?></p> 
      	<p>Suivi par : <?= $commercial->nom_com.' '.$commercial->prenom_com ?></p> 
      	<p>Gamme : <?= $gamme->nom_gam ?></p> 
      	<button type="button" class="btn btn-info" data-toggle="collapse" data-target="#gamme">Afficher les caractéristiques de la gamme</button>
	    <div id="gamme" class="collapse">
		    <p>Référence de la gamme : <?= $gamme->ref_gam ?></p> 
		    <p>Finition : <?= $gamme->finition_gam ?></p> 
		    <p>Isolant : <?= $gamme->isolant_gam ?></p> 
		    <p>Type de couverture : <?= $gamme->type_couverture_gam ?></p> 
		    <p>Huisserie : <?= $gamme->huisserie_gam ?></p> 
		    <p>Descritpion : <?= $gamme->description ?></p> 
	    </div>
      </div>

    </div>

    <div class="panel panel-primary">
	    <div class="panel-heading">
	                <div class="row">
	                  <div class="col col-xs-6">
	                    <h3 class="panel-title">Les modules du projet</h3>
	                  </div>
	                  <div class="col col-xs-6 text-right">
	                  	<a href="http://localhost/madera/index.php/projet/choix_module/<?= $projet->id_projet ?>" class="btn btn-sm btn-primary btn-create" role="button">Ajouter un module</a>
	                  </div>
	                </div>
	        </div>
	        <div class="panel-body">
	        	<?php
 					 if(isset($listeModules) ){
  					  ?>
	        	<div style="overflow-x:auto;">
		        	<table class="table table-striped table-bordered table-list">
		                  <thead>
		                    <tr>
		                        <th><em class="fa fa-cog"></em></th>
		                        <th >Référence module</th>
		                        <th>Nom module</th>
		                        <th>Description</th>
		                        <th>Prix</th>
		                    </tr> 
		                  </thead>
		                  <tbody>
		                  	<?php  for($i = 0;$i<count($listeModules);$i++){
		                            	$id = $listeModules[$i]['id_module']; ?>
		                          <tr>
		                            <td align="center">
		                              <a href="<?=site_url('projet/consulter_module/'.$id.'/'.$projet->id_projet ) ?>" class="btn btn-default"><em class="fa fa-pencil"></em></a>
		                              <a href="<?=site_url('projet/supprimer_module/'.$id.'/'.$projet->id_projet ) ?>" class="btn btn-danger"><em class="fa fa-trash"></em></a>

		                            </td>
		                            
		                            <td ><?= $listeModules[$i]['ref_module'] ?></td>
		                            <td><?= $listeModules[$i]['nom_module']  ?></td>
		                            <td><?= $listeModules[$i]['description_module']  ?></td>
		                            <td><?= $listeModules[$i]['prix_module']  ?></td>
		                             
		                          </tr>
		                          <?php } ?>
		                        </tbody>
		                </table>
		            </div>
		            <?php }
					else{?>
					        <p><b>Aucun Module n'a été ajouté  !</b></p>
					    <?php } ?>
	        </div>
    </div>
</div>