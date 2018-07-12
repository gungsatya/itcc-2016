<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backend extends CI_Controller {

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
		if(is_null($this->session->userdata('u_token')))
		{
			redirect('login','refresh');
		}
		elseif($this->Participant_Model->checkAuth($this->session->userdata('u_token'))==FALSE)
		{
			session_destroy();
			echo "<script>
					alert('Ada yang menggunakan akun anda.');
					window.location.href='login';
					</script>";
		}
		else
		{
			$data['verified'] 		= $this->Participant_Model->checkVerif($this->session->userdata('group_id'));

			$data['groupmembers']	= $this->Participant_Model->getGroupMembersByGroupId($this->session->userdata('group_id'));

			$count					= $this->Participant_Model->countGroupMembers($this->session->userdata('group_id'));

			if(($this->session->userdata('category')=='IDEA'||$this->session->userdata('category')=='LCC') && $count<3)
			{
				$data['buttonAdd'] = '<a href="#" class="btn btn-success add">Tambahkan Anggota Tim</a>';
			}
			else
			{
				$data['buttonAdd'] = '';
			}
			$this->load->view('dashboard', $data);
		}
	}

	public function viewEditMember()
	{
		if(is_null($this->session->userdata('u_token')))
		{
			redirect('login','refresh');
		}

		$id     = $this->input->post('id');

		$data 	= $this->Participant_Model->getGroupMemberById($id);

		if($this->Participant_Model->checkAuthMember($data['group_id'], $this->session->userdata('u_token'))==FALSE)
		{
			session_destroy();
			echo "<script>
					alert('Otoritas Salah');
					window.location.href='login';
					</script>";
		}
		else
		{
			$this->load->view('form-editmember', $data);
		}
	}

	public function editMember()
	{
		$this->load->library('form_validation');

		if(is_null($this->session->userdata('u_token')))
		{
			redirect('login','refresh');
		}

		$id     = $this->input->post('id');

		$data 	= $this->Participant_Model->getGroupMemberById($id);

		if($this->Participant_Model->checkAuthMember($data['group_id'], $this->session->userdata('u_token'))==FALSE)
		{
			session_destroy();
			echo "<script>
					alert('Otoritas Salah');
					window.location.href='login';
					</script>";
		}
		else
		{
			$config1 = array(

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
		                'field' => 'vegetarian',
		                'label' => 'Vegetarian',
		                'rules' => 'required'
	            	),

	                array(
	        			'field' => 'contact',
	        			'label' => 'Nomer Kontak',
	        			'rules' => 'required|numeric|min_length[5]|max_length[15]'
	        		)
		            
	        	);

			$this->form_validation->set_rules($config1);

			$this->form_validation->set_message('required', '{field} harus diisi');

			$this->form_validation->set_message('alpha_numeric_spaces', '{field} hanya boleh berisi karakter a-z, A-Z, 0-9 dan spasi');

			$this->form_validation->set_message('numeric', '{field} hanya boleh diisi angka');

			$this->form_validation->set_message('min_length', '{field} harus diisi minimal {param} karakter');

			$this->form_validation->set_message('max_length', '{field} harus diisi maksimal {param} karakter');

			$this->form_validation->set_message('matches', '{field} tidak cocok');

			if ($this->form_validation->run() == FALSE)
	        {
	        		echo "<script>
						alert('Edit gagal. Cek lagi data yang anda inputkan');
						window.location.href='../dashboard';
						</script>";
	        }
	        else
	        {
	        	$data = array(
								
					'fullname'    => $this->input->post('fullname'),
					
					'birthday'    => $this->input->post('birthday'),
					
					'email'       => $this->input->post('email'),

					'vegetarian'  => $this->input->post('vegetarian'),
					
					'contact'     => $this->input->post('contact'),

					'last_update_at'   => date('Y-m-d H:i:s')

				);

				$this->Participant_Model->updateMember($this->input->post('id'), $data);

				if (isset($_FILES['photo']) && $_FILES['photo']['error'] != UPLOAD_ERR_NO_FILE) {
	        		$config = array(
		                'upload_path'   => "./userdata/",
		                'allowed_types' => "gif|jpg|png|jpeg",
		                'file_name'     => (int)$id."_kartu_id",
		                'overwrite'     => TRUE
	            	);

					$this->load->library('upload', $config);

					if (!$this->upload->do_upload('photo'))
		            {
		                $error = $this->upload->display_errors();

		                echo "<script>
		                        alert('Pesan error $error');
		                        window.location.href='../dashboard';
		                        </script>";
		            }
		            else
		            {
		            	$upload_data = $this->upload->data(); 

						$file_name = $upload_data['file_name'];

						$data = array('photo'    => $file_name);

						$this->Participant_Model->updateMember($this->input->post('id'), $data);

						echo "<script>
							alert('Edit sukses nih.');
							window.location.href='../dashboard';
							</script>";
		            }
				}
				else
				{
					echo "<script>
						alert('Edit sukses.');
						window.location.href='../dashboard';
						</script>";
				}
	        }
	    }
	}

	public function deleteMember($id)
	{
		if(is_null($this->session->userdata('u_token')))
		{
			redirect('login','refresh');
		}

		$data 	= $this->Participant_Model->getGroupMemberById($id);

		$leader = $this->Participant_Model->getGroupLeader($data['group_id']);

		if($this->Participant_Model->checkAuthMember($data['group_id'], $this->session->userdata('u_token'))==FALSE)
		{
			session_destroy();
			echo "<script>
					alert('Otoritas Salah');
					window.location.href='login';
					</script>";
		}
		else if($id==$leader)
		{
			echo "<script>
					alert('Ketua tim tidak boleh menghapus dirinya sendiri');
					window.location.href='../../dashboard';
					</script>";
		}
		else
		{
			$data = array('active' => 'N', 'last_update_at'   => date('Y-m-d H:i:s'));

			$this->Participant_Model->updateMember($id, $data);

			echo "<script>
					alert('Menghapus sukses');
					window.location.href='../../dashboard';
					</script>";
		}
	}

	public function viewAddMember()
	{
		if(is_null($this->session->userdata('u_token')))
		{
			redirect('login','refresh');
		}
		elseif($this->Participant_Model->checkAuth($this->session->userdata('u_token'))==FALSE)
		{
			session_destroy();
			echo "<script>
					alert('Ada yang menggunakan akun anda.');
					window.location.href='login';
					</script>";
		}
		else
		{
			$this->load->view('form-addmember');
		}
	}

	public function addMember()
	{
		$this->load->library('form_validation');

		if(is_null($this->session->userdata('u_token')))
		{
			redirect('login','refresh');
		}
		elseif($this->Participant_Model->checkAuth($this->session->userdata('u_token'))==FALSE)
		{
			session_destroy();
			echo "<script>
					alert('Ada yang menggunakan akun anda.');
					window.location.href='login';
					</script>";
		}
		else
		{
			$config1 = array(

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
		                'field' => 'vegetarian',
		                'label' => 'Vegetarian',
		                'rules' => 'required'
	            	),

	                array(
	        			'field' => 'contact',
	        			'label' => 'Nomer Kontak',
	        			'rules' => 'required|numeric|min_length[5]|max_length[15]'
	        		)
	        	);

			$this->form_validation->set_rules($config1);

			$this->form_validation->set_message('required', '{field} harus diisi');

			$this->form_validation->set_message('alpha_numeric_spaces', '{field} hanya boleh berisi karakter a-z, A-Z, 0-9 dan spasi');

			$this->form_validation->set_message('numeric', '{field} hanya boleh diisi angka');

			$this->form_validation->set_message('min_length', '{field} harus diisi minimal {param} karakter');

			$this->form_validation->set_message('max_length', '{field} harus diisi maksimal {param} karakter');

			$this->form_validation->set_message('matches', '{field} tidak cocok');

			if ($this->form_validation->run() == FALSE)
	        {
	        		echo "<script>
						alert('Menambahkan gagal. Cek lagi data yang anda inputkan');
						window.location.href='../dashboard';
						</script>";
	        }
	        else
	        {
	        	$data = array(

	        		'group_id'    => $this->session->userdata('group_id'),
								
					'fullname'    => $this->input->post('fullname'),
					
					'birthday'    => $this->input->post('birthday'),

					'vegetarian'  => $this->input->post('vegetarian'),
					
					'email'       => $this->input->post('email'),
					
					'contact'     => $this->input->post('contact'),

					'create_at'   => date('Y-m-d H:i:s')

				);

				$participant_id = $this->Participant_Model->insertParticipant($data);

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

		                $this->Participant_Model->deleteParticipant($dataParticipant);

		                echo "<script>
		                        alert('Pesan error $error');
		                        window.location.href='../dashboard';
		                        </script>";
		            }
		            else
		            {
		            	$upload_data = $this->upload->data(); 

						$file_name = $upload_data['file_name'];

						$data = array('photo'    => $file_name);

						$this->Participant_Model->updateMember($participant_id , $data);

						echo "<script>
							alert('Menambahkan sukses.');
							window.location.href='../dashboard';
							</script>";
		            }
	        }
	    }
	}

	public function viewVerification()
	{
	 	if(is_null($this->session->userdata('u_token')))
		{
			redirect('login','refresh');
		}
		elseif($this->Participant_Model->checkAuth($this->session->userdata('u_token'))==FALSE)
		{
			session_destroy();
			echo "<script>
					alert('Ada yang menggunakan akun anda.');
					window.location.href='login';
					</script>";
		}
		else
		{
			if ($this->session->userdata('category')=='IDEA') 
			{
				echo "<script>
					alert('Pendaftaran sudah ditutup. Sampai jumpa di tahun depan. :)');
					window.location.href='../../signup';
					</script>";
			}

			$count		= $this->Participant_Model->countGroupMembers($this->session->userdata('group_id'));

			$verified 	= $this->Participant_Model->checkVerif($this->session->userdata('group_id'));

			if($verified=='Y')
			{
				$data['form'] = '<div class="alert alert-success">
                                    <p style="font-weight:bold">Terima Kasih</p>
                                    <p style="text-align: justify;text-justify: inter-word;">
                                    	Anda telah terverifikasi 
                                    </p>
                                 </div>';
			}
			else if(($this->session->userdata('category')=='IDEA' && $count<=3 )||($this->session->userdata('category')=='LCC' && $count==3)||($this->session->userdata('category')=='PROG')||($this->session->userdata('category')=='WEB'))
			{
				$data['form'] = 

					'<form action="'.base_url().'Backend/verification" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
					<div class="form-group">
                        <label class="control-label col-xs-2">Foto</label>
                        <div class="col-md-10">
                            <input name="photo" type="file" class="form-control" accept="image/*">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2"></label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="note" placeholder="Keterangan"></textarea>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-success btn-sm pull-right" value="Submit">
					</form>';
			}
			else
			{
				$data['form'] = '<div class="alert alert-danger">
                                    <p style="font-weight:bold">Maaf</p>
                                    <p style="text-align: justify;text-justify: inter-word;">
                                    	Data anda belum lengkap 
                                    </p>
                                 </div>';
			}

			$this->load->view('verifikasi', $data);
		}
	}

	public function verification()
	{
		if(is_null($this->session->userdata('u_token')))
		{
			redirect('login','refresh');
		}
		elseif($this->Participant_Model->checkAuth($this->session->userdata('u_token'))==FALSE)
		{
			session_destroy();
			echo "<script>
					alert('Ada yang menggunakan akun anda.');
					window.location.href='login';
					</script>";
		}

		$count		= $this->Participant_Model->countGroupMembers($this->session->userdata('group_id'));

		$verified 	= $this->Participant_Model->checkVerif($this->session->userdata('group_id'));

		if($verified=='Y')
		{
			echo "<script>
                        alert('Terimakasih, anda telah terverifikasi');
                        window.location.href='../dashboard';
                        </script>";
		}
		else if(($this->session->userdata('category')=='IDEA' && $count<=3 )||($this->session->userdata('category')=='LCC' && $count==3)||($this->session->userdata('category')=='PROG')||($this->session->userdata('category')=='WEB'))
		{
			$config = array(
                'upload_path'   => "./fileverifikasi/".$this->session->userdata('category'),
                'allowed_types' => "gif|jpg|png|jpeg",
                'file_name'     => $this->session->userdata('group_id'),
                'overwrite'     => TRUE,
                'max_size'      => 1536
            );

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('photo'))
            {
                $error = $this->upload->display_errors();

                echo "<script>
                        alert('Pesan error $error');
                        window.location.href='../dashboard';
                        </script>";
            }
            else
            {
            	$upload_data = $this->upload->data(); 

				$file_name = $upload_data['file_name'];

            	$data1 = array('group_id'  	=> $this->session->userdata('group_id'),
            				   'request_at' => date('Y-m-d H:i:s'),
            				   'note'		=> $this->input->post('note'),
            				   'filename'	=> $file_name);

            	if($this->Participant_Model->checkVerifiedRequest($this->session->userdata('group_id')))
            	{
            		$this->Participant_Model->updateVerifiedRequest($this->session->userdata('group_id'), $data1);
            	}
            	else
            	{
            		$this->Participant_Model->verifiedRequest($data1);
            	}

            	$this->Mail_Model->mailVerifiedReqSuccessById($this->session->userdata('id'));

            	echo "<script>
                        alert('Permintaan verifikasi akan di proses. Silahkan cek email anda untuk langkah selanjutnya.');
                        window.location.href='../dashboard';
                        </script>";
            	
            }
		}
		else
		{
			echo "<script>
                        alert('Maaf data anda belum lengkap');
                        window.location.href='../dashboard';
                        </script>";
		}

	}

	public function viewUpload()
	{
	 	if(is_null($this->session->userdata('u_token')))
		{
			redirect('login','refresh');
		}
		elseif($this->Participant_Model->checkAuth($this->session->userdata('u_token'))==FALSE)
		{
			session_destroy();
			echo "<script>
					alert('Ada yang menggunakan akun anda.');
					window.location.href='login';
					</script>";
		}
		else if($this->session->userdata('category')=='PROG'||$this->session->userdata('category')=='LCC')
		{
			echo "<script>
					alert('Hanya untuk cabang lomba Desain Web dan Pengembangan Ide Bisnis TIK');
					window.location.href='dashboard';
					</script>";
		}
		else
		{
					
			if($this->session->userdata('category')=='IDEA')
			{
				echo "<script>
							alert('Sistem upload sudah ditutup, sampai jumpa tahun depan :)');
							window.location.href='dashboard';
					   </script>";
			}

			$verified 	= $this->Participant_Model->checkVerif($this->session->userdata('group_id'));

			if($verified=='Y')
			{
				if ($this->session->userdata('category')=='IDEA') {
					
					$data['form'] = 
						'<form action="'.base_url().'Backend/upload" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
						<div class="form-group">
	                        <label class="control-label col-xs-2">File</label>
	                        <div class="col-md-10">
	                            <input name="file" type="file" class="form-control" accept=".rar, .zip">
	                        </div>
	                    </div>
	                    <div class="form-group">
	                        <label class="control-label col-xs-2"></label>
	                        <div class="col-md-10">
	                        	<div class="alert alert-warning" style="margin-bottom:10px !important">
	                        		<small>Apakah anda setuju poster ide bisnis anda dipublikasikan di sosmed ITCC?</small>
	                        		<br>
		                            <label style="font-size:12px"><input type="radio" value="Y" name="checklist" required="required"> Ya </label> 
		                            <label style="font-size:12px"><input type="radio" value="N" name="checklist" required="required"> Tidak</label>
	                        	</div>
	                        </div>
	                    </div>
	                    <div class="form-group">
	                    	<div class="col-md-12">
	                    		<input type="submit" class="btn btn-success btn-sm pull-right" value="Submit">
	                    	</div>
	                    </div>
						</form>';
				}
				else
				{
					$data['form'] = 
						'<form action="'.base_url().'Backend/upload" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
						<input name="checklist" type="hidden">
						<div class="form-group">
	                        <label class="control-label col-xs-2">File</label>
	                        <div class="col-md-10">
	                            <input name="file" type="file" class="form-control" accept=".rar, .zip">
	                        </div>
	                    </div>
	                    <input type="submit" class="btn btn-success btn-sm pull-right" value="Submit">
						</form>';
				}
			}
			else
			{
				$data['form'] = '<div class="alert alert-danger">
                                    <p style="font-weight:bold">Maaf</p>
                                    <p style="text-align: justify;text-justify: inter-word;">
                                    	Silahkan verifikasi terlebih dahulu data anda.
                                    </p>
                                 </div>';
			}

			$this->load->view('upload', $data);
		}
	}

	public function upload()
	{
		if(is_null($this->session->userdata('u_token')))
		{
			redirect('login','refresh');
		}
		elseif($this->Participant_Model->checkAuth($this->session->userdata('u_token'))==FALSE)
		{
			session_destroy();
			echo "<script>
					alert('Ada yang menggunakan akun anda.');
					window.location.href='../login';
					</script>";
		}
		else if($this->session->userdata('category')=='PROG'||$this->session->userdata('category')=='LCC')
		{
			echo "<script>
					alert('Hanya untuk cabang lomba Desain Web dan Pengembangan Ide Bisnis TIK');
					window.location.href='../dashboard';
					</script>";
		}
		else
		{

			$verified 	= $this->Participant_Model->checkVerif($this->session->userdata('group_id'));

			if($verified=='Y')
			{
				$config = array(
	                'upload_path'   => "./fileupload/".$this->session->userdata('category'),
	                'allowed_types' => "rar|zip",
	                'file_name'     => $this->session->userdata('group_id'),
	                'overwrite'     => TRUE
	            );

		        $this->load->library('upload', $config);

		        if (!$this->upload->do_upload('file'))
		        {
		            $error = $this->upload->display_errors();

		            echo "<script>
		                    alert('Pesan error $error');
		                    window.location.href='../upload';
		                    </script>";
		        }
		        else
		        {
		        	$upload_data = $this->upload->data(); 

					$file_name = $upload_data['file_name'];

		  	 		$data = array('group_id' => $this->session->userdata('group_id'),
		  	 					  'upload_at'=> date('Y-m-d H:i:s'),
		  	 					  'checklist'=> $this->input->post('checklist'),
		  	 					  'filename' => $file_name);

		  	 		$this->Participant_Model->upload($data);

		        	echo "<script>
		                    alert('Datamu telah terunggah. Semoga beruntung');
		                    window.location.href='../dashboard';
		                    </script>";
		        	
		        }
			}
			else
			{
				echo "<script>
		                    alert('Silahkan verfikasi terlebih dahulu');
		                    window.location.href='../dashboard';
		                    </script>";
			}
		}
	}

	public function setting()
	{
		if(is_null($this->session->userdata('u_token')))
		{
			redirect('login','refresh');
		}
		elseif($this->Participant_Model->checkAuth($this->session->userdata('u_token'))==FALSE)
		{
			session_destroy();
			echo "<script>
					alert('Ada yang menggunakan akun anda.');
					window.location.href='login';
					</script>";
		}
		else
		{
			$this->load->library('form_validation');

			$config1 = array(
        		
        		array(
                    'field' => 'oldpassword',
                    'label' => 'Kata sandi lama',
                    'rules' => 'required|min_length[5]|max_length[20]|callback_isTruePassword'
                ),
				array(
                    'field' => 'password',
                    'label' => 'Kata sandi baru',
                    'rules' => 'required|min_length[5]|max_length[20]'
                ),
                array(
                    'field' => 'passconf',
                    'label' => 'Konfirmasi kata sandi baru',
                    'rules' => 'required|matches[password]|min_length[5]|max_length[20]'
                )	            
        	);

			$this->form_validation->set_rules($config1);

			$this->form_validation->set_message('required', '<li><b>{field}</b> harus diisi</li>');

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

        		$data = array('errormsg'    => $error);

				$this->load->view('setting', $data);
			}
			else
			{
				     	echo "<script>
                        alert('Kata sandi anda sudah diganti');
                        window.location.href='../dashboard';
                        </script>";
			}
		}
	}

	public function isTruePassword($oldpassword) 
	{

	    $this->load->library('form_validation');

	    $is_exist = $this->Participant_Model->checkPassword($this->session->userdata('u_token'), $oldpassword);

	    if ($is_exist!=true) {

	        $this->form_validation->set_message(
	            'isTruePassword', '<li>Kata sandi lama kamu salah</li>'
	        ); 

	        return false;
	    } 
	    else 
	    {
	        return true;
	    }
	}
}
