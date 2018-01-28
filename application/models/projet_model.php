<?php if(!defined('BASEPATH')) exit('Direct Access Not Allowed');

Class Projet_model extends CI_Model
{
  private $table = 'projet';
  private $tableGamme = 'gamme';
  public function create_projet($nom,$client,$idGamme){
  	$ref = $nom.$client->nom_cli;

  	$data = array(
        'id_gamme' => $idGamme,
        'ref_projet' => $ref,
        'date_projet' => date('DD-MM-AAAA'),
        'nom_projet' => $nom
	);

	$this->db->insert($this->table, $data);
  }

  	//retourne tous les projets
	function get_all_projets(){

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

	//retourne toutes les gammes
	function get_all_gammes(){

		// $this -> db -> select('*');
	   //  $this -> db -> from($this->table);

	     $query = $this -> db -> get($this->tableGamme);

	     if($query -> num_rows() > 0)
	     {
	       return $query->result_array();
	     }
	     else
	     {
	       return null;
	     }
	}

	//retourne un projet en indiquant son id
	function get_projet_by_id($id){

		 $this -> db -> select('*');
	     $this -> db -> from($this->table);
	     $this -> db -> where('id_projet', $id);
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

	//retourne une gamme en indiquant son id
	function get_gamme_by_id($id){

		 $this -> db -> select('*');
	     $this -> db -> from($this->tableGamme);
	     $this -> db -> where('id_gam', $id);
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