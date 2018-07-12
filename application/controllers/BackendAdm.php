<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BackendAdm extends CI_Controller {

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

		$this->load->model('Mail_Model');

		date_default_timezone_set('Asia/Singapore');
	}
	public function index()
	{
		if(is_null($this->session->userdata('a_token')))
		{
			redirect('login-admin','refresh');
		}
		elseif($this->Admin_Model->checkAuth($this->session->userdata('a_token'))==FALSE)
		{
			session_destroy();
			echo "<script>
					alert('Ada yang menggunakan akun anda.');
					window.location.href='login-admin';
					</script>";
		}
		else
		{
			$data['participants'] 		= $this->Admin_Model->getParticipantByCategory($this->session->userdata('category'));

			$data['numberverified'] 	= $this->Admin_Model->countVerifiedGroupByCategory($this->session->userdata('category'));

			$data['numberunverified'] 	= $this->Admin_Model->countUnverifiedGroupByCategory($this->session->userdata('category'));

			$data['numberparticipants'] 	= $this->Admin_Model->countParticipantsByCategory($this->session->userdata('category'));

			$this->load->view('dashboard-admin', $data);
		}
	}

	public function uploadLogs()
	{
		if(is_null($this->session->userdata('a_token')))
		{
			redirect('login-admin','refresh');
		}
		elseif($this->Admin_Model->checkAuth($this->session->userdata('a_token'))==FALSE)
		{
			session_destroy();
			echo "<script>
					alert('Ada yang menggunakan akun anda.');
					window.location.href='login-admin';
					</script>";
		}
		elseif($this->session->userdata('category')=='PROG' || $this->session->userdata('category')=='LCC')
		{
			echo "<script>
					alert('Tidak untuk cabang lomba ini.');
					window.location.href='dashboard-admin';
					</script>";
		}
		else
		{
			$data['uploadlogs'] = $this->Admin_Model->getUploadLogsByCategory($this->session->userdata('category'));

			$this->load->view('uploadlogs', $data);
		}
	}

	public function viewVerifiedReq()
	{
		if(is_null($this->session->userdata('a_token')))
		{
			redirect('login-admin','refresh');
		}
		elseif($this->Admin_Model->checkAuth($this->session->userdata('a_token'))==FALSE)
		{
			session_destroy();
			echo "<script>
					alert('Ada yang menggunakan akun anda.');
					window.location.href='login-admin';
					</script>";
		}
		elseif($this->session->userdata('privilege')!='sekre')
		{
			echo "<script>
					alert('Previlege tidak cocok');
					window.location.href='dashboard-admin';
					</script>";
		}
		else
		{
			$data['verified_reqs'] = $this->Admin_Model->getVerifiedRequestByCategory($this->session->userdata('category'));

			$this->load->view('verifiedreq', $data);
		}
	}

	public function viewGroupMembers()
	{
		if(is_null($this->session->userdata('a_token')))
		{
			redirect('login-admin','refresh');
		}
		elseif($this->Admin_Model->checkAuth($this->session->userdata('a_token'))==FALSE)
		{
			session_destroy();
			echo "<script>
					alert('Ada yang menggunakan akun anda.');
					window.location.href='login-admin';
					</script>";
		}
		elseif($this->session->userdata('privilege')!='sekre')
		{
			echo "<script>
					alert('Previlege tidak cocok');
					window.location.href='dashboard-admin';
					</script>";
		}
		else
		{
			$group_id = $this->input->post('id');

			$data['groupmembers']	= $this->Admin_Model->getGroupMembersById($group_id);

			$this->load->view('view-member', $data);
		}
	}

	public function verifyingGroup($group_id)
	{
		if(is_null($this->session->userdata('a_token')))
		{
			redirect('login-admin','refresh');
		}
		elseif($this->Admin_Model->checkAuth($this->session->userdata('a_token'))==FALSE)
		{
			session_destroy();
			echo "<script>
					alert('Ada yang menggunakan akun anda.');
					window.location.href='login-admin';
					</script>";
		}
		elseif($this->session->userdata('privilege')!='sekre')
		{
			echo "<script>
					alert('Previlege tidak cocok');
					window.location.href='dashboard-admin';
					</script>";
		}
		else
		{
			$this->Admin_Model->verifyingGroupByGroupID($group_id, $this->session->userdata('id'));

			$datas 	= $this->Admin_Model->getGroupMembersById($group_id);

			foreach ($datas as $data) 
			{
				$this->Admin_Model->verifyingParticipantById( $data->id , $this->session->userdata('category'));
			}

			$leader 	= $this->Admin_Model->getGroupLeader($group_id);

			$this->Mail_Model->mailVerifiedSuccessById($leader);

			redirect('verifikasi-admin','refresh');
		}
	}
	public function viewPhoto()
	{
		if(is_null($this->session->userdata('a_token')))
		{
			redirect('login-admin','refresh');
		}
		elseif($this->Admin_Model->checkAuth($this->session->userdata('a_token'))==FALSE)
		{
			session_destroy();
			echo "<script>
					alert('Ada yang menggunakan akun anda.');
					window.location.href='login-admin';
					</script>";
		}
		else
		{
			$id     = $this->input->post('id');

			$data 	= $this->Admin_Model->getGroupMemberById($id);

			$this->load->view('view-photo', $data);
		}
	}
}
