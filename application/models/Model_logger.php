<?php
  Class Model_logger extends CI_Model {
    function Insert($Filepath) {
      $Values = array(
        'Date'     => date("Y/m/d"),
        'Month'    => date('m'),
        'Log_file' => $Filepath,
      );

      $this->db->insert('Log_archive', $Values);
    }
  }
