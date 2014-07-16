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

  public function get_by_ramo($ramo, $limit, $offset = 0, $sort = FALSE){
    if($ramo){
      $this->db->where("ramo", $ramo);
    }
    if($sort){
      $this->db->order_by($sort, "asc");
    }
    $this->db->from(self::TABLE);
    $this->db->limit($limit, $offset);
    $query = $this->db->get();

    return $query->result();
  }


  /*
  * 
  */
  public function count_by_ramo($ramo){
    $this->db->where("ramo", $ramo);
    $this->db->from(self::TABLE);
    return $this->db->count_all_results();
  }

}
