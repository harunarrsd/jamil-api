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
//   public function add_post(){
//     $response = $this->KaderM->add(
//         $this->post('idposyandu'),
//         $this->post('nama'),
//         $this->post('photo'),
//         $this->post('notelp'),
//         $this->post('email'),
//         md5($this->post('password'))
//       );
//     $this->response($response);
//   }
}

?>
