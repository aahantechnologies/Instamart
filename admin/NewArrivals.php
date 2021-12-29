<?php
include('connection.php');
if(isset($_GET['newarrival']))
{
$newarrival1=$_GET['newarrival'];
$query="select * from product_detail where regid='$newarrival1'";
$select=mysqli_query($con,$query);
while($row=mysqli_fetch_object($select))
{
$newarrival_var=$row->newarrival;
if($newarrival_var=='0')
{
$newarrival_state=1;
}
else
{
$newarrival_state=0;
}
$query="update product_detail set newarrival='$newarrival_state' where regid='$newarrival1' ";
$update=mysqli_query($con,$query);
if($update)
{
header("Location:Product.php");
}
else
{
echo mysql_error();
}
}
?>
<?php
}
?>

