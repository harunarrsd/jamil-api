<?php

// extends class Model
class ArtikelM extends CI_Model{

  // response jika field ada yang kosong
  public function empty_response(){
    $response['status']=502;
    $response['error']=true;
    $response['message']='Field tidak boleh kosong';
    return $response;
  }

  // mengambil semua data artikel
  public function all_artikel(){
    $all = $this->db->get("artikel")->result();
    $response['status']=200;
    $response['error']=false;
    $response['artikel']=$all;
    return $response;
  }

}

?>
