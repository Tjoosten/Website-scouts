<?php

  /**
   * Logging model.
   *
   * Log actions to the database.
   *
   * @todo Clean up session usage
   *
   * @author Tim Joosten
   * @license: Closed license
   * @since 2015
   * @package Website-models
   */

  Class Model_Log extends CI_Model {

    /**
     *
     */
    function logged_in() {
			$Session = $this->session->userdata('logged_in');

      $Values = array(
			  "Gebruiker" => $Session['username'],
			  "Bericht"   => "Heeft zich ingelogd",
			  "Datum"     => time(),
			 );

			$this->db->insert('Activity_log', $Values);
    }

    /**
     *
     */
    function Logged_out() {
			$Session = $this->session->userdata('logged_in');

      $Values = array(
			  "Gebruiker" => $Session['username'],
			  "Bericht"   => "Heeft zich uitgelogd",
			  "Datum"     => time(),
			);

			$this->db->insert('Activity_log', $Values);
		}

    /**
     * Log: creation login.
     */
		function Created_login() {
			$Session = $this->session->userdata('logged_in');

		  $Values = array(
		    "Gebruiker" => $Session['username'],
		    "Bericht"   => "Heeft een login toegegevoegd",
		    "Datum"     => time(),
		  );

		  $this->db->insert('Activity_log', $Values);
		}

    /**
     * Log: delete login.
     */
		function Delete_login() {
			$Session = $this->session->userdata('logged_in');

			$Values = array(
				"Gebruiker" => $Session['username'],
				"Bericht"   => "Heeft een login verwijderd",
				"Datum"     => time(),
 			);

 			$this->db->insert('Activity_log', $Values);
		}

    /**
     * Log: enable administrator
     */
		function Add_admin() {
			$Session = $this->session->userdata('logged_in');

			$Values = array(
				"Gebruiker" => $Session['username'],
				"Bericht"   => "Heeft iemand administrator gemaakt",
				"Datum"     => time(),
				);

			$this->db->insert('Activity_log', $Values);
		}

    /**
     * Log: disable admin.
     */
		function Delete_admin() {
			$Session = $this->session->userdata('logged_in');

			$Values = array(
				"Gebruiker" => $Session['username'],
				"Bericht"   => "Heeft iemand verwijderd als administrator",
				"Datum"     => time(),
				);

			$this->db->insert('Activity_log', $Values);
		}

    /**
     * Log blokkering login - Database.
     */
		function block() {
			$Session = $this->session->userdata('logged_in');

			$Values = array(
				"Gebruiker" => $Session['username'],
				"Bericht"   => "Heeft een login geblokkeerd",
				"Datum"     => time(),
				);

				$this->db->insert('Activity_log', $Values);
		}

    /**
     * Log: deblokkering gebruiker
     */
		function Log_unblock() {
			$Session = $this->session->userdata('logged_in');

			$Values = array(
				"Gebruiker" => $Session['username'],
				"Bericht"   => "Heeft een login vrijgegeven",
				"Datum"     => time(),
			 );

			 $this->db->insert('Activity_log', $Values);
		}

    /**
     * Log: User creation
     */
		function Make_user() {
			$Session = $this->session->userdata('logged_in');

			$Values = array(
				"Gebruiker" => $Session['username'],
				"Bericht"   => "Heeft een login aangemaakt",
				"Datum"     => time(),
				);

			$this->db->insert('Activity_log', $Values);
		}

    /**
     * Log: wijziging verhuur.
     */
		function Verhuur_option() {
			$Session = $this->session->userdata('logged_in');

			$Values = array(
				"Gebruiker" => $Session['username'],
				"Bericht"   => "Heeft de optie van een verhuring aangepast",
				"Datum"     => time(),
				);

			$this->db->insert('Activity_log', $Values);
		}

    /**
     *
     */
		function Verhuur_delete() {
			$Session = $this->session->userdata('logged_in');

			$Values = array(
				"Gebruiker" => $Session['username'],
				"Bericht"   => "Heeft een verhuring verwijderd",
				"Datum"     => time(),
				);

			$this->db->insert('Activity_log', $Values);
		}

    /**
     * Log: invoeging verhuur
     */
		function Verhuur_insert() {
			$Session = $this->session->userdata('logged_in');

			$Values = array(
				"Gebruiker" => $Session['username'],
				"Bericht"   => "Heeft een verhuring toegevoegd",
				"Datum"     => time(),
				);

			$this->db->insert('Activity_log', $Values);
		}

    /**
     * Login wijziging verhuur.
     */
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
