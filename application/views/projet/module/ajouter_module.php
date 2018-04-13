<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<h1>Ajout d'un module</h1>
<div id="msg">
    <!-- on affiche le message de notifications !-->
    <?php if($this->session->flashdata('msg')){ echo $this->session->flashdata('msg'); } ?>
    <?php echo validation_errors(); ?>
</div>
<br>
<br>

<?php echo form_open('projet/ajouter_module'); ?>
  <div class="form-row">
    <div class="form-group col-md-6">
      
        <p> Nom du module : <input type="text" name="nom_mod" value="<?= $nomModule ?>_"></p>
        <p>Caratéristiques : <?= $carac ?></p>
        <p>Details : <?= $details ?></p>
        <p>Unité : <?= $unite ?></p>
        <p>Description<input type="text" name="description" value="<?= $description ?>"></p>
        <p>Prix : <?= $prix ?>€</p>
        <input type="hidden" class="form-control" id="idprojet" name="idprojet" value="<?= $idProjet ?>">
        <input type="hidden" class="form-control" id="prix" name="prix" value="<?= $prix ?>">
        <input type="hidden" class="form-control" id="details" name="details" value="<?= $details ?>">
        <input type="hidden" class="form-control" id="carac" name="carac" value="<?= $carac ?>">
        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-primary">Valider</button>
     </div>
  </div>
  
   

</form>



