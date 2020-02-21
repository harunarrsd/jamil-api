<?php

// extends class Model
class Gizi_makananM extends CI_Model{

  // mengambil semua data
  public function get_all(){
    $all = $this->db->get("gizi_makanan")->result();
    $response['status']=200;
    $response['error']=false;
    $response['gizi_makanan']=$all;
    return $response;
  }
}
?>
