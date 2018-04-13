<?php if(!defined('BASEPATH')) exit('Direct Access Not Allowed');
Class Projet_model extends CI_Model
{
  private $table = 'projet';
  private $tableGamme = 'gamme';
  private $tableComProjet = 'com_projet';
  private $tableCliProjet = 'cli_projet';
  private $tableProjetMod = 'projet_mod';
  private $tableModule = 'module';
  private $tableComposant = 'composant';
  private $tableModCompo = 'mod_compo';
  private $tableDevis = 'devis';

  //retourne l'id du projet
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

	return $idProj;
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

	//retourne l'id de la gamme en fonction de l'id du projet
	function get_idGamme_by_id_projet($idProjet){
		
	     $this -> db -> select('id_gamme');
	     $this -> db -> from($this->table);
	     $this -> db -> where('id_projet', $idProjet);
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
	       $ret = $query->row();
	       return $ret->ref_projet;
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

	//retourne le client du projet en indiquant l'id du projet
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



	//-----------Modules------------

	function get_all_modules($idProjet){
		$req = ' SELECT *
				FROM module m, projet_mod pm
				WHERE pm.id_projet ='.$idProjet.' 
				AND pm.id_mod = m.id_module';

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

	function get_module($idModule,$idProjet){
		$req = ' SELECT *
				FROM module m, projet_mod pm
				WHERE pm.id_projet ='.$idProjet.'
				AND m.id_module = '.$idModule.'
				AND pm.id_mod ='.$idModule;

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


	//retoune l'id inséré
	public function create_module($projet,$nom_module,$coupe_module,$cctp,$description,$angle,$prix){

  	$ref = $projet->nom_projet.'_'.$nom_module;
  	$data = array(
        'ref_module' => $ref,
        'nom_module' => $nom_module,
        'coupe_module' => $coupe_module,
        'cctp_module' => $cctp,
        'description_module' => $description,
        'angle_module' => $angle,
        'prix_module' => $prix

	);
	$this->db->insert($this->tableModule, $data);

	//insertion table projet_mod
	$idModule =  $this->db->insert_id();
	$dataMod = array(
        'id_mod' => $idModule,
        'id_projet' => $projet->id_projet
	);

	$this->db->insert($this->tableProjetMod, $dataMod);

	return $idModule;
  }

  //retoune l'id inséré
	public function create_module_v2($projet,$nom_module,$details,$unite,$description,$carac,$prix){

  	$ref = $projet->nom_projet.'_'.$nom_module;
  	$data = array(
        'ref_module' => $ref,
        'nom_module' => $nom_module,
        'details' => $details,
        'description_module' => $description,
        'unite' => $unite,
        'prix_module' => $prix,
        'caracteristique' =>$carac

	);
	$this->db->insert($this->tableModule, $data);

	//insertion table projet_mod
	$idModule =  $this->db->insert_id();
	$dataMod = array(
        'id_mod' => $idModule,
        'id_projet' => $projet->id_projet
	);

	$this->db->insert($this->tableProjetMod, $dataMod);

	return $idModule;
  }



  function get_module_with_projet($idModule,$idProjet){

  	$this -> db -> select('*');
   $this -> db -> from($this->tableModule);
   $this -> db -> where('id_module', $idModule);
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

  function update_module($idModule,$nom_module, $coupe_module, $description,$angle){
  	$data = array(
        'nom_module' => $nom_module,
        'coupe_module' => $coupe_module,
        'description_module' => $description,
        'angle_module' => $angle
    );

    $this->db->where('id_module', $idModule);
    $this->db->update($this->tableModule, $data);

  }

  function update_module_v2($idModule,$nom_module, $description){
  	$data = array(
        'nom_module' => $nom_module,
        'description_module' => $description
    );

    $this->db->where('id_module', $idModule);
    $this->db->update($this->tableModule, $data);

  }

  function update_prix_module($idModule,$prix){

  	$data = array(
        'prix_module' => $prix
    );

    $this->db->where('id_module', $idModule);
    $this->db->update($this->tableModule, $data);
  }

  function get_prix_module($idModule){

  	$req = ' SELECT prix_module
				FROM module
				WHERE id_module ='.$idModule;

	     $query = $this -> db -> query($req);

	 if($query -> num_rows() == 1)
	 {
	   $ret = $query->row();
	   return $ret;
	 }
	 else
	 {
	   return null;
	 }

  }

  function supprimer_module($idModule,$idProjet){
  	//suppression dans mod_compo
  	/*$req = 'DELETE FROM mod_compo WHERE id_mod = '.$idModule;

  	$query = $this -> db -> query($req);

  	//suppression dans projet_compo
  	$req1 = 'DELETE FROM projet_mod WHERE id_mod = '.$idModule;
  	$query = $this -> db -> query($req1);

  	//suppression dans module
  	$req1 = 'DELETE FROM module WHERE id_module = '.$idModule;
  	$query = $this -> db -> query($req2);*/
  	/*$this->db->where('id_mod', $idModule);
	$this->db->delete($this->tableModCompo);*/

	$this->db->where('id_mod', $idModule);
	$this->db->delete($this->tableProjetMod);

	$this->db->where('id_module', $idModule);
	$this->db->delete($this->tableModule);
  }

	//-----------Composants------------

	function get_all_composants($idModule){
		$req = ' SELECT id_famille,id_composant,ref_compo,nom_compo,caracteristique_compo,unite_usage_compo,description,prix,quantite
				FROM composant c, mod_compo mc
				WHERE mc.id_mod ='.$idModule.'
				 AND mc.id_compo  = c.id_composant';

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

	public function create_composant($idModule,$id_famille,$nom_compo,$caracteristique_compo,$unite,$description,$quantite,$prix){

  	$ref = $nom_compo.'#'.$id_famille;

  	$data = array(
  		'id_famille' => $id_famille,
        'ref_compo' => $ref,
        'nom_compo' => $nom_compo,
        'caracteristique_compo' => $caracteristique_compo,
        'unite_usage_compo' => $unite,
        'description' => $description,
        'prix' => $prix,
        'quantite' => $quantite

	);
	$this->db->insert($this->tableComposant, $data);

	//insertion table mod_compo
	$idComposant =  $this->db->insert_id();
	$dataComp = array(
        'id_mod' => $idModule,
        'id_compo' => $idComposant
	);

	$this->db->insert($this->tableModCompo, $dataComp);

	
  }


  //-----------Devis------------

  public function create_devis($projet,$module){
  	$ref = 'Devis du projet : '.$projet->nom_projet." ; référence  : ".$projet->ref_projet;

  	$data = array(
  		'id_projet' => $projet->id_projet,
        'ref_devis' => $ref,
        'montant_devis_ht' => '0',
        'etat_devis' => 'Brouillon'

	);
	$this->db->insert($this->tableDevis, $data);
  }

  function get_devis($idProjet){
  	$this -> db -> select('*');
	 $this -> db -> from($this->tableDevis);
	 $this -> db -> where('id_projet', $idProjet);
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


  function get_prix_devis($idProjet){

  	$req = ' SELECT montant_devis_ht
				FROM devis
				WHERE id_projet ='.$idProjet;

	     $query = $this -> db -> query($req);

	 if($query -> num_rows() == 1)
	 {
	   $ret = $query->row();
	   return $ret;
	 }
	 else
	 {
	   return null;
	 }

  }

  function get_etat_devis($idProjet){
  	$this -> db -> select('etat_devis');
	 $this -> db -> from($this->tableDevis);
	 $this -> db -> where('id_projet', $idProjet);
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

		 
		
  function update_prix_devis($idProjet,$prix){

  	$data = array(
        'montant_devis_ht' => $prix
    );

    $this->db->where('id_projet', $idProjet);
    $this->db->update($this->tableDevis, $data);
  }



  function update_etat_devis($idDevis,$idProjet,$etat){

  	$data = array(
        'etat_devis' => $etat
    );

    $this->db->where('id_projet', $idProjet);
    $this->db->where('id_devis', $idDevis);
    $this->db->update($this->tableDevis, $data);
  }

 


}