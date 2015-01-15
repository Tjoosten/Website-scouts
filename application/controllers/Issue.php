<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

  /**
   * Issue reporter (Webplatfrom => GitHub)
   *
   * @author Tim Joosten
   * @copyright Closed License, Tim Joosten
   * @package Website 
   */

  class Issue extends CI_Controller {
    public $Session = array();

    /**
     * Constructor for Issues.
     */
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
        redirect($this->config->item('Redirect','Not_logged_in'));
      }
    }
  }
