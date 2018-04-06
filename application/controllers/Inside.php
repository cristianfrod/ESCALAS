<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inside extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
    $this->load->helper('form');
    $this->load->library('form_validation');
    $this->load->library('session');
    $this->load->helper('date');
		$this->load->model('login_database');
header('Access-Control-Allow-Origin: *');

	}

	function home(){

		if(!$this->login_database->isLogged()){
			redirect('signin');
		}
		$data['title'] = 'SIMO - Início';
		$data['sessionfullname'] = $this->session->userdata['sessionfullname'];
		$data['menu'] = '1';
		$data['x'] = $this->input->get('x');
		$data['message'] = $this->input->get('message');
		$data['body'] = 'home';

		$this->load->view('inside',$data);
	}

	function schedule(){

		if(!$this->login_database->isLogged()){
			redirect('signin');
		}
		$data['title'] = 'SIMO - Escalas';
		$data['sessionfullname'] = $this->session->userdata['sessionfullname'];
		$data['menu'] = '4';
                $data['x'] = $this->input->get('x');
		$data['idPermission'] = $this->session->userdata['idPermission'];
		$data['body'] = 'schedule/schedule_menu';

		$this->load->view('inside', $data);
	}

	function signin(){

		$this->form_validation->set_rules('username', 'Username', 'trim');
		$this->form_validation->set_rules('password', 'Password', 'trim');

		$this->load->model('login_database');
		$data = array(
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password')
			);

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
			$result = $this->login_database->authenticate($data);
			if ($result){
				$first_time_check = $this->login_database->first_time_check($data);
				if($first_time_check) {
					$last_login_update = $this->login_database->last_login_update($data);
					redirect('home?x=y');
				}else{
					redirect('home');
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

	function first_login(){

		$this->form_validation->set_rules('newpassword', 'newpassword', 'required');
		$this->form_validation->set_rules('newpasswordconf', 'newpasswordconf', 'required');
		$newpassword = $this->input->post('newpassword');
  	$conf = $this->input->post('newpasswordconf');

  	if ($newpassword != $conf){
			redirect('home?x=y&message=1');
		}
		if ($newpassword == 123){
			redirect('home?x=y&message=2');
		}
		$data['username'] = $this->session->userdata['username'];
		$data['currpassword'] = 123;
		$data['newpassword'] = $newpassword;

		$this->load->model('settings_database');

		$data['currpassword'] = 123;
		$result = $this->settings_database->change_password($data);

		if ($result != false) {
			redirect('home?x=y&message=4');
		}else{
			redirect('home?x=y&message=3');
		}
	}

	function support(){

		if(!$this->login_database->isLogged()){
			redirect('signin');
		}

		$this->form_validation->set_rules('type', 'Tipo', 'required');
		$this->form_validation->set_rules('description', 'Descrição', 'required');
		$data['title'] = 'SIMO - Suporte';
		$data['menu'] = '4';
		$data['message'] = null;
		$data['sessionfullname'] = $this->session->userdata['sessionfullname'];
		$data['body'] = 'support';
		if ($this->form_validation->run() == FALSE) {

			$this->load->view('inside',$data);
		}else{
			$gallery_path = realpath(APPPATH . '../uploads');

			$nome_temporario = $_FILES["userfile"]["tmp_name"];
			// $nome_real = $_FILES["userfile"]["name"];
			// copy($nome_temporario,"assets/img/$nome_real");

		 	$config['upload_path'] = $gallery_path;
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = '100000';
			$config['max_width']  = '1024';
			$config['max_height']  = '768';

			$this->load->library('upload', $config);
			$this->upload->do_upload('userfile');
			$image_data = $this->upload->data();

			//Carrega a library email
			$this->load->library('email');

			//Define o e-mail de origem
			$this->email->from($this->session->userdata['sessionfullname'].'@ciccrpr.hol.es','CICCRPR');

			//Define o e-mail de destino
			$this->email->to('contato@ciccrpr.hol.es');
//            $this->email->cc('outro@outro-site.com');
//            $this->email->bcc('fulano@qualquer-site.com');

			//Define o assunto
			$this->email->subject('Problem Report: ' . $this->input->post('type'));

			$texto = '';
			$texto .= 'Descrição do Problema : ' . $this->input->post('description') . '<br>';

			//Define o conteúdo do e-mail
			$this->email->message($texto);

			//Anexa o arquivo uploaded
			$this->email->attach($image_data['full_path']);

			//Envia o e-mail
			$this->email->send();
			$data['message'] = '2';
			$this->load->view('inside',$data);
		}
	}

	function logout(){

		session_destroy();
		redirect('signin');
	}
}
?>
