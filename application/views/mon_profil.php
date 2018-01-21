<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>


<div id="msg">
    <!-- on affiche le message de notifications !-->
    <?php if($this->session->flashdata('msg')){ echo $this->session->flashdata('msg'); } ?>
  </div>
<br>
			<br>
<?php echo form_open('accueil/mon_profil'); ?>
	<div class="form-group">
		<input  type="hidden" id="ok" name="ok" value="ok">
		<label class="control-label col-sm-2">Réference</label>
			<div class="col-sm-5">
				<p style="text-transform:uppercase;"><?= $_SESSION['ref'] ?> </p>
			</div>
			<label class="control-label col-sm-2">Nom</label>
			<div class="col-sm-5">
				<input  class="form_inscription form-control" id="nom" name="nom" value="<?= $_SESSION['nom'] ?>">
			</div>
			<br>
			<br>
			<label class="control-label col-sm-2">Prenom</label>
			<div class="col-sm-5">
				<input  class="form_inscription form-control" id="prenom"  name="prenom" value="<?= $_SESSION['prenom'] ?>">
			</div>
			<br>
			<br>
			<label class="control-label col-sm-2">Télephone</label>
			<div class="col-sm-5">
				<input  class="form_inscription form-control" id="tel"  name="tel" value="<?= $_SESSION['tel'] ?>">
			</div>
			<br>
			<br>
			<label class="control-label col-sm-2">Email</label>
			<div class="col-sm-5">
				<input  class="form_inscription form-control" id="email"  name="email" value="<?= $_SESSION['email'] ?>">
			</div>
			<br>
			<br>
			<label class="control-label col-sm-2">Mot de passe</label>
			<div class="col-sm-5">
				<input  type="password" class="form_inscription form-control" id="mdp" placeholder="Nouveau mot de passe" name="mdp" value="">
			</div>
			<br>
			<br>
			<div class="col-sm-offset-2 col-sm-10">
			<input type="submit" value="Modifier" class="btn btn-default">
			</div>
		</div>
	</form>