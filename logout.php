<?php
session_start();
unset($_SESSION['SName']);
session_destroy();
header("location:index.html");
exit();
?>