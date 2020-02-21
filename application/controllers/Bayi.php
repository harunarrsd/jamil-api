<?php

require APPPATH . 'libraries/REST_Controller.php';

class Bayi extends REST_Controller{
  // construct
  public function __construct(){
    parent::__construct();
    $this->load->model('BayiM');
  }
  // method index untuk menampilkan semua data menggunakan method get
  public function index_get(){
    $id = $this->get('id');
    if ($id == '') {
      $response = $this->BayiM->get_all();
    } else {
      $this->db->where('id', $id);
      $response = $this->BayiM->get_all();
    }
    $this->response($response);
  }
  // untuk menambah data menaggunakan method post
  public function add_post(){
    $response = $this->BayiM->add(
        $this->post('iduser'),
        $this->post('nama'),
        $this->post('gender')
      );
    $this->response($response);
  }
}
?>
