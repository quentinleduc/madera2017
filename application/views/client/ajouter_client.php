<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<h1>Ajout d'un client</h1>
<div id="msg">
    <!-- on affiche le message de notifications !-->
    <?php if($this->session->flashdata('msg')){ echo $this->session->flashdata('msg'); } ?>
    <?php echo validation_errors(); ?>
</div>
<br>
<br>

<?php echo form_open('client/ajouter_client'); ?>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="nom">Nom</label>
      <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom"  required>
    </div>
    <div class="form-group col-md-4">
      <label for="prenom">Prénom</label>
      <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prénom"  required>
    </div>
  </div>
  <div class="form-group col-md-10">
    <label for="adresse">Adresse</label>
    <input type="text" class="form-control" id="adresse" name="adresse" placeholder="1234 Main St"   required>
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="codePostal">Code postal</label>
      <input type="text" class="form-control" id="codePostal" name="codePostal"  required>
    </div>
    <div class="form-group col-md-4">
      <label for="email">Email</label>
      <input type="email" class="form-control" id="email" name="email"  required>
    </div>
    <div class="form-group col-md-2">
      <label for="tel">Téléphone</label>
      <input type="number" class="form-control" id="tel" name="tel"   required>
    </div>
  </div>
 <div class="col-sm-offset-2 col-sm-10">
	<button type="submit" class="btn btn-primary">Valider</button>
 </div>
</form>