<?php
  $name = $_POST['txtname'];
  $email = $_POST['txtemail'];
  $phone = $_POST['txtphone'];
  $message = $_POST['txtmessage'];
  $con = mysqli_connect("localhost","root","","blog_nepal") or die ("Connection Eror");
  echo "Connecrtion established";
?>