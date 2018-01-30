<?php if(!defined('BASEPATH')) exit('Direct Access Not Allowed');

Class Projet_model extends CI_Model
{
  private $table = 'projet';
  private $tableGamme = 'gamme';
  private $tableComProjet = 'com_projet';
  private $tableCliProjet = 'cli_projet';

  public function create_projet($nom_projet,$client,$idGamme,$idCommercial){
  	$ref = $nom_projet.'_'.$client->nom_cli.'_'.'#Gamme'.$idGamme;

  	$data = array(
        'id_gamme' => $idGamme,
        'ref_projet' => $ref,
        'date_projet' => date("Y-m-d"),
        'nom_projet' => $nom_projet
	);

	$this->db->insert($this->table, $data);

	//insertion table com_projet
	$idProj =  $this->db->insert_id();//$this->projet_model->get_id_projet_by_ref($ref);
	$dataCom = array(
        'id_com' => $idCommercial,
        'id_projet' => $idProj
	);

	$this->db->insert($this->tableComProjet, $dataCom);

	//insertion table cli_proj
	$dataCli = array(
        'id_cli' => $client->id_cli,
        'id_projet' => $idProj
	);

	$this->db->insert($this->tableCliProjet, $dataCli);

  }

  	//retourne tous les projets
	function get_all_projets(){

		$req = ' SELECT p.id_projet,c.id_cli, p.nom_projet, p.ref_projet, p.date_projet, c.nom_cli
				FROM projet p, clients c, cli_projet cl
				WHERE p.id_projet = cl.id_projet
				AND c.id_cli = cl.id_cli';

	     $query = $this -> db -> query($req);

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



	//retourne l'id du projet 
	function get_id_projet_by_ref($ref){

		 $this -> db -> select('id_projet');
	     $this -> db -> from($this->table);
	     $this -> db -> where('ref_projet', $ref);
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

	//retourne un projet en indiquant son id
	function get_idcommercial_by_id_projet($id){

		 $req = ' SELECT id_com FROM  com_projet  
		WHERE id_projet ='.$id;
	     $query = $this -> db -> query($req);


	     if($query -> num_rows() == 1)
	     {
	       return $query->row();
	     }
	     else
	     {
	       return null;
	     }
	}

	function get_client_by_id_projet($id){
		$req = ' SELECT * FROM clients c, cli_projet cl 
		WHERE cl.id_projet ='.$id.'  
		 AND c.id_cli = cl.id_cli';

	     $query = $this -> db -> query($req);

	     if($query -> num_rows()  == 1)
	     {
	       return $query->row();
	     }
	     else
	     {
	       return null;
	     }

	}


}