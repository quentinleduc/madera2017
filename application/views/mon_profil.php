<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>


<div id="msg">
    <!-- on affiche le message de notifications !-->
    <?php if($this->session->flashdata('msg')){ echo $this->session->flashdata('msg'); } ?>
  </div>
<br>
			<br>
<?php echo form_open('accueil/mon_profil'); ?>
	<div class="form-row">
		<input  type="hidden" id="ok" name="ok" value="ok">
		<label class="control-label col-sm-2">Réference</label>
			<div class="form-group col-md-6">
				<p style="text-transform:uppercase;"><?= $_SESSION['ref'] ?> trhtr</p>
			</div>
			<div class="form-group col-md-6">
			<label >Nom</label>
			
				<input  class=" form-control" id="nom" name="nom" value="<?= $_SESSION['nom'] ?>">
			</div>
			<br>
			<br>
			<div class="form-group col-md-6">
			<label >Prenom</label>
			
				<input  class=" form-control" id="prenom"  name="prenom" value="<?= $_SESSION['prenom'] ?>">
			</div>
			<br>
			<br>
			<div class="form-group col-md-6">
			<label >Télephone</label>
			
				<input  class=" form-control" id="tel"  name="tel" value="<?= $_SESSION['tel'] ?>">
			</div>
			<br>
			<br>
			<div class="form-group col-md-6">
			<label >Email</label>
			
				<input  class=" form-control" id="email"  name="email" value="<?= $_SESSION['email'] ?>">
			</div>
			<br>
			<br>
			<div class="form-group col-md-6">
			<label >Mot de passe</label>
			
				<input  type="password" class=" form-control" id="mdp" placeholder="Nouveau mot de passe" name="mdp" value="">
			</div>
			<br>
			<br>
			<div class="col-sm-offset-2 col-sm-10">
			<input type="submit" value="Modifier" class="btn btn-default">
			</div>
		</div>
	</form>