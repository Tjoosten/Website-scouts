<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
session_start(); //we need to call PHP's session object to access it through CI
class Backend extends CI_Controller
{
    // Constructor
    public $Session = [];
    public $Permissions = [];

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_takken', 'Takken');
        $this->load->model('Model_activiteiten', 'Activiteiten');
        $this->load->model('Model_session', 'DBsession');
        $this->load->model('user', '', true);

        $this->load->helper(['logger']);

        $this->Session = $this->session->userdata('logged_in');
        $this->Permissions = $this->session->userdata('Permissions');
    }

    // END Constructor

    public function index()
    {
        if ($this->Session) {
            $data = [
                'Title'  => 'Admin Takken',
                'Active' => '1',
            ];

            // Tak beschrijvingen
            $DB = [
                'Kapoenen'   => $this->Takken->Tak_info('Kapoenen'),
                'Welpen'     => $this->Takken->Tak_info('Welpen'),
                'JongGivers' => $this->Takken->Tak_info('JongGivers'),
                'Givers'     => $this->Takken->Tak_info('Givers'),
                'Jins'       => $this->Takken->Tak_info('Jins'),
                'Leiding'    => $this->Takken->Tak_info('Leiding'),

                'Activiteiten_Kapoenen'   => $this->Activiteiten->Activiteiten('5', 'Kapoenen'),
                'Activiteiten_Welpen'     => $this->Activiteiten->Activiteiten('5', 'Welpen'),
                'Activiteiten_JongGivers' => $this->Activiteiten->Activiteiten('5', 'JongGivers'),
                'Activiteiten_Givers'     => $this->Activiteiten->Activiteiten('5', 'Givers'),
                'Activiteiten_Jins'       => $this->Activiteiten->Activiteiten('5', 'Jins'),
            ];

            $this->load->view('components/admin_header', $data);
            $this->load->view('components/navbar_admin', $data);
            $this->load->view('admin/takken', $DB);
            $this->load->view('components/footer');
        } else {
            //If no session, redirect to login page
            redirect('Admin', 'refresh');
        }
    }

    /**
     * Voeg een activiteit toe.
     */
    public function Insert_act()
    {
        if ($this->Auth) {
            // Logging
            user_log($this->Session['username'], 'Heeft een activiteit toegevoegd');

            $this->Activiteiten->Insert();
            redirect('backend');
        } else {
            // If no session, redirect to login page
            redirect('Admin', 'refresh');
        }
    }

    /**
     * Log the gebruiker uit.
     */
    public function logout()
    {
        // Logging
        // user_log($this->Session['username'], 'Heeft zich uitgelogd.');

        $this->DBsession->deleteSession($this->Session['id']);
        $this->user->setOffline();

        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('Permissions');
        $this->session->sess_destroy();
        redirect('Admin', 'refresh');
    }
}
