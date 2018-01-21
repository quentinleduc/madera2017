<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Acceuil extends CI_Controller {

	

	public function index(){
		$estConnecte = $_SESSION['logged_in'];
		if($estConnecte){
			$this->load->view('header');
			$this->load->view('acceuil');
			$this->load->view('footer');
		}
		
		else {
			$this->session->set_flashdata('error_msg', "Vous n'avez pas accès à cette page, Veuillez vous identifier !");
			redirect('login');
		}
	}
}