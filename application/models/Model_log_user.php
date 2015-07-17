<?php
  Class Model_log_user extends CI_Model {
    public function Get() {
      $this->db->select('*')
               ->where('Date' , date('d/m/Y'))
               ->from('User_logs');

      $Query = $this->db->get();
      return $Query->result();
    }

    public function Search() {
      $this->db->select('*')
               ->where('User', $this->input->post('Term'))
               ->from('User_logs');

      $Query = $this->db->get();
      return $Query->result();
    }

    public function Insert($user, $message) {
      $Values = array(
        'Date'    => date('d/m/Y'),
        'Time'    => date("h:i:sa"),
        'User'    => $user,
        'Message' => $message,
      );

      $this->db->insert('User_logs', $Values);
    }
  }
