<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class DB_test extends CI_Controller {

  /*
  *
  */
  function __construct(){
    parent::__construct();
    $this->load->model("ramos_model", "ramos");
  }

  public function index()
  {
    // test ramos data
    $response = [];
    $response['ramos'] = $this->ramos->get();
    $this->load->view("test_view", $response);
  }
}

/* End of filedb_test.php */
/* Location: ./application/controllers/db_test.php */
