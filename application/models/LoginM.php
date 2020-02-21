<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class LoginM extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    // response jika field ada yang kosong
    public function empty_response(){
        $response['status']=502;
        $response['error']=true;
        $response['message']='Field tidak boleh kosong';
        return $response;
    }
    function LoginUser($email, $password)
    {
        if(empty($email) || empty($password)){
            return $this->empty_response();
        }else{
            $result = $this->db->query("SELECT * FROM user WHERE email = '$email' AND PASSWORD = '$password'")->result();
            $hasil=count($result);
            if($hasil > 0){
                $response['status']=200;
                $response['error']=false;
                $response['message']='Login berhasil.';
                $response['user']=$result;
                return $response;
            }else{
                $response['status']=502;
                $response['error']=true;
                $response['message']='Login gagal.';
                return $response;
            }
        }
    }
    function LoginKader($email, $password)
    {
        if(empty($email) || empty($password)){
            return $this->empty_response();
        }else{
            $result = $this->db->query("SELECT * FROM kader WHERE email = '$email' AND PASSWORD = '$password'")->result();
            $hasil=count($result);
            if($hasil > 0){
                $response['status']=200;
                $response['error']=false;
                $response['message']='Login berhasil.';
                $response['user']=$result;
                return $response;
            }else{
                $response['status']=502;
                $response['error']=true;
                $response['message']='Login gagal.';
                return $response;
            }
        }
    }
}