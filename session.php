<?php
session_start();
if(isset($_SESSION['firstname']) && isset($_SESSION['lastname']) && isset($_SESSION['phonenumber']))
{
    $firstname=$_SESSION['firstname'];
    $lastname=$_SESSION['lastname'];
    $phonenumber=$_SESSION['phonenumber'];
}
if(!isset($_SESSION['firstname']) && !isset($_SESSION['lastname']) && !isset($_SESSION['phonenumber']))
{
  echo "<script>alert('Invalid user please login first')</script>";
  if(isset($_SESSION["shopping_cart"])) {
     unset($_SESSION["shopping_cart"]);
    }
  echo "<script>window.location='index.php'</script>";
}
?>