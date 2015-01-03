<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Issue extends CI_Controller {
  public $Session = array();

  function __construct() {
    parent::__construct();
    $this->Session = $this->session->userdata('logged_in');
  }

  public function Index() {
    if($this->Session) {
      $Data = array(
        'Title' => 'Rapporteer een fout!',
        'Active' => '145',
      );

      $this->load->view('components/admin_header', $Data);
      $this->load->view('components/navbar_admin');
      $this->load->view('admin/issue');
      $this->load->view('components/footer');
    } else {
      redirect('/');
    }
  }
}
