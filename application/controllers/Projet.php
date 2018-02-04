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
		    	if(isset($_POST['composants']) && !empty($_POST['composants']) )
		    	$composants = $_POST['composants'];
		    	$idProjet = $this->input->post('idprojet');
		    	if(isset($_POST['qte']) && !empty($_POST['qte']) )
		    	$quantite = $_POST['qte'];
		   		if(isset($_POST['labelName']) && !empty($_POST['labelName']) ){
		    	$label = $_POST['labelName'];
		   		 }
		    	$projet =  $this->projet_model->get_projet_by_id($idProjet);
		    	$prix = 0;

		    	if($cctp == 'Dalle béton'){
		    		//45euros le m2
		    		$prix = $carac_cctp *45;
		    	}else{
		    		//25 euros le plots
		    		$prix = $carac_cctp *25;
		    	}
		    	
		    	if($composants != null){
		    		echo "taille composants ".count($composants);
		    		for($i=0; $i<count($composants); $i++){
			    		$c =   $composants[$i];

			    		$qte = $quantite[$i];
			    		$nom_compo = $label[$i];
			    		$caracteristique_compo = "";
			    		$description_compo = "";
			    		//pour chaque famille composant 
						switch ($c) {
						    case 1:
						    	$unite = "Pièce";
						        $idModule = $this->projet_model->create_module($projet,$nomModule,$coupe,$cctp,$description,$angle,$prix);
						      	$this->projet_model-> create_composant($idModule,$c,$nom_compo,$caracteristique_compo,$unite,$description_compo,$qte);
						      	break;
						    case 2:
						        $unite = "Mètre";
						        $idModule = $this->projet_model->create_module($projet,$nomModule,$coupe,$cctp,$description,$angle,$prix);
						      	$this->projet_model-> create_composant($idModule,$c,$nom_compo,$caracteristique_compo,$unite,$description_compo,$qte);
						      	break;
						    case 5:
						        $unite = "Longeur en cm";
						        $idModule = $this->projet_model->create_module($projet,$nomModule,$coupe,$cctp,$description,$angle,$prix);
						      	$this->projet_model-> create_composant($idModule,$c,$nom_compo,$caracteristique_compo,$unite,$description_compo,$qte);
						      	break;
						    case 6:
						        $unite = "Pièce";
						        $idModule = $this->projet_model->create_module($projet,$nomModule,$coupe,$cctp,$description,$angle,$prix);
						      	$this->projet_model-> create_composant($idModule,$c,$nom_compo,$caracteristique_compo,$unite,$description_compo,$qte);
						      	break;
						    default:
						   		$unite = "Surface en m2";
						        $idModule = $this->projet_model->create_module($projet,$nomModule,$coupe,$cctp,$description,$angle,$prix);
						      	$this->projet_model-> create_composant($idModule,$c,$nom_compo,$caracteristique_compo,$unite,$description_compo,$qte);
						    	break;

						}

					}

					$this->session->set_flashdata('msg', "Le module a bien été ajouté !");
					redirect('projet/consulter_projet');
		    	}else{
		    		$quantite = 'test';
		    		if(isset($_POST['qte']) && !empty($_POST['qte']) ){
		    			$quantite = $_POST['qte'];
		  			  echo "quantité ".$quantite;
		    		}
		    		
		    		$idProjet = $this->input->post('idprojet');
		    		$this->session->set_flashdata('msg', "une erreur s'est produite!".$quantite[0]);
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
	}

}