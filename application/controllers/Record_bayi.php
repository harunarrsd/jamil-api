<?php

require APPPATH . 'libraries/REST_Controller.php';

class Record_bayi extends REST_Controller{

  // construct
  public function __construct(){
    parent::__construct();
    $this->load->model('Record_bayiM');
  }

  // method index untuk menampilkan semua data person menggunakan method get
  public function index_get(){
    $id = $this->get('id');
    if ($id == '') {
        $response = $this->Record_bayiM->all_record_bayi();
    } else {
        $this->db->where('id', $id);
        $response = $this->Record_bayiM->all_record_bayi();
    }
    $this->response($response);
  }

  // untuk menambah person menaggunakan method post
  public function add_post(){
    $response = $this->Record_bayiM->add(
        $this->post('tinggi_badan'),
        $this->post('berat_badan'),
        $this->post('idbayi')
      );
    $this->response($response);
  }

}

?>
