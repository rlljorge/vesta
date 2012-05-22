<?php
// Init
error_reporting(NULL);
session_start();
$TAB = 'WEB';
include($_SERVER['DOCUMENT_ROOT']."/inc/main.php");

// Header
include($_SERVER['DOCUMENT_ROOT'].'/templates/header.html');

// Panel
top_panel($user,$TAB);

// Data
if ($_SESSION['user'] == 'admin') {

    exec (VESTA_CMD."v_list_web_domains $user json", $output, $return_var);
    check_error($return_var);
    $data = json_decode(implode('', $output), true);
    $data = array_reverse($data);
    unset($output);

    include($_SERVER['DOCUMENT_ROOT'].'/templates/admin/menu_web.html');
    include($_SERVER['DOCUMENT_ROOT'].'/templates/admin/list_web.html');
}

// Footer
include($_SERVER['DOCUMENT_ROOT'].'/templates/footer.html');