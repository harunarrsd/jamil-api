<?php

require APPPATH . 'libraries/REST_Controller.php';

class Jadwal extends REST_Controller{
  // construct
  public function __construct(){
    parent::__construct();
    $this->load->model('JadwalM');
  }
  // method index untuk menampilkan semua data menggunakan method get
  public function index_get(){
    $id = $this->get('iduser');
    $tgl = $this->get('tgl');
    if ($id == '') {
      $response = $this->JadwalM->get_all();
    } else {
      $this->db->where('iduser', $id);
      $this->db->where('tgl', $tgl);
      $response = $this->JadwalM->get_all();
    }
    $this->response($response);
  }
  // untuk menambah data menaggunakan method post
  public function add_post(){
    $response = $this->JadwalM->add(
        $this->post('iduser'),
        $this->post('idposyandu'),
        $this->post('deskripsi'),
        $this->post('created_by'),
        $this->post('tgl')
      );
    $this->response($response);
  }
}
?>