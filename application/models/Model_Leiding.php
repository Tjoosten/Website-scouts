<?php
  class Model_leiding extends CI_Model {

    /*
     | Developer: Tim Joosten
     | Licence: 4GPL
     | Copyright: Sint-Joris Turnhout, Tim Joosten
     */

    function Leiding_insert() {
      $Values = array(
        "username" => $this->input->post('Naam'),
        "Mail" => $this->input->post('Mail'),
        "GSM" => $this->input->post('GSM'),
        "Tak" => $this->input->post('Tak'),
        "Admin_role" => "0",
        "Blocked" => "0",
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
      $Value = array(
        "Admin_role" => "1",
      );
      
      $this->db->where("id", $this->uri->segment(3))
               ->update("users", $Value);
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
