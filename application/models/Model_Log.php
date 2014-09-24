<?php

	/*
	 * Developer: Tim Joosten
	 * License: 4GPL
	 * Copyright: Sint-Joris Turnhout, Tim Joosten
	 */

	Class Model_Log extends CI_Model {
		function Logged_in() {
			
		}
		
		function Logged_out() {
			
		}
		
		function Created_login() {
		
		}
		
		function Deleted_login()  {
			$Values = array(
				"Gebruiker" =>
				"Bericht"   =>
				"Datum"     =>
 			);
		}
		
		function Add_admin() {
			$Values = array(
				"Gebruiker" =>
				"Bericht"   =>
				"Datum"     =>
				);
				
			$this->db->insert('Activity_log', $Values);
		}
		
		function Delete_admin() {
			$Values = array(
				"Gebruiker" =>
				"Bericht"   =>
				"Datum"     =>
				);
				
			$this->db->insert('Activity_log', $Values);
		}
		
		function Make_user() {
			$Values = array(
				"Gebruiker" =>
				"Bericht"   =>
				"Datum"     =>
				);
				
			$this->db->insert('Activity_log', $Values);
		}
	}