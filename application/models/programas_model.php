<?php if(! defined('BASEPATH')) exit('HOWDY amigo!');

/**
* Programas_model
*
* @author elcoruco
*/
class Programas_model extends CI_Model{
  const TABLE = "pp_2010_2014";
  
  public function __construct()
  {
    parent::__construct();
  }

  public function count_by_ramo($ramo){
    $this->db->where("ramo", $ramo);
    $this->db->from(self::TABLE);
    return $this->db->count_all_results();
  }

}
