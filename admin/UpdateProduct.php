<!DOCTYPE html>
<!--
Item Name: Elisyam - Web App & Admin Dashboard Template
Version: 1.5
Author: SAEROX

** A license must be purchased in order to legally use this template for your project **
-->
<?php
$regid=$_REQUEST['regid'];
include("connection.php");
$query="select * from product_detail where regid=$regid";
$res=mysqli_query($con,$query);
$row1=mysqli_fetch_array($res);
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Product</title>
        <meta name="description" content="Elisyam is a Web App and Admin Dashboard Template built with Bootstrap 4">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Google Fonts -->
        <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"></script>
        <script>
          WebFont.load({
            google: {"families":["Montserrat:400,500,600,700","Noto+Sans:400,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
        </script>
        <!-- Favicon -->
        <link rel="apple-touch-icon" sizes="180x180" href="assets/img/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon-16x16.png">
        <!-- Stylesheet -->
        <link rel="stylesheet" href="assets/vendors/css/base/bootstrap.min.css">
        <link rel="stylesheet" href="assets/vendors/css/base/elisyam-1.5.min.css">
        <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
    </head>
    <body id="page-top">
        <!-- Begin Preloader -->
        <div id="preloader">
            <div class="canvas">
                 <h1 class="loader-logo">RKM</h1>
                <div class="spinner"></div>   
            </div>
        </div>
        <!-- End Preloader -->
        <div class="page">
            <!-- Begin Header -->
             <?php
           include 'Header.php';
           ?>
            <!-- End Header -->
            <!-- Begin Page Content -->
            <div class="page-content d-flex align-items-stretch">
                <div class="default-sidebar">
                    <!-- Begin Side Navbar -->
                    <?php
           include 'Navigation.php';
           ?>
                    <!-- End Side Navbar -->
                </div>
                <!-- End Left Sidebar -->
                <div class="content-inner">
                    <div class="container-fluid">
                        <!-- Begin Page Header-->
                        <div class="row">
                            <div class="page-header">
	                            <div class="d-flex align-items-center">
	                                <h2 class="page-header-title">Product</h2>
	                                <div>
			                            <ul class="breadcrumb">
			                                <li class="breadcrumb-item"><a href="db-default.html"><i class="ti ti-home"></i></a></li>
			                                <li class="breadcrumb-item active">Products</li>
			                            </ul>
	                                </div>
	                            </div>
                            </div>
                        </div>
                        <!-- End Page Header -->
                        <div class="row">
                            <div class="col-xl-12">
                                <!-- Default -->
                                <div class="widget has-shadow">
                                    <div class="widget-header bordered no-actions d-flex align-items-center">
                                        <h4>Detail</h4>
                                    </div>
                                    <div class="widget-body">
                                        <div class="table-responsive">
                                             <form class="form-horizontal " role="form" method="post" name="availability_form" enctype="multipart/form-data">
							 <div class="form-group">
									<label class="control-label col-md-2 col-sm-2 col-xs-12">Product Name</label>
                                    <div class="col-md-8 col-sm-4 col-xs-12">
                                        <input class="form-control" type="text" name="product_name" value="<?php echo $row1['product_name'];?>">
									</div>							
								</div> 
								 <div class="form-group">
									<label class="control-label col-md-2 col-sm-2 col-xs-12">Brand Name</label>
                                    <div class="col-md-8 col-sm-4 col-xs-12">
                                        <input class="form-control" type="text" name="brand" value="<?php echo $row1['brand'];?>">
									</div>								
								</div> 
                                <div class="form-group">
									<label class="control-label col-md-2 col-sm-2 col-xs-12">Feature</label>
                                    <div class="col-md-8 col-sm-4 col-xs-12">
                                        <textarea class="form-control" name="feature"><?php echo $row1['feature'];?></textarea>
									</div>									
								</div>
                                <div class="form-group">
									<label class="control-label col-md-2 col-sm-2 col-xs-12">Benefits</label>
                                    <div class="col-md-8 col-sm-4 col-xs-12">
                                        <textarea class="form-control" name="benefit"><?php echo $row1['benefit'];?></textarea>
									</div>									
								</div>
								 <?php
// Include the database configuration file
require 'dbConfig.php';

function categoryTree1($parent_id = 0, $sub_mark = ''){
    global $db;
    $query = $db->query("SELECT * FROM product WHERE parent_id = $parent_id ORDER BY name ASC");
   
    if($query->num_rows > 0){
        while($row = $query->fetch_assoc()){
            echo '<option value="'.$row['name'].'">'.$sub_mark.$row['name'].'</option>';
            categoryTree1($row['id'], $sub_mark.'---');
        }
    }
}
?>		
            <div class="form-group">
				<label class="control-label col-md-2 col-sm-2 col-xs-12">Quantity</label>
                                    <div class="col-md-8 col-sm-4 col-xs-12">                              
                                             <select class="form-control" name="quantity1">                                     
                                                      <?php categoryTree1(); ?>
                                        </select>
									</div>								
								</div>
                                      <div class="form-group">
									<label class="control-label col-md-2 col-sm-2 col-xs-12">Price </label>
                                    <div class="col-md-8 col-sm-4 col-xs-12">
                                        <input class="form-control" type="text" name="price1" value="<?php echo $row1['price1'];?>">
									</div>									
								</div>
                                                 
                                 <?php
// Include the database configuration file
require 'dbConfig.php';

function categoryTree2($parent_id = 0, $sub_mark = ''){
    global $db;
    $query = $db->query("SELECT * FROM product WHERE parent_id = $parent_id ORDER BY name ASC");
   
    if($query->num_rows > 0){
        while($row = $query->fetch_assoc()){
            echo '<option value="'.$row['name'].'">'.$sub_mark.$row['name'].'</option>';
            categoryTree2($row['id'], $sub_mark.'---');
        }
    }
}
?>		
            <div class="form-group">
				<label class="control-label col-md-2 col-sm-2 col-xs-12">Quantity</label>
                                    <div class="col-md-8 col-sm-4 col-xs-12">                              
                                             <select class="form-control" name="quantity2">                                     
                                                      <?php categoryTree2(); ?>
                                        </select>
									</div>								
								</div>
                               <div class="form-group">
									<label class="control-label col-md-2 col-sm-2 col-xs-12">Price </label>
                                    <div class="col-md-8 col-sm-4 col-xs-12">
                                        <input class="form-control" type="text" name="price2" value="<?php echo $row1['price2'];?>">
									</div>								
								</div> 
                                 <?php
// Include the database configuration file
require 'dbConfig.php';

function categoryTree3($parent_id = 0, $sub_mark = ''){
    global $db;
    $query = $db->query("SELECT * FROM product WHERE parent_id = $parent_id ORDER BY name ASC");
   
    if($query->num_rows > 0){
        while($row = $query->fetch_assoc()){
            echo '<option value="'.$row['name'].'">'.$sub_mark.$row['name'].'</option>';
            categoryTree3($row['id'], $sub_mark.'---');
        }
    }
}
?>		
            <div class="form-group">
				<label class="control-label col-md-2 col-sm-2 col-xs-12">Quantity</label>
                                    <div class="col-md-8 col-sm-4 col-xs-12">                              
                                             <select class="form-control" name="quantity3">                                     
                                                      <?php categoryTree3(); ?>
                                        </select>
									</div>								
								</div>
                                                  <div class="form-group">
									<label class="control-label col-md-2 col-sm-2 col-xs-12">Price</label>
                                    <div class="col-md-8 col-sm-4 col-xs-12">
                                        <input class="form-control" type="text" name="price3" value="<?php echo $row1['price3'];?>">
									</div>									
								</div> 
                                                 <?php
// Include the database configuration file
require 'dbConfig.php';

function categoryTree4($parent_id = 0, $sub_mark = ''){
    global $db;
    $query = $db->query("SELECT * FROM product WHERE parent_id = $parent_id ORDER BY name ASC");
   
    if($query->num_rows > 0){
        while($row = $query->fetch_assoc()){
            echo '<option value="'.$row['name'].'">'.$sub_mark.$row['name'].'</option>';
            categoryTree4($row['id'], $sub_mark.'---');
        }
    }
}
?>		
            <div class="form-group">
				<label class="control-label col-md-2 col-sm-2 col-xs-12">Quantity</label>
                                    <div class="col-md-8 col-sm-4 col-xs-12">                              
                                             <select class="form-control" name="quantity4" >                                     
                                                      <?php categoryTree4(); ?>
                                        </select>
									</div>								
								</div>
                                                  <div class="form-group">
									<label class="control-label col-md-2 col-sm-2 col-xs-12">Price</label>
                                    <div class="col-md-8 col-sm-4 col-xs-12">
                                        <input class="form-control" type="text" name="price4" value="<?php echo $row1['price4'];?>">
									</div>									
								</div> 
                                                  <?php
// Include the database configuration file
require 'dbConfig.php';

function categoryTree5($parent_id = 0, $sub_mark = ''){
    global $db;
    $query = $db->query("SELECT * FROM product WHERE parent_id = $parent_id ORDER BY name ASC");
   
    if($query->num_rows > 0){
        while($row = $query->fetch_assoc()){
            echo '<option value="'.$row['name'].'">'.$sub_mark.$row['name'].'</option>';
            categoryTree5($row['id'], $sub_mark.'---');
        }
    }
}
?>		
            <div class="form-group">
				<label class="control-label col-md-2 col-sm-2 col-xs-12">Quantity</label>
                                    <div class="col-md-8 col-sm-4 col-xs-12">                              
                                             <select class="form-control" name="quantity5">                                     
                                                      <?php categoryTree5(); ?>
                                        </select>
									</div>								
								</div>
                                                  <div class="form-group">
									<label class="control-label col-md-2 col-sm-2 col-xs-12">Price </label>
                                    <div class="col-md-8 col-sm-4 col-xs-12">
                                        <input class="form-control" type="text" name="price5" value="<?php echo $row1['price5'];?>">
									</div>									
						<?php
// Include the database configuration file
require 'dbConfig.php';

function categoryTree6($parent_id = 0, $sub_mark = ''){
    global $db;
    $query = $db->query("SELECT * FROM product WHERE parent_id = $parent_id ORDER BY name ASC");
   
    if($query->num_rows > 0){
        while($row = $query->fetch_assoc()){
            echo '<option value="'.$row['name'].'">'.$sub_mark.$row['name'].'</option>';
            categoryTree6($row['id'], $sub_mark.'---');
        }
    }
}
?>		
            <div class="form-group">
				<label class="control-label col-md-2 col-sm-2 col-xs-12">Quantity</label>
                                    <div class="col-md-8 col-sm-4 col-xs-12">                              
                                             <select class="form-control" name="quantity6" >                                     
                                                      <?php categoryTree6(); ?>
                                        </select>
									</div>								
								</div>
                                                  <div class="form-group">
				<label class="control-label col-md-2 col-sm-2 col-xs-12">price </label>
                                    <div class="col-md-8 col-sm-4 col-xs-12">
                                        <input class="form-control" type="text" name="price6" value="<?php echo $row1['price6'];?>">
									</div>									
								</div> 
                                                 <?php
// Include the database configuration file
require 'dbConfig.php';

function categoryTree($parent_id = 0, $sub_mark = ''){
    global $db;
    $query = $db->query("SELECT * FROM categories WHERE parent_id = $parent_id ORDER BY name ASC");
   
    if($query->num_rows > 0){
        while($row = $query->fetch_assoc()){
            echo '<option value="'.$row['name'].'">'.$sub_mark.$row['name'].'</option>';
            categoryTree($row['id'], $sub_mark.'---');
        }
    }
}
?>		
            <div class="form-group">
				<label class="control-label col-md-2 col-sm-2 col-xs-12">Category</label>
                                    <div class="col-md-8 col-sm-4 col-xs-12">                              
                                             <select class="form-control" name="category">                                     
                                                      <?php categoryTree(); ?>
                                        </select>
									</div>								
								</div>
								 <div class="form-group">
									<label class="control-label col-md-2 col-sm-2 col-xs-12">Product code</label>
                                    <div class="col-md-8 col-sm-4 col-xs-12">
                                        <input class="form-control" type="text" name="code" value="<?php echo $row1['code'];?>">
									</div>									
								</div> 

                                       <div class="form-group">
									<label class="control-label col-md-2 col-sm-2 col-xs-12">Image</label>
                                    <div class="col-md-8 col-sm-4 col-xs-12">
                                      <img src="../<?php echo $row1['image'];?>" height='50' width='70'/>  <input type="file" name="image">
									</div>			
								</div>             
                           <div style="display:none !important; margin-left: 17%;" id="upld_btns">  
                          <br>
                            </div>                                        
                     <script>$(document).ready(function(){
                       $("#formButton").click(function(){
                        $("#upld_btns").toggle();
                       });
                       });</script>      
                          <br/>
						  <div class="form-group"><br/>								
								<div class="col-md-12 col-sm-12 col-xs-12">
								<center><input type="submit" class="btn btn-success pull-right-container" name="s"  value="Add Product"></center>
								</div> </div> <br/><br/><!--<button type="reset" class="btn btn-danger">Reset</button>-->
                             </form>
                            </div>
                         </div>
                        </div>
                                <!-- End Default -->                              
                    </div>
                  </div>
                        <!-- End Row -->
              </div>
                    <!-- End Container -->
                    <!-- Begin Page Footer-->
                   <?php
                   include 'Footer.php';
                    ?>
                    <!-- End Page Footer -->
                    <a href="#" class="go-top"><i class="la la-arrow-up"></i></a>
                    <!-- Offcanvas Sidebar -->
                    <div class="off-sidebar from-right">
                        <div class="off-sidebar-container">
                            <header class="off-sidebar-header">
                                <ul class="button-nav nav nav-tabs mt-3 mb-3 ml-3" role="tablist" id="weather-tab">
                                    <li><a class="active" data-toggle="tab" href="#messenger" role="tab" id="messenger-tab">Messages</a></li>
                                    <li><a data-toggle="tab" href="#today" role="tab" id="today-tab">Today</a></li>
                                </ul>
                                <a href="#off-canvas" class="off-sidebar-close"></a>
                            </header>
                            <div class="off-sidebar-content offcanvas-scroll auto-scroll">
                                <div class="tab-content">
                                    <!-- Begin Messenger -->
                                    <div role="tabpanel" class="tab-pane show active fade" id="messenger" aria-labelledby="messenger-tab">
                                        <!-- Begin Chat Message -->
                                        <span class="date">Today</span>
                                        <div class="messenger-message messenger-message-sender">
                                            <img class="messenger-image messenger-image-default" src="assets/img/avatar/avatar-02.jpg" alt="...">
                                            <div class="messenger-message-wrapper">
                                                <div class="messenger-message-content">
                                                    <p>
                                                        <span class="mb-2">Brandon wrote</span>
                                                        Hi David, what's up?
                                                    </p>
                                                </div>
                                                <div class="messenger-details">
                                                    <span class="messenger-message-localization font-size-small">2 minutes ago</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="messenger-message messenger-message-recipient">
                                            <div class="messenger-message-wrapper">
                                                <div class="messenger-message-content">
                                                    <p>
                                                       Hi Brandon, fine and you?
                                                   </p>
                                                    <p>
                                                       I'm working on the next update of Elisyam
                                                   </p>
                                                </div>
                                                <div class="messenger-details">
                                                    <span class="messenger-message-localisation font-size-small">3 minutes ago</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="messenger-message messenger-message-sender">
                                            <img class="messenger-image messenger-image-default" src="assets/img/avatar/avatar-02.jpg" alt="...">
                                            <div class="messenger-message-wrapper">
                                                <div class="messenger-message-content">
                                                    <p>
                                                        <span class="mb-2">Brandon wrote</span>
                                                        I can't wait to see
                                                    </p>
                                                </div>
                                                <div class="messenger-details">
                                                    <span class="messenger-message-localization font-size-small">5 minutes ago</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="messenger-message messenger-message-recipient">
                                            <div class="messenger-message-wrapper">
                                                <div class="messenger-message-content">
                                                    <p>
                                                       I'm almost done
                                                   </p>
                                                </div>
                                                <div class="messenger-details">
                                                    <span class="messenger-message-localisation font-size-small">10 minutes ago</span>
                                                </div>
                                            </div>
                                        </div>
                                        <span class="date">Yesterday</span>
                                        <div class="messenger-message messenger-message-sender">
                                            <img class="messenger-image messenger-image-default" src="assets/img/avatar/avatar-05.jpg" alt="...">
                                            <div class="messenger-message-wrapper">
                                                <div class="messenger-message-content">
                                                    <p>
                                                        I updated the server tonight
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="messenger-message messenger-message-recipient">
                                            <div class="messenger-message-wrapper">
                                                <div class="messenger-message-content">
                                                    <p>
                                                       Didn't you have any problems?
                                                   </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="messenger-message messenger-message-sender">
                                            <img class="messenger-image messenger-image-default" src="assets/img/avatar/avatar-05.jpg" alt="...">
                                            <div class="messenger-message-wrapper">
                                                <div class="messenger-message-content">
                                                    <p>
                                                        No!
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="messenger-message messenger-message-recipient">
                                            <div class="messenger-message-wrapper">
                                                <div class="messenger-message-content">
                                                    <p>
                                                       Great!
                                                   </p>
                                                    <p>
                                                       See you later!
                                                   </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Chat Message -->
                                        <!-- Begin Message Form -->
                                        <div class="enter-message">
                                            <div class="enter-message-form">
                                                <input type="text" placeholder="Enter your message..."/>
                                            </div>
                                            <div class="enter-message-button">
                                                <a href="#" class="send"><i class="ion-paper-airplane"></i></a>
                                            </div>
                                        </div>
                                        <!-- End Message Form -->
                                    </div>
                                    <!-- End Messenger -->
                                    <!-- Begin Today -->
                                    <div role="tabpanel" class="tab-pane fade" id="today" aria-labelledby="today-tab">
                                        <!-- Begin Today Stats -->
                                        <div class="sidebar-heading pt-0">Today</div>
                                        <div class="today-stats mt-3 mb-3">
                                            <div class="row">
                                                <div class="col-4 text-center">
                                                    <i class="la la-users"></i>
                                                    <div class="counter">264</div>
                                                    <div class="heading">Clients</div>
                                                </div>
                                                <div class="col-4 text-center">
                                                    <i class="la la-cart-arrow-down"></i>
                                                    <div class="counter">360</div>
                                                    <div class="heading">Sales</div>
                                                </div>
                                                <div class="col-4 text-center">
                                                    <i class="la la-money"></i>
                                                    <div class="counter">$ 4,565</div>
                                                    <div class="heading">Earnings</div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Today Stats -->
                                        <!-- Begin Friends -->
                                        <div class="sidebar-heading">Friends</div>
                                        <div class="quick-friends mt-3 mb-3">
                                            <ul class="list-group w-100">
                                                <li class="list-group-item">
                                                    <div class="media">
                                                        <div class="media-left align-self-center mr-3">
                                                            <img src="assets/img/avatar/avatar-02.jpg" alt="..." class="img-fluid rounded-circle" style="width: 35px;">
                                                        </div>
                                                        <div class="media-body align-self-center">
                                                            <a href="javascript:void(0);">Brandon Smith</a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="media">
                                                        <div class="media-left align-self-center mr-3">
                                                            <img src="assets/img/avatar/avatar-03.jpg" alt="..." class="img-fluid rounded-circle" style="width: 35px;">
                                                        </div>
                                                        <div class="media-body align-self-center">
                                                            <a href="javascript:void(0);">Louis Henry</a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="media">
                                                        <div class="media-left align-self-center mr-3">
                                                            <img src="assets/img/avatar/avatar-04.jpg" alt="..." class="img-fluid rounded-circle" style="width: 35px;">
                                                        </div>
                                                        <div class="media-body align-self-center">
                                                            <a href="javascript:void(0);">Nathan Hunter</a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="media">
                                                        <div class="media-left align-self-center mr-3">
                                                            <img src="assets/img/avatar/avatar-05.jpg" alt="..." class="img-fluid rounded-circle" style="width: 35px;">
                                                        </div>
                                                        <div class="media-body align-self-center">
                                                            <a href="javascript:void(0);">Megan Duncan</a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="media">
                                                        <div class="media-left align-self-center mr-3">
                                                            <img src="assets/img/avatar/avatar-06.jpg" alt="..." class="img-fluid rounded-circle" style="width: 35px;">
                                                        </div>
                                                        <div class="media-body align-self-center">
                                                            <a href="javascript:void(0);">Beverly Oliver</a>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- End Friends -->
                                        <!-- Begin Settings -->
                                        <div class="sidebar-heading">Settings</div>
                                        <div class="quick-settings mt-3 mb-3">
                                            <ul class="list-group w-100">
                                                <li class="list-group-item">
                                                    <div class="media">
                                                        <div class="media-body align-self-center">
                                                            <p class="text-dark">Notifications Email</p>
                                                        </div>
                                                        <div class="media-right align-self-center">
                                                            <label>
                                                                <input class="toggle-checkbox" type="checkbox" checked>
                                                                <span>
                                                                    <span></span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="media">
                                                        <div class="media-body align-self-center">
                                                            <p class="text-dark">Notifications Sound</p>
                                                        </div>
                                                        <div class="media-right align-self-center">
                                                            <label>
                                                                <input class="toggle-checkbox" type="checkbox">
                                                                <span>
                                                                    <span></span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="media">
                                                        <div class="media-body align-self-center">
                                                            <p class="text-dark">Chat Message Sound</p>
                                                        </div>
                                                        <div class="media-right align-self-center">
                                                            <label>
                                                                <input class="toggle-checkbox" type="checkbox" checked>
                                                                <span>
                                                                    <span></span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- End Settings -->
                                    </div>
                                    <!-- End Today -->
                                </div>
                            </div>
                            <!-- End Offcanvas Container -->
                        </div>
                        <!-- End Offsidebar Container -->
                    </div>
                    <!-- End Offcanvas Sidebar -->
                </div>
            </div>
            <!-- End Page Content -->
        </div>
        <!-- Begin Vendor Js -->
        <script src="assets/vendors/js/base/jquery.min.js"></script>
        <script src="assets/vendors/js/base/core.min.js"></script>
        <!-- End Vendor Js -->
        <!-- Begin Page Vendor Js -->
        <script src="assets/vendors/js/nicescroll/nicescroll.min.js"></script>
        <script src="assets/vendors/js/app/app.min.js"></script>
        <!-- End Page Vendor Js -->
    </body>
</html>
    <?php
if(isset($_REQUEST['s']))
{
    $fname=$_FILES['image']['name'];
    $tmpname=$_FILES['image']['tmp_name'];
    $newfname=rand(111,111111).'-'.$fname;
   $destination="upload/$newfname";
    $destination1="../upload/$newfname";
    $res=move_uploaded_file($tmpname,$destination1);
    extract($_REQUEST);
    $query="update product_detail set product_name='$product_name',feature='$feature',benefit='$benefit',quantity1='$quantity1',price1='$price1',quantity2='$quantity2',price2='$price2',quantity3='$quantity3',price3='$price3',quantity4='$quantity4',price4='$price4',quantity5='$quantity5',price5='$price5',quantity6='$quantity6',price6='$price6',category='$category',image='$destination' where regid=$regid";
    $res1=mysqli_query($con,$query);
    $res=move_uploaded_file($tmpname,$destination);
    if($res1)
    {        
        echo "<script>window.location='Product.php'</script>";
    }
 else {        
 echo "<script> alert('Record not added')</script>";
        echo "<script>window.location='Product.php'</script>";     
 }
}

?>