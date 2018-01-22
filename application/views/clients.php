<?php if(!defined('BASEPATH')) exit('Direct Access Not Allowed');?>

<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
              <th>#</th>
		      <th>Utilisateur</th>
		      <th>Action</th>
		      <th>Date</th>
		      <th>Service </th>
		      <th>Emplacement du service </th>
            </tr>
        </thead>
        <tfoot>
            <tr>
               <th>#</th>
		      <th>Utilisateur</th>
		      <th>Action</th>
		      <th>Date</th>
		      <th>Service </th>
		      <th>Emplacement du service </th>
            </tr>
        </tfoot>
        <tbody>';
        for($i=0;$i<count($listeMouv);$i++){
        	$idMouv=$listeMouv[$i]->get_id();
        	//récupétation de l'utilisateur
        	$dao_user = new DAO_user();
			$user=$dao_user->get_user_by_id($listeMouv[$i]->get_user_id());
			$nomUtil = $user->get_nom();

			$action=$listeMouv[$i]->get_action();
			$date=$listeMouv[$i]->get_date();
			//récupération du nom du service
			$dao_service = new DAO_service();
			$service = $dao_service->get_service($listeMouv[$i]->get_service_id());
			$nomServ = $service->get_nom();
			$empl = $service->get_emplacement();
			$retour .='
            <tr>
                <td>'.$idMouv.'</td>
                <td>'.$nomUtil.'</td>
                <td>'.$action.'</td>
                <td>'.$date.'</td>
                <td>'.$nomServ.'</td>
                <td>'.$empl.'</td>
            </tr>';
        }
		$retour .='</tbody>
    </table>

			</div>