<?php

require APPPATH . 'libraries/REST_Controller.php';

class Artikel extends REST_Controller{

  // construct
  public function __construct(){
    parent::__construct();
    $this->load->model('ArtikelM');
  }

  // method index untuk menampilkan semua data person menggunakan method get
  public function index_get(){
    $response = $this->ArtikelM->all_artikel();
    $this->response($response);
  }

}

?>
