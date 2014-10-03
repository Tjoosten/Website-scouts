<?php
Class User extends CI_Model {
	function login($username, $password) {
		$this->db->select('id, username, password, Admin_role, Tak, Theme')
				 ->from('users')
				 ->where('username = ' . "'" . $username . "'")
				 ->where('password = ' . "'" . MD5($password) . "'")
				 ->where('Blocked', '0')
				 ->limit(1);

		$query = $this->db->get();

		if($query -> num_rows() == 1) {
			return $query->result();
		} else {
			return false;
		}

	}
}