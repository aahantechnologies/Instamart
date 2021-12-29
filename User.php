<!DOCTYPE html>
<?php
session_start();
if(isset($_SESSION['first_name']) && isset($_SESSION['last_name']) && isset($_SESSION['phone_number']) && isset($_SESSION['email']))
{
    $first_name=$_SESSION['first_name'];
    $last_name=$_SESSION['last_name'];
    $phone_number=$_SESSION['phone_number'];
	$email=$_SESSION['email'];
}
?>

<?php
include('db.php');
$status="";
if (isset($_POST['code']) && $_POST['code']!=""){
$code = $_POST['code'];
$result = mysqli_query($con,"SELECT * FROM product_detail WHERE code='$code'");
$row = mysqli_fetch_assoc($result);
$product_name = $row['product_name'];
$code = $row['code'];
$price = $_REQUEST['price'];
$image = $row['image'];

$cartArray = array(
	$code=>array(
	'product_name'=>$product_name,
	'code'=>$code,
	'price'=>$price,
	'quantity'=>1,
	'image'=>$image)
);

if(empty($_SESSION["shopping_cart"])) {
	$_SESSION["shopping_cart"] = $cartArray;
	$status = "";
}else{
	$array_keys = array_keys($_SESSION["shopping_cart"]);
	if(in_array($code,$array_keys)) {
		$status = "";	
	} else {
	$_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"],$cartArray);
	$status = "";
	}

	}
}
?>

<?php
$status="";
if (isset($_POST['action']) && $_POST['action']=="remove"){
if(!empty($_SESSION["shopping_cart"])) {
	foreach($_SESSION["shopping_cart"] as $key => $value) {
		if($_POST["code"] == $key){
		unset($_SESSION["shopping_cart"][$key]);
		// $status = "<div class='box' style='color:red;'>
		// Product is removed from your cart!</div>";
		$code=$_POST['code'];
        $query="delete from order_product where code='$code'";
        $res= mysqli_query($con,$query);
		}
		if(empty($_SESSION["shopping_cart"]))
		unset($_SESSION["shopping_cart"]);
			}		
		}
}

if (isset($_POST['action']) && $_POST['action']=="change"){
  foreach($_SESSION["shopping_cart"] as &$value){
    if($value['code'] === $_POST["code"]){
        $value['quantity'] = $_POST["quantity"];
        break; // Stop the loop after we've found the product
    }
	     
}
  	
}
?>
<?php
 include('connection.php'); 
 ?>
