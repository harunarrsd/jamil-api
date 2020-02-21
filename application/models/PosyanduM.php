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
  // function untuk insert data
  public function add($nama,$alamat,$lng,$lat){
    if(empty($nama)){
      return $this->empty_response();
    }else{
      $data = array(
        "nama"=>$nama,
        "alamat"=>$alamat,
        "lng"=>$lng,
        "lat"=>$lat
      );
      $insert = $this->db->insert("posyandu", $data);
      if($insert){
        $response['status']=200;
        $response['error']=false;
        $response['message']='Tambah Posyandu berhasil.';
        return $response;
      }else{
        $response['status']=502;
        $response['error']=true;
        $response['message']='Tambah Posyandu gagal.';
        return $response;
      }
    }
  }
}
?>
