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
    public $Session = array();

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form'));
        $this->load->model('user', '', TRUE);
        $this->load->model('Model_log', 'Log');
        $this->load->model('Model_permission', 'rights');

        $this->Session     = $this->session->userdata('logged_in');
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
        $data['Title']       = 'Gebruikers profiel';
        $data['Active']      = 4;
        $data['user']        = $this->user->getProfile();
        $data['logs']        = $this->Log->getUserLogs();
        $data['permissions'] = $this->rights->getUserRights();

        $this->load->view('components/admin_header', $data);
        $this->load->view('components/navbar_admin', $data);
        $this->load->view('admin/profile', $data);
        $this->load->view('components/footer');
    }

    public function updatePermissions()
    {
        $this->rights->updateUserRights();

        // redirect
        redirect($_SERVER['HTTP_REFERER']);
    }
}
