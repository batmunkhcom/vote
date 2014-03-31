<?php

//error_reporting(0);

require_once 'config.php';
require_once 'common.php';

ob_start();
echo 'GET';
print_r($_GET);
echo 'POST';
print_r($_POST);
echo 'REQUEST';
print_r($_REQUEST);
echo 'SERVER';
print_r($_SERVER);
echo 'IP: ' . $_SERVER['REMOTE_ADDR'];

$ddd = ob_get_contents();
ob_end_clean();
$result_txt = '';
//echo 'testting....';
//die();
//batalgaajuulalt ehellee.
$is_valid = 0;
switch ($_GET['op']) {
    case 'xx':
        break;
    default:
        $result_txt = 'Aldaa!!!';
        break;
}


echo $result_txt;

$ddd .= 'reply sms: ' . $result_txt;
//mbmSendEmail('ZZ|info@mongoliahost.com', 'admin|info@mongoliahost.com', 'sms :: ' . $_GET['op'], $ddd);
//mbmSendEmail('ZZ|info@az.mn', 'admin|admin@az.mn', 'sms :: ' . $_GET['op'], $ddd);
