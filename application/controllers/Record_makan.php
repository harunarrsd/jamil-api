<?php

require APPPATH . 'libraries/REST_Controller.php';

class Record_makan extends REST_Controller{
  // construct
  public function __construct(){
    parent::__construct();
    $this->load->model('Record_makanM');
  }
  // method index untuk menampilkan semua data menggunakan method get
  public function index_get(){
    $id = $this->get('iduser');
    $tanggal = date('Y-m-d');
    if ($id == '') {
      $response = $this->Record_makanM->get_sum();
    } else {
      $this->db->where('iduser', $id);
      $this->db->where('tanggal', $tanggal);
      $response = $this->Record_makanM->get_sum();
    }
    $this->response($response);
  }
  // untuk menambah data menaggunakan method post
  public function add_post(){
    $response = $this->Record_makanM->add(
        $this->post('iduser'),
        $this->post('nama'),
        $this->post('kalori'),
        $this->post('protein'),
        $this->post('lemak'),
        $this->post('kalsium')
      );
    $this->response($response);
  }
  // untuk menampilkan list makan menggunakan method get
  public function list_makan_get(){
    $id = $this->get('iduser');
    if ($id == '') {
        $response = $this->Record_makanM->get_all();
    } else {
        $this->db->where('iduser', $id);
        $response = $this->Record_makanM->get_all();
    }
    $this->response($response);
  }
}
?>
