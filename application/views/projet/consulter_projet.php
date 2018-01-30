<?php if(!defined('BASEPATH')) exit('Direct Access Not Allowed');?>
<h1>Consultation projet et devis</h1>

<div class="panel-group">
	<div class="panel panel-primary">
      <div class="panel-heading">Devis</div>
      <div class="panel-body">Panel Content</div>
    </div>
    <div class="panel panel-primary">
      <div class="panel-heading">Le projet</div>
      <div class="panel-body">
      	<p>Nom projet : <?= $projet->nom_projet ?></p> 
      	<p>Client: <?= $client->nom_cli ?></p>  
      	<p>Date de création du projet : <?= $projet->date_projet ?></p> 
      	<p>Suivi par : <?= $commercial->nom_com ?></p> 
      	<p>Gamme : </p> 
      	<button type="button" class="btn btn-info" data-toggle="collapse" data-target="#gamme">Afficher les caractéristiques de la gamme</button>
	    <div id="gamme" class="collapse">
		    Lorem ipsum dolor sit amet, consectetur adipisicing elit,
		    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
	    </div>
      </div>

    </div>

    <div class="panel panel-primary">
	    <div class="panel-heading">
	                <div class="row">
	                  <div class="col col-xs-6">
	                    <h3 class="panel-title">Les modules du projet</h3>
	                  </div>
	                  <div class="col col-xs-6 text-right">
	                    <button type="button" class="btn btn-sm btn-primary btn-create">Ajouter un module</button>
	                  </div>
	                </div>
	        </div>
	        <div class="panel-body">
	        	<?php
 					 if(isset($listeModules) ){
  					  ?>
	        	<div style="overflow-x:auto;">
		        	<table class="table table-striped table-bordered table-list">
		                  <thead>
		                    <tr>
		                        <th><em class="fa fa-cog"></em></th>
		                        <th >Référence module</th>
		                        <th>Nom module</th>
		                        <th>Coupe</th>
		                        <th>CCTP</th>
		                        <th>Description</th>
		                        <th>Prix</th>
		                        <th>Angle</th>
		                    </tr> 
		                  </thead>
		                  <tbody>
		                          <tr>
		                            <td align="center">
		                              <a class="btn btn-default"><em class="fa fa-pencil"></em></a>
		                              <a class="btn btn-danger"><em class="fa fa-trash"></em></a>
		                            </td>
		                            <td >1</td>
		                            <td>John Doe</td>
		                            <td>johndoe@example.com</td>
		                            <td>johndoe@example.com</td>
		                            <td>johndoe@example.com</td>
		                            <td>johndoe@example.com</td>
		                            <td>johndoe@example.com</td>
		                          </tr>
		                        </tbody>
		                </table>
		            </div>
		            <?php }
					else{?>
					        <p><b>Aucun Module n'a été ajouté  !</b></p>
					    <?php } ?>
	        </div>
    </div>
</div>