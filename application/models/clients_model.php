<?php if(!defined('BASEPATH')) exit('Direct Access Not Allowed');

Class Clients_model extends CI_Model
{
	private $table = 'clients';


	function create($nom,$prenom,$adresse,$code_postale,$tel,$email){
		$arr = explode("@", $email);// on prend la première partie de l'email avant l'@'
		$ref = strtoupper($prenom)."#".$arr[0]."#".$code_postale;
		$data = array(
        'ref_cli' => $ref,
        'nom_cli' => $nom,
        'prenom_cli' => $prenom,
        'adresse_cli' => $adresse,
        'code_postal_cli' => $code_postale,
        'telephone_cli' => $tel,
        'email_cli' => $email
		);

		$this->db->insert($this->table, $data);
	}


	//retourne un client en indiquant sa réference
	function get_by_ref($ref){

		 $this -> db -> select('*');
	     $this -> db -> from($this->table);
	     $this -> db -> where('ref_cli', $ref);
	     $this -> db -> limit(1);

	     $query = $this -> db -> get();

	     if($query -> num_rows() == 1)
	     {
	       return $query->row();
	     }
	     else
	     {
	       return null;
	     }
	}

	//retourne un client en indiquant son id
	function get_by_id($id){

		 $this -> db -> select('*');
	     $this -> db -> from($this->table);
	     $this -> db -> where('id_cli', $id);
	     $this -> db -> limit(1);

	     $query = $this -> db -> get();

	     if($query -> num_rows() == 1)
	     {
	       return $query->row();
	     }
	     else
	     {
	       return null;
	     }
	}


	//retourne tous les clients
	function get_all(){

		// $this -> db -> select('*');
	   //  $this -> db -> from($this->table);

	     $query = $this -> db -> get($this->table);

	     if($query -> num_rows() > 0)
	     {
	       return $query->result_array();
	     }
	     else
	     {
	       return null;
	     }
	}

	//met à jour un client en indiquant sa reférence
	function update_by_ref($ref,$nom,$prenom,$adresse,$code_postale,$tel,$email){

		 $data = array(
        'nom_cli' => $nom,
        'prenom_cli' => $prenom,
        'adresse_cli' => $adresse,
        'code_postal_cli' => $code_postale,
        'telephone_cli' => $tel,
        'email_cli' => $email
		);

	    $this->db->where('ref_cli', $ref);
	    $this->db->update($this->table, $data);
	}

	//met à jour un client en indiquant son id
	function update_by_id($id,$nom,$prenom,$adresse,$code_postale,$tel,$email){

		 $data = array(
        'nom_cli' => $nom,
        'prenom_cli' => $prenom,
        'adresse_cli' => $adresse,
        'code_postal_cli' => $code_postale,
        'telephone_cli' => $tel,
        'email_cli' => $email
		);

	    $this->db->where('id_cli', $id);
	    $this->db->update($this->table, $data);
	}

	//met à jour un client en indiquant son id
	function update_by_id_sans_email($id,$nom,$prenom,$adresse,$code_postale,$tel){

		 $data = array(
        'nom_cli' => $nom,
        'prenom_cli' => $prenom,
        'adresse_cli' => $adresse,
        'code_postal_cli' => $code_postale,
        'telephone_cli' => $tel
		);

	    $this->db->where('id_cli', $id);
	    $this->db->update($this->table, $data);
	}

	//retourne un client en indiquant son id
	function email_existe($email){

		 $this -> db -> select('email_cli');
	     $this -> db -> from($this->table);
	     $this -> db -> where('email_cli', $email);
	     $this -> db -> limit(1);

	     $query = $this -> db -> get();

	     if($query -> num_rows() == 1)
	     {
	       return $query->row();
	     }
	     else
	     {
	       return null;
	     }
	}

}

?>