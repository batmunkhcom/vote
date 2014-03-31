<?php

require_once 'config.php';
require_once 'common.php';


switch ($_GET['action']) {
    case 'login_check':
        if (check_login($_POST['username'], $_POST['pass']) == 1) {
            header("Location: manage.php?c=admin_home");
        } else {
            $_SESSION['info_txt'] = 'invalid login';
            header("Location: index.php");
        }
        break;
    case 'logout':
        unset($_SESSION['is_logged']);
        session_destroy();
        $_SESSION['info_txt'] = 'logged out';
        header("Location: manage.php");
        break;
}
if (isset($_GET['c'])) {
    $page = addslashes($_GET['c']);
} else {
    $page = 'home';
}
if ($_SESSION['is_logged'] != 1) {
    $page = 'login';
}
$_SESSION['template'] = $page;

load_layout();

unset($_SESSION ['info_txt']);

die();
echo '<hr />';
print_r($_SESSION);
echo '<hr />';
print_r($_POST);
echo '<hr />';
print_r($_GET);
