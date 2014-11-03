<?php 
	Class Model_notifications extends CI_Model {
		function Get_user() {
			$this->db->select()
					 ->where("Email",);

			$Query = $this->db->get('Notifications'); 
			return $Query->result();
		}
	}