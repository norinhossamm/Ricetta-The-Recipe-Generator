<?php
echo ("hello");
session_start();
$_SESSION["username"] = null;
session_destroy();
header("location: LoginSignup.php?error=logout");
exit();