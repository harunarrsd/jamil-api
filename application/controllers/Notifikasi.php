<?php

require APPPATH . 'libraries/REST_Controller.php';

class Notifikasi extends REST_Controller{
  // construct
  public function __construct(){
    parent::__construct();
    $this->load->model('NotifikasiM');
  }
  // method index untuk menampilkan semua data menggunakan method get
  public function index_get(){
    $id = $this->get('idposyandu');
    if ($id == '') {
      $response = $this->NotifikasiM->get_all();
    } else {
      $this->db->where('idposyandu', $id);
      $response = $this->NotifikasiM->get_all();
    }
    $this->response($response);
  }
}
?>
