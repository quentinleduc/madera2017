<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<h1>Ajout d'un projet</h1>
<div id="msg">
    <!-- on affiche le message de notifications !-->
    <?php if($this->session->flashdata('msg')){ echo $this->session->flashdata('msg'); } ?>
    <?php echo validation_errors(); ?>
</div>
<br>
<br>

<h3>Le projet</h3>
<?php echo form_open('projet/ajouter_projet'); ?>
  <div class="form-row">
    <div class="form-group col-md-3">
      <label for="nomProjet">Nom du projet</label>
      <input type="text" class="form-control" id="nomProjet" name="nomProjet" placeholder="Nom du projet"  required>
    </div>
    <div class="form-group col-md-3">
      <label for="client">Choisir le client</label>
      <select id="client" name="client" class="form-control" required>
         <?php for($i = 0; $i < count($listeClients);$i++ ){?>
          <option value="<?=$listeClients[$i]['id_cli']?>"> <?= $listeClients[$i]['nom_cli']." ".$listeClients[$i]['prenom_cli']." (".$listeClients[$i]['ref_cli'].")"?></option>
          <?php }?>
      </select>
      
    </div>
    
  </div>
  <div class="form-row">

      <div class="form-group col-md-6">
        <label for="idGamme">Choisir la gamme</label>
         <select id="idGamme" name="idGamme" class="form-control" required>
          <?php for($i = 0; $i < count($listeGammes);$i++ ){?>
        <option value="<?=$listeGammes[$i]['id_gam']?>"> <?= $listeGammes[$i]['nom_gam']." (".$listeGammes[$i]['ref_gam'].")"?></option>
        <?php }?>
          
        </select>
      </div>
  </div>
 <div class="col-sm-offset-2 col-sm-10">
	<button type="submit" class="btn btn-primary">Valider</button>
 </div>
</form>