<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<h1>Choix du module</h1>
<div id="msg">
    <!-- on affiche le message de notifications !-->
    <?php if($this->session->flashdata('msg')){ echo $this->session->flashdata('msg'); } ?>
    <?php echo validation_errors(); ?>
</div>
<br>
<br>
<?php echo form_open('projet/choix_module'); ?>
  <div class="form-row">
    <div class="form-group col-md-6">
     <?php  $idProjet = $this->uri->segment(3);?>
     <div  id="BoxModule"> 
          <div class="ajout_module">
               <select name="modules">
                  <option  value="1" >Pièce</option> 
                  <option  value="6" >Cuisine</option> 
                  <option  value="5" >Toit</option>
              </select>
          </div>
       </div>

     <br>
     <input type="hidden" class="form-control" id="idprojet" name="idprojet" value="<?= $idProjet ?>">
        <button type="submit" class="btn btn-primary">Selectionner le module</button>
  </div>
  
   

</form>



