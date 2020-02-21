<?php

require APPPATH . 'libraries/REST_Controller.php';

class Posyandu extends REST_Controller{
  // construct
  public function __construct(){
    parent::__construct();
    $this->load->model('PosyanduM');
  }
  // method index untuk menampilkan semua data menggunakan method get
  public function index_get(){
    $nama = $this->get('q');
    if ($nama == '') {
      $response = $this->PosyanduM->get_all();
    } else {
      $this->db->like('nama', $nama);
      $response = $this->PosyanduM->get_all();
    }
    $this->response($response);
  }
  // untuk menambah data menaggunakan method post
  public function add_post(){
    $response = $this->PosyanduM->add(
        $this->post('nama'),
        $this->post('alamat'),
        $this->post('lng'),
        $this->post('lat')
      );
    $this->response($response);
  }
}

?>