<html lang="en">
      <?php
       include 'Head.php';
      ?>
   <body>
      <header class="header-yello MyAllClearFix">
         <div class="header__left"><a href="User.php"><img src="image/logo/logo.png" title="Ramu Ki Mandi" alt="Ramu Ki Mandi"></a></div>
         <div class="header__center_middle">
            <input type="search" placeholder="Search products in Super Store" id="search-box">
            <button type="submit">
               <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 52.966 52.966" style="enable-background:new 0 0 52.966 52.966;" xml:space="preserve" width="20px" height="20px">
                  <path d="M51.704,51.273L36.845,35.82c3.79-3.801,6.138-9.041,6.138-14.82c0-11.58-9.42-21-21-21s-21,9.42-21,21s9.42,21,21,21  c5.083,0,9.748-1.817,13.384-4.832l14.895,15.491c0.196,0.205,0.458,0.307,0.721,0.307c0.25,0,0.499-0.093,0.693-0.279  C52.074,52.304,52.086,51.671,51.704,51.273z M21.983,40c-10.477,0-19-8.523-19-19s8.523-19,19-19s19,8.523,19,19  S32.459,40,21.983,40z" fill="#FFFFFF"></path>
                  <g>
                  </g>
               </svg>
            </button>
            <div id="suggesstion-box"></div>
         </div>
         <div class="header__right">
            <div class="header-item">
               <div class="account__login">
                   <li class="dropdown" style="display: block;" ><a class="dropdown-toggle" data-toggle="dropdown" >		 
	             <h6> <?php echo $row['first_name']; ?>&nbsp;&nbsp;<?php echo $row['last_name']; ?></h6></a> 
				  <ul  class="dropdown-menu">
                                     <li role="presentation"><a role="menuitem" tabindex="-1" href="order_page.php">My Order</a></li>
                                      <li role="presentation"><a role="menuitem" tabindex="-1" href="address_page.php">Address</a></li>
                                       <li role="presentation"><a role="menuitem" tabindex="-1" href="index.php"><i class=""></i>Logout</a></li>
                                        
                                </ul>	                       
                  </button>
                  </a>
                </div>
            </div>
            <div class="basket_login">
              <a onclick="myFunction()"><button type="button" data-toggle="modal" data-target="#sidebar-right" id="hideshowbt" ><img src="image/icon/cart-icon.png" /> Cart<span><?php echo $cart_count; ?></span></button></a>
             </div>
         </div>
      </header>
      <!-- start -->
      <div class="main">
      <div class="container">
         <div class="row padding_left">
            <?php
       include 'Navigation.php';
      ?>
        </div>
      </div>
      <div class="clearfix"></div>
       <div class="">
         <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
               <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
               <li data-target="#myCarousel" data-slide-to="1"></li>
               <li data-target="#myCarousel" data-slide-to="2"></li>
               <li data-target="#myCarousel" data-slide-to="3"></li>
            </ol>
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
               <div class="item active">
                  <img src="image/banner/dailyneedsproducts.jpg" alt="Los Angeles" style="width:100%;">
               </div>
               <div class="item">
                  <img src="image/banner/milk.jpg" alt="Chicago" style="width:100%;">
               </div>
               <div class="item">
                  <img src="image/banner/foodbanner.jpg" alt="New york" style="width:100%;">
               </div>
               <div class="item">
                  <img src="image/banner/freshfruits.jpg" alt="New york" style="width:100%;">
               </div>
            </div>
            <!-- Left and right controls -->
            <!-- <a class="left carousel-control" href="#myCarousel" data-slide="prev">
               <span class="glyphicon glyphicon-chevron-left"></span>
               <span class="sr-only">Previous</span>
               </a>
               <a class="right carousel-control" href="#myCarousel" data-slide="next">
               <span class="glyphicon glyphicon-chevron-right"></span>
               <span class="sr-only">Next</span>
               </a> -->
         </div>
      </div>
      <!-- carousel end -->
	  <!-- whychoose strat -->  
      <div class="row extramargin mywhychoose">       
        <div class="col-sm-12" style="background:#e6fdef">
          <div class="col-sm-3" style="padding-top: 20px;">WHY CHOOSE ORGANIC AT RAMU KI MANDI</div>
          <div class="col-sm-9">
            <div class="col-sm-3"><img src="image/icon/best-quality.png" alt="Best Quality"> Best Quality</div>
            <div class="col-sm-3"><img src="image/icon/food.png" alt="Organic Food"> Organic Food</div>
            <div class="col-sm-3"><img src="image/icon/free-delivery.png" alt="Free Delivery">Free Delivery</div>
            <div class="col-sm-3"><img src="image/icon/policy.png" alt="Privacy Policy">Privacy Policy</div>
          </div>
        </div>        
      </div>
      <!-- whychoose end -->
      <div class="row extramargin">
        <div id="ShopImg" class="col-md-12 col-sm-12 col-xs-12 ">
            <center><h2>Shop By Categories</h2></center><br>
            <div class="col-md-3 col-sm-6 col-xs-6"><a href="Vegetable.php"><img src="image/banner/Vegetables.png" alt="Vegetable"></a></div>
            <div class="col-md-3 col-sm-6 col-xs-6"><a href="Fruits.php"><img src="image/banner/Fruits.png" alt="Fruits"></a></div>
            <div class="col-md-3 col-sm-6 col-xs-6"><a href="DairyProducts.php"><img src="image/banner/Milk.png" alt="Milk"></a></div>
            <div class="col-md-3 col-sm-6 col-xs-6"><a href="Grocery.php"><img src="image/banner/Categories.png" alt="Categories"></a></div>
        </div>
      </div>
      <!-- categories end -->
      <!-- products strat -->      
      <div class="row extramargin productcat">
        <div class="col-sm-10 col-sm-offset-1 col-xs-12 col-xs-offset-0" style="text-align:center;">         
            <h2>Featured Products</h2> <br>
             <!--  shopping cart start -->

<?php
if(!empty($_SESSION["shopping_cart"])) {
$cart_count = count(array_keys($_SESSION["shopping_cart"]));
?>
<div  class="cart_div">

</div>
<?php
}

