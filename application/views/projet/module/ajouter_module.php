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
      <input type="number" class="form-control" id="angle" name="angle"  required>
    </div>
  </div>

  <div class="form-row">

    <div class="form-group col-md-4">
      <h3>Composants</h3>
      <label for="description">Choisir le(s) composant(s) (1 au minimum) </label>
        <div class="checkbox">
          <input type="hidden" class="form-control" name="labelName[]" value="Lisses">
          <label  ><input type="checkbox"  name="composants[]"  value="5" required>Lisses</label>
          <input type="number" name="qte[]"  placeholder="Longeur en cm">
        </div>
        <div class="checkbox">
          <input type="hidden" class="form-control" name="labelName[]" value="Contreforts">
          <label  ><input type="checkbox" name="composants[]" value="5">Contreforts</label>
          <input type="number" name="qte[]"  placeholder="Longeur en cm">
        </div>
        <div class="checkbox">
          <input type="hidden" class="form-control" name="labelName[]" value="Sabots d'assemblage">
          <label  ><input type="checkbox" name="composants[]" value="6" >Sabots d'assemblage</label>
          <input type="number" name="qte[]"  placeholder="Quantité">
        </div>
        <div class="checkbox">
          <input type="hidden" class="form-control" name="labelName[]" value="Goujons de fixation">
          <label  ><input type="checkbox" name="composants[]" value="6" >Goujons de fixation</label>
          <input type="number" name="qte[]"  placeholder="Quantité">
        </div>
        <div class="checkbox">
          <input type="hidden" class="form-control" name="labelName[]" value="Supports de sol">
          <label  ><input type="checkbox" name="composants[]" value="6" >Supports de sol</label>
          <input type="number" name="qte[]"  placeholder="Quantité">
        </div>
        <div class="checkbox">
          <input type="hidden" class="form-control" name="labelName[]" value="Boulons"">
          <label  ><input type="checkbox" name="composants[]" value="6" >Boulons</label>
          <input type="number" name="qte[]"  placeholder="Quantité">
        </div>
        <div class="checkbox">
          <input type="hidden" class="form-control" name="labelName[]"  value="Ardoises">
          <label ><input type="checkbox" name="composants[]" value="4" >Ardoises</label>
          <input type="number" name="qte[]"  placeholder="Surface en m2">
        </div>
        <div class="checkbox">
          <input type="hidden" class="form-control" name="labelName[]" value="Tuiles">
          <label  ><input type="checkbox" name="composants[]" value="4" >Tuiles</label>
          <input type="number" name="qte[]"  placeholder="Surface en m2">
        </div>
        <div class="checkbox">
          <input type="hidden" class="form-control" name="labelName[]"  value="Montants verticaux">
          <label ><input type="checkbox"  name="composants[]"  value="5" >Montants verticaux</label>
          <input type="number" name="qte[]"  placeholder="Longeur en cm">
        </div>
        <div class="checkbox">
          <input type="hidden" class="form-control" name="labelName[]"  value="Bardage"">
          <label ><input type="checkbox" name="composants[]" value="4">Bardage</label>
          <input type="number" name="qte[]"  placeholder="Surface en m2 ">
        </div>
        <div class="checkbox">
          <input type="hidden" class="form-control" name="labelName[]" value="Pare-pluie">
          <label  ><input type="checkbox" name="composants[]" value="7" >Pare-pluie</label>
          <input type="number" name="qte[]"  placeholder="Surface en m2">
        </div>
        <div class="checkbox">
          <input type="hidden" class="form-control" name="labelName[]" value="Tasseau">
          <label  ><input type="checkbox" name="composants[]" value="1" >Tasseau</label>
          <input type="number" name="qte[]"  placeholder="Surface en m2">
        </div>
        <div class="checkbox">
          <input type="hidden" class="form-control" name="labelName[]" value="Panneau extérieur">
          <label ><input type="checkbox" name="composants[]" value="2" >Panneau extérieur</label>
          <input type="number" name="qte[]"  placeholder="Surface en m2">
        </div>
        <div class="checkbox">
          <input type="hidden" class="form-control" name="labelName[]" value="Panneau intérieur">
          <label  ><input type="checkbox" name="composants[]" value="3" >Panneau intérieur</label>
          <input type="number" name="qte[]"  placeholder="Surface en m2">
        </div>
        <div class="checkbox">
          <input type="hidden" class="form-control" name="labelName[]" value="Panneau intermédiaire">
          <label  ><input type="checkbox" name="composants[]" value="3" >Panneau intermédiaire</label>
          <input type="number" name="qte[]"  placeholder="Surface en m2">
        </div>
        <div class="checkbox">
          <input type="hidden" class="form-control" name="labelName[]" value="Pare-vapeur">
          <label  ><input type="checkbox" name="composants[]" value="7" >Pare-vapeur</label>
          <input type="number" name="qte[]"  placeholder="Surface en m2">
        </div>
    </div>
   
 <div class="col-sm-offset-2 col-sm-10">
  <button type="submit" class="btn btn-primary">Valider</button>
 </div>
 
  </div> 

</form>




<!-- https://stackoverflow.com/questions/14853779/adding-input-elements-dynamically-to-form

  https://stackoverflow.com/questions/6198684/javascript-how-to-copy-all-options-from-one-select-element-to-another

  https://stackoverflow.com/questions/4427094/how-can-i-duplicate-a-div-onclick-with-javascript

  https://www.codeproject.com/Questions/532826/addplusnewplusdivpluswhileplusclickplusaplusbutton
 !-->