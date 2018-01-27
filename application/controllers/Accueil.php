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


			// on indique les règles du formlaire
	      	$this->form_validation->set_rules('nom', 'Nom', 'trim|xss_clean');
	     	$this->form_validation->set_rules('prenom', 'Prénom', 'trim|xss_clean');
	     	$this->form_validation->set_rules('mdp1', 'Mot de passe', 'trim|xss_clean');
	     	$this->form_validation->set_rules('mdp2', 'Mot de passe confirmation', 'trim|xss_clean|matches[mdp1]');
	     	$this->form_validation->set_rules('tel', 'Téléphone', 'trim|xss_clean|is_natural');
	     	$this->form_validation->set_rules(
	        'email', 'Email',
	        'trim|xss_clean|valid_email|is_unique[clients.email_cli]',
	        array(
	                'required'      => 'le champs %s est requis.',
	                'is_unique'     => "L' %s existe déjà."
	        )
			);//on vérifie dans la base si l'email n'éxiste pas (is_unique)

			//si les règles sont réspectés
	     	if ($this->form_validation->run() == TRUE){

	     		// on récupére les variables
				$nom = $this->input->post('nom');
				$prenom = $this->input->post('prenom');
				$tel = $this->input->post('tel'); 
		        $email = $this->input->post('email');
		        $mdp1 = $this->input->post('mdp1');
		        $mdp2 = $this->input->post('mdp2');

		        //si les champs ne sont pas modifiés
		        if( $nom == $_SESSION['nom'] && $prenom == $_SESSION['prenom']  && $tel == $_SESSION['tel']  && $email == $_SESSION['email'] ){
			        	//message de confirmation
					$this->session->set_flashdata('msg',"Aucune modification enregistrée !");
					$this->load->view('header');
					$this->load->view('mon_profil');
					$this->load->view('footer');
		        }
		        else{//sinon si un champs a été modifié

		        	 // on remet à jour les variables de session
			        $_SESSION['nom'] = $nom;
			        $_SESSION['prenom']     = $prenom;
			        $_SESSION['tel'] = $tel;
			        $_SESSION['email']     = $email;

			        //on vérifie si le mot de passe est renseigné
			        if($mdp1 != null && $mdp2 != null){

			        	//si les mots de passe sont identiques
			        	if($mdp1 == $mdp2){
			        		//on le met à jour
			        		$this->user_model->update_avec_mdp($nom,$prenom,$tel,$email,$mdp1);
			        	}//sinon on renvoie vers la page
			        	else{
			        		//message de confirmation
							$this->session->set_flashdata('msg','Les mots de passe ne sont pas identiques !');
							$this->load->view('header');
							$this->load->view('mon_profil');
							$this->load->view('footer');
			        	}

			        }// FIN SI champs mot de passe est renseigné

			        else{//sinon si le champs mot de passe n'est pas renseigné on met à jour sans toucher au mot de passe
			        	$this->user_model->update_sans_mdp($nom,$prenom,$tel,$email);
			        }
			       
			        //message de confirmation
					$this->session->set_flashdata('msg','Vos modifications ont bien été prises en compte !');
					$this->load->view('header');
					$this->load->view('mon_profil');
					$this->load->view('footer');
		        }// FIN SI  un champs a été modifié
	     	}// FIN SI les règles sont respectéqs
	     	else{
	     		$this->load->view('header');
				$this->load->view('mon_profil');
				$this->load->view('footer');
			 
	     	}
	     	
	       
		}// FIN SI  on soumets un le formulaire

		else {
			$this->session->set_flashdata('error_msg', "Vous n'avez pas accès à cette page, Veuillez vous identifier !");
			redirect('login');
		}

	}

		    	
				
}