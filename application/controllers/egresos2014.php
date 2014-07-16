<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Egresos2014
*
* @author elcoruco
*/

class Egresos2014 extends CI_Controller {

  // the max size of a response
  const LIMIT = 50;
  // this array is to validate the sorting field
  public static $keys = ["ramo", "ramo_nombre", "ramo_clase", 
  "pp_clave", "pp_descripcion", "o_aprobado_2014", "asignaciones"];

  /*
  *
  */
  function __construct(){
    parent::__construct();
    // get the models
    $this->load->model("ramos_model", "ramos");
    $this->load->model("programas_model", "pp");
    $this->load->model("egresos_model", "egresos");
  }

  /*
  * Display de app interface
  *
  */
  public function index()
  {
    $data = ["max_items" => self::LIMIT, 'pp_keys' => self::$keys];
    $this->load->view("egresos_federacion_view", $data);
  }

  /*
  * NAVIGATE THE PP DATA
  */
  public function get_pp_by_ramo($ramo = 1, $offset = 0, $sort = FALSE){
    $ramo     = (int)$ramo;
    $offset   = (int)$offset;
    $sort     = in_array($sort, self::$keys) ? $sort : FALSE;
    $response = $this->pp->get_by_ramo($ramo, self::LIMIT, $offset, $sort);

    $this->output->set_content_type("application/json");
    $this->output->set_output(json_encode($response));
  }

  /*
  * NAVIGATE THE BUDGET DATA
  */
  public function get_budget_by_pp($pp_clave_full = FALSE, $offset = 0){
    // load the library to validate the pp key
    $this->load->library('form_validation');

    $offset = (int)$offset;
    $clave = $this->form_validation->alpha_numeric($pp_clave_full) ? substr($pp_clave_full, 0,8) : FALSE;
    $response = $this->egresos->get_by_pp($clave, self::LIMIT, $offset);

    $this->output->set_content_type("application/json");
    $this->output->set_output(json_encode($response));
  }

  /*
  * get the ramos table. Only needed once, because this data goes into
  * tne frontend (Backbone)
  */
  private function ramos_json(){
    $ramos = $this->ramos->get();

    // add the pp and egresos count for each ramo
    foreach($ramos as $ramo){
      $ramo->id      = (int)$ramo->id;
      $ramo->ramo    = (int)$ramo->ramo;
      $ramo->pp      = $this->pp->count_by_ramo($ramo->ramo);
      $ramo->egresos = $this->egresos->count_by_ramo($ramo->ramo);
    }

    return $ramos;
  }


}

/* End of egresos2014.php */
/* Location: ./application/controllers/egresos2014.php */
