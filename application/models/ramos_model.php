<?php if(! defined('BASEPATH')) exit('Generado aquí en el hackatón, no sean mala onda');

/**
* Ramos_model
*
* @author elcoruco
*/
class Ramos_model extends CI_Model{
  const TABLE = "ramos_mexico";
  
  public function __construct()
  {
    parent::__construct();
  }

  /*
  * return all
  *
  * @access public
  * @return object
  */
  public function get(){
    $query = $this->db->get(self::TABLE);
    return $query->result();
  }

  /*
  * return one "ramo"
  *
  * @access public
  * @return object
  */
  public function get_one($ramo){
    $query = $this->db->get_where(self::TABLE, ["ramo" => $ramo]);
    return $query->row();
  }

}
