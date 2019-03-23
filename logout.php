<?php 


/*
 * If User isn't logged => redirect to Landing Page
 * If User is logged with no Session => redirect to Login Page
 * On logout unset and destroy sessions => redirect to Login Page
*/

session_start();

if (!isset($_SESSION['user'])) {
  header("Location: index.php");
} else if (isset($_SESSION['user']) != "") {
  header("Location: login.php");
}

if (isset($_GET['logout'])) {
  unset($_SESSION['user']);
  session_unset();
  session_destroy();
  session_start();
  $_SESSION['logout'] = 1;
  header("Location: login.php");
  exit;
}
 