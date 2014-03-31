<?php

function load_layout($name = '') {
    if (file_exists(DIR_ABS . 'templates/layout/' . $name . '.php')) {
        require_once DIR_ABS . 'templates/layout/' . $name . '.php';
    } else {
        require_once DIR_ABS . 'templates/layout/default.php';
    }
}

function load_template($name = '') {
    if (file_exists(DIR_ABS . 'templates/' . $name . '.php')) {
        require_once DIR_ABS . 'templates/' . $name . '.php';
    } else {
        require_once DIR_ABS . 'templates/404.php';
    }
}
