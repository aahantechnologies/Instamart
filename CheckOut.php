<!DOCTYPE html>
<?php
include 'session.php';
?>
<?php
$amount=$_SESSION['total_price'];
$code=$_SESSION['code'];
//include 'session.php';
include 'connection.php';
?>
<html lang="en">
     <?php
       include 'Head.php';
      ?>
   <body>
      <header class="header-yello MyAllClearFix">
         <div class="header__left"><a href="index.php"><img src="image/logo/instaMartIM.png" title="InstaMart" alt="InstaMart"></a></div>   
         <form method="post">
         <div class="header__center_middle">   
         <div  class="mobHide">+91 7440866015</div>          
                 <input type="search" placeholder="Search products in Super Store" id="search-box" name="searchvalue">
                <button type="submit" name="search">
               <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 52.966 52.966" style="enable-background:new 0 0 52.966 52.966;" xml:space="preserve" width="20px" height="20px">
                  <path d="M51.704,51.273L36.845,35.82c3.79-3.801,6.138-9.041,6.138-14.82c0-11.58-9.42-21-21-21s-21,9.42-21,21s9.42,21,21,21  c5.083,0,9.748-1.817,13.384-4.832l14.895,15.491c0.196,0.205,0.458,0.307,0.721,0.307c0.25,0,0.499-0.093,0.693-0.279  C52.074,52.304,52.086,51.671,51.704,51.273z M21.983,40c-10.477,0-19-8.523-19-19s8.523-19,19-19s19,8.523,19,19  S32.459,40,21.983,40z" fill="#FFFFFF"></path>
                  <g>
                  </g>
               </svg>
            </button>
            <div id="suggesstion-box"></div>          
         </div>
       </form>
         <div class="header__right">
            <div class="header-item">
               <div class="account__login">
                   <li class="dropdown" style="display: block;" ><a class="dropdown-toggle" data-toggle="dropdown" >		 
	               <?php echo $_SESSION['firstname'] ; ?>&nbsp;&nbsp;<?php echo $_SESSION['lastname']; ?></a> 
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
            </div
         </div>
      </header>
      <!-- start -->
      <div class="main">
      <div class="container">
         <div class="row padding_left">
            <?php
            include 'Navigation.php';
            ?>
            <!-- <div class="ordermenu mobile">For Order <i class="fa fa-phone"></i> <i class="fa fa-whatsapp"></i><a href="tel:+919109109830">9109109830</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="https://api.whatsapp.com/send?phone=+919109109830">9109109850</a> </div> -->
         </div>
      </div>
     <!-- navigation end -->
      <!-- Product start -->
      <div class="clearfix"></div>
        <div class="space"></div>
      <div class="checkout_page">
      <div class="container">
        <div class="col-sm-8">
          <div class="row">
            <div class="panel-group" id="accordion">
              <div class="panel panel-default">
                
                <div>
                  <div class="panel-body" id="panel_first">
                                        <div class="clearfix"></div>
                                        <div class="addnew_add" id="form" style="margin-top: 20px;">
                      <form method="post">
                        <div class="row">
                          <div class="col-md-12"> <h4>Personal Details</h4> </div>
                        </div>
                        <div class="row">
                          <div class="col-md-3 no-padding-right"> 
                            <div class="form-group">
                              <label>First Name</label>
                              <input type="text" class="" name="first_name"  value="<?php echo $_SESSION['firstname']; ?>" readonly>
                              <input type="text" class="" name="code" value="<?php echo $code ; ?>" hidden="">
                            </div>
                          </div>
                          <div class="col-md-3 no-padding-right"> 
                            <div class="form-group">
                              <label>Last Name</label>
                              <input type="text" class="" name="last_name"  value="<?php echo $_SESSION['lastname']; ?>" readonly>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Contact Number*</label>
                              <input type="text" class="" required="" pattern="[0-9]{10}" name="phone_number" value="<?php echo $_SESSION['phonenumber']; ?>">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12"> <h4>Address Details</h4> </div>
                        </div>
                        <div class="row">
                          <div class="col-md-3 no-padding-right"> 
                            <div class="form-group">
                              <label>House No*</label>
                              <input type="text" class="" name="house_no" required="">
                            </div>
                          </div>
                          <div class="col-md-9">
                            <div class="form-group">
                              <label>Apartment Name*</label>
                              <input type="text" class="" name="home_address" required="">
                            </div>
                          </div>
                          <div class="col-md-6 no-padding-right"> 
                            <div class="form-group">
                              <label>Street Details*</label>
                              <input type="text" class="" name="street_detail" required="">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Landmark For Easy Reach Out*</label>
                              <input type="text" class="" name="landmark" required="">
                            </div>
                          </div>
                          <div class="col-md-6 no-padding-right"> 
                            <div class="form-group">
                              <label>Area Details*</label>
                              <input type="text" class="" name="area" required="">
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label>Pincode*</label>
                              <input type="text" class="" name="pincode" required="" pattern="[0-9]{6}">                             
                            </div>
                          </div>
                           <div class="col-md-3">
                            <div class="form-group">
                              <label>City*</label>
                              <input type="text" class="" name="city" required="">
							  <input type="text" class="" name="amount" value="<?php echo $amount ; ?>" hidden="">
                            </div>
                          </div>
						   <div class='col-sm-6'>
                            <div class="form-group">
							<label>Expected Date and Time</label>
                                <div class='input-group date' id='datetimepicker1'>								
                                  <input type='text' class="form-control" name="dateandtime" />
                                  <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $(function () {
                $('#datetimepicker1').datetimepicker();
            });
        </script>
                        </div>                        
                        <div class="row">
                          <div class="col-md-6">
                            <input type="submit" value="PLACE ORDER" class="add_address" name="address">                            
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="panel panel-default">
                <div class="panel-heading" id="thirdblock">
                  <div class="row">
                    <div class="col-md-12">
                      <h2>Payment Options</h2>
                      <!-- <a data-toggle="collapse" data-parent="#accordion" href="#collapse3"></a>
                      <input type="submit" name="payment" class="procced">
                      <a href="PaytmKit/index.php?product_id=&product_value=288">Payment</a>-->
                      <div class="payment_mathod">
                        <div class="color_Line">
                          <div class="radio_checkbox">     
                            <label>
                              <div class="check_box">
                                <input type="radio" name="radio" class="proccedradio_two" id="cashon" value="cashon" checked="checked">
                                <span class="checkmark_radio"></span>
                              </div>
                              <p class="checkbox_content small">Cash on Delivery</p>
                            </label>
                          </div>
                        </div>                          
                      </div>     
                    </div>
                  </div>
                </div>
                <div id="collapse3" class="panel-collapse collapse">
                  <div class="panel-body">Lorem ipsum dolor sit amet, 
consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
 et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut 
aliquip ex ea commodo consequat.
                  </div>
                </div>
              </div>
            </div> 
          </div>
        </div>
        <div class="col-sm-4">
          <div class="order_summery">
            <h4>Order Summary</h4>
            <!--<p class="vocher_code">Have a voucher code</p>
            <form><input type="text" placeholder="Enter your voucher code" /> <input type="submit" value="Apply" ></form>-->
            <table width="100%" cellspacing="0" cellpadding="0" border="0">
              <tbody>
                <tr>
                  <td class="spacing">Basket Value</td>
                  <td class="text-right spacing">Rs <?php echo $amount ; ?></td>
                </tr>
                <tr>
                  <td>Delivery Charge	</td>
                                      <td class="text-right">Rs 00</td>
                                    <!-- <td class="text-right">Rs 20</td> -->
                </tr>
                <!-- <tr>
                  <td>Voucher Discount	</td>
                  <td class="text-right">Apply Voucher</td>
                </tr> -->
                <!-- <tr>
                  <td>
                    <div class="short_by_dropdown" style="float:left;">
                      <div class="radio_checkbox">
                        <li style="position:relative;">
                          <label> 
                            <div class="check_box">
                              <input type="checkbox">
                              <span class="checkmark"></span>
                            </div> 
                            <p class="checkbox_content">Pure sure</p>
                          </label>
                        </li> 
                      </div>
                    </div>
                  </td>
                  <td class="text-right">Rs 0</td>
                </tr> -->
              </tbody>
              <tfoot>
                <tr>
                  <td class="spacing"><strong>Total Amount Payable</strong>	</td>
                                      <td class="text-right spacing"><strong>Rs <?php echo $amount ; ?></strong></td>
                                    <!-- <td class="text-right spacing"><strong>Rs </strong></td> -->
                </tr>
              </tfoot>
            </table>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
    </div>
       <!-- footer start -->
     <?php 
     include('Footer.php');
     ?>
     <!-- footer end -->
      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
      <!-- Include all compiled plugins (below), or include individual files as needed -->     
        <script src="js/bootstrap.min.js"></script>
      <!-- cart-js start -->
      <script src="js/minicart.js"></script> 
      <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/2.14.1/moment.min.js"></script> 
      <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script> 
   </body>
</html>
<?php
if(isset($_REQUEST['address']))
{
  extract($_REQUEST);
  $query="insert into order_details values(NULL,'$first_name','$last_name','$phone_number','$house_no','$home_address','$street_detail','$landmark','$area','$pincode','$city','$amount','$dateandtime')";	
  
  if(mysqli_query($con,$query)):
  	echo "<script>alert('Order Placed successfully')</script>";
	if(isset($_SESSION["shopping_cart"])) {
     unset($_SESSION["shopping_cart"]);
    }
	echo "<script>window.location='thankyou.php?'</script>";
  else:
  	echo "<script>alert('Register failed')</script>";
  	echo "<script>window.location='register.php'</script>";
  endif;  	
  
}
?>