<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Login extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('LoginM');
    }

    public function index()
    {
        echo 'login api';
    }

    public function loginuser_post()
    {
        $email = $this->input->post('email');
        $password = md5($this->input->post('password'));
        $result = $this->LoginM->LoginUser($email, $password);
        $this->response($result);
    }

    public function loginkader_post()
    {
        $email = $this->input->post('email');
        $password = md5($this->input->post('password'));
        $result = $this->LoginM->LoginKader($email, $password);
        $this->response($result);
    }
}