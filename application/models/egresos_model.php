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

  public function count_by_ramo($ramo){
    $this->db->where("ramo", $ramo);
    $this->db->from(self::TABLE);
    return $this->db->count_all_results();
  }

  public function count_by_pp($pp_clave){
    $this->db->where("pp_clave", $pp_clave);
    $this->db->from(self::TABLE);
    return $this->db->count_all_results();
  }

}
