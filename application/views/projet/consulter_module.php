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
			  <input type="hidden" name="idProjet"  value="<?= $projet->id_projet ?>">
		      	Nom du module: <input type="texte" name="nom_module" value="<?= $module->nom_module ?> "> 
		      	<p>Référence  :<?= $module->ref_module ?> </p>
		      	<p>Caratéristiques : <?= $module->caracteristique ?></p>
		      	<p>Details : <?= $module->details ?></p>
		      	<p>Unité : <?= $module->unite ?></p>
		      	Description  :<input type="texte" name="description_module" value="<?= $module->description_module ?>"> 
		      	<p>Prix  :<?= $module->prix_module.'€' ?></p>

	      	<?php }?>
	      	<div class="col-sm-offset-2 col-sm-10">
				<button type="submit" class="btn btn-primary">Modifier</button>
			 </div>

      </div>
    </div>
    </div>
</form>
    
