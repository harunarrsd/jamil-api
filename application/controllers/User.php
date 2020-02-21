<?php

require APPPATH . 'libraries/REST_Controller.php';

class User extends REST_Controller{

  // construct
  public function __construct(){
    parent::__construct();
    $this->load->model('UserM');
  }

  // method index untuk menampilkan semua data person menggunakan method get
  public function index_get(){
    $id = $this->get('id');
    if ($id == '') {
        $response = $this->UserM->all_user();
    } else {
        $this->db->where('user.id', $id);
        $response = $this->UserM->all_user();
    }
    $this->response($response);
  }

  // untuk menambah data menaggunakan method post
  public function add_post(){
    $response = $this->UserM->add(
        $this->post('idposyandu'),
        $this->post('nama'),
        $this->post('photo'),
        $this->post('notelp'),
        $this->post('email'),
        md5($this->post('password')),
        $this->post('status')
      );
    $this->response($response);
  }

  // update data menggunakan method post
  public function update_regist_post(){
    $response = $this->UserM->update_regist(
      $this->post('id'),
      $this->post('idposyandu'),
      $this->post('status')
    );
    $this->response($response);
  }

}

?>
