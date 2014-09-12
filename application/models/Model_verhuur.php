<?php 
  class Model_verhuur extends CI_model {
    function Insert_verhuur() {
      $Values = array(
          "Start_datum" => $this->input->post('Start_datum'),
          "Eind_datum" => $this->input->post('Eind_datum'),
          "Groep" => $this->input->post('Groep'),
          "Notitie" => $this->input->post('Notitie'),
        );
      
      $this->db->insert('Verhuur_data', $Values);
      
      // Redirect to list
      redirect('verhuur');
    }
    
    function Delete_verhuur() {
      $Value = array(
        );
    }
    
    function Verhuur_Bevestigd() {
      $this->db->select()
               ->where('Status', 'Bevestigd')
               ->order_by('Start_datum', 'ASC');
      
      $Query = $this->db->get('Verhuur_data');
      return $Query->result();
    }
    
    function Verhuur_Optie() {
      $this->db->select()
               ->where('Status', 'Optie')
               ->order_by('Start_datum', 'ASC');
      
      $Query = $this->db->get('Verhuur_data');
      return $Query->result();
    }
  }
