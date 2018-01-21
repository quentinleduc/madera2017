<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

  public function index()
  {
  	// on indique les règles du formlaire
      $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
     	$this->form_validation->set_rules('mdp', 'Mot de passe', 'trim|required|xss_clean');

     	
     

      if ($this->form_validation->run() == FALSE){
      	$this->load->view('header');
          $this->load->view('login_view');
          $this->load->view('footer');
      }

      else{        
      	// on récupére les variables
     		$email = $this->input->post('email');
     		$mdp = $this->input->post('mdp');
     		$result = $this->user_model->login($email,$mdp);

     		//si l'utilisateur existe
     		if($result){
     			//on crée les sessions de l'utilisateur
     			$_SESSION['user_id']      = $result->id_com;
  			$_SESSION['ref']     = $result->ref_com;
  			$_SESSION['logged_in']    = TRUE;
  			$_SESSION['nom'] = $result->nom_com;
  			$_SESSION['prenom']     = $result->prenom_com;
  			$_SESSION['tel'] = $result->telephone_com;
  			$_SESSION['email']     = $email;
  			$_SESSION['actif'] = $result->actif_com;
  			//on charge la page d'acceuil 
  			redirect('acceuil');
     		}else{
     			// login failed
  			 $this->session->set_flashdata('error_msg','Email ou mot de passe incorrect !');
  			$this->load->view('header');
  			$this->load->view('login_view');
  			$this->load->view('footer');
     		}
        
      }
  }

  public function logout(){
   
    $this->session->sess_destroy();
    redirect('login', 'refresh');
  }

}

?>