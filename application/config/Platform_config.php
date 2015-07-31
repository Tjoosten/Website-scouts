<?php


   /**
    * ---------------------------------------------------
    * Config variables (http://www.st-joris-turnhout.be)
    * ---------------------------------------------------.
    *
    * The config variables for http://www.st-joris-turnhout.be
    *
    * Table of contents:
    * --------------------
    * 1) Mail variables
    * 2) Site variables
    *
    * @author  Tim Joosten
    * @license (Closed license), Tim Joosten
    */

   /**
    * ---------------------------------------------------
    * 1) Mail variables
    * ---------------------------------------------------
    * The mail adresses used trough the website.
    *
    * ---------------------------------------------------
    * Explanation of the variables
    * ---------------------------------------------------
    *
    * $config['Mail']['Webmaster']  = The E-mail address of the webmaster.
    * $config['Mail']['Verhuur']    = The E-mail address for the rentals.
    */
   $config['Mail'] = [
     'Webmaster' => 'webmaster@st-joris-turnhout.be',
     'Verhuur'   => 'verhuur@st-joris-turnhout.be',
   ];

   /*
    * ---------------------------------------------------
    * 2) Site variables
    * ---------------------------------------------------
    * The site varibales
    *
    * ---------------------------------------------------
    * Explantion of the variables
    * ---------------------------------------------------
    * $config['Site']['siteName'] = the nieuw in the right corner of the navbar.
    *
    */

    $config['Site'] = [
      'siteName' => 'St-Joris',
    ];

    /*
     * --------------------------------------------------
     * 3) Redirect variables
     * --------------------------------------------------
     * The variables vor the redirects
     *
     *---------------------------------------------------
     * Explanation of the variables
     * --------------------------------------------------
     * $config['redirect']['Not_logged_in'] = The redirect when the user is not logged in.
     *
     */

    $config['Redirect'] = [
      'Not_logged_in' => 'Admin',
    ];
