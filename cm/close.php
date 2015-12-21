<?php
session_start();
unset($_SESSION["inicio"]); 
session_destroy();
header("location:index.html");
exit;
?>