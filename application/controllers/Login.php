<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Login extends REST_Controller{
    // construct
    public function __construct(){
        parent::__construct();
        $this->load->model('LoginM');
    }
    // untuk login user dengan parameter email dan password
    public function loginuser_post(){
        $email = $this->input->post('email');
        $password = md5($this->input->post('password'));
        $result = $this->LoginM->LoginUser($email, $password);
        $this->response($result);
    }
    // untuk login posyandu dengan parameter email dan password
    public function loginkader_post(){
        $email = $this->input->post('email');
        $password = md5($this->input->post('password'));
        $result = $this->LoginM->LoginKader($email, $password);
        $this->response($result);
    }
}