<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<h1>Modifier un client</h1>
<div id="msg">
    <!-- on affiche le message de notifications !-->
    <?php if($this->session->flashdata('msg')){ echo $this->session->flashdata('msg'); } ?>
    <?php echo validation_errors(); ?>
</div>
<br>
<br>

<?php echo form_open('client/modifier_client'); ?>
  <div class="form-row">
    <div class="form-group col-md-6">
      <input type="hidden" name="id" id="id" value="<?php  echo $id; ?>">
      <label for="nom">Nom</label>
      <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom" value="<?php  echo $nom; ?>" required>
    </div>
    <div class="form-group col-md-4">
      <label for="prenom">Prénom</label>
      <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prénom" value="<?php if ($prenom != null) echo $prenom; ?>" required>
    </div>
  </div>
  <div class="form-group col-md-10">
    <label for="adresse">Adresse</label>
    <input type="text" class="form-control" id="adresse" name="adresse" placeholder="1234 Main St"  value="<?php if( $adresse != null) echo $adresse; ?>" required>
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="codePostal">Code postal</label>
      <input type="text" class="form-control" id="codePostal" name="codePostal" value="<?php if( $code_postal != null) echo $code_postal; ?>" required>
    </div>
    <div class="form-group col-md-4">
      <label for="email">Email</label>
      <input type="email" class="form-control" id="email" name="email" value="<?php if( $email != null) echo $email; ?>" required>
    </div>
    <div class="form-group col-md-2">
      <label for="tel">Téléphone</label>
      <input type="number" class="form-control" id="tel" name="tel"  value="<?php if( $tel != null) echo $tel; ?>" required>
    </div>
  </div>
 <div class="col-sm-offset-2 col-sm-10">
	<button type="submit" class="btn btn-primary">Modifier</button>
 </div>
</form>