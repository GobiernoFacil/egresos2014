<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Egresos2014 extends CI_Controller {

  /*
  *
  */
  function __construct(){
    parent::__construct();
    $this->load->model("ramos_model", "ramos");
    $this->load->model("programas_model", "pp");
    $this->load->model("egresos_model", "egresos");
  }

  public function index()
  {
    $this->load->view("egresos_federacion_view");
  }

  public function ramos_json(){
    $ramos = $this->ramos->get();

    /* add the pp and egresos for each ramo */
    foreach($ramos as $ramo){
      $ramo->id = (int)$ramo->id;
      $ramo->ramo = (int)$ramo->ramo;
      $ramo->pp = $this->pp->count_by_ramo($ramo->ramo);
      $ramo->egresos = $this->egresos->count_by_ramo($ramo->ramo);
    }

    $this->output->set_content_type("application/json");
    $this->output->set_output(json_encode($ramos));
  }

  public function count_pp_by_ramo($ramo){
    $ramo = (int)$ramo;
    $pp_num = $this->pp->count_by_ramo($ramo);
    $this->output->set_content_type("application/json");
    $this->output->set_output(json_encode(["pp_num" => $pp_num, "ramo" => $ramo]));
  }

  public function count_egresos_by_ramo($ramo){
    $ramo = (int)$ramo;
    $egresos_num = $this->egresos->count_by_ramo($ramo);
    $this->output->set_content_type("application/json");
    $this->output->set_output(json_encode(["egresos_num" => $egresos_num, "ramo" => $ramo]));
  }

  public function count_egresos_by_pp($pp_clave){
    $egresos_num = $this->egresos->count_by_pp($pp_clave){
    $this->output->set_content_type("application/json");
    $this->output->set_output(json_encode(["egresos_num" => $egresos_num, "ramo" => $ramo]));
  }
}

/* End of egresos2014.php */
/* Location: ./application/controllers/egresos2014.php */
