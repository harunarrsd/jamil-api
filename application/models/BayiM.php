<?php
// extends class Model
class BayiM extends CI_Model{
  // response jika field ada yang kosong
  public function empty_response(){
    $response['status']=502;
    $response['error']=true;
    $response['message']='Field tidak boleh kosong';
    return $response;
  }
  // mengambil semua data
  public function get_all(){
    $all = $this->db->get("bayi")->result();
    $response['status']=200;
    $response['error']=false;
    $response['bayi']=$all;
    return $response;
  }
  // function untuk insert data
  public function add($iduser,$nama,$gender){
    if(empty($iduser) || empty($nama) || empty($gender)){
      return $this->empty_response();
    }else{
      $data = array(
        "iduser"=>$iduser,
        "nama"=>$nama,
        "gender"=>$gender
      );
      $insert = $this->db->insert("bayi", $data);
      if($insert){
        $response['status']=200;
        $response['error']=false;
        $response['message']='Data bayi ditambahkan.';
        return $response;
      }else{
        $response['status']=502;
        $response['error']=true;
        $response['message']='Data bayi gagal ditambahkan.';
        return $response;
      }
    }
  }
}
?>
