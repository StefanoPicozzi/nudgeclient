<?php

$client_gear_name = getenv('OPENSHIFT_GEAR_NAME');
$mysql_service_host = getenv('MYSQL_SERVICE_HOST');

if (! empty($client_gear_name) ) {

  $mysql_hostname = '535239b54382ec5cff00005c-spicozzi.rhcloud.com';
  $mysql_port     = '44871';
  $mysql_username = 'admins4SFfJZ';
  $mysql_dbname   = 'nudgedb';
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
