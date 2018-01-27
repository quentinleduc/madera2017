<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Client extends CI_Controller {

	private $estConnecte = false;

	//page Clients
	public function index(){
		if(isset($_SESSION['logged_in'])) $this->estConnecte = $_SESSION['logged_in'];
		
		if($this->estConnecte == true ){

			//on charge tous les clients
			$listeClients = $this->clients_model->get_all();
			$data['listeClients'] = array($listeClients);
			$this->load->view('header');
			$this->load->view('client/clients',$data);
			$this->load->view('footer');
		}

		else {
			$this->session->set_flashdata('error_msg', "Vous n'avez pas accès à cette page, Veuillez vous identifier !");
			redirect('login');
		}
	}


	//page ajout client
	public function ajouter_client(){
		if(isset($_SESSION['logged_in'])) $this->estConnecte = $_SESSION['logged_in'];
		
		if($this->estConnecte == true ){

			// on indique les règles du formlaire
	      	$this->form_validation->set_rules('nom', 'Nom', 'trim|required|xss_clean');
	     	$this->form_validation->set_rules('prenom', 'Prénom', 'trim|required|xss_clean');
	     	$this->form_validation->set_rules('adresse', 'Adresse', 'trim|required|xss_clean');
	     	$this->form_validation->set_rules('codePostal', 'Code Postal', 'trim|required|xss_clean|is_natural');
	     	$this->form_validation->set_rules('tel', 'Téléphone', 'trim|required|xss_clean|is_natural');
	     	$this->form_validation->set_rules(
	        'email', 'Email',
	        'trim|required|xss_clean|valid_email|is_unique[clients.email_cli]',
	        array(
	                'required'      => 'le champs %s est requis.',
	                'is_unique'     => "L' %s existe déjà."
	        )
			);//on vérifie dans la base si l'email n'éxiste pas (is_unique)
	     

		    if ($this->form_validation->run() == TRUE){
		    	//on récupére les valeurs
		    	$nom = $this->input->post('nom');
		    	$prenom = $this->input->post('prenom');
		    	$adresse = $this->input->post('adresse');
		    	$codePostal = $this->input->post('codePostal');
		    	$tel = $this->input->post('tel');
		    	$email = $this->input->post('email');

		    	//on ajoute le client
        		$client = $this->clients_model->create($nom,$prenom,$adresse,$codePostal,$tel,$email);
        		//on rédirige vers la page des clients
        		$this->session->set_flashdata('msg', "Le client a bien été ajouté !");
				redirect('client');

			}
			else{


				//on charge le formulaire d'inscription
				$this->load->view('header');
				$this->load->view('client/ajouter_client');
				$this->load->view('footer');
			}

		}
	}


	//modifier client
	public function modifier_client(){
		if(isset($_SESSION['logged_in'])) $this->estConnecte = $_SESSION['logged_in'];
		
		if($this->estConnecte == true ){
			// on indique les règles du formlaire
	      	$this->form_validation->set_rules('nom', 'Nom', 'trim|required|xss_clean');
	     	$this->form_validation->set_rules('prenom', 'Prénom', 'trim|required|xss_clean');
	     	$this->form_validation->set_rules('adresse', 'Adresse', 'trim|required|xss_clean');
	     	$this->form_validation->set_rules('codePostal', 'Code Postal', 'trim|required|xss_clean|is_natural');
	     	$this->form_validation->set_rules('tel', 'Téléphone', 'trim|required|xss_clean|is_natural');
	     	$this->form_validation->set_rules(
	        'email', 'Email',
	        'trim|required|xss_clean|valid_email',
	        array(
	                'required'      => 'le champs %s est requis.'
	        )
			);//on vérifie dans la base si l'email n'éxiste pas (is_unique)

	     	//après avoir soumis le formulaire
	     	if ($this->form_validation->run() == TRUE){
		    	//on récupére les valeurs
		    	$nom = $this->input->post('nom');
		    	$prenom = $this->input->post('prenom');
		    	$adresse = $this->input->post('adresse');
		    	$codePostal = $this->input->post('codePostal');
		    	$tel = $this->input->post('tel');
		    	$email = $this->input->post('email');
		    	$id = $this->input->post('id');
		    	//si l'email existe
        		if($this->clients_model->email_existe($email)){
        			/*$this->session->set_flashdata('msg', "L'email existe déjà, veuillez en choisir un autre !");
        			$data['nom'] = $nom;
					$data['prenom'] = $prenom;
					$data['adresse'] = $adresse;
					$data['code_postal'] = $codePostal;
					$data['tel'] = $tel;
					$data['email'] = $email;
					$data['id'] = $id;
					$this->load->view('header');
					$this->load->view('modifier_client',$data);
					$this->load->view('footer');*/
					$this->clients_model->update_by_id_sans_email($id,$nom,$prenom,$adresse,$codePostal,$tel);
					//on rédirige vers la page des clients
		    		$this->session->set_flashdata('msg', "Le client a bien été modifié !");
					redirect('client');
        		}else{
        			//on modifie le client
		    		$client = $this->clients_model->update_by_id($id,$nom,$prenom,$adresse,$codePostal,$tel,$email);        		
		    		//on rédirige vers la page des clients
		    		$this->session->set_flashdata('msg', "Le client a bien été modifié !");
					redirect('client');
        		}
		    	

			}
			else{

				//on récupère l'id passé dans l'url
				$id = $this->uri->segment(3);
				if($id != null){
					//on récupére le client par l'id
					$client = $this->clients_model->get_by_id($id);
					//si le client existe
					if($client != null){
						$data['nom'] = $client->nom_cli;
						$data['prenom'] = $client->prenom_cli;
						$data['adresse'] = $client->adresse_cli;
						$data['code_postal'] = $client->code_postal_cli;
						$data['tel'] = $client->telephone_cli;
						$data['email'] = $client->email_cli;
						$data['id'] = $id;
						//on affiche la page
						$this->load->view('header');
						$this->load->view('client/modifier_client',$data);
						$this->load->view('footer');
					}
					else{ // si le client n'éxiste pas

						//on rédirige vers la page des clients
		        		$this->session->set_flashdata('error_msg', "Le client que vous souhaitez modifier n'existe pas !");
						redirect('client');
					}
					
				}// s'il n'y a pas d'id et qu'on essaye d'accéder à la page
				else{
					//on rédirige vers la page des clients
	        		$this->session->set_flashdata('error_msg', "Une erreur s'est produite !");
					redirect('client');
				}

				
			}

		}
	}


}