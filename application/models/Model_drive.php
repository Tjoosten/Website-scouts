<?php

  Class Model_drive extends CI_Model {
    public function Insert($file = array()) {
      $data = array(
        'Naam'           => $this->input->post('Naam'),
        'file_name'      => $file['file_name'],
        'file_path'      => "/Drive/".$file['file_name'],
        'file_extension' => $file['file_ext'],
        'file_size'      => $file['file_size'],
      );

      $this->db->insert('Drive', $data);
    }

    public function Files() {
      $this->db->select('*')
               ->from('Drive');

      $Query = $this->db->get();
      return $Query->result();
    }
  }
