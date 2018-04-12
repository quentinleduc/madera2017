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
     <?php  $idProjet = $this->uri->segment(3);?>
     <input type="hidden" class="form-control" id="idprojet" name="idprojet" value="<?= $idProjet ?>">
      <label for="nomModule">Nom du module</label>
      <input type="text" class="form-control" id="nomModule" name="nomModule" placeholder="Ex : Mur extérieur"  required>
    </div>
    <div class="form-group col-md-4">
      <label for="coupe">Coupe</label>
      <input type="text" class="form-control" id="coupe" name="coupe" placeholder="Ex : Droite, en travers de mur ..."  required>
    </div>
  </div>
  <div class="form-group col-md-5">
    <label for="cctp">CCTP</label>
    <select id="cctp" name="cctp" class="form-control" required>
        <option value="Dalle béton">Dalle béton</option>
        <option value ="Plots béton">Plots béton</option>
    </select>
  </div>
  <div class="form-group col-md-5">
    <label for="carac_cctp">Caractéristique(s) CCTP </label>
   <input type="number" class="form-control" id="carac_cctp" name="carac_cctp" placeholder="Pour une Dalle beton , renseigner la surface au m2"  required>
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="description">Descritpion</label>
      <input type="text" class="form-control" id="description" name="description"  required>
    </div>
    <div class="form-group col-md-6">
      <label for="angle">Angle</label>
      <input type="number" class="form-control" id="angle" name="angle" value="90" required>
    </div>
  </div>

  <div class="form-row">

    <div class="form-group col-md-4">
      <h3>Composants</h3>
      <label for="description">Choisir le(s) composant(s) (1 au minimum) </label>
       <div  id="BoxComposant"> 
          <div class="ajout_composant">
               <select name="composants[]">
                  <option  value="1" >Lisses</option> 
                  <option  value="2" >Tasseau</option> 
                  <option  value="3" >Montants verticaux</option>
                  <option  value="4" >Contreforts</option>
                  <option  value="5" >Sabots d'assemblage</option>
                  <option  value="6" >Goujons de fixation</option>
                  <option  value="7" >Supports de sol</option>
                  <option  value="8" >Boulons</option>
                  <option  value="9" >Ardoises</option>
                  <option  value="10" >Tuiles</option>
                  <option  value="11" >Montants verticaux</option>
                  <option  value="12" >Bardage</option>
                  <option  value="13" >Pare-pluie</option>
                  <option  value="14" >Panneau extérieur</option>
                  <option  value="15" >Panneau intérieur</option>
                  <option  value="16" >Panneau intermédiaire</option>
                  <option  value="17" >Pare-vapeur</option>
              </select>
              <input type="number" name="qte[]"  placeholder="Quantité ou longeur ou surface" required>
              <button type="button" class="btn btn-default btn-sm" onclick="AjoutComposant()"><span class="glyphicon glyphicon-plus-sign"></span> Ajouter un autre composant</button>
          </div>
       </div>
    </div>
   
 <div class="col-sm-offset-2 col-sm-10">
  <button type="submit" class="btn btn-primary">Valider</button>
 </div>
 
  </div> 

</form>



