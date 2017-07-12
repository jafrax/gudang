<?php
include '../script_awal.php';

// $login_log->create_log('Lo','','Logout');
session_destroy();
header("location: index.php?");
exit();
?>