$result = mysqli_query($con,"SELECT * FROM product_detail where status='1' LIMIT 0,5");
while($row = mysqli_fetch_assoc($result)){
	?>
             <form method='post' action=''>
			 <input type='hidden' name='code' value="<?php echo $row['code']; ?>" />
            <div class="col-md-2 col-sm-3 col-xs-6" id="pdct_img">
                <a href="OneProduct.php?regid=<?php echo $row['regid'];?> && category=<?php echo $row['category'];?>"> <img  src="<?php echo $row['image']; ?>" height="152" width="152" alt="demo">
                    <h4><?php echo $row['product_name']; ?></h4>
                </a>
              &#8377; <select name="price">
                   <option value="<?php echo $row['price1']; ?>"><?php echo $row['price1']; ?> &nbsp;<?php echo $row['quantity1']; ?> </option>
                    <option value="<?php echo $row['price2']; ?>"><?php echo $row['price2']; ?> &nbsp;<?php echo $row['quantity2']; ?></option>
                    <option value="<?php echo $row['price3']; ?>"><?php echo $row['price3']; ?> &nbsp;<?php echo $row['quantity3']; ?></option>
                    <option value="<?php echo $row['price4']; ?>"><?php echo $row['price4']; ?> &nbsp;<?php echo $row['quantity4']; ?></option>
                    <option value="<?php echo $row['price5']; ?>"><?php echo $row['price5']; ?> &nbsp;<?php echo $row['quantity5']; ?> </option>
                    <option value="<?php echo $row['price6']; ?>"><?php echo $row['price6']; ?> &nbsp;<?php echo $row['quantity6']; ?> </option> 
                    
                </select><br><br>                
                
                
                <input id="sbmtBGClr" type="submit" class='buy' value="Add to Cart" name="submit">
            </div>
            </form>
            <?php
                }
            ?>
        </div>
      </div>
      <!-- products end -->
      <!-- demo banner part=1 START -->
      <div class="row extramargin MTB40">
        <div class="col-md-10 col-md-offset-1 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0">
          <div id="resPadding" class="col-md-6 col-sm-12 col-xs-12"><a href="#"><img width="100%" src="image/banner/organic.png" alt="organic"></a></div>
          
          <div id="resPadding" class="col-md-6 col-sm-12 col-xs-12"><a href="#"><img width="100%"  src="image/banner/cod2.png" alt="Cash On Delivery"></a></div>
        </div>
      </div>
      <!-- demo banner part=1 end -->
      <!-- item strat -->      
      <div class="row extramargin productcat">
        <div class="col-sm-10 col-sm-offset-1 col-xs-12 col-xs-offset-0" style="text-align:center;">         
            <h2>New Arrivals</h2> <br>
             <?php                
               $result = mysqli_query($con,"SELECT * FROM product_detail where newarrival='1' LIMIT 0,5");
              while($row = mysqli_fetch_assoc($result)){
	          ?>
             <form method='post' action=''>
			 <input type='hidden' name='code' value="<?php echo $row['code']; ?>" />
            <div class="col-md-2 col-sm-3 col-xs-6" id="pdct_img">
                <a href="OneProduct.php?regid=<?php echo $row['regid'];?> && category=<?php echo $row['category'];?>"> <img  src="<?php echo $row['image']; ?>" height="152" width="152" alt="demo">
                    <h4><?php echo $row['product_name']; ?></h4>
                </a>
              &#8377; <select name="price">
                   <option value="<?php echo $row['price1']; ?>"><?php echo $row['price1']; ?> &nbsp;<?php echo $row['quantity1']; ?> </option>
                    <option value="<?php echo $row['price2']; ?>"><?php echo $row['price2']; ?> &nbsp;<?php echo $row['quantity2']; ?></option>
                    <option value="<?php echo $row['price3']; ?>"><?php echo $row['price3']; ?> &nbsp;<?php echo $row['quantity3']; ?></option>
                    <option value="<?php echo $row['price4']; ?>"><?php echo $row['price4']; ?> &nbsp;<?php echo $row['quantity4']; ?></option>
                    <option value="<?php echo $row['price5']; ?>"><?php echo $row['price5']; ?> &nbsp;<?php echo $row['quantity5']; ?> </option>
                    <option value="<?php echo $row['price6']; ?>"><?php echo $row['price6']; ?> &nbsp;<?php echo $row['quantity6']; ?> </option> 
                    
                </select><br><br>                
                
				<input id="sbmtBGClr" type="submit" class='buy' value="Add to Cart" name="submit">
            </div>
            </form>
            <?php
                }
            ?>
        </div>
      </div>
      <!-- items end -->
      <!-- demo banner part=2 START -->
      <div class="row extramargin MTB40">
          <div class="col-md-10 col-md-offset-1 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0">
            <img width="100%" src="image/banner/FooterImage.png" alt="demo">
          </div>
        </div>
        <!-- demo banner part=2 end -->
        <!-- item strat -->   
      <!-- categories strat -->      
      <div class="row extramargin productcat">
        <div class="col-sm-10 col-sm-offset-1 col-xs-12 col-xs-offset-0" style="text-align:center;">         
            <h2>Grocery</h2> <br> 
            <?php 
             $result = mysqli_query($con,"SELECT * FROM product_detail where liked='1' LIMIT 0,5");
             while($row = mysqli_fetch_assoc($result)){
           	?>
             <form method='post' action=''>
			 <input type='hidden' name='code' value="<?php echo $row['code']; ?>" />
            <div class="col-md-2 col-sm-3 col-xs-6" id="pdct_img">
                <a href="OneProduct.php?regid=<?php echo $row['regid'];?> && category=<?php echo $row['category'];?>"> <img  src="<?php echo $row['image']; ?>" height="152" width="152" alt="demo">
                    <h4><?php echo $row['product_name']; ?></h4>
                </a>
              &#8377; <select name="price">
                   <option value="<?php echo $row['price1']; ?>"><?php echo $row['price1']; ?> &nbsp;<?php echo $row['quantity1']; ?> </option>
                    <option value="<?php echo $row['price2']; ?>"><?php echo $row['price2']; ?> &nbsp;<?php echo $row['quantity2']; ?></option>
                    <option value="<?php echo $row['price3']; ?>"><?php echo $row['price3']; ?> &nbsp;<?php echo $row['quantity3']; ?></option>
                    <option value="<?php echo $row['price4']; ?>"><?php echo $row['price4']; ?> &nbsp;<?php echo $row['quantity4']; ?></option>
                    <option value="<?php echo $row['price5']; ?>"><?php echo $row['price5']; ?> &nbsp;<?php echo $row['quantity5']; ?> </option>
                    <option value="<?php echo $row['price6']; ?>"><?php echo $row['price6']; ?> &nbsp;<?php echo $row['quantity6']; ?> </option> 
                    
                </select><br><br>                
                
				<input id="sbmtBGClr" type="submit" class='buy' value="Add to Cart" name="submit">
            </div>
            </form>
            <?php
                }
            ?>
        </div>
      </div>
	  
