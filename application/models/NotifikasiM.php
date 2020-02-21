<?php

// extends class Model
class NotifikasiM extends CI_Model{

  // response jika field ada yang kosong
  public function empty_response(){
    $response['status']=502;
    $response['error']=true;
    $response['message']='Field tidak boleh kosong';
    return $response;
  }

  // mengambil semua data
  public function get_all(){
    $all = $this->db->get('notifikasi')->result();
    $response['status']=200;
    $response['error']=false;
    $response['notifikasi']=$all;
    return $response;
  }
}
?>
