<?php if(!defined('BASEPATH')) exit('Direct Access Not Allowed');?>

<h1>Clients</h1>


<br>
<button class="w3-button w3-ripple w3-green">Ajouter un client</button>
<br>
<br>
<?php

  if($listeClients != null){
    ?>

<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
		      <th>Reférence</th>
		      <th>Nom</th>
		      <th>Prenom</th>
		      <th>Adresse</th>
		      <th>Code postale</th>
              <th>Téléphone</th>
              <th>Email</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
		      <th>Reférence</th>
		      <th>Nom</th>
		      <th>Prenom</th>
		      <th>Service </th>
		      <th>Code postale</th>
              <th>Téléphone</th>
              <th>Email</th>
            </tr>
        </tfoot>
        <tbody>
             
               <?php foreach ($listeClients as $cli){ 
                    for($i = 0;$i<count($cli);$i++){?>
            <tr>
                <td><?= $cli[$i]['id_cli'] ?></td>
                <td><?= $cli[$i]['nom_cli']  ?></td>
                <td><?= $cli[$i]['prenom_cli']  ?></td>
                <td><?= $cli[$i]['adresse_cli']  ?></td>
                <td><?= $cli[$i]['code_postal_cli']  ?></td>
                <td><?= $cli[$i]['telephone_cli']  ?></td>
                <td><?= $cli[$i]['email_cli'] ?></td>
                <?php } ?>
            </tr>
            <?php }?>
            




             
        </tbody>
    </table>
<?php }
else{?>
        <p><b>Aucun client n'a été ajouté !</b></p>
    <?php } ?>
			</div>