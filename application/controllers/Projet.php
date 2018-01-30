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
        		$this->projet_model->create_projet($nomProjet,$client,$idGamme,$idCommercial);
        		//on rédirige vers la page des clients
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
					//$listeModules = $this->projet_model->get_all_modules($idProjet);
					//$data['listeModules'] = $listeModules;
					$id_commercial = $this->projet_model->get_idcommercial_by_id_projet($idProjet);
					$commercial = $this->user_model->get_by_id($id_commercial->id_com);
					$data['commercial'] = $commercial;
					$client = $this->projet_model->get_client_by_id_projet($idProjet);
					$data['client'] = $client;
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
}