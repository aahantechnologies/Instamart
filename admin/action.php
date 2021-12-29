<?php
include('connection.php');
if(isset($_GET['status']))
{
$status1=$_GET['status'];
$query="select * from product_detail where regid='$status1'";
$select=mysqli_query($con,$query);
while($row=mysqli_fetch_object($select))
{
$status_var=$row->status;
if($status_var=='0')
{
$status_state=1;
}
else
{
$status_state=0;
}
$query="update product_detail set status='$status_state' where regid='$status1' ";
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

