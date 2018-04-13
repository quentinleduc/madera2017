<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Projet extends CI_Controller {
	private $estConnecte = false;
	//page Projets
	public function index(){
		if(isset($_SESSION['logged_in'])) $this->estConnecte = $_SESSION['logged_in'];
		
		if($this->estConnecte == true ){
			//on charge tous les projets
			$listeProjets = $this->projet_model->get_all_projets();
			$data['listeProjets'] = $listeProjets;
			$this->load->view('header');
			$this->load->view('projet/projets',$data);
			$this->load->view('footer');
		}
		else {
			$this->session->set_flashdata('error_msg', "Vous n'avez pas accès à cette page, Veuillez vous identifier !");
			redirect('login');
		}
	}
	public function ajouter_projet(){
		if(isset($_SESSION['logged_in'])) $this->estConnecte = $_SESSION['logged_in'];
		
		if($this->estConnecte == true ){
			$this->form_validation->set_rules('nomProjet', 'Nom du projet', 'trim|required|xss_clean');
	     	$this->form_validation->set_rules('client', 'Client', 'trim|required|xss_clean');
	     	if ($this->form_validation->run() == TRUE){
		    	//on récupére les valeurs
		    	$nomProjet = $this->input->post('nomProjet');
		    	$idClient = $this->input->post('client');
		    	$idGamme = $this->input->post('idGamme');
		    	$client = $this->clients_model->get_by_id($idClient);
		    	$idCommercial = $_SESSION['user_id'];
		    	//on ajoute le projet
        		$idProjet = $this->projet_model->create_projet($nomProjet,$client,$idGamme,$idCommercial);
        		$projet = $this->projet_model->get_projet_by_id($idProjet);
        		// on crée le devis
        		$this->projet_model->create_devis($projet);
        		//on rédirige vers la page des projets
        		$this->session->set_flashdata('msg', "Le projet a bien été ajouté !");
				redirect('projet');
			}
			else{
				//on charge tous les clients
				$listeClients = $this->clients_model->get_all();
				//on charge tous les projets
				$listeGammes = $this->projet_model->get_all_gammes();
				$data['listeGammes'] = $listeGammes;
				$data['listeClients'] = $listeClients;
				$this->load->view('header');
				$this->load->view('projet/ajouter_projet',$data);
				$this->load->view('footer');
			}
			
		}
		else {
			$this->session->set_flashdata('error_msg', "Vous n'avez pas accès à cette page, Veuillez vous identifier !");
			redirect('login');
		}
	}

	public function consulter_projet(){
		if(isset($_SESSION['logged_in'])) $this->estConnecte = $_SESSION['logged_in'];
		
		if($this->estConnecte == true ){
			$idProjet = $this->uri->segment(3);
			if($idProjet != null){
				$projet = $this->projet_model->get_projet_by_id($idProjet);
				if($projet != null){
					$data['projet'] = $projet;
					$listeModules = $this->projet_model->get_all_modules($idProjet);
					$data['listeModules'] = $listeModules;
					$idGamme = $this->projet_model->get_idGamme_by_id_projet($idProjet);
					$gamme = $this->projet_model->get_gamme_by_id($idGamme->id_gamme);
					$data['gamme']= $gamme;
					$id_commercial = $this->projet_model->get_idcommercial_by_id_projet($idProjet);
					$commercial = $this->user_model->get_by_id($id_commercial->id_com);
					$data['commercial'] = $commercial;
					$client = $this->projet_model->get_client_by_id_projet($idProjet);
					$data['client'] = $client;
					$devis = $this->projet_model->get_devis($idProjet);
					$data['devis'] = $devis;
					$this->load->view('header');
					$this->load->view('projet/consulter_projet',$data);
					$this->load->view('footer');
				}else{// si le projet n'éxiste pas
						//on rédirige vers la page des projets
		        		$this->session->set_flashdata('error_msg', "Le projet que vous souhaitez consulter n'existe pas !");
						redirect('projet');
				}
				
			}
			
		}// FIN si estConnecte
		else {
			$this->session->set_flashdata('error_msg', "Vous n'avez pas accès à cette page, Veuillez vous identifier !");
			redirect('login');
		}
	}

	/* version avec composant */
	/*
	public function ajouter_module(){
		if(isset($_SESSION['logged_in'])) $this->estConnecte = $_SESSION['logged_in'];
		
		if($this->estConnecte == true ){

			$this->form_validation->set_rules('nomModule', 'Nom du module', 'trim|required|xss_clean');
	     	$this->form_validation->set_rules('coupe', 'Coupe', 'trim|required|xss_clean');
	     	$this->form_validation->set_rules('cctp', 'CCTP', 'trim|required|xss_clean');
	     	$this->form_validation->set_rules('carac_cctp', 'Caratéristiques CCTP', 'trim|required|xss_clean|is_natural');
	     	$this->form_validation->set_rules('description', 'Déscription', 'trim|required|xss_clean');
	     	$this->form_validation->set_rules('angle', 'Angle', 'trim|required|xss_clean|is_natural');

	     	if ($this->form_validation->run() == TRUE){
		    	//on récupére les valeurs
		    	$nomModule = $this->input->post('nomModule');
		    	$coupe = $this->input->post('coupe');
		    	$cctp = $this->input->post('cctp');
		    	$carac_cctp = $this->input->post('carac_cctp');
		    	$description = $this->input->post('description');
		    	$angle = $this->input->post('angle');
		    	if(isset($_POST['composants'])  ){
		    		$composants = $_POST['composants'];
		    	}
		    	$idProjet = $this->input->post('idprojet');
		    	if(isset($_POST['qte']) && !empty($_POST['qte']) ){
		    		$quantite = $_POST['qte'];
		    		$quantite = array_filter($quantite);// on ne prend pas les valeurs null
		    	}
		   		/*if(isset($_POST['labelName']) && !empty($_POST['labelName']) ){
		    		$label = $_POST['labelName'];
		   		 }
		    	$projet =  $this->projet_model->get_projet_by_id($idProjet);
		    	$prix = 0;

		    	if($cctp == 'Dalle béton'){
		    		//45euros le m2
		    		$prix = $carac_cctp *45; //45€ l'unité
		    	}else{
		    		//25 euros le plots
		    		$prix = $carac_cctp *25;// 25€ l'unité
		    	}

		    	//Création du module
		    	$idModule = $this->projet_model->create_module($projet,$nomModule,$coupe,$cctp,$description,$angle,$prix);

		    	// création des compotsants
		    	if($composants != null ){

		    		for($i=0; $i<count($composants); $i++){
			    		//$c =   $composants[$i];

			    	if(isset($quantite[$i]))
			    		$qte = $quantite[$i];
			    		//debug_backtrace($qte);
			    		
			    		$prix = $prix + 25*$qte;
			    		
			    		$caracteristique_compo = "";
			    		$description_compo = "";
						$num = $composants[$i];
						$nom_compo = '';
						$id_famille = '';
						$unite = '';
					 	$tabInfos = $this->get_info_compo($num,$nom_compo,$id_famille,$unite);
					 	$nom_compo = $tabInfos[0];
						$id_famille = $tabInfos[1];
						$unite = $tabInfos[2];

						//on met à jour le prix du module en fonction du prix des composants
						$prix_module = $this->projet_model->get_prix_module($idModule);
						$prix_final_module = $prix_module->prix_module + $prix;
						$this->projet_model->update_prix_module($idModule,$prix_final_module);

						//création du composant
				      	$this->projet_model-> create_composant($idModule,$id_famille,$nom_compo,$caracteristique_compo,$unite,$description_compo,$qte,$prix);

				      	//MAJ du devis
				      	$prix_devis = $this->projet_model->get_prix_devis($idProjet);
				      	$prix_final_devis = $prix_devis->montant_devis_ht + $prix;
				      	$this->projet_model->update_prix_devis($idProjet,$prix_final_devis);

					}

					
					$this->session->set_flashdata('msg', "Le module a bien été ajouté ! ");
					redirect('projet/consulter_projet/'.$idProjet);
		    	}else{

		    		$idProjet = $this->input->post('idprojet');
		    		$this->session->set_flashdata('msg', "une erreur s'est produite!");
					redirect('projet/consulter_projet/'.$idProjet);
		    	}
		    	
			}
			else{
				$this->load->view('header');
				$this->load->view('projet/module/ajouter_module');
				$this->load->view('footer');
			}
			
		}
		else {
			$this->session->set_flashdata('error_msg', "Vous n'avez pas accès à cette page, Veuillez vous identifier !");
			redirect('login');
		}
	}*/

	/*version sans composant*/
	public function ajouter_module(){
		if(isset($_SESSION['logged_in'])) $this->estConnecte = $_SESSION['logged_in'];
		
		if($this->estConnecte == true ){

			//on récupére les valeurs
	    	$nomModule = $this->input->post('nom_mod');
	    	$carac = $this->input->post('carac');
	    	$description = $this->input->post('description');
	    	$details = $this->input->post('details');
	    	$unite = $this->input->post('unite');
	    	$idProjet = $this->input->post('idprojet');
	    	$projet =  $this->projet_model->get_projet_by_id($idProjet);
	    	$prix =  $this->input->post('prix');

	     	if ($nomModule != null && $description != null){
		    	

		    	//Création du module
		    	$idModule = $this->projet_model->create_module_v2($projet,$nomModule,$details,$unite,$description,$carac,$prix);

		    	//MAJ du devis
		      	$prix_devis = $this->projet_model->get_prix_devis($idProjet);
		      	$prix_final_devis = $prix_devis->montant_devis_ht + $prix;
		      	$this->projet_model->update_prix_devis($idProjet,$prix_final_devis);
		      	$this->session->set_flashdata('msg', "Le module a bien été ajouté ! ");
				redirect('projet/consulter_projet/'.$idProjet);
		    	
			}
			else{
				$this->session->set_flashdata('error_msg', "une erreur s'est produite ");
				redirect('projet/consulter_projet/'.$idProjet);
			}
			
		}
		else {
			$this->session->set_flashdata('error_msg', "Vous n'avez pas accès à cette page, Veuillez vous identifier !");
			redirect('login');
		}
	}




	/* on choisit le module pour charger ses caractéristiques*/
	public function choix_module(){
		if(isset($_SESSION['logged_in'])) $this->estConnecte = $_SESSION['logged_in'];
		if($this->estConnecte == true ){

			
			if(isset($_POST['modules'])){
				$idProjet = $this->input->post('idprojet');
				$nomModule = "";
				$carac = "";
				$details = "";
				$unite = "";
				$description = " ";
				$prix = "";
				$module = $this->input->post('modules');
				switch ($module) {
					case 1:
						$nomModule = "Pièce";
						$carac = "12";
						$details = "";
						$unite = "m²";
						$description = "Pièce standard";
						$prix = $carac *1041;
						break;
					
					case 2:
						$nomModule = "Fenêtre";
						$carac = "750 x 600 ";
						$details = "";
						$unite = "mm";
						$description = "fenêtre standard";
						$prix = 90;
						break;

					case 3:
						$nomModule = "Porte-fenêtre";
						$carac = "2150 x 600/800 ";
						$details = "";
						$unite = "mm";
						$description = "porte-fenêtre standard";
						$prix = 280;
						break;

					case 4:
						$nomModule = "Porte";
						$carac = "2,04x0,83; 35";
						$details = "(HxL,epaisseur)";
						$unite = "m, mm";
						$description = "porte standard";
						$prix = 300;
						break;

					case 5:
						$nomModule = "Toit";
						$carac = "12";
						$details ="Tuiles";
						$unite = " m²";
						$description = "toit standard";
						$prix = $carac * 75;
						break;
					case 6:
						$nomModule = "Cuisine";
						$carac = "12";
						$details ="Cuisine avec fenêtre";
						$unite = "m²";
						$description = "Cuisine standard";
						$prix = $carac * 1041;
						break;
					}
					
					
				$data['carac'] = $carac;
				$data['details'] = $details;
				$data['unite'] = $unite;
				$data['description'] = $description;
				$data['idProjet'] = $idProjet;
				$data['nomModule'] = $nomModule;
				$data['prix'] = $prix;
				$this->load->view('header');
				$this->load->view('projet/module/ajouter_module',$data);
				$this->load->view('footer');
			}else{
				$this->load->view('header');
				$this->load->view('projet/module/choix_module');
				$this->load->view('footer');
			}

		}// FIN si estConnecte
		else {
			$this->session->set_flashdata('error_msg', "Vous n'avez pas accès à cette page, Veuillez vous identifier !");
			redirect('login');
		}
	}

	/* consulter et/ou modifier un module , premirer version*/
	/*
	public function consulter_module(){
		if(isset($_SESSION['logged_in'])) $this->estConnecte = $_SESSION['logged_in'];
		if($this->estConnecte == true ){
			$this->form_validation->set_rules('nom_module', 'Nom Module', 'trim|required|xss_clean');
	     	$this->form_validation->set_rules('coupe_module', 'Coupe module', 'trim|required|xss_clean');
	     	$this->form_validation->set_rules('description_module', 'Description', 'trim|required|xss_clean');
	     	$this->form_validation->set_rules('angle', 'Angle', 'trim|required|xss_clean|is_natural');

	     	// si les infos transmis respectent les "rules"
	     	if ($this->form_validation->run() == TRUE){
	     		$nom_module = $this->input->post('nom_module');
	     		$coupe_module = $this->input->post('coupe_module');
	     		$description_module = $this->input->post('description_module');
	     		$id_module = $this->input->post('id_module');
	     		$angle =$this->input->post('angle');
	     		$idModule = $this->uri->segment(3);
	     		$idProjet = $this->uri->segment(4);
	     		//MAJ
	     		$this->projet_model->update_module($id_module,$nom_module, $coupe_module, $description_module,$angle);
	     		$this->session->set_flashdata('msg', "Le module a bien été modifié !");
				redirect('projet/consulter_projet/'.$idProjet);
	     	}//sinon on charge les données
	     	else{
	     		$idModule = $this->uri->segment(3);
				$idProjet = $this->uri->segment(4);
				$projet = $this->projet_model->get_projet_by_id($idProjet);
				$module = $this->projet_model->get_module_with_projet($idModule,$idProjet);

				if($projet != null && $module != null){
					$data['projet'] = $projet;
					$data['module'] = $module;
					$listeComposants = $this->projet_model->get_all_composants($idModule);
					$data['listeComposants'] = $listeComposants;
					$idGamme = $this->projet_model->get_idGamme_by_id_projet($idProjet);
					$this->load->view('header');
					$this->load->view('projet/consulter_module',$data);
					$this->load->view('footer');
				}else{// si le projet ou module n'éxiste pas
						//on rédirige vers la page des projets
		        		$this->session->set_flashdata('error_msg', "Le module que vous souhaitez consulter n'existe pas !");
						redirect('projet');
				}
	     	}


		}// FIN si estConnecte
		else {
			$this->session->set_flashdata('error_msg', "Vous n'avez pas accès à cette page, Veuillez vous identifier !");
			redirect('login');
		}

	}*/

	public function consulter_module(){
		if(isset($_SESSION['logged_in'])) $this->estConnecte = $_SESSION['logged_in'];
		if($this->estConnecte == true ){
			$this->form_validation->set_rules('nom_module', 'Nom Module', 'trim|required|xss_clean');
	     	$this->form_validation->set_rules('description_module', 'Description', 'trim|required|xss_clean');

	     	// si les infos transmis respectent les "rules"
	     	if ($this->form_validation->run() == TRUE){
	     		$nom_module = $this->input->post('nom_module');
	     		$description_module = $this->input->post('description_module');
	     		$id_module = $this->input->post('id_module');
	     		$idModule = $this->input->post('id_module');
	     		$idProjet = $this->input->post('idProjet');
	     		//MAJ
	     		$this->projet_model->update_module_v2($idModule,$nom_module, $description_module);
	     		$this->session->set_flashdata('msg', "Le module a bien été modifié !");
				redirect('projet/consulter_projet/'.$idProjet);
	     	}//sinon on charge les données
	     	else{
	     		$idModule = $this->uri->segment(3);
				$idProjet = $this->uri->segment(4);
				$projet = $this->projet_model->get_projet_by_id($idProjet);
				$module = $this->projet_model->get_module_with_projet($idModule,$idProjet);

				if($projet != null && $module != null){
					$data['projet'] = $projet;
					$data['module'] = $module;
					$idGamme = $this->projet_model->get_idGamme_by_id_projet($idProjet);

					$this->load->view('header');
					$this->load->view('projet/consulter_module',$data);
					$this->load->view('footer');
				}else{// si le projet ou module n'éxiste pas
						//on rédirige vers la page des projets
		        		$this->session->set_flashdata('error_msg', "Le module que vous souhaitez consulter n'existe pas !");
						redirect('projet');
				}
	     	}


		}// FIN si estConnecte
		else {
			$this->session->set_flashdata('error_msg', "Vous n'avez pas accès à cette page, Veuillez vous identifier !");
			redirect('login');
		}

	}

	/*ajouter un composant*/
	public function ajouter_composant(){
		if(isset($_SESSION['logged_in'])) $this->estConnecte = $_SESSION['logged_in'];
		if($this->estConnecte == true ){
			$this->form_validation->set_rules('qte[]', 'Quantité ou longeur ou surface', 'trim|required|xss_clean|is_natural');

			if ($this->form_validation->run() == TRUE){
				$composants = $_POST['composants'];
				$quantite =  $_POST['qte'];
				$idModule = $_POST['idModule'];
				$idProjet = $_POST['idProjet'];
	    		for($i=0; $i<count($composants); $i++){

		    		$qte = $quantite[$i];
		    		
		    		$prix =  25*$qte; //25€ l'unité
		    		$caracteristique_compo = "";
		    		$description_compo = "";
					$num = $composants[$i];
					$nom_compo = '';
					$id_famille = '';
					$unite = '';
				 	$tabInfos = $this->get_info_compo($num,$nom_compo,$id_famille,$unite);
				 	$nom_compo = $tabInfos[0];
					$id_famille = $tabInfos[1];
					$unite = $tabInfos[2];

					//on met à jour le prix du module en fonction du prix des composants
					$prix_module = $this->projet_model->get_prix_module($idModule);
					$prix_final_module = $prix_module->prix_module + $prix;
					$this->projet_model->update_prix_module($idModule,$prix_final_module);

					//création du composant
			      	$this->projet_model-> create_composant($idModule,$id_famille,$nom_compo,$caracteristique_compo,$unite,$description_compo,$qte,$prix);

			      	//MAJ du devis
			      	$prix_devis = $this->projet_model->get_prix_devis($idProjet);
			      	$prix_final_devis = $prix_devis->montant_devis_ht + $prix;
			      	$this->projet_model->update_prix_devis($idProjet,$prix_final_devis);

				}

				$this->session->set_flashdata('msg', "Le composant a bien été ajouté ! ");
				redirect('projet/consulter_module/'.$idModule."/".$idProjet);

			}else{
				$this->load->view('header');
				$this->load->view('projet/module/ajouter_composant');
				$this->load->view('footer');
			}
			
		}// FIN si estConnecte
		else {
			$this->session->set_flashdata('error_msg', "Vous n'avez pas accès à cette page, Veuillez vous identifier !");
			redirect('login');
		}
	}

	private function get_info_compo($num,$nom_compo,$id_famille,$unite){
		switch($num) {
		    case 1:
		      $nom_compo = 'Lisses';
		      $id_famille = 5;
		      $unite = "Longeur en cm";
		      break;
		    case 2:
		      $nom_compo = 'Tasseau';
		      $id_famille = 1;
		      $unite = "Pièce";
		      break;
		    case 3:
		      $nom_compo = 'Montants verticaux';
		      $id_famille = 5;
		      $unite = "Longeur en cm";
		      break;
		    case 4:
		      $nom_compo = 'Contreforts';
		      $id_famille = 5;
		      $unite = "Longeur en cm";
		      break;
		    case 5:
		        $nom_compo = "Sabots d'assemblage";
		      $id_famille = 6;
		      $unite = "Pièce";
		      break;
		    case 6:
		        $nom_compo = 'Goujons de fixation';
		      $id_famille = 6;
		      $unite = "Pièce";
		      break;
		    case 7:
		        $nom_compo = 'Supports de sol';
		      $id_famille = 6;
		      $unite = "Pièce";
		      break;
		    case 8:
		        $nom_compo = 'Boulons';
		      $id_famille = 6;
		      $unite = "Pièce";
		      break;
		    case 9:
		        $nom_compo = 'Ardoises';
		      $id_famille = 4;
		      $unite = "Surface en m2";
		      break;
		    case 10:
		        $nom_compo = 'Tuiles';
		      $id_famille = 4;
		      $unite = "Surface en m2";
		      break;
		    case 11:
		        $nom_compo = 'Montants verticaux';
		      $id_famille = 5;
		      $unite = "Longeur en cm";
		      break;
		    case 12:
		        $nom_compo = 'Bardage';
		      $id_famille = 4;
		      $unite = "Surface en m2";
		      break;
		    case 13:
		        $nom_compo = 'Pare-pluie';
		      $id_famille = 7;
		      $unite = "Surface en m2";
		      break;
		    case 14:
		        $nom_compo = 'Panneau extérieur';
		      $id_famille = 2;
		      $unite = "Mètre";
		      break;
		    case 15:
		        $nom_compo = 'Panneau intérieur';
		      $id_famille = 3;
		      $unite = "Surface en m2";
		      break;
		    case 16:
		        $nom_compo = 'Panneau intermédiaire';
		      $id_famille = 3;
		      $unite = "Surface en m2";
		      break;
		    case 17:
		        $nom_compo = 'Pare-vapeur';
		      $nom_compo = 7;
		      $unite = "Surface en m2";
	      break;
	  	}
	  	return $arrayName = array($nom_compo,$id_famille,$unite);
	}

	public function supprimer_module(){
		$idModule = $this->uri->segment(3);
		$idProjet = $this->uri->segment(4);
		//MAJ du devis
		$prix_module = $this->projet_model->get_prix_module($idModule);
      	$prix_devis = $this->projet_model->get_prix_devis($idProjet);
      	$prix_final_devis = $prix_devis->montant_devis_ht - $prix_module->prix_module;
      	$this->projet_model->update_prix_devis($idProjet,$prix_final_devis);
		$this->projet_model->supprimer_module($idModule,$idProjet);

		redirect('projet/consulter_projet/'.$idProjet);
	}

	public function valider_devis(){
		if(isset($_SESSION['logged_in'])) $this->estConnecte = $_SESSION['logged_in'];
		if($this->estConnecte == true ){

			$idDevis = $this->uri->segment(3);
			$idProjet = $this->uri->segment(4);
			$etat = 'Validé';
			$this->projet_model->update_etat_devis($idDevis,$idProjet,$etat);
			redirect('projet/consulter_projet/'.$idProjet);

		}// FIN si estConnecte
		else {
			$this->session->set_flashdata('error_msg', "Vous n'avez pas accès à cette page, Veuillez vous identifier !");
			redirect('login');
		}
	}

	public function payer_devis(){
		if(isset($_SESSION['logged_in'])) $this->estConnecte = $_SESSION['logged_in'];
		if($this->estConnecte == true ){

			$idDevis = $this->uri->segment(3);
			$idProjet = $this->uri->segment(4);
			$etat = 'Payé';
			$this->projet_model->update_etat_devis($idDevis,$idProjet,$etat);
			redirect('projet/consulter_projet/'.$idProjet);

		}// FIN si estConnecte
		else {
			$this->session->set_flashdata('error_msg', "Vous n'avez pas accès à cette page, Veuillez vous identifier !");
			redirect('login');
		}
	}

	public function annuler_devis(){
		if(isset($_SESSION['logged_in'])) $this->estConnecte = $_SESSION['logged_in'];
		if($this->estConnecte == true ){

			$idDevis = $this->uri->segment(3);
			$idProjet = $this->uri->segment(4);
			$etat = 'Annulé';
			$this->projet_model->update_etat_devis($idDevis,$idProjet,$etat);
			redirect('projet/consulter_projet/'.$idProjet);

		}// FIN si estConnecte
		else {
			$this->session->set_flashdata('error_msg', "Vous n'avez pas accès à cette page, Veuillez vous identifier !");
			redirect('login');
		}
	}

}