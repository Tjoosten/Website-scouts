<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class Cron extends CI_Controller {

		/**
	 	 * Notifications controller
	   *
		 * @author Tim Joosten
		 * @license: Closed license
		 * @since 2015
		 * @package Website
		 */

    function __construct(){
		  parent::__construct();
      // this controller can only be called from the command line
      if (!$this->input->is_cli_request()) show_error('Direct access is not allowed');
			// Load model
			$this->load->model('Model_cron','Cron');
      $this->load->model('Model_log','Log');

      // Load helpers
      $this->load->dbutil();
    }

		/**
		 *
		 */
    function index() {
      echo "\n";
      echo "// Cronjobs st-joris-turnhout.be \n";
      echo "// Menu zal niet werken als je je niet in public_html bevind \n";
      echo "\n";

      echo "1) Optimaliseer database \n";
      echo "2) Verwijder afgelopen verhuringen \n";
      echo "3) Verwijder afgelopen activiteiten \n";
			echo "4) Run migrations \n";
      echo "--------------------------------------------- \n";
      echo "Welke taak wil je uitvoeren? (1 - 4):";

      $Cron = fopen ("php://stdin","r");
      $Taak = fgets($Cron);

			switch($Taak)
				case "1"
					shell_exec('php /scoutnet.be/users/st-joris/public_html/index.php Cron Optimize_DB');
						break;



      elseif(trim($Taak) == 2) {
        shell_exec('php /scoutnet.be/users/st-joris/public_html/index.php Cron Del_verhuring');
      }

      elseif(trim($Taak) == 3) {
        shell_exec('php /scoutnet.be/users/st-joris/public_html/index.php Cron Del_activiteiten');
      }

			elseif(trim($Taak) == 4) {
				shell_exec('php /scoutnet.be/users/st-joris/public_html/index.php Migrate');
			}

      else {
        echo "Ongeldige keuze \n";
      }

    }

		/**
		 * Optimaliseer de darabase.
		 */
    function Optimize_DB() {
			$this->Cron->Optimize();
    }

		/**
		 * Verwijder afgelopen verhuringen uit de database.
		 */
    function Del_verhuring() {
    	$this->Cron->Del_verhuringen();
    }

		/**
		 * Verwijder afgelopen activiteiten uit de database.
		 */
    function Del_activiteiten() {
      $this->Cron->Del_activiteiten();
    }
}
