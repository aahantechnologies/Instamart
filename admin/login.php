<!DOCTYPE html>
<?php    
    include 'connection.php';
    ?>
<html lang="en"> 
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="keywords" content="Bootstrap, Landing page, Template, Registration, Landing">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="author" content="Grayrids">
<title>InstaMart</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
<link rel="stylesheet" href="../login/bootstrap.css">
<link rel="stylesheet" href="../login/line-icons.css">
<link rel="stylesheet" href="../login/owl_002.css">
<link rel="stylesheet" href="../login/owl.css">
<link rel="stylesheet" href="../login/slicknav.css">
<link rel="stylesheet" href="../login/animate.css">
<link rel="stylesheet" href="../login/main.css">
<link rel="stylesheet" href="../login/responsive.css">
<link rel="stylesheet" id="colors" href="../login/cyan.css" type="text/css">
</head>    
<body>
<div class="page-header">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="inner-header">
<h3>InstaMart</h3>
</div>
</div>
</div>
</div>
</div>
<section id="content" class="section-padding">
<div class="container">
<div class="row justify-content-center">
<div class="col-lg-5 col-md-6 col-xs-12">
<div class="page-login-form box">
<h3>
Login
</h3>
    <form class="login-form" method="post">
<div class="form-group">
<div class="input-icon">
<i class="fa fa-user"></i>
<input id="sender-email" class="form-control" name="username" placeholder="User Name" type="text">
</div>
</div>
<div class="form-group">
<div class="input-icon">
<i class="fa fa-lock"></i>
<input class="form-control" name="password" placeholder="Password" type="password">
</div>
</div>
<input type="submit" value="Submit" name="adminlogin" class="btn btn-common log-btn">
</form>
</div>
</div>
</div>
</div>
</section>
<a href="#" class="back-to-top" style="display: none;">
<i class="fa fa-arrow-up"></i>
</a>
<div id="preloader" style="display: none;">
<div class="loader" id="loader-1"></div>
</div>
<script src="../login/jquery-min.js"></script>
<script src="../login/popper.js"></script>
<script src="../login/bootstrap.js"></script>
<script src="../login/owl.js"></script>
<script src="../login/jquery_002.js"></script>
<script src="../login/jquery.js"></script>
<script src="../login/waypoints.js"></script>
<script src="../login/form-validator.js"></script>
<script src="../login/contact-form-script.js"></script>
<script src="../login/main.js"></script>
</body></html>
<?php
if(isset($_REQUEST['adminlogin']))
{
  $username=$_REQUEST['username'];
  $password=$_REQUEST['password'];
  $query="select * from adminlogin where username='$username' and password='$password'";
  $res=mysqli_query($con,$query);  
  $num=mysqli_num_rows($res);
  if($num>0):
  echo "<script>window.location='Dashboard.php'</script>";
  else:
  	echo "<script>alert('Invailid Username And Password....')</script>";
  	echo "<script>window.location='login.php'</script>";
  endif;
}
?>