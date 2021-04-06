<?php
session_start();
unset($_SESSION['pmrlogin']);
header("Location: login.php");
exit;
