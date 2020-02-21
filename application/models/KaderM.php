<?php

// extends class Model
class KaderM extends CI_Model{

  // response jika field ada yang kosong
  public function empty_response(){
    $response['status']=502;
    $response['error']=true;
    $response['message']='Field tidak boleh kosong';
    return $response;
  }

  // mengambil semua data
  public function get_all(){
    $this->db->select('kader.*, posyandu.nama as nama_posyandu');
    $this->db->from('kader');
    $this->db->join('posyandu', 'posyandu.id = kader.idposyandu');
    $all = $this->db->get()->result();
    $response['status']=200;
    $response['error']=false;
    $response['kader']=$all;
    return $response;
  }

  // function untuk insert data
  public function add($idposyandu,$nama,$photo,$notelp,$email,$password,$status){
    if(empty($nama) || empty($email) || empty($password)){
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
      $insert = $this->db->insert("kader", $data);
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

  // update
  public function update_regist($id,$idposyandu,$status){
    if($id == ''){
      return $this->empty_response();
    }else{
      $where = array(
        "kader.id"=>$id
      );
      $set = array(
        "idposyandu"=>$idposyandu,
        "status"=>$status
      );
      $this->db->where($where);
      $update = $this->db->update("kader",$set);
      if($update){
        $response['status']=200;
        $response['error']=false;
        $response['message']='Data kader diubah.';
        return $response;
      }else{
        $response['status']=502;
        $response['error']=true;
        $response['message']='Data kader gagal diubah.';
        return $response;
      }
    }
  }
}

?>
