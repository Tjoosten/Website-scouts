<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author: Tim Joosten
 * @license: Closed source
 * @copyright: Tim Joosten
 * @since: 2015
 * @package: Scouts website (http://www.st-joris-turnhout.be)
 */
class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form'));
    }

    /**
     * The login form for the backend.
     * Wil do a redirect when he is found the session Logged_in.
     */
    public function index()
    {
        if ($this->session->userdata('logged_in')) {
            redirect('backend', 'refresh');
        } else {
            $this->load->view('admin/login');
        }
    }

    /**
     * Get the user profile. for the admin.
     */
    public function profile()
    {
        $data['title'] = 'Gebruikers profiel';
        $data['user']  = $this->user->getProfile();

        $this->load->view('components/header', $data);
        $this->load->view('components/navbar_admin', $data);
        $this->load->view('admin/profile', $data);
        $this->load->view('components/footer');
    }
}
