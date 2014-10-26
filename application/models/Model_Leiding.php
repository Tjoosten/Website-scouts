<?php
  class Model_leiding extends CI_Model {

    /*
     | Developer: Tim Joosten
     | Licence: 4GPL
     | Copyright: Sint-Joris Turnhout, Tim Joosten
     */

     function ploeg() {
        $this->db->select();

        $Query = $this->db->get('users');
        return $Query->result();
     }

    function Leiding_insert() {
      $Values = array(
        "username" => $this->input->post('Naam'),
        "Mail" => $this->input->post('Mail'),
        "GSM" => $this->input->post('GSM'),
        "Tak" => $this->input->post('Tak'),
        "Admin_role" => "0",
        "Blocked" => "0",
				"Theme" => "0",
        "password" => md5('root'),
      );
      
      $this->db->insert('users', $Values);
    }
    
    function Administrators() {
      $this->db->select()
               ->where('Admin_role','1');

      $Query = $this->db->get('users');
      return $Query->result();
    }

    function Leiding() {
      $this->db->select()
               ->where_not_in('Tak','6');

      $Query = $this->db->get('users');
      return $Query->result();
    }
		
		function Account() {
			$this->db->select()
				       ->where('username', $this->uri->segment(3));
			
			$Query = $this->db->get('users');
			return $Query->result(); 
		}
		
	 function Settings_edit() {
			$Pass = $this->input->post('Pass');

				if(!empty($Pass)) {
					 $Values = array(
            "Mail"  => $this->input->post('Email'),
            "GSM"   => $this->input->post('GSM'),
            "password" => md5($this->input->post('Pass')),
            "Theme" => $this->input->post('Theme'),
            );
				  } else {
            $Values = array(
              "Mail"     => $this->input->post('Email'),
              "GSM"      => $this->input->post('GSM'),
              "Theme"    => $this->input->post('Theme'),
            );
				  }
	   
			$this->db->where('id', $this->uri->segment(3))
				       ->update("users", $Values);
		}

    function Leiding_Block() {
      $Value = array(
        "Blocked" => "1",
      );
    
      $this->db->where("id", $this->uri->segment(3))
               ->update("users", $Value);
    }
    
    function Leiding_Unblock() {
      $Value = array(
        "Blocked" => "0",
      );
    
      $this->db->where('id', $this->uri->segment(3))
               ->update("users", $Value);
    }
    
    function Leiding_upgrade() {
			$Session = $this->session->userdata('logged_in');
			
      $Value = array(
        "Admin_role" => "1",
      );
			
			$Values = array(
				"User"  => $Session['username'],
				"Email" => $Session['Email'],
				"Verhuur" => "0",
			);
      
      $this->db->where("id", $this->uri->segment(3))
               ->update("users", $Value);
			
			$this->db->insert('Notifications', $Values);
    }
    
    function Leiding_downgrade() {
      $Value = array(
        "Admin_role" => "0",
      );
      
      $this->db->where("id", $this->uri->segment(3))
               ->update("users", $Value);
    }

    function Leiding_delete() {
      $this->db->where('id', $this->uri->segment(3))
               ->delete('users'); 
    }
  }