<div style="clear:both;"></div>


<?php echo $status; ?>
</div>


<!-- start -->

<div class="nwCart">



<!-- cart png img start -->

<br><br><br>
<div style="clear:both;"></div>
<!-- cart png img end -->
<div  class="mynewcart">
	
<div class="cart" >
<?php
if(isset($_SESSION["shopping_cart"])){
    $total_price = 0;
?>	
<table id="myDIV" class="table">
<tbody>
<tr id="mydiffclr">
<td>PRODUCT</td>
<td>ITEM NAME</td>
<td>QTY.</td>
<td>UNIT PRICE</td>
<td>ITEMS TOTAL</td>
</tr>	
<?php		
foreach ($_SESSION["shopping_cart"] as $product){
?>
<tr>
<td><img src='<?php echo $product["image"]; ?>' width="50" height="40" /></td>
<td><?php echo $product["product_name"]; ?><br />
<form method='post' action=''>
<input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
<input type='hidden' name='action' value="remove" />
<button type='submit' class='remove'>Remove Item</button>
</form>
</td>
<td>
<form method='post' action=''>
<input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
<input type='hidden' name='action' value="change" />
<select name='quantity' class='quantity' onchange="this.form.submit()">
<option <?php if($product["quantity"]==1) echo "selected";?> value="1">1</option>
<option <?php if($product["quantity"]==2) echo "selected";?> value="2">2</option>
<option <?php if($product["quantity"]==3) echo "selected";?> value="3">3</option>
<option <?php if($product["quantity"]==4) echo "selected";?> value="4">4</option>
<option <?php if($product["quantity"]==5) echo "selected";?> value="5">5</option>
</select>
</form>
</td>
<td><?php echo "Rs. ".$product["price"]; ?></td>
<td><?php echo "Rs. ".$product["price"]*$product["quantity"]; ?></td>
</tr>
<?php
$total_price += ($product["price"]*$product["quantity"]);
// Add product Process
$first_name=$_SESSION['firstname'];
$price=$product["price"];
$product_name=$product["product_name"];
$code=$product["code"];
$quantity=$product["quantity"];
$query="insert into order_product values(NULL,'$first_name','$product_name','$code','$price','$quantity','$status')";	
  
  $res=mysqli_query($con,$query);
}
$_SESSION['total_price']=$total_price;
?>
<tr>
<td id="checkoutbtn" align="left"><a href="CheckOut.php">Check Out</a></td>
<td colspan="5" align="right">
<strong>TOTAL: <?php echo "Rs. ".$total_price; ?></strong>
</td>
</tr>
</tbody>
</table>		
  <?php
}else{
	// echo "<h3>Your cart is empty!</h3>";
	}
?>
</div>

<div style="clear:both;"></div>


<?php echo $status; ?>
</div>

</div>
</div>
<script>
function myFunction() {
    var x = document.getElementById("myDIV");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}
</script>

<!-- shopping cart end -->
      <!-- categories end -->
       <!-- demo banner part=3 START -->
       <div class="row extramargin MTB40">
          <div class="col-md-10 col-md-offset-1 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0">
            <img width="100%" src="image/banner/FREE.png" alt="demo">
          </div>
        </div>
        <!-- demo banner part=3 end -->
        <!-- footer start -->
       <?php
       include 'Footer.php';
      ?>
        <!-- footer end  -->
      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="js/bootstrap.min.js"></script>
   </body>
</html>