<?php

require APPPATH . 'libraries/REST_Controller.php';

class Gizi_makanan extends REST_Controller{
  // construct
  public function __construct(){
    parent::__construct();
    $this->load->model('Gizi_makananM');
  }
  // method index untuk menampilkan semua data menggunakan method get
  public function index_get(){
    $nama_makanan = $this->get('q');
    if ($nama_makanan == '') {
      $response = $this->Gizi_makananM->get_all();
    } else {
      $this->db->like('nama_makanan', $nama_makanan);
      $response = $this->Gizi_makananM->get_all();
    }
    $this->response($response);
  }
}
?>
