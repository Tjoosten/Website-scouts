<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Notifications controller.
 *
 * @author Tim Joosten
 * @license: Closed license
 *
 * @since 2015
 */
class Notifications extends CI_Controller
{
    public $Session = [];
    public $Permissions = [];
    public $Redirect = [];

    /**
     * Constuctor for the Notifications file.
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_leiding', 'Leiding');
        $this->load->model('Model_notifications', 'Notification');

        $this->load->helper(['logger']);

        $this->Redirect = $this->config->item('Redirect', 'Not_logged_in');
        $this->Permissions = $this->session->userdata('Permissions');
        $this->Session = $this->session->userdata('logged_in');
    }
    // End constructor

    /**
     * Repair option that tries to set the email adress in the notifications.
     */
    public function herstel_verhuur()
    {
        if ($this->Session) {
            // Logging
            user_log($this->Session['username'], 'Heeft geprobeerd om de notificaties te herstellen.');

            $Person = [
                'Naam'  => $this->Auth['username'],
                'Email' => $this->Auth['Email'],
            ];

            $this->Notification->Herstel_verhuur($Person);

            redirect('Verhuur/admin_verhuur');
        } else {
            // If no session found, redirect to login
            redirect($this->Redirect, 'Refresh');
        }
    }

    /**
     * Enable email notifications - Verhuur.
     */
    public function Verhuur_aan()
    {
        if ($this->Session) {
            // Logging
            user_log($this->Session['username'], 'Heeft de optie om notificaties te ontvangen geactiveerd (verhuur).');

            $this->Notification->Verhuur_aan();
            redirect('Verhuur/admin_verhuur');
        } else {
            // if no session found, redirect to login
            redirect($this->Redirect, 'Refresh');
        }
    }

    /**
     * Disable email notifications - Verhuur.
     */
    public function Verhuur_uit()
    {
        if ($this->Session) {
            // Logging
            user_log($this->Session['username'], 'Wilt geen notificaties meer ontvangen (Verhuur).');

            $this->Notification->Verhuur_uit();
            redirect('Verhuur/admin_verhuur');
        } else {
            // if no session found, redirect to login
            redirect($this->config->item('Redirect', 'Not_logged_in'), 'Refresh');
        }
    }
}
