<?php
// extends class Model
class Record_bayiM extends CI_Model{
  // response jika field ada yang kosong
  public function empty_response(){
    $response['status']=502;
    $response['error']=true;
    $response['message']='Field tidak boleh kosong';
    return $response;
  }
  // function untuk insert data ke tabel tb_person
  public function add($tinggi_badan,$berat_badan,$idbayi,$usia_bulan){
    if(empty($tinggi_badan) || empty($berat_badan) || empty($idbayi)){
      return $this->empty_response();
    }else{
      $data = array(
        "tinggi_badan"=>$tinggi_badan,
        "berat_badan"=>$berat_badan,
        "idbayi"=>$idbayi,
        "usia_bulan"=>$usia_bulan,
        "tgl"=>date('Y-m-d')
      );
      $insert = $this->db->insert("record_bayi", $data);
      if($insert){
        $response['status']=200;
        $response['error']=false;
        $response['message']='Data record bayi ditambahkan.';
        return $response;
      }else{
        $response['status']=502;
        $response['error']=true;
        $response['message']='Data record bayi gagal ditambahkan.';
        return $response;
      }
    }
  }
  // mengambil semua data person
  public function all_record_bayi(){
    $all = $this->db->get("record_bayi")->result();
    $response['status']=200;
    $response['error']=false;
    $response['record_bayi']=$all;
    return $response;
  }
}
?>
