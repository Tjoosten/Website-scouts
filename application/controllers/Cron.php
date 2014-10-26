<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class Cron extends CI_Controller {
 
    /* 
     | Developer: Tim Joosten. 
     | License: 4GPL
     | Copyright: Tim Joosten, Scouts & Gidsen - Sint-Joris
     */

    function __construct(){
		  parent::__construct();
      // this controller can only be called from the command line
      if (!$this->input->is_cli_request()) show_error('Direct access is not allowed');
			// Load model
			$this->load->model('Model_cron','Cron');
      $this->load->model('Model_log','Log');
    }

    function index() {
      echo "".PHP_EOL;
      echo "// Cronjoboos st-joris-turnhout.be".PHP_EOL;
      echo "// Menu zal niet werken als je je niet in public_html bevind".PHP_EOL;
      echo "".PHP_EOL;

      echo "1) Optimaliseer database".PHP_EOL;
      echo "2) Verwijder afgelopen verhuringen".PHP_EOL;
      echo "3) Verwijder afgelopen activiteiten".PHP_EOL;
      // echo "4) Backup database.".PHP_EOL;
      echo "---------------------------------------------".PHP_EOL;
      echo "Welke taak wil je uitvoeren? (1 - 3):";

      $Cron = fopen ("php://stdin","r");
      $Taak = fgets($Cron);

      if(trim($Taak) == 1) {
        shell_exec('php /scoutnet.be/users/st-joris/public_html/index.php Cron Optimize_DB');
      } 

      elseif(trim($Taak) == 2) {
        shell_exec('php /scoutnet.be/users/st-joris/public_html/index.php Cron Del_verhuring');
      } 

      elseif(trim($Taak) == 3) {
        shell_exec('php /scoutnet.be/users/st-joris/public_html/index.php Cron Del_activiteiten');
      }

      else {
        echo "Ongeldige keuze".PHP_EOL;
      }

    }
 
    function Optimize_DB() {
			$this->load->dbutil();
			$this->Cron->Optimize();
    }

    function Del_verhuring() {
    	$this->Cron->Del_verhuringen();
    }

    function Del_activiteiten() {
        $this->Cron->Del_activiteiten();
    }
}