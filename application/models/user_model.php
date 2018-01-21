<?php

Class User_model extends CI_Model
{
  private $table = 'commercials';

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