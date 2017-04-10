<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
| DATABASE CONNECTIVITY SETTINGS
| -------------------------------------------------------------------
| This file will contain the settings needed to access your database.
|
| For complete instructions please consult the 'Database Connection'
| page of the User Guide.
|
| -------------------------------------------------------------------
| EXPLANATION OF VARIABLES
| -------------------------------------------------------------------
|
|	['hostname'] The hostname of your database server.
|	['username'] The username used to connect to the database
|	['password'] The password used to connect to the database
|	['database'] The name of the database you want to connect to
|	['dbdriver'] The database type. ie: mysql.  Currently supported:
				 mysql, mysqli, postgre, odbc, mssql, sqlite, oci8
|	['dbprefix'] You can add an optional prefix, which will be added
|				 to the table name when using the  Active Record class
|	['pconnect'] TRUE/FALSE - Whether to use a persistent connection
|	['db_debug'] TRUE/FALSE - Whether database errors should be displayed.
|	['cache_on'] TRUE/FALSE - Enables/disables query caching
|	['cachedir'] The path to the folder where cache files should be stored
|	['char_set'] The character set used in communicating with the database
|	['dbcollat'] The character collation used in communicating with the database
|				 NOTE: For MySQL and MySQLi databases, this setting is only used
| 				 as a backup if your server is running PHP < 5.2.3 or MySQL < 5.0.7
|				 (and in table creation queries made with DB Forge).
| 				 There is an incompatibility in PHP with mysql_real_escape_string() which
| 				 can make your site vulnerable to SQL injection if you are using a
| 				 multi-byte character set and are running versions lower than these.
| 				 Sites using Latin-1 or UTF-8 database character set and collation are unaffected.
|	['swap_pre'] A default table prefix that should be swapped with the dbprefix
|	['autoinit'] Whether or not to automatically initialize the database.
|	['stricton'] TRUE/FALSE - forces 'Strict Mode' connections
|							- good for ensuring strict SQL while developing
|
| The $active_group variable lets you choose which connection group to
| make active.  By default there is only one group (the 'default' group).
|
| The $active_record variables lets you determine whether or not to load
| the active record class
*/

$active_group = 'default';
$active_record = TRUE;

$db['default']['hostname'] = 'localhost';
$db['default']['username'] = 'admin_kh_user';
$db['default']['password'] = 'khohang_pass';
$db['default']['database'] = 'admin_khohangac';
/*$db['default']['hostname'] = 'localhost';
$db['default']['username'] = 'root';
$db['default']['password'] = '';
$db['default']['database'] = 'vnefrc2';*/
$db['default']['dbdriver'] = 'mysqli';
$db['default']['dbprefix'] = '';
$db['default']['pconnect'] = TRUE;
$db['default']['db_debug'] = TRUE;
$db['default']['cache_on'] = FALSE;
$db['default']['cachedir'] = '';
$db['default']['char_set'] = 'utf8';
$db['default']['dbcollat'] = 'utf8_general_ci';
$db['default']['swap_pre'] = '';
$db['default']['autoinit'] = TRUE;
$db['default']['stricton'] = FALSE;


$db['database3']['hostname'] = 'localhost';
$db['database3']['username'] = 'admin_kh_user';
$db['database3']['password'] = 'khohang_pass';
$db['database3']['database'] = 'admin_khohangac';
$db['database3']['dbdriver'] = 'mysqli';
$db['database3']['dbprefix'] = '';
$db['database3']['pconnect'] = TRUE;
$db['database3']['db_debug'] = TRUE;
$db['database3']['cache_on'] = FALSE;
$db['database3']['cachedir'] = '';
$db['database3']['char_set'] = 'utf8';
$db['database3']['dbcollat'] = 'utf8_general_ci';
$db['database3']['swap_pre'] = '';
$db['database3']['autoinit'] = TRUE;
$db['database3']['stricton'] = FALSE;




/*Config DB Send Mail*/
$db['default']['hostname_db_mail'] = 'local.itvn.fr';
$db['default']['username_db_mail'] = 'local';
$db['default']['password_db_mail'] = 'ifrcvn';
$db['default']['database_db_mail'] = 'upmd_sendmail';
$db['default']['name_group_mail'] = 'EMAIL_SUBSCRIBE_NEWS';

/* End of file database.php */
/* Location: ./application/config/database.php */