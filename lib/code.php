<?php

function get_code($code = '') {
    $suffix = $GLOBALS['suffix'][$code{0}];
    if (!isset($GLOBALS['suffix'][$code{0}])) {
        echo TXT_INVALID_CODE;
    } else {
        $q = "SELECT * FROM code" . $suffix . " WHERE code='" . $code . "' LIMIT 1";

//        echo $q;
//        print_r($GLOBALS['suffix']);
        $r = mysql_query($q);

        if (mysql_num_rows($r) == 1) {

            return $r;
        } else {

            return 0;
        }
    }
}
