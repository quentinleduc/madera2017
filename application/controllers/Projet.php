<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Projet extends CI_Controller {

	private $estConnecte = false;

	//page Projets
	public function index(){
		if(isset($_SESSION['logged_in'])) $this->estConnecte = $_SESSION['logged_in'];
		
		if($this->estConnecte == true ){

			//on charge tous les projets
			$listeProjets = $this->projet_model->get_all_projets();
			$data['listeProjets'] = array($listeProjets);
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

			$this->form_validation->set_rules('nom', 'Nom', 'trim|required|xss_clean');
	     	$this->form_validation->set_rules('client', 'Client', 'trim|required|xss_clean');

	     	if ($this->form_validation->run() == TRUE){
		    	//on récupére les valeurs
		    	$nomProjet = $this->input->post('nomProjet');
		    	$idClient = $this->input->post('client');
		    	$idGamme = $this->input->post('idGamme');
		    	$client = $this->clients_model->get_by_id($idClient);

		    	//on ajoute le projet
        		$this->projet_model->create_projet($nomProjet,$client,$idGamme);
        		//on rédirige vers la page des clients
        		$this->session->set_flashdata('msg', "Le client a bien été ajouté !");
				redirect('client');

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
}