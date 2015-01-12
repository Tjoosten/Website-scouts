<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class leiding extends CI_Controller {

  /**
   * @author: Tim Joosten
   * @copyright: Closed License, Tim Joosten
   * @package: Scouts website (http://www.st-joris-turnhout.be)
   */

  // Constructor
  public $Session       = array();
  public $Error_message = array();
  public $Error_heading = array();
  public $Redirect

  function __construct() {
    parent::__construct();
    $this->load->model('Model_leiding', 'Leiding');
    $this->load->model('Model_log', 'Log');
    $this->load->library(array('email'));
		$this->load->helper(array('email','string'));

    $this->Session = $this->session->userdata('logged_in');
    $this->Error_heading = "No permission";
    $this->Error_message = "U hebt geen rechten om deze handeling uit te voeren";

    $this->Redirect = $this->config->item('Redirect', 'Not_logged_in');
  }
  // END Constructor

  function Leidingsploeg() {
    $Data = array(
      'Title'  => 'Leidingsploeg',
      'Active' => '1',
      // Database variables
      'ploeg'  => $this->Leiding->ploeg(),
    );

    $this->load->view('components/header', $Data);
    $this->load->view('components/navbar', $Data);
    $this->load->view('client/leidingsploeg', $Data);
    $this->load->view('components/footer');
  }

  function index() {
    if($this->Session)  {
      if($this->Session['Admin'] == 1) {
        $data = array(
          // General variables
          'Title'  => 'Leiding',
          'Active' => '6',

          // Database variables
          'Admin'   => $this->Leiding->Administrators(),
          'Leiding' => $this->Leiding->Leiding(),
        );

        $this->load->view('components/admin_header', $data);
        $this->load->view('components/navbar_admin', $data);
        $this->load->view('admin/leiding', $data);
        $this->load->view('components/footer');
      } else {
        $this->load->view('alerts/no_permission');
      }
    } else {
      redirect($this->Redirect, 'refresh');
	  }
  }

	function Settings() {
		if($this->Session) {
			// General variables
			$data['Title'] =  "Account configuratie";
			$data['Active'] = "7";

			// Database variables. Not an array because it is one item.
			$DB['Account'] = $this->Leiding->Account();

			$this->load->view('components/admin_header', $data);
			$this->load->view('components/navbar_admin', $data);
			$this->load->view('admin/settings', $DB);
			$this->load->view('components/footer');
		} else {
			redirect($this->Redirect, 'Refresh');
		}
	}

  // Database functies
	function Settings_edit() {
		if($this->Session) {
			// Old Session
			$Session = $this->session->userdata('logged_in');

      // Dun'no where i used this variables.
      // I was drunk when i writing those variables.
			$data['id']    = $Session['id'];
			$data['Admin'] = $Session['Admin'];
			$data['User']  = $Session['username'];
			$data['Tak']   = $Session['Tak'];
			$data['Theme'] = $Session['Theme'];

			// New database
			$Update = array(
				"id"       => $data['id'],
				"Admin"    => $data['Admin'],
				"username" => $data['User'],
				"Tak"      => $data['Tak'],
				"Theme"    => $this->input->post('Theme'),
			);

			$this->session->set_userdata('logged_in', $Update);

			// Write to database
			$this->Leiding->Settings_edit();
			redirect('Leiding/Settings', 'Refresh');
		} else {
			redirect($this->Redirect, 'Refresh');
		}
	}

  function Insert_leiding() {
    if($this->Session) {
      // Mail variables
      $MAil = array(
        'Mail' => $this->input->post('Mail'),
        'Pass' => random_string('alnum', 16),
        'Name' => $this->input->post('Naam'),
      );

      $Mail_view    = $this->load->view('email/login', $Mail , TRUE);

			// Email the new user
			$this->email->from('Webmaster@st-joris-turnhout.be', 'Webmaster');
			$this->email->to($this->input->post('Mail'));
			$this->email->subject('Login gegevens');
			$this->email->message($Mail_view);
      $this->email->set_mailtype('html');
			$this->email->send();

			// Database Handlings
			$this->Log->Created_login();
      $this->Leiding->Leiding_insert($Mail);
      redirect('leiding');
    } else {
      redirect($this->Redirect, 'refresh');
    }
  }

  function Leiding_block() {
    if($this->Session) {
      if($this->Session['Admin'] == 1) {
        $this->Leiding->Leiding_Block();
			  $this->Log->block();
        redirect('leiding');
      } else {
        $this->load->view('alerts/no_permission');
      }
    } else {
      redirect($this->Redirect, 'refresh');
    }
  }

  function Leiding_unblock() {
    if($this->Session) {
      if($this->Session['Admin'] == 1) {
        $this->Leiding->Leiding_unblock();
			  $this->Log->Log_Unblock();
        redirect('leiding');
      } else {
        $this->load->view('alerts/no_permission');
      }
    } else {
      redirect($this->Redirect, 'refresh');
    }
  }

  function Leiding_upgrade() {
    if($this->Session) {
      if($this->Session['Admin'] == 1) {
        $Leiding = $this->Leiding->Get_user();

        foreach($Leiding as $Output) {
          $Mailing = array(
            'Naam'  => $Output->username,
            'Email' => $Output->Mail,
          );
        }

			  $this->Log->Add_admin();
        $this->Leiding->Leiding_upgrade($Mailing);
        redirect('leiding');
      } else {
        $this->load->view('alerts/no_permission');
      }
    } else {
      redirect($this->Redirect, 'refresh');
    }
  }

  function Leiding_downgrade() {
    if($this->Session) {
      if($this->Session['Admin']  == 1 ) {
			  $this->Log->Delete_admin();
        $this->Leiding->Leiding_downgrade();
        redirect('leiding');
      } else {
        $this->load->view('alerts/no_permission');
      }
    } else {
      redirect($this->Redirect, 'refresh');
    }
  }

  function Leiding_delete() {
    if($this->Session) {
      if($this->Session['Admin'] == 1) {
        $Leiding = $this->Leiding->Get_user();

        foreach($Leiding as $Output) {
          $Mailing['Email'] = $Output->Mail;
        }

			  $this->Log->Delete_login();
        $this->Leiding->Leiding_delete($Mailing);
        redirect('leiding');
      } else {
        $this->load->view('alerts/no_permission');
      }
    } else {
      redirect($this->Redirect, 'refresh');
    }
  }
}
