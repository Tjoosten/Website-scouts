<?php
  class Model_leiding extends CI_Model {
    function Leiding_insert() {
      $Values = array(
        "Naam" => $this->input->post('Naam'),
        "Mail" => $this->input->post('Mail'),
        "GSM" => $this->input->post('GSM'),
        "Tak" => $this->input->post('Tak'),
        "Admin_role" => "0",
        "Blocked" => "0",
        "Pass" => md5('root'),
      );
      
      $this->db->insert('users', $Values);
    }
    
    function Leiding_Block() {
      $Value = array(
        "Blocked" => "1";
      );
    
      $this->db->where("id", $this->uri->segment(3))
               ->update("users", $Value);
    }
    
    function Leiding_Unblock() {
      $Value = array(
        "Blocked" => "0",
      );
    
      $this->db->where('id', $this->uri->segemnt(3))
               ->update("users", $Value);
    }
    
    function Leiding_Promote() {
      $Value = array(
        "Admin_role" => "1",
      );
      
      $this->db->where("id", $this->uri->segment(3))
               ->update("users", $Value);
    }
    
    function Leiding_Degradate() {
      $Value = array(
        "Admin_role" => "0";
      );
      
      $this->db->where("id", $this->uri->segment(3))
               ->update("users", $Value);
    }
  }
