<?php
// extends class Model
class Record_makanM extends CI_Model{
  // response jika field ada yang kosong
  public function empty_response(){
    $response['status']=502;
    $response['error']=true;
    $response['message']='Field tidak boleh kosong';
    return $response;
  }
  // function untuk insert data ke tabel tb_person
  public function add($iduser,$nama,$kalori,$protein,$lemak,$kalsium){
    if(empty($iduser) || empty($nama) || empty($kalori) || empty($protein) || empty($lemak) || empty($kalsium)){
      return $this->empty_response();
    }else{
      $data = array(
        "iduser"=>$iduser,
        "nama"=>$nama,
        "kalori"=>$kalori,
        "protein"=>$protein,
        "lemak"=>$lemak,
        "kalsium"=>$kalsium,
        "tanggal"=>date('Y-m-d')
      );
      $insert = $this->db->insert("record_makan", $data);
      if($insert){
        $response['status']=200;
        $response['error']=false;
        $response['message']='Data record makan ditambahkan.';
        return $response;
      }else{
        $response['status']=502;
        $response['error']=true;
        $response['message']='Data record makan gagal ditambahkan.';
        return $response;
      }
    }
  }
  // mengambil data sum
  public function get_sum(){
    // $all = $this->db->get("record_makan")->result();
    $this->db->select('SUM(kalori) as kalori, SUM(protein) as protein, SUM(lemak) as lemak, SUM(kalsium) as kalsium');
    $this->db->from('record_makan');
    $all = $this->db->get()->result();
    $response['status']=200;
    $response['error']=false;
    $response['record_makan']=$all;
    return $response;
  }
  // mengambil semua data
  public function get_all(){
    $all = $this->db->get("record_makan")->result();
    $response['status']=200;
    $response['error']=false;
    $response['record_makan']=$all;
    return $response;
  }
}
?>
