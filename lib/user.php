<?php

//login iig shalgah
function check_login($user, $pass) {

    global $s_users;

    $is_logged = 0;

    foreach ($s_users as $k => $v) {
        if ($k == $user && $pass == $v) {
            $is_logged = 1;
            $_SESSION['is_logged'] = 1;
        }
    }

    return $is_logged;
}
