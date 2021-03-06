<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| DATABASE CONNECTIVITY SETTINGS
| -------------------------------------------------------------------------
| This file will contain the settings needed to access your Mongo database.
|
|
| ------------------------------------------------------------------------
| EXPLANATION OF VARIABLES
| ------------------------------------------------------------------------
|
|	['hostname'] The hostname of your database server.
|	['username'] The username used to connect to the database
|	['password'] The password used to connect to the database
|	['database'] The name of the database you want to connect to
|	['db_debug'] TRUE/FALSE - Whether database errors should be displayed.
|	['write_concerns'] Default is 1: acknowledge write operations.  ref(http://php.net/manual/en/mongo.writeconcerns.php)
|	['journal'] Default is TRUE : journal flushed to disk. ref(http://php.net/manual/en/mongo.writeconcerns.php)
|	['read_preference'] Set the read preference for this connection. ref (http://php.net/manual/en/mongoclient.setreadpreference.php)
|	['read_preference_tags'] Set the read preference for this connection.  ref (http://php.net/manual/en/mongoclient.setreadpreference.php)
|
| The $config['mongo_db']['active'] variable lets you choose which connection group to
| make active.  By default there is only one group (the 'default' group).
|
*/

$config['mongo_db']['active'] = 'rila_db';

$config['mongo_db']['rila_db']['no_auth'] = FALSE;
$config['mongo_db']['rila_db']['hostname'] = 'localhost';
$config['mongo_db']['rila_db']['port'] = '27017';
$config['mongo_db']['rila_db']['username'] = 'rila';
$config['mongo_db']['rila_db']['password'] = '112233fF';
$config['mongo_db']['rila_db']['database'] = 'rila_db';
$config['mongo_db']['rila_db']['db_debug'] = TRUE;
$config['mongo_db']['rila_db']['return_as'] = 'array';
$config['mongo_db']['rila_db']['write_concerns'] = (int)1;
$config['mongo_db']['rila_db']['journal'] = TRUE;
$config['mongo_db']['rila_db']['read_preference'] = NULL;
$config['mongo_db']['rila_db']['read_preference_tags'] = NULL;

// $config['mongo_db']['test']['no_auth'] = FALSE;
// $config['mongo_db']['test']['hostname'] = 'localhost';
// $config['mongo_db']['test']['port'] = '27017';
// $config['mongo_db']['test']['username'] = 'username';
// $config['mongo_db']['test']['password'] = 'password';
// $config['mongo_db']['test']['database'] = 'database';
// $config['mongo_db']['test']['db_debug'] = TRUE;
// $config['mongo_db']['test']['return_as'] = 'array';
// $config['mongo_db']['test']['write_concerns'] = (int)1;
// $config['mongo_db']['test']['journal'] = TRUE;
// $config['mongo_db']['test']['read_preference'] = NULL;
// $config['mongo_db']['test']['read_preference_tags'] = NULL;

/* End of file database.php */
/* Location: ./application/config/database.php */
