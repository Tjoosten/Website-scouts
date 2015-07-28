<?php
Class User extends CI_Model {
	function login($username, $password) {
		$this->db->select('*')
				 ->from('users')
				 ->where('Mail = ' . "'" . $username . "'")
				 ->where('password = ' . "'" . MD5($password) . "'")
				 ->where('Blocked', '0')
				 ->limit(1);

		$query = $this->db->get();

		if($query->num_rows() == 1) {
			return $query->result();
		} else {
			return false;
		}

	}

	function reset_pass() {
		$this->db->select('*')
				 ->from('users')
				 ->where('Mail', $this->input->post('recovery'));

		$Query = $this->db->get();
		return $Query->result();
	}

	function insert_new($New) {
		$Values = array(
			"password" => md5($New['New']),
		);

		$this->db->where('Mail', $this->input->post('recovery'))
				 ->update('users', $Values);
	}

	public function permissions($user_id)
	{
		$this->db->select('*')
			->from('Permissions')
			->where('user_id', $user_id);

		$query = $this->db->get();

		if($query->num_rows() == 1) {
			return $query->result();
		} else {
			return false;
		}
	}
}
