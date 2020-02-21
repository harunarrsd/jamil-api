<?php

// extends class Model
class KonsultasiM extends CI_Model{

  // response jika field ada yang kosong
  public function empty_response(){
    $response['status']=502;
    $response['error']=true;
    $response['message']='Field tidak boleh kosong';
    return $response;
  }

  // mengambil semua data
  public function get_all(){
    $this->db->select('DISTINCT(kader.nama), konsultasi.idkader');
    $this->db->from('konsultasi');
    $this->db->join('kader', 'kader.id = konsultasi.idkader');
    $all = $this->db->get()->result();
    $response['status']=200;
    $response['error']=false;
    $response['konsultasi']=$all;
    return $response;
  }

  // function untuk insert data
//   public function add($idposyandu,$nama,$photo,$notelp,$email,$password){
//     if(empty($nama) || empty($email) || empty($password)){
//       return $this->empty_response();
//     }else{
//       $data = array(
//         "idposyandu"=>$idposyandu,
//         "nama"=>$nama,
//         "photo"=>$photo,
//         "notelp"=>$notelp,
//         "email"=>$email,
//         "password"=>$password
//       );
//       $insert = $this->db->insert("kader", $data);
//       if($insert){
//         $response['status']=200;
//         $response['error']=false;
//         $response['message']='Registrasi berhasil.';
//         return $response;
//       }else{
//         $response['status']=502;
//         $response['error']=true;
//         $response['message']='Registrasi gagal.';
//         return $response;
//       }
//     }
//   }
}

?>
