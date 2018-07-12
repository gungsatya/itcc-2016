<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Jury_Model extends CI_Model {
	
		public function __construct()
		{
			parent::__construct();

			$this->load->database();

			date_default_timezone_set('Asia/Singapore');
		}

		public function login($username, $password)
		{
			$this->db->select('id, fullname, category');

			$this->db->from('jury');

			$this->db->where('username', $username);

			$this->db->where('password', md5($password));

			return $this->db->get()->row_array();
		}

		public function setAuth($id)
		{
			$token = $id.date('Y-m-d H:i:s').'jury';

			$data = array('j_token'=> md5($token), 'login_at'=> date('Y-m-d H:i:s'));

			$this->db->where('id', $id);

			$this->db->update('jury', $data);

			return md5($token);
		}
		
		public function destroyAuth($token)
		{
			$this->db->where('j_token', $token);

			$this->db->update('jury', array('j_token' => NULL));
		}

		public function checkAuth($token)
		{
			$this->db->select('*');

			$this->db->from('jury');

			$this->db->where('j_token', $token);

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

		public function getObjectsByCategory($jury_id, $category)
		{
			$this->db->select('object.id, groupname, institution, title');

			$this->db->from('object');

			$this->db->join('group', 'group.id = object.group_id', 'left');

			$objects = $this->db->get()->result();
			
			foreach ($objects as $key => $object) 
			{
				$objects[$key]->score 			= $this->checkScore($jury_id, $object->id);

				$maxid = $this->maxScoreId($this->session->userdata('id'), $object->id);

				$objects[$key]->score_details 	= $this->getScoreListDetailById($maxid);
			}
			
			return $objects;
		}

		public function checkScore($jury_id, $object_id)
		{
			$this->db->select('max(id)');

			$this->db->from('score_list');

			$this->db->where('jury_id', $jury_id);

			$this->db->where('object_id', $object_id);

			$data = $this->db->get()->row_array();

			$id = $data['max(id)'];
			
			$this->db->select('sum(score)');

			$this->db->from('detail_score_list');

			$this->db->where('score_list_id', $id);

			$result = $this->db->get()->row_array();

			return $result['sum(score)'];
		}

		public function getObjectById($id)
		{
			$this->db->select('group_id, title, link, etc');

			$this->db->from('object');

			$this->db->where('object.id', $id);

			return $this->db->get()->row_array();
		}

		public function getGroupMembersByGroupId($group_id)
		{
			$this->db->select('code, fullname');

			$this->db->from('participant');

			$this->db->where('group_id', $group_id);

			$this->db->where('active', 'Y');

			$query = $this->db->get();
			
			return $query->result();
		}

		public function getGroupInfoById($id)
		{
			$this->db->select('groupname, institution, category');

			$this->db->from('group');

			$this->db->where('id', $id);

			return $this->db->get()->row_array();
		}

		public function insertScoreList($jury_id, $object_id, $ip)
		{
			$data = array(
				'jury_id' 		=> $jury_id, 
				'object_id'		=> $object_id,
				'ip'			=> $ip,
				'scored_at'		=> date('Y-m-d H:i:s')
			);

			$this->db->insert('score_list', $data);

			return $this->db->insert_id();
		}

		public function insertScoreListDetail($score_list_id, $part, $score)
		{
			$data = array('score_list_id' => $score_list_id, 'part'=>$part, 'score'=>$score);

			$this->db->insert('detail_score_list', $data);
		}

		public function maxScoreId($jury_id, $object_id)
		{
			$this->db->select('max(id)');

			$this->db->from('score_list');

			$this->db->where('jury_id', $jury_id);

			$this->db->where('object_id', $object_id);

			$data = $this->db->get()->row_array();

			$id = $data['max(id)'];

			return $id;
		}

		public function getScoreListDetailById($score_list_id)
		{
			$this->db->select('*');

			$this->db->from('detail_score_list');

			$this->db->where('score_list_id', $score_list_id);

			$objects = $this->db->get()->result();

			if (empty($objects)) 
			{
				for ($i='a'; $i <'u' ; $i++) 
				{ 
					$result[$i] = null;
				}
			}
			else
			{
				foreach ($objects as $key => $object) 
				{
					$result[$object->part] = $objects[$key]->score;
				}
			}
			
			return $result;
		}

	}
	
	/* End of file Admin_Model.php */
	/* Location: ./application/models/Admin_Model.php */
?>