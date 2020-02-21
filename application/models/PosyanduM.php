<?php

// extends class Model
class PosyanduM extends CI_Model{

  // mengambil semua data
  public function get_all(){
    $all = $this->db->get("posyandu")->result();
    $response['status']=200;
    $response['error']=false;
    $response['posyandu']=$all;
    return $response;
  }
}
?>
