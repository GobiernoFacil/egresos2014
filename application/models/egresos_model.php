<?php if(! defined('BASEPATH')) exit('HOWDY amigo!');

/**
* Programas_model
*
* @author elcoruco
*/
class Egresos_model extends CI_Model{
  const TABLE = "presupuesto_egresos_federacion_2014";
  
  public function __construct()
  {
    parent::__construct();
  }

  public function get_by_pp($pp_clave_full, $limit, $offset = 0){
    if($pp_clave_full){
      $this->db->where("pp_clave_full", $pp_clave_full);
    }
    $this->db->from(self::TABLE);
    $this->db->limit($limit, $offset);
    $query = $this->db->get();

    return $query->result();
  }

  public function count_by_ramo($ramo){
    $this->db->where("ramo", $ramo);
    $this->db->from(self::TABLE);
    return $this->db->count_all_results();
  }

  public function count_by_pp($pp_clave_full){
    $this->db->where("pp_clave", $pp_clave_full);
    $this->db->from(self::TABLE);
    return $this->db->count_all_results();
  }

}
