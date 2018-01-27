

<h1 class="titre_madera">Madera</h1>
<div id="erreur_msg">
    <!-- on affiche le message d'erreur !-->
    <?php if($this->session->flashdata('error_msg')){ echo $this->session->flashdata('error_msg'); } ?>
  </div>
<div id="Formulaire_login">
    <?php echo validation_errors(); ?>
    <div class="wrapper">
        <form class="form-signin" action="login" method="POST">
             <h3 class="form-signin-heading">Bienvenue ! Veuillez vous connecter !</h3>

             <hr class="colorgraph"><br>    

            <input type="text" class=" form-control" id="email" placeholder="Email" name="email" autofocus="" required>         
            <input type="password" class=" form-control" id="mdp" placeholder="Mot de passe" name="mdp"  autofocus="" required>      
           
            
            <button class="btn btn-lg btn-primary btn-block" type="submit">Valider</button>
        </form>
    </div>
</div>