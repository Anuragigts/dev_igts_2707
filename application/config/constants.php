<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');

define('OPERATOR',  'https://sphirelabs-mobile-number-portability-india-operator-v1.p.mashape.com/index.php');
define('TARIF',     'https://tariff-plan-api-datayuge.p.mashape.com/index.php');
// Mobile rechage
define('RECHARGEURL', 'http://115.248.39.80/hermesapi/hermesmobile.asmx');
define('RECHARGEACTION', 'http://tempuri.org/HERMESAPI/HermesMobile/');
define('USER', 'Swamicom');
define('PASSW', 'Swamicom123');


// Post landline rechage
define('POSTPAID', 'http://115.248.39.80/hermesapi/hermesmobile.asmx');
define('POSTPAIDACTION', 'http://tempuri.org/HERMESAPI/HermesMobile/');
//DMR url
define('DMRURL', 'http://202.54.157.77/wsnpci/impsmethods.asmx');
define('TID', '200094');
define('LKEY', '0079394869');
define('MID', '94');

// DMR action
define('DMRACTIUON', 'http://tempuri.org/');

// Flight rechage
define('FLIGHTURL', 'http://115.248.39.80/hermesapi/inthermesair.asmx');
define('FLIGHTACTION', 'http://tempuri.org/HERMESAPI/IntHermesAir/');




/* End of file constants.php */
/* Location: ./application/config/constants.php */