<?php

$client_gear_name = getenv('OPENSHIFT_GEAR_NAME');
$mysql_service_host = getenv('MYSQL_SERVICE_HOST');

if (! empty($client_gear_name) ) {
  
  #define('DB_HOST', getenv('OPENSHIFT_MYSQL_DB_HOST'));
  #define('DB_HOST', 'nudgeserver-spicozzi.rhcloud.com');
  #define('DB_HOST', '533673c04382eca3dd00061f-spicozzi.rhcloud.com');
  #define('DB_HOST', '535239b54382ec5cff00005c-spicozzi.rhcloud.com');
  
  #define('DB_PORT', getenv('OPENSHIFT_MYSQL_DB_PORT'));
  #define('DB_PORT', '53396');
  #define('DB_PORT', '44871');

  #define('DB_USER', getenv('OPENSHIFT_MYSQL_DB_USERNAME'));
  #define('DB_USER', 'adminXZyb64C');
  #define('DB_USER', 'admins4SFfJZ');

  #define('DB_PASS', getenv('OPENSHIFT_MYSQL_DB_PASSWORD'));
  #define('DB_PASS', 'Xt4t23b_gLSt');
  #define('DB_PASS', 'IXpNxqRhElea');

  #define('DB_NAME', getenv('OPENSHIFT_GEAR_NAME'));
  #define('DB_NAME', 'nudgeserver');
  #define('DB_NAME', 'nudgedb');
  #define('DB_NAME', '');

  $mysql_hostname = '535239b54382ec5cff00005c-spicozzi.rhcloud.com';                               
  $mysql_port     = '44871';                               
  $mysql_username = 'admins4SFfJZ';                                        
  $mysql_dbname   = '';                                   
  $mysql_password = 'IXpNxqRhElea';                                   

} else if (! empty($mysql_service_host) ) {

  $mysql_hostname = getenv('MYSQL_SERVICE_HOST');                               
  $mysql_port     = getenv('MYSQL_SERVICE_PORT');                               
  $mysql_username = getenv('MYSQL_USER');                                        
  $mysql_dbname   = getenv('MYSQL_DATABASE');                                   
  $mysql_password = getenv('MYSQL_PASSWORD');                                   
                                                 
}

/*** connect to database ***/
/*** mysql hostname ***/
if (empty($mysql_hostname)) {
   $mysql_hostname = '127.0.0.1';
}

/*** mysql username ***/
if (empty($mysql_username)) {
  $mysql_username = 'root';
  #$mysql_username = 'adminXZyb64C';
  #$mysql_username = 'admins4SFfJZ';
}

/*** mysql password ***/
if (empty($mysql_port)) {
   $mysql_port = '3306';
   #$mysql_port = '53396';
   #$mysql_port = '44871';
}

/*** mysql password ***/
if (empty($mysql_password)) {
   $mysql_password = '';
   #$mysql_password = 'Xt4t23b_gLSt';
   #$mysql_password = 'IXpNxqRhElea';
}

/*** database name ***/
if (empty($mysql_dbname)) {
   #$mysql_dbname = 'nudge';
   #$mysql_dbname = 'nudgeserver';
   #$mysql_dbname = 'nudgedb';
   $mysql_dbname = 'nudgedblocal';
}

?>
