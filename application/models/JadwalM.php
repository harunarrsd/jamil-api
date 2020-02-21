<?php
// extends class Model
class JadwalM extends CI_Model{
  // response jika field ada yang kosong
  public function empty_response(){
    $response['status']=502;
    $response['error']=true;
    $response['message']='Field tidak boleh kosong';
    return $response;
  }
  // function untuk insert data
  public function add($iduser,$idposyandu,$deskripsi,$created_by,$tgl){
    if(empty($iduser) || empty($deskripsi) || empty($tgl)){
      return $this->empty_response();
    }else{
      $data = array(
        "iduser"=>$iduser,
        "idposyandu"=>$idposyandu,
        "deskripsi"=>$deskripsi,
        "created_by"=>$created_by,
        "tgl"=>$tgl
      );
      $insert = $this->db->insert("jadwal", $data);
      if($insert){
        $response['status']=200;
        $response['error']=false;
        $response['message']='Data jadwal ditambahkan.';
        return $response;
      }else{
        $response['status']=502;
        $response['error']=true;
        $response['message']='Data jadwal gagal ditambahkan.';
        return $response;
      }
    }
  }
  // mengambil semua data
  public function get_all(){
    $all = $this->db->get("jadwal")->result();
    $response['status']=200;
    $response['error']=false;
    $response['jadwal']=$all;
    return $response;
  }
}
?>
