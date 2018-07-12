<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Mail_Model extends CI_Model {
	
		public function __construct()
		{
			parent::__construct();

			$this->load->database();

			date_default_timezone_set('Asia/Singapore');
		}

		public function mailSignUpSuccessById($id)
		{
			$message = "<html>
					<head>
						<title>Pendaftaran Sukses!</title>
					</head>
					<body>
						<center>
						<img src='https://itcc.unud.ac.id/assets/images/logo2.png' width='100' height='auto' title='Logo ITCC 2016'> 
						</center>
						<br>
						<p>Dear <b>@fullname</b>.</p>
						<br>
						<p align='justify' style='line-height:125%;font-size:13px;'>Selamat anda telah terdaftar sebagai peserta ITCC 2016 kategori <b>@category</b>. Silahkan melakukan login pada halaman <a href='https://itcc.unud.ac.id/login'>https://itcc.unud.ac.id/login</a>. Lengkapi data tim pada halaman dashboard sebelum diverifikasi.</p>
						<br>
						<p align='justify' style='line-height:125%;font-size:13px;'>Salam Hangat, Panitia ITCC 2016.</p>
						<small> Jika ada yang belum jelas, tanyakan kami di https://itcc.unud.ac.id/faq.</small><br>
						<small> Facebook : <a href='https://www.facebook.com/ITCC.Udayana'>ITCC Udayana</a>.</small><br>
						<small> Twitter  : <a href='https://twitter.com/ITCCUdayana'>@ITCCUdayana</a>.</small>
					</body>
				</html>";

			$this->db->select('fullname, email, category');

			$this->db->from('participant');

			$this->db->join('group', 'group_id = group.id', 'left');

			$this->db->where('participant.id', $id);

			$participant = $this->db->get()->row_array();

			$to      	= $participant['email'];
			
			$subject 	= "Pendaftaran Sukses!";

			$message = str_replace("@fullname", $participant['fullname'], $message);

			if($participant['category']=="PROG") 
			{
				$message = str_replace("@category", "Pemrograman", $message);
			}
			elseif($participant['category']=="WEB")
			{
				$message = str_replace("@category", "Desain Web", $message);
			}
			elseif($participant['category']=="LCC")
			{
				$message = str_replace("@category", "Cerdas Cermat", $message);
			}
			elseif($participant['category']=="IDEA")
			{
				$message = str_replace("@category", "Pengembangan Ide Bisnis TIK", $message);
			}   

			$config = Array(
			    'protocol' => 'smtp',
			    'smtp_host' => 'ssl://smtp.googlemail.com',
			    'smtp_port' => 465,
			    'smtp_user' => 'itcc.noreply@gmail.com',
			    'smtp_pass' => 'ITCCudayana',
			    'mailtype'  => 'html', 
			    'charset'   => 'iso-8859-1'
			);
			$this->load->library('email', $config);
			$this->email->set_newline("\r\n");
			
			$this->email->from('itcc.noreply@gmail.com', 'ITCC 2016 [No Reply] - Pendaftaran Sukses!');
			$this->email->to($to);
			
			$this->email->subject($subject);
			$this->email->message($message);
			
			$result = $this->email->send();
			echo $this->email->print_debugger();

		}

		public function mailVerifiedReqSuccessById($id)
		{

			$this->db->select('fullname, email, category, group_id, institution');

			$this->db->from('participant');

			$this->db->join('group', 'group_id = group.id', 'left');

			$this->db->where('participant.id', $id);

			$participant = $this->db->get()->row_array();

			$to      	= $participant['email'];
			
			$subject 	= "Proses Verifikasi";

			$message = "<html>
					<head>
						<title>Proses Verifikasi Data</title>
					</head>
					<body>
						<center>
						<img src='https://itcc.unud.ac.id/assets/images/logo2.png' width='100' height='auto' title='Logo ITCC 2016'> 
						</center>
						<br>
						<p>Dear <b>@fullname</b>.</p>
						<br>
						<p align='justify' style='line-height:125%;font-size:13px;'>Terima kasih sudah melengkapi data-data dan melakukan pembayaran. Permintaan verifikasi anda sedang kami proses.</p>

						<p align='justify' style='line-height:125%;font-size:13px;'>
							Berikut adalah data-data yang anda masukkan.
							<br>
							<table style='margin:15px;'>
								<tbody>
									<tr>
										<td>Asal institusi </td>
										<td>: </td>
										<td><b>@institution</b>.</td>
									</tr>
									<tr>
										<td>Kategori lomba </td>
										<td>: </td>
										<td><b>@category</b>.</td>
									</tr>
								</tbody>
							</table>
						</p>
						@table
						<br>
						<p align='justify' style='line-height:125%;font-size:13px;'>Salam Hangat, Panitia ITCC 2016.</p>
						<small> Jika ada yang belum jelas, tanyakan kami di https://itcc.unud.ac.id/faq.</small><br>
						<small> Facebook : <a href='https://www.facebook.com/ITCC.Udayana'>ITCC Udayana</a>.</small><br>
						<small> Twitter  : <a href='https://twitter.com/ITCCUdayana'>@ITCCUdayana</a>.</small>
					</body>
				</html>";

			$this->db->select('fullname, birthday, contact, email, vegetarian');

			$this->db->from('participant');

			$this->db->where('group_id', $participant['group_id']);

			$members = $this->db->get()->result();

			$table = "
				<table style='margin:15px;border-collapse: collapse;border: 1px solid black;padding:5px;'>
					<thead>
						<tr>
							<th style='border: 1px solid black;padding:5px;'>Nama</th>
							<th style='border: 1px solid black;padding:5px;'>Tanggal Lahir</th>
							<th style='border: 1px solid black;padding:5px;'>No. Kontak</th>
							<th style='border: 1px solid black;padding:5px;'>Email</th>
							<th style='border: 1px solid black;padding:5px;'>Veget</th>
						</tr>
					</thead>
					<tbody>
			";

			foreach ($members as $member) {
				$table.="<tr>";
					$table.="<td style='border: 1px solid black;padding:5px;'>";
						$table.=$member->fullname;
					$table.="</td>";
					$table.="<td style='border: 1px solid black;padding:5px;'>";
						$table.=$member->birthday;
					$table.="</td>";
					$table.="<td style='border: 1px solid black;padding:5px;'>";
						$table.=$member->contact;
					$table.="</td>";
					$table.="<td style='border: 1px solid black;padding:5px;'>";
						$table.=$member->email;
					$table.="</td>";
					$table.="<td style='border: 1px solid black;padding:5px;'>";
						if($member->vegetarian=='Y')
						{
							$table.="Ya";
						}
						else
						{
							$table.="Tidak";
						}
					$table.="</td>";
				$table.="</tr>";
			}

			$table.="
					</tbody>
				</table>
			";

			$message = str_replace("@fullname", $participant['fullname'], $message);

			$message = str_replace("@institution", $participant['institution'], $message);

			$message = str_replace("@table", $table, $message);

			if($participant['category']=="PROG") 
			{
				$message = str_replace("@category", "Pemrograman", $message);
			}
			elseif($participant['category']=="WEB")
			{
				$message = str_replace("@category", "Desain Web", $message);
			}
			elseif($participant['category']=="LCC")
			{
				$message = str_replace("@category", "Cerdas Cermat", $message);
			}
			elseif($participant['category']=="IDEA")
			{
				$message = str_replace("@category", "Pengembangan Ide Bisnis TIK", $message);
			}   

			$config = Array(
			    'protocol' => 'smtp',
			    'smtp_host' => 'ssl://smtp.googlemail.com',
			    'smtp_port' => 465,
			    'smtp_user' => 'itcc.noreply@gmail.com',
			    'smtp_pass' => 'ITCCudayana',
			    'mailtype'  => 'html', 
			    'charset'   => 'iso-8859-1'
			);
			$this->load->library('email', $config);
			$this->email->set_newline("\r\n");
			
			$this->email->from('itcc.noreply@gmail.com', 'ITCC 2016 [No Reply] - Proses Verifikasi Data');
			$this->email->to($to);
			
			$this->email->subject($subject);
			$this->email->message($message);
			
			$result = $this->email->send();
			echo $this->email->print_debugger();

		}

		public function mailVerifiedSuccessById($id)
		{
			$message = "<html>
					<head>
						<title>Terverifikasi!</title>
					</head>
					<body>
						<center>
						<img src='https://itcc.unud.ac.id/assets/images/logo2.png' width='100' height='auto' title='Logo ITCC 2016'> 
						</center>
						<br>
						<p>Dear <b>@fullname</b>.</p>
						<br>
						<p align='justify' style='line-height:125%;font-size:13px;'>Selamat anda telah terverifikasi sebagai peserta ITCC 2016 kategori <b>@category</b>. Semangat dan semoga sukses.</p>
						<br>
						<p align='justify' style='line-height:125%;font-size:13px;'>Salam Hangat, Panitia ITCC 2016.</p>
						<small> Jika ada yang belum jelas, tanyakan kami di https://itcc.unud.ac.id/faq.</small><br>
						<small> Facebook : <a href='https://www.facebook.com/ITCC.Udayana'>ITCC Udayana</a>.</small><br>
						<small> Twitter  : <a href='https://twitter.com/ITCCUdayana'>@ITCCUdayana</a>.</small>
					</body>
				</html>";

			$this->db->select('fullname, email, category');

			$this->db->from('participant');

			$this->db->join('group', 'group_id = group.id', 'left');

			$this->db->where('participant.id', $id);

			$participant = $this->db->get()->row_array();

			$to      	= $participant['email'];
			
			$subject 	= "Pendaftaran Sukses!";

			$message = str_replace("@fullname", $participant['fullname'], $message);

			if($participant['category']=="PROG") 
			{
				$message = str_replace("@category", "Pemrograman", $message);
			}
			elseif($participant['category']=="WEB")
			{
				$message = str_replace("@category", "Desain Web", $message);
			}
			elseif($participant['category']=="LCC")
			{
				$message = str_replace("@category", "Cerdas Cermat", $message);
			}
			elseif($participant['category']=="IDEA")
			{
				$message = str_replace("@category", "Pengembangan Ide Bisnis TIK", $message);
			}   

			$config = Array(
			    'protocol' => 'smtp',
			    'smtp_host' => 'ssl://smtp.googlemail.com',
			    'smtp_port' => 465,
			    'smtp_user' => 'itcc.noreply@gmail.com',
			    'smtp_pass' => 'ITCCudayana',
			    'mailtype'  => 'html', 
			    'charset'   => 'iso-8859-1'
			);
			$this->load->library('email', $config);
			$this->email->set_newline("\r\n");
			
			$this->email->from('itcc.noreply@gmail.com', 'ITCC 2016 [No Reply] - Terverifikasi!');
			$this->email->to($to);
			
			$this->email->subject($subject);
			$this->email->message($message);
			
			$result = $this->email->send();
			echo $this->email->print_debugger();

		}
	}
	

?>