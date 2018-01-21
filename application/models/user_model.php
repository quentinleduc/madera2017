<?php

Class User_model extends CI_Model
{
  private $table = 'commercials';

  //fonction d'authentification
   function login($email, $mdp)
   {
     $this -> db -> select('*');
     $this -> db -> from($this->table);
     $this -> db -> where('email_com', $email);
     $this -> db -> where('mdp_com', $mdp);
     $this -> db -> limit(1);

     $query = $this -> db -> get();

     if($query -> num_rows() == 1)
     {
       return $query->row();
     }
     else
     {
       return false;
     }
   }

   //met à jour les données ( mot de passe compris)
  function update_avec_mdp($nom,$prenom,$tel,$email,$mdp){
    // on hache le mot de passe avant de l'inserer 
   // $mdp = $this -> password_hash($mdp);
    $data = array(
        'nom_com' => $nom,
        'prenom_com' => $prenom,
        'email_com' => $email,
        'telephone_com' => $tel,
        'mdp_com' => $mdp
    );

    $this->db->where('id_com', $_SESSION['user_id'] );
    $this->db->update($this->table, $data);
  }

  //met à jour les données (sauf le mot de passe)
  function update_sans_mdp($nom,$prenom,$tel,$email){

    $data = array(
        'nom_com' => $nom,
        'prenom_com' => $prenom,
        'email_com' => $email,
        'telephone_com' => $tel
    );

    $this->db->where('id_com', $_SESSION['user_id'] );
    $this->db->update($this->table, $data);
  }

  //fonction de hashage du mot de passe
  private function hash_password($password) {
    
    return password_hash($password, PASSWORD_BCRYPT);
    
  }
  
  //fonction de vérification de mot de passe
  private function verify_password_hash($password, $hash) {
    
    return password_verify($password, $hash);
    
  }






}
?>