<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthJury extends CI_Controller {

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

		$this->load->model('Jury_Model');

		date_default_timezone_set('Asia/Singapore');

	}
	public function index()
	{
		$data['error']= '';

		$this->load->view('login-jury',$data);
	}

	public function login()
	{
		$username = $this->input->post('uname','true');
		
		$password = $this->input->post('pword','true');
		
		$data     = $this->Jury_Model->login($username, $password);

		if (empty($data))
		{
			$data['error'] = '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><p><b>ERROR</b><br>Username atau kata sandi salah!</p></div>';

			$this->load->view('login-jury',$data);
		}
		else
		{
			$j_token  	= $this->Jury_Model->setAuth($data['id']);

			$this->session->set_userdata('j_token', $j_token);

			$this->session->set_userdata('id', $data['id']);

			$this->session->set_userdata('fullname', $data['fullname']);

			$this->session->set_userdata('category', $data['category']);

			redirect('dashboard-juri/?session=welcome','refresh');
		}
	}

	public function logout()
	{
		session_destroy();

		$this->Jury_Model->destroyAuth($this->session->userdata('j_token'));

		redirect('login-juri','refresh');
	}

	public function dashboard()
	{
		if(is_null($this->session->userdata('j_token')))
		{
			redirect('login-juri','refresh');
		}
		if($this->Jury_Model->checkAuth($this->session->userdata('j_token'))==FALSE)
		{
			session_destroy();
			echo "<script>
					alert('Ada yang menggunakan akun anda.');
					window.location.href='login';
					</script>";
		}
		else
		{
			if ($this->input->get('session')=='welcome') 
			{ 
				$data['welmsg']='swal("Selamat Datang"," Terimakasih Sdr/i. '.$this->session->userdata('fullname').' sudah bersedia menjadi salah satu juri ITCC 2016. Berikut adalah daftar karya peserta ITCC 2016.")' ;
			}
			else
			{
				$data['welmsg']='';
			}

			$data['objects'] = $this->Jury_Model->getObjectsByCategory($this->session->userdata('id'), $this->session->userdata('category'));

			$this->load->view('dashboard-jury', $data);
		}
	}

	public function rekap()
	{
		if(is_null($this->session->userdata('j_token')))
		{
			redirect('login-juri','refresh');
		}
		if($this->Jury_Model->checkAuth($this->session->userdata('j_token'))==FALSE)
		{
			session_destroy();
			echo "<script>
					alert('Ada yang menggunakan akun anda.');
					window.location.href='login';
					</script>";
		}
		else
		{
			$data['objects'] = $this->Jury_Model->getObjectsByCategory($this->session->userdata('id'), $this->session->userdata('category'));

			$this->load->view('rekap-penilaian', $data);
		}
	}
	public function formScore($object_id)
	{
		if(is_null($this->session->userdata('j_token')))
		{
			redirect('login-juri','refresh');
		}
		if($this->Jury_Model->checkAuth($this->session->userdata('j_token'))==FALSE)
		{
			session_destroy();
			echo "<script>
					alert('Ada yang menggunakan akun anda.');
					window.location.href='login';
					</script>";
		}
		else
		{
			$this->load->helper(array('form', 'url'));

       		$this->load->library('form_validation');

			$config = array(
				array(
	        		'field' => 'score[0]',
	        		'label' => 'a',
	        		'rules' => 'required|numeric|greater_than_equal_to[0]|less_than_equal_to[35]'
	        	), 
	        	array(
	        		'field' => 'score[1]',
	        		'label' => 'b',
	        		'rules' => 'required|numeric|greater_than_equal_to[0]|less_than_equal_to[40]'
	        	), 
	        	array(
	        		'field' => 'score[2]',
	        		'label' => 'c',
	        		'rules' => 'required|numeric|greater_than_equal_to[0]|less_than_equal_to[35]'
	        	), 
	        	array(
	        		'field' => 'score[3]',
	        		'label' => 'd',
	        		'rules' => 'required|numeric|greater_than_equal_to[0]|less_than_equal_to[25]'
	        	), 
	        	array(
	        		'field' => 'score[4]',
	        		'label' => 'e',
	        		'rules' => 'required|numeric|greater_than_equal_to[0]|less_than_equal_to[25]'
	        	), 
	        	array(
	        		'field' => 'score[5]',
	        		'label' => 'f',
	        		'rules' => 'required|numeric|greater_than_equal_to[0]|less_than_equal_to[25]'
	        	), 
	        	array(
	        		'field' => 'score[6]',
	        		'label' => 'g',
	        		'rules' => 'required|numeric|greater_than_equal_to[0]|less_than_equal_to[25]'
	        	), 
	        	array(
	        		'field' => 'score[7]',
	        		'label' => 'h',
	        		'rules' => 'required|numeric|greater_than_equal_to[0]|less_than_equal_to[25]'
	        	), 
	        	array(
	        		'field' => 'score[8]',
	        		'label' => 'i',
	        		'rules' => 'required|numeric|greater_than_equal_to[0]|less_than_equal_to[25]'
	        	), 
	        	array(
	        		'field' => 'score[9]',
	        		'label' => 'j',
	        		'rules' => 'required|numeric|greater_than_equal_to[0]|less_than_equal_to[25]'
	        	), 
	        	array(
	        		'field' => 'score[10]',
	        		'label' => 'k',
	        		'rules' => 'required|numeric|greater_than_equal_to[0]|less_than_equal_to[25]'
	        	), 
	        	array(
	        		'field' => 'score[11]',
	        		'label' => 'l',
	        		'rules' => 'required|numeric|greater_than_equal_to[0]|less_than_equal_to[25]'
	        	), 
	        	array(
	        		'field' => 'score[12]',
	        		'label' => 'm',
	        		'rules' => 'required|numeric|greater_than_equal_to[0]|less_than_equal_to[25]'
	        	), 
	        	array(
	        		'field' => 'score[13]',
	        		'label' => 'n',
	        		'rules' => 'required|numeric|greater_than_equal_to[0]|less_than_equal_to[25]'
	        	), 
	        	array(
	        		'field' => 'score[14]',
	        		'label' => 'o',
	        		'rules' => 'required|numeric|greater_than_equal_to[0]|less_than_equal_to[20]'
	        	), 
	        	array(
	        		'field' => 'score[15]',
	        		'label' => 'p',
	        		'rules' => 'required|numeric|greater_than_equal_to[0]|less_than_equal_to[25]'
	        	), 
	        	array(
	        		'field' => 'score[16]',
	        		'label' => 'q',
	        		'rules' => 'required|numeric|greater_than_equal_to[0]|less_than_equal_to[25]'
	        	), 
	        	array(
	        		'field' => 'score[17]',
	        		'label' => 'r',
	        		'rules' => 'required|numeric|greater_than_equal_to[0]|less_than_equal_to[15]'
	        	), 
	        	array(
	        		'field' => 'score[18]',
	        		'label' => 's',
	        		'rules' => 'required|numeric|greater_than_equal_to[0]|less_than_equal_to[15]'
	        	),
	        	array(
	        		'field' => 'score[19]',
	        		'label' => 't',
	        		'rules' => 'required|numeric|greater_than_equal_to[0]|less_than_equal_to[15]'
	        	)
			);

			$this->form_validation->set_rules($config);

			$this->form_validation->set_message('required', '<li><b>Butir {field}</b> harus diisi</li>');

			$this->form_validation->set_message('numeric', '<li><b>{field}</b> hanya boleh diisi angka</li>');

			$this->form_validation->set_message('greater_than_equal_to', '<li><b>{field}</b> harus diisi minimal {param} poin</li>');

			$this->form_validation->set_message('less_than_equal_toh', '<li><b>{field}</b> harus diisi maksimal {param} poin</li>');


			if ($this->form_validation->run() == FALSE)
        	{
        		if (validation_errors()==FALSE) 
        		{
        			$error ='';

        			$maxID 					= $this->Jury_Model->maxScoreId($this->session->userdata('id'), $object_id);

        			$data['scored'] 		= $this->Jury_Model->getScoreListDetailById($maxID);
        		}
        		else
        		{
        			$error = '<div class="alert alert-danger">
    							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    							<h4>ERROR</h4><ul align="left">'.validation_errors().'</ul></div>';

    				$data['scored'] 		= array(

				        					'a'  => $this->input->post('score[0]'),

											'b'  => $this->input->post('score[1]'),
											
											'c'  => $this->input->post('score[2]'),
											
											'd'  => $this->input->post('score[3]'),
											
											'e'  => $this->input->post('score[4]'),
											
											'f'  => $this->input->post('score[5]'),
											
											'g'  => $this->input->post('score[6]'),

											'h'  => $this->input->post('score[7]'),

											'i'  => $this->input->post('score[8]'),

											'j'  => $this->input->post('score[9]'),

											'k'  => $this->input->post('score[10]'),

											'l'  => $this->input->post('score[11]'),

											'm'  => $this->input->post('score[12]'),

											'n'  => $this->input->post('score[13]'),

											'o'  => $this->input->post('score[14]'),

											'p'  => $this->input->post('score[15]'),

											'q'  => $this->input->post('score[16]'),

											'r'  => $this->input->post('score[17]'),

											's'  => $this->input->post('score[18]'),

											't'  => $this->input->post('score[19]')
        								);
        		}

        		$data['object_id'] 		= $object_id;
				$data['object_info']	= $this->Jury_Model->getObjectById($object_id);
				$data['group_info']		= $this->Jury_Model->getGroupInfoById($data['object_info']['group_id']);
				$data['group_members']	= $this->Jury_Model->getGroupMembersByGroupId($data['object_info']['group_id']);
        		$data['errormsg'] 		= $error;

				$this->load->view('form-score', $data);
        	}
        	else
        	{
        		$score_list_id 	= $this->Jury_Model->insertScoreList($this->session->userdata('id'), $object_id, $this->input->ip_address());

        		$forms 	= $this->input->post('form');

        		$scores = $this->input->post('score');

        		foreach ($forms as $key => $n) 
        		{
        			$this->Jury_Model->insertScoreListDetail($score_list_id, $n, $scores[$key]);
        		}

        		$url = base_url().'dashboard-juri';

        		redirect('dashboard-juri','refresh');
        	}
		}
	}
}
