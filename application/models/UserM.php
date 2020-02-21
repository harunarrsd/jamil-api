<?php

// extends class Model
class UserM extends CI_Model{

  // response jika field ada yang kosong
  public function empty_response(){
    $response['status']=502;
    $response['error']=true;
    $response['message']='Field tidak boleh kosong';
    return $response;
  }

  // mengambil semua data artikel
  public function all_user(){
    $this->db->select('user.*, posyandu.nama as nama_posyandu');
    $this->db->from('user');
    $this->db->join('posyandu', 'posyandu.id = user.idposyandu');
    $all = $this->db->get()->result();
    $response['status']=200;
    $response['error']=false;
    $response['user']=$all;
    return $response;
  }

  // function untuk insert data
  public function add($idposyandu,$nama,$photo,$notelp,$email,$password,$status){
    if(empty($nama) || empty($email) || empty($password) || empty($status)){
      return $this->empty_response();
    }else{
      $data = array(
        "idposyandu"=>$idposyandu,
        "nama"=>$nama,
        "photo"=>$photo,
        "notelp"=>$notelp,
        "email"=>$email,
        "password"=>$password,
        "status"=>$status
      );
      $insert = $this->db->insert("user", $data);
      if($insert){
        $response['status']=200;
        $response['error']=false;
        $response['message']='Registrasi berhasil.';
        return $response;
      }else{
        $response['status']=502;
        $response['error']=true;
        $response['message']='Registrasi gagal.';
        return $response;
      }
    }
  }
}

?>
