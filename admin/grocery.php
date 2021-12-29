<?php
include('connection.php');
if(isset($_GET['liked']))
{
$liked1=$_GET['liked'];
$query="select * from product_detail where regid='$liked1'";
$select=mysqli_query($con,$query);
while($row=mysqli_fetch_object($select))
{
$liked_var=$row->liked;
if($liked_var=='0')
{
$liked_state=1;
}
else
{
$liked_state=0;
}
$query="update product_detail set liked='$liked_state' where regid='$liked1' ";
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

