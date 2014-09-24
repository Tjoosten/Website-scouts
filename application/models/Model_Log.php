<?php

  /*
   * Developer: Tim Joosten
   * License: 4GPL
   * Copyright: Sint-Joris Turnhout, Tim Joosten
   */

  Class Model_Log extends CI_Model {
    function Logged_in() {
      $Values = array(
			  "Gebruiker" => $Session['username'], 
			  "Bericht"   => "Heeft zich ingelogd", 
			  "Datum"     => date("F j, Y, g:i a"),
			 );
			
			$this->db->insert('Activity_log', $Values);
    }
		
    function Logged_out() {
      $Values = array(
			  "Gebruiker" => $Session['username'],
			  "Bericht"   => "Heeft zich uitgelogd",
			  "Datum"     => date("F j, Y, g:i a"),
			);
			
			$this->db->insert('Activity_log', $Values);
		}
		
		function Created_login() {
		  $Values = array(
		    "Gebruiker" => $Session['username'],
		    "Bericht"   => "Heeft een login toegegevoegd",
		    "Datum"     => date("F j, Y, g:i a"),
		  );
		  
		  $this->db->insert('Activity_log', $Values);
		}
		
		function Deleted_login()  {
			$Values = array(
				"Gebruiker" => $Session['username'],
				"Bericht"   => "Heeft een login verwijderd",
				"Datum"     => date("F j, Y, g:i a"),
 			);
		}
		
		function Add_admin() {
			$Values = array(
				"Gebruiker" => $Session['username'],
				"Bericht"   => "Heeft iemand administrator gemaakt",
				"Datum"     => date("F j, Y, g:i a"),
				);
				
			$this->db->insert('Activity_log', $Values);
		}
		
		function Delete_admin() {
			$Values = array(
				"Gebruiker" => $Session['username'],
				"Bericht"   => "Heeft iemand verwijderd als administrator",
				"Datum"     => date("F j, Y, g:i a"),
				);
				
			$this->db->insert('Activity_log', $Values);
		}
		
		function Make_user() {
			$Values = array(
				"Gebruiker" => $Session['username'],
				"Bericht"   => "Heeft een login aangemaakt",
				"Datum"     => date("F j, Y, g:i a"),
				);
				
			$this->db->insert('Activity_log', $Values);
		}
	}
