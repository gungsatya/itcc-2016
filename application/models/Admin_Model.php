<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Admin_Model extends CI_Model {
	
		public function __construct()
		{
			parent::__construct();

			$this->load->database();

			date_default_timezone_set('Asia/Singapore');
		}

		public function login($username, $password)
		{
			$this->db->select('id, fullname, category, privilege');

			$this->db->from('admin');

			$this->db->where('username', $username);

			$this->db->where('password', md5($password));

			return $this->db->get()->row_array();
		}

		public function setAuth($id)
		{
			$token = $id.date('Y-m-d H:i:s').'admin';

			$data = array('a_token'=> md5($token), 'last_login_at'=> date('Y-m-d H:i:s'));

			$this->db->where('id', $id);

			$this->db->update('admin', $data);

			return md5($token);
		}
		
		public function destroyAuth($token)
		{
			$this->db->where('a_token', $token);

			$this->db->update('admin', array('a_token' => NULL));
		}

		public function checkAuth($token)
		{
			$this->db->select('*');

			$this->db->from('admin');

			$this->db->where('a_token', $token);

			$query = $this->db->get();

			if ($query->num_rows() == 1) 
			{
        		return true;
    		} 
    		else 
    		{
        		return false;
    		}
		}

		public function getParticipantByCategory($category)
		{
			$this->db->select('participant.id, code, groupname, institution, fullname, email, contact, verified_status, vegetarian');

			$this->db->from('participant');

			$this->db->join('group', 'group.id = participant.group_id', 'inner');

			$this->db->where('category', $category);

			$this->db->where('active', 'Y');

			return $this->db->get()->result();
		}

		public function countParticipantsByCategory($category)
		{
			$this->db->where('category', $category);

			$this->db->where('active', 'Y');

			$this->db->from('participant');

			$this->db->join('group', 'group.id = participant.group_id', 'inner');

			return $this->db->count_all_results();
		}

		public function countVerifiedGroupByCategory($category)
		{
			$this->db->where('category', $category);

			$this->db->where('verified_status', 'Y');

			$this->db->from('group');

			return $this->db->count_all_results();
		}

		public function countUnverifiedGroupByCategory($category)
		{
			$this->db->where('category', $category);

			$this->db->where('verified_status', 'N');

			$this->db->from('group');

			return $this->db->count_all_results();
		}

		public function getUploadLogsByCategory($category)
		{
			$this->db->select('code, filename, groupname, fullname, institution, email, contact, max(upload_at) as `upload_at`');

			$this->db->from('group');

			$this->db->join('upload_logs', 'group.id = upload_logs.group_id', 'left');

			$this->db->join('participant', 'participant.group_id = group.id', 'inner');

			$this->db->where('category', $category);

			$this->db->where('active', 'Y');

			$this->db->group_by('group.id');

			return $this->db->get()->result();
		}

		public function getVerifiedRequestByCategory($category)
		{
			$this->db->select('group_id, groupname, institution, max(request_at) as `request_at`, note, filename');

			$this->db->from('verified_req');

			$this->db->join('group', 'group.id = verified_req.group_id', 'left');

			$this->db->where('category', $category);

			$this->db->where('verified_status', 'N');

			$this->db->group_by('group.id');

			$this->db->order_by('request_at', 'desc');

			return $this->db->get()->result();
		}

		public function getGroupMembersById($group_id)
		{
			$this->db->select('id, code, fullname, birthday, email, contact, photo');

			$this->db->from('participant');

			$this->db->where('group_id', $group_id);

			$this->db->where('active', 'Y');

			$query = $this->db->get();
			
			return $query->result();
		}

		public function getGroupMemberById($id)
		{
			$this->db->select('id, group_id, code, fullname, birthday, email, contact, photo');

			$this->db->from('participant');

			$this->db->where('id', $id);

			return $this->db->get()->row_array();
		}


		public function verifyingGroupByGroupId($group_id, $admin_id)
		{
			$data = array(	'verified_status' 	=> 'Y',
							'verified_at'		=>  date('Y-m-d H:i:s'),
							'verifying_admin'	=> $admin_id);

			$this->db->where('id', $group_id);

			$this->db->update('group', $data);
		}

		public function verifyingParticipantById($participant_id, $category)
		{
			$this->db->from('participant');

			$this->db->like('code', $category, 'both');

			$tmp 	= $this->db->count_all_results();

			$tmp 	= (int)$tmp + 1;

			$code 	= "ITCC-".$category."-".(string)$tmp;

			$this->db->where('id', $participant_id);

			$this->db->update('participant', array('code' => $code));
		}

		public function getGroupLeader($group_id)
		{
			$this->db->select('id');

			$this->db->from('participant');

			$this->db->where('group_id', $group_id);

			$this->db->where('username !=', NULL);

			$this->db->where('password !=', NULL);

			$result = $this->db->get()->row();

			return $result->id;
		}
	}
	
	/* End of file Admin_Model.php */
	/* Location: ./application/models/Admin_Model.php */
?>