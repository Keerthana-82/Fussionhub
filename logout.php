<?php
session_start();
session_destroy();
header("Location: fp.php");
exit;
?>
