<?php
// extends class Model
class ArtikelM extends CI_Model{
  // mengambil semua data
  public function all_artikel(){
    $all = $this->db->get("artikel")->result();
    $response['status']=200;
    $response['error']=false;
    $response['artikel']=$all;
    return $response;
  }
}
?>
