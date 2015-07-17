<?php

  /*
   * Developer: Tim Joosten
   * License: 4GPL
   * Copyright: Sint-Joris Turnhout, Tim Joosten
   */

  Class Model_Log extends CI_Model {
    function logged_in() {
			$Session = $this->session->userdata('logged_in');
			
      $Values = array(
			  "Gebruiker" => $Session['username'], 
			  "Bericht"   => "Heeft zich ingelogd", 
			  "Datum"     => time(),
			 );
			
			$this->db->insert('Activity_log', $Values);
    }
		
    function Logged_out() {
			$Session = $this->session->userdata('logged_in');
			
      $Values = array(
			  "Gebruiker" => $Session['username'],
			  "Bericht"   => "Heeft zich uitgelogd",
			  "Datum"     => time(),
			);
			
			$this->db->insert('Activity_log', $Values);
		}
		
		function Created_login() {
			$Session = $this->session->userdata('logged_in');
			
		  $Values = array(
		    "Gebruiker" => $Session['username'],
		    "Bericht"   => "Heeft een login toegegevoegd",
		    "Datum"     => time(),
		  );
		  
		  $this->db->insert('Activity_log', $Values);
		}
		
		function Delete_login() {
			$Session = $this->session->userdata('logged_in');
			
			$Values = array(
				"Gebruiker" => $Session['username'],
				"Bericht"   => "Heeft een login verwijderd",
				"Datum"     => time(),
 			);

 			$this->db->insert('Activity_log', $Values);
		}
		
		function Add_admin() {
			$Session = $this->session->userdata('logged_in');
			
			$Values = array(
				"Gebruiker" => $Session['username'],
				"Bericht"   => "Heeft iemand administrator gemaakt",
				"Datum"     => time(),
				);
				
			$this->db->insert('Activity_log', $Values);
		}
		
		function Delete_admin() {
			$Session = $this->session->userdata('logged_in');
			
			$Values = array(
				"Gebruiker" => $Session['username'],
				"Bericht"   => "Heeft iemand verwijderd als administrator",
				"Datum"     => time(),
				);
				
			$this->db->insert('Activity_log', $Values);
		}
		
		function block() {
			$Session = $this->session->userdata('logged_in');
			
			$Values = array(
				"Gebruiker" => $Session['username'],
				"Bericht"   => "Heeft een login geblokkeerd",
				"Datum"     => time(),
				);
				
				$this->db->insert('Activity_log', $Values);
		}
			
		function Log_unblock() {
			$Session = $this->session->userdata('logged_in');
			
			$Values = array(
				"Gebruiker" => $Session['username'],
				"Bericht"   => "Heeft een login vrijgegeven",
				"Datum"     => time(),
			 );
			 
			 $this->db->insert('Activity_log', $Values);
		}
		
		function Make_user() {
			$Session = $this->session->userdata('logged_in');
			
			$Values = array(
				"Gebruiker" => $Session['username'],
				"Bericht"   => "Heeft een login aangemaakt",
				"Datum"     => time(),
				);
				
			$this->db->insert('Activity_log', $Values);
		}

		function Verhuur_option() {
			$Session = $this->session->userdata('logged_in');
			
			$Values = array(
				"Gebruiker" => $Session['username'],
				"Bericht"   => "Heeft de optie van een verhuring aangepast",
				"Datum"     => time(),
				);
				
			$this->db->insert('Activity_log', $Values);
		}
		
		function Verhuur_delete() {
			$Session = $this->session->userdata('logged_in');
			
			$Values = array(
				"Gebruiker" => $Session['username'],
				"Bericht"   => "Heeft een verhuring verwijderd", 
				"Datum"     => time(),
				);
				
			$this->db->insert('Activity_log', $Values);
		}
		
		function Verhuur_insert() {
			$Session = $this->session->userdata('logged_in'); 
			
			$Values = array(
				"Gebruiker" => $Session['username'], 
				"Bericht"   => "Heeft een verhuring toegevoegd",
				"Datum"     => time(),
				);
			
			$this->db->insert('Activity_log', $Values);
		} 
		
		function Verhuur_wijzig() {
			$Session = $this->session->userdata('logged_in');
			
			$Values = array(
				"Gebruiker" => $Session['username'],
				"Bericht"   => "Heeft de data van een verhuring gewijzigd",
				"Datum"     => time(),
				);
				
				$this->db->insert('Activity_log', $Values);
		}
	}
