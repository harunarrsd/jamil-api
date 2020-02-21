<?php

require APPPATH . 'libraries/REST_Controller.php';

class Konsultasi extends REST_Controller{

  // construct
  public function __construct(){
    parent::__construct();
    $this->load->model('KonsultasiM');
  }

  // method index untuk menampilkan semua data person menggunakan method get
  public function index_get(){
    $id = $this->get('iduser');
    if ($id == '') {
        $response = $this->KonsultasiM->get_all();
    } else {
        $this->db->where('iduser', $id);
        $response = $this->KonsultasiM->get_all();
    }
    $this->response($response);
  }

  // untuk menambah data menaggunakan method post
  public function add_post(){
    $response = $this->KonsultasiM->add(
        $this->post('iduser'),
        $this->post('deskripsi'),
        $this->post('idkader'),
        $this->post('role')
      );
    $this->response($response);
  }

  public function chat_get(){
    $iduser = $this->get('iduser');
    $idkader = $this->get('idkader');
    if ($iduser == '' && $idkader == '') {
        $response = $this->KonsultasiM->get_all_join();
    } else {
        $this->db->where('iduser', $iduser);
        $this->db->where('idkader', $idkader);
        $response = $this->KonsultasiM->get_all_join();
    }
    $this->response($response);
  }
}

?>
