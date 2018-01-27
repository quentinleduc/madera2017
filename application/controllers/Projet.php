<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Projet extends CI_Controller {

	private $estConnecte = false;

	//page Projets
	public function index(){
		if(isset($_SESSION['logged_in'])) $this->estConnecte = $_SESSION['logged_in'];
		
		if($this->estConnecte == true ){

			//on charge tous les clients
			$listeProjets = $this->clients_model->get_all();
			$data['listeClients'] = array($listeProjets);
			$this->load->view('header');
			$this->load->view('projet/projets',$data);
			$this->load->view('footer');
		}

		else {
			$this->session->set_flashdata('error_msg', "Vous n'avez pas accès à cette page, Veuillez vous identifier !");
			redirect('login');
		}
	}
}