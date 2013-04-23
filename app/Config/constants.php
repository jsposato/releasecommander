<?php
// #########################################################################
// Application Information
// #########################################################################
define('APP_VERSION', '0.1.002');
define('CAKE_VERSION', '2.3.2');
define('REPOSITORY_TYPE', 'git');
define('PROJECT_TITLE', 'Release Commander');


define('DATABASE_USER_ID', 1); // user_id of the default database User
define('MIN_PASSWORD_LENGTH', 8); // Minimum password length
define('MIN_PASSWORD_STRENGTH', 3); // 1 -> weak, 2 -> not as weak, 3 -> acceptable, 4 -> strong
define('PASSWORD_EXPIRATION_DAYS', 180); // When will the password expire?

define('LDAP_REQUIRED', true); 	//Is LDAP credentials required?

// the amount of time in seconds that must pass before an account may be 
// disabled for exceeding MAX_LOGIN_ATTEMPTS login attempts
define('LOGIN_ATTEMPT_PERIOD', 1*60*60); // 1*60*60 seconds = 1 hour
define('MAX_LOGIN_ATTEMPTS', 5); // maximum number of login attempts allowed within LOGIN_ATTEMPT_PERIOD 

define('RESULTS_PER_PAGE', 10); //the number of search results to display per page when paginating search results

// APP specific constants

// These are for release statuses
define('NOTSTARTED', 1);
define('INPROGRESS', 2);
define('COMPLETED', 3);
define('ONHOLD', 4);
?>
