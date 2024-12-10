<?php
  $name = $_POST['txtname'];
  $email = $_POST['txtemail'];
  $phone = $_POST['txtphone'];
  $message = $_POST['txtmessage'];
  $con = mysqli_connect("localhost","root","","blog_nepal") or die ("Connection Eror");
  //echo "Connecrtion established";
  $tbl= "create table if not exists form(name varchar(20), email varchar(20), phone varchar(14), message varchar(50))";
  mysqli_query($con, $tbl) or die("Table creation error");
  //echo "table created successully";
  $insert = "insert into form values ('$name', '$email', '$phone', '$message')";
  mysqli_query($con, $insert) or die ("Inserion error");
  echo "Thank you for submitting your valuable data";
?>