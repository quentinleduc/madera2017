<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Accueil extends CI_Controller {

	private $estConnecte = false;

	//page Accueil
	public function index(){
		if(isset($_SESSION['logged_in'])) $this->estConnecte = $_SESSION['logged_in'];
		if($this->estConnecte == true){
			$this->load->view('header');
			$this->load->view('accueil');
			$this->load->view('footer');
		}
		
		else {
			$this->session->set_flashdata('error_msg', "Vous n'avez pas accès à cette page, Veuillez vous identifier !");
			redirect('login');
		}
	}

	//page Mon Profil
	public function mon_profil(){
		
		if(isset($_SESSION['logged_in'])) $this->estConnecte = $_SESSION['logged_in'];
		// si on charge la page sans soummettre le formulaire
		if($this->estConnecte == true && !isset($_POST['ok'])){
			$this->load->view('header');
			$this->load->view('mon_profil');
			$this->load->view('footer');
		}
		//si on soummets le formulaire
		else if($this->estConnecte == true && isset($_POST['ok'])){
			 // on récupére les variables
			$nom = $this->input->post('nom');
			$prenom = $this->input->post('prenom');
			$tel = $this->input->post('tel'); 
	        $email = $this->input->post('email');
	        $mdp = $this->input->post('mdp');

	        //on vérifie si les champs ont bien été modifiés 
	        if( $_POST['nom'] == $_SESSION['nom'] && $_POST['prenom'] == $_SESSION['prenom']  && $_POST['tel'] == $_SESSION['tel']  && $_POST['email'] == $_SESSION['email'] ){
		        	//message de confirmation
				$this->session->set_flashdata('msg',"Aucune modification enregistrée !");
				$this->load->view('header');
				$this->load->view('mon_profil');
				$this->load->view('footer');
	        }
	        else{
	        	 // on remet à jour les variables de séssion
		        $_SESSION['nom'] = $nom;
		        $_SESSION['prenom']     = $prenom;
		        $_SESSION['tel'] = $tel;
		        $_SESSION['email']     = $email;
		        //on vérifie si le mot de passe est renseigné
		        if($mdp != null){
		        	 $this->user_model->update_avec_mdp($nom,$prenom,$tel,$email,$mdp);
		        }else{
		        	$this->user_model->update_sans_mdp($nom,$prenom,$tel,$email);
		        }
		       
		        //message de confirmation
				$this->session->set_flashdata('msg','Vos modifications ont bien été prises en compte !');
				$this->load->view('header');
				$this->load->view('mon_profil');
				$this->load->view('footer');
	        }
	       
		}

		else {
			$this->session->set_flashdata('error_msg', "Vous n'avez pas accès à cette page, Veuillez vous identifier !");
			redirect('login');
		}

	}


	//page clients
	public function clients(){
		if(isset($_SESSION['logged_in'])) $this->estConnecte = $_SESSION['logged_in'];
		
		if($this->estConnecte == true ){

			//on charge tous les clients
			$listeClients = $this->clients_model->get_all();
			$data['listeClients'] = array($listeClients);
			$this->load->view('header');
			$this->load->view('clients',$data);
			$this->load->view('footer');
		}

		else {
			$this->session->set_flashdata('error_msg', "Vous n'avez pas accès à cette page, Veuillez vous identifier !");
			redirect('login');
		}
	}
}