<?php
  session_start();
  session_unset();
  session_destroy();
  // redirecting user to login page
  header("Location:login_form.php");
  exit();

?>