
<?php
include ("connection.php");
if(isset($_REQUEST['signup']))
{
  extract($_REQUEST);
  $query="insert into register values(NULL,'$first_name','$last_name','$email','$phone_number','$password')";	
  
  if(mysqli_query($con,$query)):
      $check="select * from register where email='$email'";
      $_SESSION['firstname']=$first_name;
	   $_SESSION['lastname']=$last_name;
	    $_SESSION['phonenumber']=$phone_number;  
  	echo "<script>alert('Register successfully')</script>";
  	echo "<script>window.location='User.php'</script>";
  else:
  	echo "<script>alert('Register failed')</script>";
  	echo "<script>window.location='index.php'</script>";
  endif;  	
  
}
?>