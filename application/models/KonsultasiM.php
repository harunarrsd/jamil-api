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
  public function add($iduser,$deskripsi,$idkader,$role){
    if(empty($deskripsi)){
      return $this->empty_response();
    }else{
      $data = array(
        "iduser"=>$iduser,
        "deskripsi"=>$deskripsi,
        "idkader"=>$idkader,
        "role"=>$role,
        "waktu"=>date('Y-m-d H:i:s')
      );
      $insert = $this->db->insert("konsultasi", $data);
      if($insert){
        $response['status']=200;
        $response['error']=false;
        $response['message']='Tambah Konsultasi berhasil.';
        return $response;
      }else{
        $response['status']=502;
        $response['error']=true;
        $response['message']='Tambah konsultasi gagal.';
        return $response;
      }
    }
  }
  // mengambil semua data join
  public function get_all_join(){
    $this->db->select('konsultasi.*, kader.nama as nama_kader, user.nama as nama_user');
    $this->db->from('konsultasi');
    $this->db->join('kader', 'kader.id = konsultasi.idkader');
    $this->db->join('user', 'user.id = konsultasi.iduser');
    $all = $this->db->get()->result();
    $response['status']=200;
    $response['error']=false;
    $response['konsultasi']=$all;
    return $response;
  }
}
?>
