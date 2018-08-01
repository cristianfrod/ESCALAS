<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller{

  function __construct(){

      parent::__construct();
      $this->load->helper('form');
      $this->load->library('form_validation');
      $this->load->library('session');
      $this->load->model('login_database');
  }

  function index(){

    $this->signin();
        // $data['title'] = 'SIMO - Entrar';
        // $data['activemenu'] = '2';
        // $data['error'] = '0';
        // $data['body'] = 'signin';
        // $this->load->view('outside',$data);

  }

  function signin(){

    $this->form_validation->set_rules('username', 'Username', 'trim');
    $this->form_validation->set_rules('password', 'Password', 'trim');

    $this->load->model('login_database');
    $login['username'] = $this->input->post('username');
    $login['password'] = $this->input->post('password');

    if ($this->form_validation->run() == FALSE) {
      if(isset($this->session->userdata['logged'])){
        redirect('home');
      }else{
        $data['title'] = 'SIMO - Entrar';
        $data['activemenu'] = '2';
        $data['error'] = '0';
        $data['body'] = 'signin';
        $this->load->view('outside',$data);
      }
    }else{
      $result = $this->login_database->authenticate($login);
      if ($result){
        $first_time_check = $this->login_database->first_time_check($login);
        if($first_time_check) {
          $last_login_update = $this->login_database->last_login_update($login);
          redirect('schedule?x=y');
        }else{
          redirect('schedule');
        }
      }else{
        $data['title'] = 'SIMO - Entrar';
        $data['activemenu'] = '2';
        $data['error'] = '1';
        $data['body'] = 'signin';
        $this->load->view('outside',$data);
      }
    }
  }
}
?>
