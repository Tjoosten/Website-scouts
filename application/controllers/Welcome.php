<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class Welcome extends CI_Controller {
		public function index() {
			$data['Title'] = "Index";
			$this->load->view('client/index', $data);
		}
		
		/*
			// Use when site is under constuction
			// ==================================
			public function index() {
			}
		*/
	}