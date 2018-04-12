<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<h1>Ajout d'un module</h1>
<div id="msg">
    <!-- on affiche le message de notifications !-->
    <?php if($this->session->flashdata('msg')){ echo $this->session->flashdata('msg'); } ?>
    <?php echo validation_errors(); ?>
</div>
<br>
<br>

 <script type='text/javascript'>
        function addFields(){
            // Number of inputs to create
            var number = document.getElementById("cctp").value;
            // Container <div> where dynamic content will be placed
            var listeInp = document.getElementById("listeInp");
            // Clear previous contents of the listeInp
            while (listeInp.hasChildNodes()) {
                listeInp.removeChild(listeInp.lastChild);
            }
            for (i=0;i<number;i++){
                // Append a node with a random text
                listeInp.appendChild(document.createTextNode("Member " + (i+1)));
                // Create an <input> element, set its type and name attributes
                var input = document.createElement("option");
                
                listeInp.appendChild(input);
                // Append a line break 
                listeInp.appendChild(document.createElement("br"));
            }
        }
    </script>


<?php echo form_open('projet/ajouter_module'); ?>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="nom">Nom du module</label>
      <input type="text" class="form-control" id="nom" name="nom" placeholder="Ex : Mur extérieur"  required>
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
          <label><input type="checkbox"  name="composants[]"  value="5" required>Lisses</label>
          <input type="number" name="tailleLisse" value="" placeholder="Longeur en cm">
        </div>
        <div class="checkbox">
          <label><input type="checkbox" name="composants[]" value="5">Contreforts</label>
          <input type="number" name="tailleContrefort" value="" placeholder="Longeur en cm">
        </div>
        <div class="checkbox">
          <label><input type="checkbox" name="composants[]" value="6" >Sabots d'assemblage</label>
          <input type="number" name="qteSabots" value="" placeholder="Quantité">
        </div>
        <div class="checkbox">
          <label><input type="checkbox" name="composants[]" value="6" >Goujons de fixation</label>
          <input type="number" name="qteGoujons" value="" placeholder="Quantité">
        </div>
        <div class="checkbox">
          <label><input type="checkbox" name="composants[]" value="6" >Supports de sol</label>
          <input type="number" name="qteSupports" value="" placeholder="Quantité">
        </div>
        <div class="checkbox">
          <label><input type="checkbox" name="composants[]" value="6" >Boulons</label>
          <input type="number" name="qteBoulons" value="" placeholder="Quantité">
        </div>
        <div class="checkbox">
          <label><input type="checkbox" name="composants[]" value="4" >Ardoises</label>
          <input type="number" name="qteArdoises" value="" placeholder="Quantité">
        </div>
        <div class="checkbox">
          <label><input type="checkbox" name="composants[]" value="4" >Tuiles</label>
          <input type="number" name="qteTuiles" value="" placeholder="Quantité">
        </div>
        <div class="checkbox">
          <label><input type="checkbox"  name="composants[]"  value="5" >Montants verticaux</label>
          <input type="number" name="qteMontantsVert" value="" placeholder="Longeur en cm">
        </div>
        <div class="checkbox">
          <label><input type="checkbox" name="composants[]" value="4">Bardage</label>
          <input type="number" name="qteBardage" value="" placeholder="Quantité">
        </div>
        <div class="checkbox">
          <label><input type="checkbox" name="composants[]" value="7" >Pare-pluie</label>
          <input type="number" name="tailleParePluie" value="" placeholder="Surface en m2">
        </div>
        <div class="checkbox">
          <label><input type="checkbox" name="composants[]" value="1" >Tasseau</label>
          <input type="number" name="tailleTasseau" value="" placeholder="Surface en m2">
        </div>
        <div class="checkbox">
          <label><input type="checkbox" name="composants[]" value="2" >Panneau extérieur</label>
          <input type="number" name="qtePanneauExt" value="" placeholder="Quantité">
        </div>
        <div class="checkbox">
          <label><input type="checkbox" name="composants[]" value="3" >Panneau intérieur</label>
          <input type="number" name="qtePanneauInt" value="" placeholder="Quantité">
        </div>
        <div class="checkbox">
          <label><input type="checkbox" name="composants[]" value="3" >Panneau intermédiaire</label>
          <input type="number" name="qtePanneauInterm" value="" placeholder="Quantité">
        </div>
        <div class="checkbox">
          <label><input type="checkbox" name="composants[]" value="" >Pare-vapeur</label>
          <input type="number" name="taillePareVappeur" value="" placeholder="Surface en m2">
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