<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthAdm extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();

		$this->load->model('Admin_Model');

		date_default_timezone_set('Asia/Singapore');
	}
	public function index()
	{
		$data['error']= '';

		$this->load->view('login-admin',$data);
	}

	public function login()
	{
		$username = $this->input->post('uname','true');
		
		$password = $this->input->post('pword','true');
		
		$data     = $this->Admin_Model->login($username, $password);

		if (empty($data))
		{
			$data['error'] = '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><p><b>ERROR</b><br>Username atau kata sandi salah!</p></div>';

			$this->load->view('login-admin',$data);
		}
		else
		{
			$a_token  	= $this->Admin_Model->setAuth($data['id']);

			$this->session->set_userdata('a_token', $a_token);

			$this->session->set_userdata('id', $data['id']);

			$this->session->set_userdata('fullname', $data['fullname']);

			$this->session->set_userdata('category', $data['category']);

			$this->session->set_userdata('privilege', $data['privilege']);

			redirect('dashboard-admin','refresh');
		}
	}

	public function logout()
	{
		session_destroy();

		$this->Admin_Model->destroyAuth($this->session->userdata('a_token'));

		redirect('login-admin','refresh');
	}
}
