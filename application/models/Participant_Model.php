<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Participant_Model extends CI_Model {
	
		public function __construct()
		{
			parent::__construct();

			$this->load->database();

			date_default_timezone_set('Asia/Singapore');
		}

		public function login($username, $password)
		{
			$this->db->select('participant.id, verified_status, group_id, fullname, groupname, institution, category');

			$this->db->from('participant');

			$this->db->join('group', 'group.id = participant.group_id', 'inner');

			$this->db->where('username', $username);

			$this->db->where('password', md5($password));

			return $this->db->get()->row_array();
		}

		public function insertGroup($data)
		{
			$this->db->insert('group', $data);

			return $this->db->insert_id();
		}

		public function insertParticipant($data)
		{
			$this->db->insert('participant', $data);

			return $this->db->insert_id();
		}

		public function deleteParticipant($id)
		{
			$this->db->where('id', $id);
			
			$this->db->delete('participant');
		}
		
		public function deleteGroup($id)
		{
			$this->db->where('id', $id);
			
			$this->db->delete('group');
		}

		public function checkUsername($username)
		{
			$this->db->select('id');

			$this->db->from('participant');

			$this->db->where('username', $username);

			$query = $this->db->get();

			if ($query->num_rows() > 0) 
			{
        		return true;
    		} 
    		else 
    		{
        		return false;
    		}
		}

		public function checkGroupName($name)
		{
			$this->db->select('id');

			$this->db->from('group');

			$this->db->where('groupname', $name);

			$query = $this->db->get();

			if ($query->num_rows() > 0) 
			{
        		return true;
    		} 
    		else 
    		{
        		return false;
    		}
		}

		public function countGroupMembers($id)
		{
			$this->db->where('group_id', $id);

			$this->db->where('active', 'Y');

			$this->db->from('participant');

			return $this->db->count_all_results();
		}

		public function getGroupMembersByGroupId($group_id)
		{
			$this->db->select('id, code, fullname, birthday, email, contact, photo, vegetarian');

			$this->db->from('participant');

			$this->db->where('group_id', $group_id);

			$this->db->where('active', 'Y');

			$query = $this->db->get();
			
			return $query->result();
		}

		public function getGroupMemberById($id)
		{
			$this->db->select('id, group_id, code, fullname, birthday, email, contact');

			$this->db->from('participant');

			$this->db->where('id', $id);

			return $this->db->get()->row_array();
		}

		public function checkAuth($token)
		{
			$this->db->select('id');

			$this->db->from('participant');

			$this->db->where('on', 'Y');

			$this->db->where('u_token', $token);

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

		public function checkAuthMember($group_id, $token)
		{
			$this->db->select('id');

			$this->db->from('participant');

			$this->db->where('group_id', $group_id);

			$this->db->where('u_token', $token);

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

		public function setAuth($id)
		{
			$token = $id.date('Y-m-d H:i:s');

			$data = array('on' => 'Y', 'u_token'=> md5($token), 'last_login_at'=> date('Y-m-d H:i:s'));

			$this->db->where('id', $id);

			$this->db->update('participant', $data);

			return md5($token);
		}

		public function destroyAuth($token)
		{
			$this->db->where('u_token', $token);

			$this->db->update('participant', array('u_token' => NULL, 'on'=>'N'));
		}

		public function checkVerif($group_id)
		{
			$this->db->select('verified_status');

			$this->db->from('group');

			$this->db->where('id', $group_id);

			$result = $this->db->get()->row();

			return $result->verified_status;
		}

		public function updateMember($id, $data)
		{
			$this->db->where('id', $id);

			$this->db->update('participant', $data);
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

		public function verifiedRequest($data)
		{
			$this->db->insert('verified_req', $data);
		}

		public function checkVerifiedRequest($group_id)
		{
			$this->db->select('id');

			$this->db->from('verified_req');

			$this->db->where('group_id', $group_id);

			$query = $this->db->get();

			if ($query->num_rows() >0) 
			{
        		return true;
    		} 
    		else 
    		{
        		return false;
    		}
		}

		public function updateVerifiedRequest($group_id, $data)
		{
			$this->db->where('group_id', $group_id);

			$this->db->update('verified_req', $data);
		}

		public function checkPassword($u_token, $password)
		{
			$this->db->select('id');

			$this->db->from('participant');

			$this->db->where('u_token', $u_token);

			$this->db->where('password', md5($password));

			$query = $this->db->get();

			if ($query->num_rows() > 0) 
			{
        		return true;
    		} 
    		else 
    		{
        		return false;
    		}
		}

		public function upload($data)
		{
			$this->db->insert('upload_logs', $data);
		}
	}
	
	/* End of file Participant_Model.php */
	/* Location: ./application/models/Participant_Model.php */
?>