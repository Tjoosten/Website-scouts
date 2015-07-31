<?php

defined('BASEPATH') or exit('No direct script access allowed');
    class Welcome extends CI_Controller
    {
        public $Session = [];

        public function __construct()
        {
            parent::__construct();
            $this->Session = $this->session->userdata('logged_in');
        }

        public function index()
        {
            // Not in array, because it's one variable.
            $Data['Title'] = 'Index';
            $this->load->view('client/index', $Data);
        }
    }
