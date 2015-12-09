<?php

define('DB_HOST', '');
define('DB_PORT', '');
define('DB_NAME', '');
define('DB_USER', '');
define('DB_PASS', '');
  
define('CLIENT_GEAR_NAME', getenv('OPENSHIFT_GEAR_NAME'));
define('MSQL_SERVICE_HOST', getenv('MYSQL_SERVICE_HOST'));

$client_gear_name = CLIENT_GEAR_NAME;
$mysql_service_host = MSQL_SERVICE_HOST;

if (! empty($client_gear_name) ) {
  
  #define('DB_HOST', getenv('OPENSHIFT_MYSQL_DB_HOST'));
  #define('DB_HOST', 'nudgeserver-spicozzi.rhcloud.com');
  #define('DB_HOST', '533673c04382eca3dd00061f-spicozzi.rhcloud.com');
  define('DB_HOST', '535239b54382ec5cff00005c-spicozzi.rhcloud.com');
  
  #define('DB_PORT', getenv('OPENSHIFT_MYSQL_DB_PORT'));
  #define('DB_PORT', '53396');
  define('DB_PORT', '44871');

  #define('DB_USER', getenv('OPENSHIFT_MYSQL_DB_USERNAME'));
  #define('DB_USER', 'adminXZyb64C');
  define('DB_USER', 'admins4SFfJZ');

  #define('DB_PASS', getenv('OPENSHIFT_MYSQL_DB_PASSWORD'));
  #define('DB_PASS', 'Xt4t23b_gLSt');
  define('DB_PASS', 'IXpNxqRhElea');

  #define('DB_NAME', getenv('OPENSHIFT_GEAR_NAME'));
  #define('DB_NAME', 'nudgeserver');
  #define('DB_NAME', 'nudgedb');
  define('DB_NAME', '');

} 
else if (! empty($mysql_service_host) ) {

  define('DB_HOST', getenv("MYSQL_SERVICE_HOST"));
  define('DB_PORT', getenv("MYSQL_SERVICE_PORT"));
  define('DB_USER', getenv("DATABASE_USER"));
  define('DB_NAME', getenv("DATABASE_NAME"));
  define('DB_PASS', getenv("DATABASE_PASSWORD"));
  
}

/*** connect to database ***/
/*** mysql hostname ***/
$mysql_hostname = DB_HOST;
if (empty($mysql_hostname)) {
   $mysql_hostname = '127.0.0.1';
}

/*** mysql username ***/
$mysql_username = DB_USER;
if (empty($mysql_username)) {
  $mysql_username = 'root';
  #$mysql_username = 'adminXZyb64C';
  #$mysql_username = 'admins4SFfJZ';
}

/*** mysql password ***/
$mysql_port = DB_PORT;
if (empty($mysql_port)) {
   $mysql_port = '3307';
   #$mysql_port = '53396';
   #$mysql_port = '44871';
}

/*** mysql password ***/
$mysql_password = DB_PASS;
if (empty($mysql_password)) {
   $mysql_password = '';
   #$mysql_password = 'Xt4t23b_gLSt';
   #$mysql_password = 'IXpNxqRhElea';
}

/*** database name ***/
$mysql_dbname = DB_NAME;
if (empty($mysql_dbname)) {
   #$mysql_dbname = 'nudge';
   #$mysql_dbname = 'nudgeserver';
   #$mysql_dbname = 'nudgedb';
   $mysql_dbname = 'nudgedblocal';
}

?>
