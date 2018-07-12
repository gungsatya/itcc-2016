<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

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

		$this->load->model('Participant_Model');

		$this->load->model('Mail_Model');

		date_default_timezone_set('Asia/Singapore');
	}

	public function index()
	{
		$data['error']= '';

		$this->load->view('login',$data);
	}

	public function login()
	{
		$username = $this->input->post('uname');
		
		$password = $this->input->post('pword');
		
		$data     = $this->Participant_Model->login($username, $password);

		if (empty($data))
		{
			$data['error'] = '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><p><b>ERROR</b><br>Username atau kata sandi salah!</p></div>';

			$this->load->view('login',$data);
		}
		else
		{
			$u_token  	= $this->Participant_Model->setAuth($data['id']);

			$groupcode 	= $data['group_id'].$data['category'];

			$this->session->set_userdata('u_token', $u_token);

			$this->session->set_userdata('id', $data['id']);

			$this->session->set_userdata('fullname', $data['fullname']);

			$this->session->set_userdata('group_id', $data['group_id']);

			$this->session->set_userdata('groupcode',$groupcode);

			$this->session->set_userdata('groupname', $data['groupname']);

			$this->session->set_userdata('institution', $data['institution']);

			$this->session->set_userdata('category', $data['category']);

			$this->session->set_userdata('verified', $data['verified_status']);

			redirect('dashboard','refresh');
		}
	}

	public function logout()
	{
		session_destroy();

		$this->Participant_Model->destroyAuth($this->session->userdata('u_token'));

		redirect('Auth','refresh');
	}

	public function signup($category='')
	{
		$this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');

		if ($category=='lcc') 
		{

			$config1 = array(
        		
				array(
	        		'field' => 'groupname',
	        		'label' => 'Nama tim',
	        		'rules' => 'required|min_length[3]|max_length[100]|callback_isGroupNameExist'
	        	),

				array(
	        		'field' => 'institution',
	        		'label' => 'Nama sekolah asal',
	        		'rules' => 'required|min_length[3]|max_length[100]'
	        	),

	        	array(
	        		'field' => 'fullname',
	        		'label' => 'Nama lengkap',
	        		'rules' => 'required|alpha_numeric_spaces|min_length[3]|max_length[50]'
	        	),

	        	array(
	        		'field' => 'birthday',
	        		'label' => 'Tanggal lahir',
	        		'rules' => 'required'
	        	),

	        	array(
	                'field' => 'email',
	                'label' => 'Email',
	                'rules' => 'required|valid_email'
            	),

	        	array(
                    'field' => 'username',
                    'label' => 'Username',
                    'rules' => 'required|callback_isUsernameExist|min_length[5]|max_length[15]'
                ),

                array(
        			'field' => 'contact',
        			'label' => 'Nomer Kontak',
        			'rules' => 'required|numeric|min_length[5]|max_length[15]'
        		),

        		array(
        			'field' => 'vegetarian',
        			'label' => 'Vegetarian',
        			'rules' => 'required'
        		),
	           	array(
                    'field' => 'password',
                    'label' => 'Kata sandi',
                    'rules' => 'required|min_length[5]|max_length[20]'
                ),
                array(
                    'field' => 'passconf',
                    'label' => 'Konfirmasi kata sandi',
                    'rules' => 'required|matches[password]|min_length[5]|max_length[20]'
                )         
        	);

			$this->form_validation->set_rules($config1);

			$this->form_validation->set_message('required', '<li><b>{field}</b> harus diisi</li>');

			$this->form_validation->set_message('alpha_numeric_spaces', '<li><b>{field}</b> hanya boleh berisi karakter a-z, A-Z, 0-9 dan spasi</li>');

			$this->form_validation->set_message('numeric', '<li><b>{field}</b> hanya boleh diisi angka</li>');

			$this->form_validation->set_message('min_length', '<li><b>{field}</b> harus diisi minimal {param} karakter</li>');

			$this->form_validation->set_message('max_length', '<li><b>{field}</b> harus diisi maksimal {param} karakter</li>');

			$this->form_validation->set_message('matches', '<li><b>{field}</b> tidak cocok</li>');

			if ($this->form_validation->run() == FALSE)
        	{
        		if (validation_errors()==FALSE) 
        		{
        			$error ='';
        		}
        		else
        		{
        			$error = '<div class="alert alert-danger">
    							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    							<h4>ERROR</h4><ul>'.validation_errors().'</ul></div>';
        		}

        		$data = array(

        					'groupname' => $this->input->post('groupname'),

							'institution' => $this->input->post('institution'),
							
							'fullname'    => $this->input->post('fullname'),
							
							'birthday'    => $this->input->post('birthday'),
							
							'email'       => $this->input->post('email'),
							
							'username'    => $this->input->post('username'),
							
							'contact'     => $this->input->post('contact'),
							
							'errormsg'    => $error

        				);

				$this->load->view('signup-lcc', $data);
			}
			else
			{
				$dataGroup = array(

							'institution' => $this->input->post('institution'),
							
							'groupname'	  => $this->input->post('groupname'),

							'category'	  => $category

        				);

				$group_id = $this->Participant_Model->insertGroup($dataGroup);

				$dataParticipant = array(

							'group_id'    => $group_id,
							
							'fullname'    => $this->input->post('fullname'),
							
							'birthday'    => $this->input->post('birthday'),
							
							'email'       => $this->input->post('email'),
							
							'username'    => $this->input->post('username'),
							
							'contact'     => $this->input->post('contact'),

							'vegetarian'     => $this->input->post('vegetarian'),
							
							'password'    => md5($this->input->post('password')),

							'create_at'   => date('Y-m-d H:i:s')

        				);

				$participant_id = $this->Participant_Model->insertParticipant($dataParticipant);

				$config = array(
	                'upload_path'   => "./userdata/",
	                'allowed_types' => "gif|jpg|png|jpeg",
	                'file_name'     => $participant_id."_kartu_id",
	                'overwrite'     => TRUE
            	);

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('photo'))
	            {
	                $error = $this->upload->display_errors();

	                $this->Participant_Model->deleteParticipant($participant_id);

	                $this->Participant_Model->deleteGroup($group_id);

	                echo "<script>
	                        alert('Pesan error $error');
	                        window.location.href='../../Auth/signup';
	                        </script>";
	            }
	            else
	            {
	            	$upload_data = $this->upload->data(); 

					$file_name = $upload_data['file_name'];

					$data = array('photo'    => $file_name);

					$this->Participant_Model->updateMember($participant_id, $data);

					$this->Mail_Model->mailSignUpSuccessById($participant_id);

					echo "<script>
					alert('Pendaftaran sukses. Silahkan cek email anda untuk langkah selanjutnya.');
					window.location.href='../../Auth';
					</script>";
	            }

			}
		}
		else if ($category=='idea') 
		{

			$config1 = array(
        		
				array(
	        		'field' => 'groupname',
	        		'label' => 'Nama tim',
	        		'rules' => 'required|min_length[3]|max_length[100]|callback_isGroupNameExist'
	        	),

				array(
	        		'field' => 'institution',
	        		'label' => 'Nama sekolah asal',
	        		'rules' => 'required|min_length[3]|max_length[100]'
	        	),

	        	array(
	        		'field' => 'fullname',
	        		'label' => 'Nama lengkap',
	        		'rules' => 'required|alpha_numeric_spaces|min_length[3]|max_length[50]'
	        	),

	        	array(
	        		'field' => 'birthday',
	        		'label' => 'Tanggal lahir',
	        		'rules' => 'required'
	        	),

	        	array(
	                'field' => 'email',
	                'label' => 'Email',
	                'rules' => 'required|valid_email'
            	),

	        	array(
                    'field' => 'username',
                    'label' => 'Username',
                    'rules' => 'required|callback_isUsernameExist|min_length[5]|max_length[15]'
                ),

                array(
        			'field' => 'contact',
        			'label' => 'Nomer Kontak',
        			'rules' => 'required|numeric|min_length[5]|max_length[15]'
        		),
        		array(
        			'field' => 'vegetarian',
        			'label' => 'Vegetarian',
        			'rules' => 'required'
        		),
	           	array(
                    'field' => 'password',
                    'label' => 'Kata sandi',
                    'rules' => 'required|min_length[5]|max_length[20]'
                ),
                array(
                    'field' => 'passconf',
                    'label' => 'Konfirmasi kata sandi',
                    'rules' => 'required|matches[password]|min_length[5]|max_length[20]'
                )	            
        	);

			$this->form_validation->set_rules($config1);

			$this->form_validation->set_message('required', '<li><b>{field}</b> harus diisi</li>');

			$this->form_validation->set_message('alpha_numeric_spaces', '<li><b>{field}</b> hanya boleh berisi karakter a-z, A-Z, 0-9 dan spasi</li>');

			$this->form_validation->set_message('numeric', '<li><b>{field}</b> hanya boleh diisi angka</li>');

			$this->form_validation->set_message('min_length', '<li><b>{field}</b> harus diisi minimal {param} karakter</li>');

			$this->form_validation->set_message('max_length', '<li><b>{field}</b> harus diisi maksimal {param} karakter</li>');

			$this->form_validation->set_message('matches', '<li><b>{field}</b> tidak cocok</li>');

			if ($this->form_validation->run() == FALSE)
        	{
        		if (validation_errors()==FALSE) 
        		{
        			$error ='';
        		}
        		else
        		{
        			$error = '<div class="alert alert-danger">
    							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    							<h4>ERROR</h4><ul>'.validation_errors().'</ul></div>';
        		}

        		$data = array(

        					'groupname' => $this->input->post('groupname'),

							'institution' => $this->input->post('institution'),
							
							'fullname'    => $this->input->post('fullname'),
							
							'birthday'    => $this->input->post('birthday'),
							
							'email'       => $this->input->post('email'),
							
							'username'    => $this->input->post('username'),
							
							'contact'     => $this->input->post('contact'),
							
							'errormsg'    => $error

        				);

				$this->load->view('signup-idea', $data);
			}
			else
			{
				$dataGroup = array(

							'institution' => $this->input->post('institution'),
							
							'groupname'	  => $this->input->post('groupname'),

							'category'	  => $category

        				);

				$group_id = $this->Participant_Model->insertGroup($dataGroup);

				$dataParticipant = array(

							'group_id'    => $group_id,
							
							'fullname'    => $this->input->post('fullname'),
							
							'birthday'    => $this->input->post('birthday'),
							
							'email'       => $this->input->post('email'),
							
							'username'    => $this->input->post('username'),
							
							'contact'     => $this->input->post('contact'),

							'vegetarian'     => $this->input->post('vegetarian'),
							
							'password'    => md5($this->input->post('password')),

							'create_at'   => date('Y-m-d H:i:s')

        				);

				$participant_id = $this->Participant_Model->insertParticipant($dataParticipant);

				$config = array(
	                'upload_path'   => "./userdata/",
	                //'allowed_types' => "gif|jpg|png|jpeg",
	                'file_name'     => $participant_id."_kartu_id",
	                'overwrite'     => TRUE
            	);

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('photo'))
	            {
	                $error = $this->upload->display_errors();

	                $this->Participant_Model->deleteParticipant($participant_id);

	                $this->Participant_Model->deleteGroup($group_id);

	                echo "<script>
	                        alert('Pesan error $error');
	                        window.location.href='../../Auth/signup';
	                        </script>";
	            }
	            else
	            {
	            	$upload_data = $this->upload->data(); 

					$file_name = $upload_data['file_name'];

					$data = array('photo'    => $file_name);

					$this->Participant_Model->updateMember($participant_id, $data);

					$this->Mail_Model->mailSignUpSuccessById($participant_id);

					echo "<script>
						alert('Pendaftaran sukses. Silahkan cek email anda untuk langkah selanjutnya.');
						window.location.href='../../Auth';
						</script>";
	            }
			}
		}
		elseif ($category=='web') 
		{


			$config1 = array(
        		
				array(
	        		'field' => 'institution',
	        		'label' => 'Nama sekolah asal',
	        		'rules' => 'required|min_length[3]|max_length[100]'
	        	),

	        	array(
	        		'field' => 'fullname',
	        		'label' => 'Nama lengkap',
	        		'rules' => 'required|alpha_numeric_spaces|min_length[3]|max_length[50]'
	        	),

	        	array(
	        		'field' => 'birthday',
	        		'label' => 'Tanggal lahir',
	        		'rules' => 'required'
	        	),

	        	array(
	                'field' => 'email',
	                'label' => 'Email',
	                'rules' => 'required|valid_email'
            	),

	        	array(
                    'field' => 'username',
                    'label' => 'Username',
                    'rules' => 'required|callback_isUsernameExist|min_length[5]|max_length[15]'
                ),

                array(
        			'field' => 'contact',
        			'label' => 'Nomer Kontak',
        			'rules' => 'required|numeric|min_length[5]|max_length[15]'
        		),
        		array(
        			'field' => 'vegetarian',
        			'label' => 'Vegetarian',
        			'rules' => 'required'
        		),
	           	array(
                    'field' => 'password',
                    'label' => 'Kata sandi',
                    'rules' => 'required|min_length[5]|max_length[20]'
                ),
                array(
                    'field' => 'passconf',
                    'label' => 'Konfirmasi kata sandi',
                    'rules' => 'required|matches[password]|min_length[5]|max_length[20]'
                )   	            
        	);

			$this->form_validation->set_rules($config1);

			$this->form_validation->set_message('required', '<li><b>{field}</b> harus diisi</li>');

			$this->form_validation->set_message('alpha_numeric_spaces', '<li><b>{field}</b> hanya boleh berisi karakter a-z, A-Z, 0-9 dan spasi</li>');

			$this->form_validation->set_message('numeric', '<li><b>{field}</b> hanya boleh diisi angka</li>');

			$this->form_validation->set_message('min_length', '<li><b>{field}</b> harus diisi minimal {param} karakter</li>');

			$this->form_validation->set_message('max_length', '<li><b>{field}</b> harus diisi maksimal {param} karakter</li>');

			$this->form_validation->set_message('matches', '<li><b>{field}</b> tidak cocok</li>');

			if ($this->form_validation->run() == FALSE)
        	{
        		if (validation_errors()==FALSE) 
        		{
        			$error ='';
        		}
        		else
        		{
        			$error = '<div class="alert alert-danger">
    							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    							<h4>ERROR</h4><ul>'.validation_errors().'</ul></div>';
        		}

        		$data = array(

							'institution' => $this->input->post('institution'),
							
							'fullname'    => $this->input->post('fullname'),
							
							'birthday'    => $this->input->post('birthday'),
							
							'email'       => $this->input->post('email'),
							
							'username'    => $this->input->post('username'),
							
							'contact'     => $this->input->post('contact'),
							
							'errormsg'    => $error

        				);

				$this->load->view('signup-web', $data);
			}
			else
			{
				$dataGroup = array(

							'institution' => $this->input->post('institution'),
							
							'groupname'	  => strtoupper($category),

							'category'	  => $category

        				);

				$group_id = $this->Participant_Model->insertGroup($dataGroup);

				$dataParticipant = array(

							'group_id'    => $group_id,
							
							'fullname'    => $this->input->post('fullname'),
							
							'birthday'    => $this->input->post('birthday'),
							
							'email'       => $this->input->post('email'),
							
							'username'    => $this->input->post('username'),
							
							'contact'     => $this->input->post('contact'),

							'vegetarian'  => $this->input->post('vegetarian'),
							
							'password'    => md5($this->input->post('password')),

							'create_at'   => date('Y-m-d H:i:s')

        				);

				$participant_id = $this->Participant_Model->insertParticipant($dataParticipant);

				$config = array(
	                'upload_path'   => "./userdata/",
	                //'allowed_types' => "gif|jpg|png|jpeg",
	                'file_name'     => $participant_id."_kartu_id",
	                'overwrite'     => TRUE
            	);

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('photo'))
	            {
	                $error = $this->upload->display_errors();

	                $this->Participant_Model->deleteParticipant($participant_id);

	                $this->Participant_Model->deleteGroup($group_id);

	                echo "<script>
	                        alert('Pesan error $error');
	                        window.location.href='../../Auth/signup';
	                        </script>";
	            }
	            else
	            {
	            	$upload_data = $this->upload->data(); 

					$file_name = $upload_data['file_name'];

					$data = array('photo'    => $file_name);

					$this->Participant_Model->updateMember($participant_id, $data);

					$this->Mail_Model->mailSignUpSuccessById($participant_id);

					echo "<script>
						alert('Pendaftaran sukses. Silahkan cek email anda untuk langkah selanjutnya.');
						window.location.href='../../Auth';
						</script>";
	            }
			}

		}
		elseif ($category=='prog') 
		{


			$config1 = array(
        		
				array(
	        		'field' => 'institution',
	        		'label' => 'Nama sekolah asal',
	        		'rules' => 'required|min_length[3]|max_length[100]'
	        	),

	        	array(
	        		'field' => 'fullname',
	        		'label' => 'Nama lengkap',
	        		'rules' => 'required|alpha_numeric_spaces|min_length[3]|max_length[50]'
	        	),

	        	array(
	        		'field' => 'birthday',
	        		'label' => 'Tanggal lahir',
	        		'rules' => 'required'
	        	),

	        	array(
	                'field' => 'email',
	                'label' => 'Email',
	                'rules' => 'required|valid_email'
            	),

	        	array(
                    'field' => 'username',
                    'label' => 'Username',
                    'rules' => 'required|callback_isUsernameExist|min_length[5]|max_length[15]'
                ),

                array(
        			'field' => 'contact',
        			'label' => 'Nomer Kontak',
        			'rules' => 'required|numeric|min_length[5]|max_length[15]'
        		),
	           	array(
                    'field' => 'password',
                    'label' => 'Kata sandi',
                    'rules' => 'required|min_length[5]|max_length[20]'
                ),
                array(
                    'field' => 'passconf',
                    'label' => 'Konfirmasi kata sandi',
                    'rules' => 'required|matches[password]|min_length[5]|max_length[20]'
                )       
        	);

			$this->form_validation->set_rules($config1);

			$this->form_validation->set_message('required', '<li><b>{field}</b> harus diisi</li>');

			$this->form_validation->set_message('alpha_numeric_spaces', '<li><b>{field}</b> hanya boleh berisi karakter a-z, A-Z, 0-9 dan spasi</li>');

			$this->form_validation->set_message('numeric', '<li><b>{field}</b> hanya boleh diisi angka</li>');

			$this->form_validation->set_message('min_length', '<li><b>{field}</b> harus diisi minimal {param} karakter</li>');

			$this->form_validation->set_message('max_length', '<li><b>{field}</b> harus diisi maksimal {param} karakter</li>');

			$this->form_validation->set_message('matches', '<li><b>{field}</b> tidak cocok</li>');

			if ($this->form_validation->run() == FALSE)
        	{
        		if (validation_errors()==FALSE) 
        		{
        			$error ='';
        		}
        		else
        		{
        			$error = '<div class="alert alert-danger">
    							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    							<h4>ERROR</h4><ul>'.validation_errors().'</ul></div>';
        		}

        		$data = array(

							'institution' => $this->input->post('institution'),
							
							'fullname'    => $this->input->post('fullname'),
							
							'birthday'    => $this->input->post('birthday'),
							
							'email'       => $this->input->post('email'),
							
							'username'    => $this->input->post('username'),
							
							'contact'     => $this->input->post('contact'),
							
							'errormsg'    => $error

        				);

				$this->load->view('signup-prog', $data);
			}
			else
			{
				$dataGroup = array(

							'institution' => $this->input->post('institution'),
							
							'groupname'	  => strtoupper($category),

							'category'	  => $category

        				);

				$group_id = $this->Participant_Model->insertGroup($dataGroup);

				$dataParticipant = array(

							'group_id'    => $group_id,
							
							'fullname'    => $this->input->post('fullname'),
							
							'birthday'    => $this->input->post('birthday'),
							
							'email'       => $this->input->post('email'),
							
							'username'    => $this->input->post('username'),
							
							'contact'     => $this->input->post('contact'),

							'vegetarian'  => $this->input->post('vegetarian'),
							
							'password'    => md5($this->input->post('password')),

							'create_at'   => date('Y-m-d H:i:s')

        				);

				$participant_id = $this->Participant_Model->insertParticipant($dataParticipant);

				$config = array(
	                'upload_path'   => "./userdata/",
	                //'allowed_types' => "gif|jpg|png|jpeg",
	                'file_name'     => $participant_id."_kartu_id",
	                'overwrite'     => TRUE
            	);

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('photo'))
	            {
	                $error = $this->upload->display_errors();

	                $this->Participant_Model->deleteParticipant($participant_id);

	                $this->Participant_Model->deleteGroup($group_id);

	                echo "<script>
	                        alert('Pesan error $error');
	                        window.location.href='../../Auth/signup';
	                        </script>";
	            }
	            else
	            {
	            	$upload_data = $this->upload->data(); 

					$file_name = $upload_data['file_name'];

					$data = array('photo'    => $file_name);

					$this->Participant_Model->updateMember($participant_id, $data);

					$this->Mail_Model->mailSignUpSuccessById($participant_id);

					echo "<script>
						alert('Pendaftaran sukses. Silahkan cek email anda untuk langkah selanjutnya.');
						window.location.href='../../Auth';
						</script>";
	            }
			}
		}
		else
		{
			$this->load->view('signup-1');
		}
	}

	public function isUsernameExist($username) 
	{

	    $this->load->library('form_validation');

	    $is_exist = $this->Participant_Model->checkUsername($username);

	    if ($is_exist) {

	        $this->form_validation->set_message(
	            'isUsernameExist', 'Username telah digunakan. Cari yang lain.'
	        ); 

	        return false;
	    } 
	    else 
	    {
	        return true;
	    }
	}

	public function isGroupNameExist($groupname) 
	{

	    $this->load->library('form_validation');

	    $is_exist = $this->Participant_Model->checkGroupName($groupname);

	    if ($is_exist) {

	        $this->form_validation->set_message(
	            'isGroupNameExist', 'Nama tim telah digunakan. Cari yang lain.'
	        ); 

	        return false;
	    } 
	    else 
	    {
	        return true;
	    }
	}
}
