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
			  "Datum"     => date("F j, Y, g:i a"),
			 );
			
			$this->db->insert('Activity_log', $Values);
    }
		
    function Logged_out() {
			$Session = $this->session->userdata('logged_in');
			
      $Values = array(
			  "Gebruiker" => $Session['username'],
			  "Bericht"   => "Heeft zich uitgelogd",
			  "Datum"     => date("F j, Y, g:i a"),
			);
			
			$this->db->insert('Activity_log', $Values);
		}
		
		function Created_login() {
			$Session = $this->session->userdata('logged_in');
			
		  $Values = array(
		    "Gebruiker" => $Session['username'],
		    "Bericht"   => "Heeft een login toegegevoegd",
		    "Datum"     => date("F j, Y, g:i a"),
		  );
		  
		  $this->db->insert('Activity_log', $Values);
		}
		
		function Delete_login() {
			$Session = $this->session->userdata('logged_in');
			
			$Values = array(
				"Gebruiker" => $Session['username'],
				"Bericht"   => "Heeft een login verwijderd",
				"Datum"     => date("F j, Y, g:i a"),
 			);
		}
		
		function Add_admin() {
			$Session = $this->session->userdata('logged_in');
			
			$Values = array(
				"Gebruiker" => $Session['username'],
				"Bericht"   => "Heeft iemand administrator gemaakt",
				"Datum"     => date("F j, Y, g:i a"),
				);
				
			$this->db->insert('Activity_log', $Values);
		}
		
		function Delete_admin() {
			$Session = $this->session->userdata('logged_in');
			
			$Values = array(
				"Gebruiker" => $Session['username'],
				"Bericht"   => "Heeft iemand verwijderd als administrator",
				"Datum"     => date("F j, Y, g:i a"),
				);
				
			$this->db->insert('Activity_log', $Values);
		}
		
		function Log_Block() {
			$Session = $this->session->userdata('logged_in');
			
			$Values = array(
				"Gebruiker" => $Session['username'],
				"Bericht"   => "Heeft een login geblokkeerd",
				"Datum"     => date("F j, Y, g:i a"),
				);
				
				$this->db->insert('Activity_log', $Values);
		}
			
		function Log_Unblock() {
			$Session = $this->session->userdata('logged_in');
			
			$Values = array(
				"Gebruiker" => $Session['username'],
				"Bericht"   => "Heeft een login vrijgegeven",
				"Datum"     => date("F j, Y, g:i a"),
			 );
			 
			 $this->db->insert('Activity_log', $Values);
		}
		
		function Make_user() {
			$Session = $this->session->userdata('logged_in');
			
			$Values = array(
				"Gebruiker" => $Session['username'],
				"Bericht"   => "Heeft een login aangemaakt",
				"Datum"     => date("F j, Y, g:i a"),
				);
				
			$this->db->insert('Activity_log', $Values);
		}
		
		function Verhuur_option() {
			$Session = $this->session->userdata('logged_in');
			
			$Values = array(
				"Gebruiker" => $Session['username'],
				"Bericht"   => "Heeft de optie van een verhuring aangepast",
				"Datum"     => date("F j, Y, g:i a"),
				);
				
			$this->db->insert('Activity_log', $Values);
		}
		
		function Verhuur_delete() {
			$Session = $this->session->userdata('logged_in');
			
			$Values = array(
				"Gebruiker" => $Session['username'],
				"Bericht"   => "Heeft een verhuring verwijderd", 
				"Datum"     => date("F j, Y, g:i a"),
				);
				
			$this->db->insert('Activity_log', $Values);
		}
		
		function Verhuur_insert() {
			$Session = $this->session->userdata('logged_in'); 
			
			$Values = array(
				"Gebruiker" => $Session['username'], 
				"Bericht"   => "Heeft een verhuring toegevoegd",
				"Datum"     => date("F j, Y, g:i a"),
				);
			
			$this->db->insert('Activity_log', $Values);
		} 
		
		function Verhuur_wijzig() {
			$Session = $this->session->userdata('logged_in');
			
			$Values = array(
				"Gebruiker" => $Session['username'],
				"Bericht"   => "Heeft de data van een verhuring gewijzigd",
				"Datum"     => date('F j, Y, g:i a'),
				);
				
				$this->db->insert('Activity_log', $Values);
		}
	}
