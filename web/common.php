<?php

session_start();
date_default_timezone_set(TIMEZONE);
//database holbolt
$db = mysql_connect(DB_HOST, DB_USER, DB_PASS) or die('Database connection error');
mysql_select_db(DB_NAME, $db) or die("Database error");

/* lib dir include hiih */
if ($handle = opendir(DIR_ABS . 'lib/')) {

    while (false !== ($entry = readdir($handle))) {
        if (substr($entry, -4) == '.php') {
            require_once DIR_ABS . 'lib/' . $entry;
        }
    }

    closedir($handle);
}