

<h1 class="titre_madera">Madera</h1>
<div id="erreur_msg">
    <!-- on affiche le message d'erreur !-->
    <?php if($this->session->flashdata('error_msg')){ echo $this->session->flashdata('error_msg'); } ?>
  </div>
<div id="Formulaire_login">

  

  <h4>Connexion</h4>
<?php echo validation_errors(); ?>
<?php echo form_open('login'); ?>

 
    <label for="email">Email</label>
    <input type="text" class=" form_login form-control" id="email" placeholder="Email" name="email"  required>
  
    <label for="mdp">Mot de passe</label>
    <input type="password" class="form_login form-control" id="mdp" placeholder="Mot de passe" name="mdp"  required>
    </br>
    <button class="btn btn-primary" type="submit">Valider</button>
  
     

</div>
</form>