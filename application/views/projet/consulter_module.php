<?php if(!defined('BASEPATH')) exit('Direct Access Not Allowed');?>

<div id="msg">
    <!-- on affiche le message de notifications !-->
    <?php if($this->session->flashdata('msg')){ echo $this->session->flashdata('msg'); } ?>
    <?php echo validation_errors(); ?>
</div>
<h1>Consultation/Modification d'un module</h1>
<a href="<?=site_url('projet/consulter_projet/'.$projet->id_projet) ?>" class="btn btn-sm btn-primary btn-create" role="button">Retour</a>
<br>
<br>

<?php echo form_open('projet/consulter_module'); ?>
	<div class="panel-group">

		<div class="panel panel-primary">
	      <div class="panel-heading">Module</div>
	      <div class="panel-body">
	      	<?php
			 if(isset($module)){
			  ?>
			  <input type="hidden" name="id_module" id="id" value="<?= $module->id_module ?>">
		      	Nom du module: <input type="texte" name="nom_module" value="<?= $module->nom_module ?> "> 
		      	<p>Référence  :<?= $module->ref_module ?> </p>
		      	La coupe du module :<input type="texte" name="coupe_module" value="<?= $module->coupe_module?>"> 
		      	<p>CCTP  :<?= $module->cctp_module ?></p>
		      	Description  :<input type="texte" name="description_module" value="<?= $module->description_module ?>"> 
		      	<p>Prix  :<?= $module->prix_module.'€' ?></p>
		      	Angle  :<input type="texte" name="angle" value="<?= $module->angle_module ?> ">  

	      	<?php }?>
	      	<div class="col-sm-offset-2 col-sm-10">
				<button type="submit" class="btn btn-primary">Modifier</button>
			 </div>

      </div>
    </div>
</form>
    <div class="panel panel-primary">
	    <div class="panel-heading">
	                <div class="row">
	                  <div class="col col-xs-6">
	                    <h3 class="panel-title">Les composants du module</h3>
	                  </div>
	                  <div class="col col-xs-6 text-right">
	                  	<a href="<?=site_url('projet/ajouter_composant/'.$module->id_module.'/'.$projet->id_projet) ?>" class="btn btn-sm btn-primary btn-create" role="button">Ajouter un composant</a>
	                  </div>
	                </div>
	        </div>
	        <div class="panel-body">
	        	<?php
 					 if(isset($listeComposants) ){
  					  ?>
	        	<div style="overflow-x:auto;">
		        	<table class="table table-striped table-bordered table-list">
		                  <thead>
		                    <tr>
		                        <th><em class="fa fa-cog"></em></th>
		                        <th >Référence composant</th>
		                        <th>Nom </th>
		                        <th>Unité de mesure</th>
		                        <th>Prix</th>
		                        <th>Quantité</th>
		                    </tr> 
		                  </thead>
		                  <tbody>
		                  	<?php  for($i = 0;$i<count($listeComposants);$i++){
		                            	$id = $listeComposants[$i]['id_composant']; ?>
		                          <tr>
		                            <td align="center">
		                              <a class="btn btn-danger"><em class="fa fa-trash"></em></a>

		                            </td>
		                            
		                            <td ><?= $listeComposants[$i]['ref_compo'] ?></td>
		                            <td><?= $listeComposants[$i]['nom_compo']  ?></td>
		                            <td><?= $listeComposants[$i]['unite_usage_compo']  ?></td>
		                            <td><?= $listeComposants[$i]['prix']  ?></td>
		                            <td><?= $listeComposants[$i]['quantite']  ?></td>
		                             
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