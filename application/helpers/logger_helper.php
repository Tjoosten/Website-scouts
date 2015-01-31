<?php defined('BASEPATH') OR exit('No direct script access allowed');

  /**
   * @package Logger
   * @author Tim Joosten
   * @license Closed source license
   * @since 2015
   *
   * @todo Setting up system that creates a logged_in session for the server (cronjobs)
   * @todo Create function for the cronjob
   */

   /**
    * log_user
    *
    * @param $user,    string, the user ding the handle.
    * @param $message, string, the handling the user is doing.
    */

   if (! function_exists('user_log')) {
     function user_log($user, $message) {
       $Date = strtotime(date("Y/m/d"));

       $Filepath =  './application/logs/log-'. $Date .'.php';

       if(! file_exists($Filepath)) {
         // File doesn't exists so we need to first write it.
         $Fileheader = "<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>\n\n";
         $LogMessage = '['. date("h:i:sa"). ']: '. $user .' --> '. $message ."\n";

         // Open the log file
         $Logfile = fopen($Filepath, "a");

         // Write to the file.
         fwrite($Logfile, $Fileheader);
         fwrite($Logfile, $LogMessage);
         // Close file
         fclose($Logfile);

         return TRUE;
       } else {
         // The file exists sp we are write te log message only.
         $LogMessage = '['. date("h:i:sa"). ']: '. $user .' --> '. $message ."\n";

         // Open the log file
         $Logfile = fopen($Filepath, "a");

         // Write to the file.
         fwrite($Logfile, $LogMessage);
         // Close file
         fclose($Logfile);
       }
    }
  }
