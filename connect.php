<?php
/**
 * Created by www.coderseven.com
 * User: rvadvani | coder seven
 * Date: 30th March 2017
 * Time: 12:34 AM
 */

ob_start();
session_start();
//=========== database connection variables ====================
define('DB_SERVER', "localhost"); // database host name eg. localhost or 127.0.0.1
define('DB_USER', "root"); // database user name eg. root
define('DB_DATABASE', "cs_database"); //database name
define('DB_PASSWORD', ""); //database user password
define('DB_TYPE', 'mysql'); //database drive eg. mysql, pgsql, mongodb etc




//========== site details described here ========================
define('SITE_TITLE', 'Coder Seven');
define('SITE_TAG_LINE', 'Before code can be reusable, it first has to be usable');

//contact ifnormation
define('SITE_CONTACT', '+91 90088 90808');
//email information
define('SITE_EMAIL_INFO', 'info@coderseven.com');
//url information
define('SITE_URL', 'http://localhost/demo/register/');
