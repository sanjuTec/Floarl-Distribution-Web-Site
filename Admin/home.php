<?php
	session_start();
	require_once 'conn.php';
	
	
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Admin Home</title>
	
	
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  
    <style>
		  /* Make the image fully responsive */
		  .carousel-inner img {
			width: 100%;
			height: 100%;
		  }
  </style>

    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <!-- ##### Header Area Start ##### -->
    <header class="header_area">
        <div class="classy-nav-container breakpoint-off d-flex align-items-center justify-content-between">
            <!-- Classy Menu -->
            <nav class="classy-navbar" id="essenceNav">
                <!-- Logo -->
                <a class="nav-brand" href="home.php"><img src="img/core-img/logoen.jpg" alt=""></a>
                <!-- Navbar Toggler -->
                <div class="classy-navbar-toggler">
                    <span class="navbarToggler"><span></span><span></span><span></span></span>
                </div>
                <!-- Menu -->
                <div class="classy-menu">
                    <!-- close btn -->
                    <div class="classycloseIcon">
                        <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                    </div>
                    <!-- Nav Start -->
                    <div class="classynav">
                        <ul>
							
                            <li>
								<b>Administrator</b>
								<br>
								<font color='blue'>
									<?php
											if(isset($_SESSION['current_user'])){
												$user=$_SESSION['current_user'];
												$lname=$_SESSION['last_name'];
												echo $user." ".$lname;
											}
									?>
								</font>
							</li>

                            <li><a href="#"></a></li>
							<li><a href="#"></a></li>
							<li><a href="#"></a></li>
						
							
							
							
							<li>
								<?php
									if(!isset($_SESSION["current_user"])){
										echo "<a href='join.php'>Create Account</a>";
									}
								?>
							</li>
							<li>
								<?php
									if(!isset($_SESSION['current_user'])){
										echo "<a href='login.php'>Log In</a>";
									}else{
										echo "<a href='logout.php'>Log out</a>";
									}
									
								?>
							</li>
							
                        </ul>
                    </div>
                    <!-- Nav End -->
                </div>
            </nav>

            <!-- Header Meta Data -->
            <div class="header-meta d-flex clearfix justify-content-end">
                <!-- Search Area -->
                <div class="search-area">
                    <form action="#" method="post">
                        <input type="search" name="search" id="headerSearch" placeholder="Type for search">
                        <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </form>
                </div>
                
                <!-- User Login Info -->
                <div class="user-login-info">
					<?php
									if(isset($_SESSION["current_user"])){
										echo "<a href='profile.php'><img src='img/core-img/user.svg' alt=''></a>";
									}
								?>
                   
                </div>
                
            </div>

        </div>
    </header>
    <!-- ##### Header Area End ##### -->

    <!-- ##### Shop Grid Area Start ##### -->
    <section class="shop_grid_area section-padding-80">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-4 col-lg-3">
                    <div class="shop_sidebar_area">

                        <!-- ##### Single Widget ##### -->
                        <div class="widget catagory mb-50">
                            <!-- Widget Title -->
                            

                            <!--  Catagories  -->
							
                            <div class="catagories-menu">

                                <ul id="menu-content2" class="menu-content collapse show">
                                    <!-- Single Item -->
                                    <li data-toggle="collapse" data-target="#clothing">
                                        <a href="#"></a>
                                        <?php
											//customer count
											$sql1="SELECT * FROM customer";
											$result=mysqli_query($conn,$sql1);
												$_SESSION['customer_count']=mysqli_num_rows($result);
												
											//product count
											$sql2="SELECT * FROM product";
											$result=mysqli_query($conn,$sql2);
												$_SESSION['product_count']=mysqli_num_rows($result);
												
											//delivery count
											$sql3="SELECT * FROM delivery";
											$result=mysqli_query($conn,$sql3);
												$_SESSION['delivery_count']=mysqli_num_rows($result);
											echo "<ul class='sub-menu collapse show' id='clothing'>
                                            <li><h1><font color='blue'><center>".$_SESSION['customer_count']."</center></font></h1></a></li>
                                            <li><font color='black' class='widget-title mb-30'><b><center>Customers</center></b></font></li>
                                            <li></li>
                                            <li><h1><font color='blue'><center>".$_SESSION['product_count']."</center></font></h1></li>
                                            <li><font color='black' class='widget-title mb-30'><b><center>products</center></b></font></li>
                                            <li></li>
                                            <li><h1><font color='blue'><center>".$_SESSION['delivery_count']."</center></font></h1></a></li>
                                            <li><font color='black' class='widget-title mb-30'><b><center>Deliveries</center></b></font></li>
                                            
                                        </ul>";
										?>
                                    </li>
                                    
                                </ul>
                            </div>
							</center>
                        </div>

                    </div>
                </div>

                <div class="col-12 col-md-8 col-lg-9">
                    <div class="shop_grid_product_area">
                        <?php
							if(isset($_SESSION['current_user'])){
								echo "<div class='row'>
                            <div class='col-12'>
                                <div class='product-topbar d-flex align-items-center justify-content-between'>
                                    <!-- Total Products -->
                                    
                                    <!-- Sorting -->
                                   
                                </div>
                            </div>
                        </div>

                        <div class='row'>

                            <!-- Single activity-->
                            <div class='col-12 col-sm-6 col-lg-4'>
                                <div class='single-product-wrapper'>
                                    <!-- activity  -->
                                    <div class='product-img'>
										<div class='product-badge offer-badge'>
                                            <span><a href='details.php?details=customer_details'>Customer Details</a></span>
                                        </div> 
                                        <a href='details.php?details=customer_details'><img src='img/product-img/consumer.jpg' alt=''></a>
                                        
                                    </div>
                                </div>
                            </div>


                                
                            <!-- Single activity-->
                            <div class='col-12 col-sm-6 col-lg-4'>
                                <div class='single-product-wrapper'>
                                    <!-- activity  -->
                                    <div class='product-img'>
										<div class='product-badge offer-badge'>
                                            <span><a href='details.php?details=product_details'>Product Details</a></span>
                                        </div> 
                                        <a href='details.php?details=product_details'><img src='img/product-img/productDetails.jpg' alt=''></a>
                                        
                                    </div>
                                </div>
                            </div>
                            

                              <!-- Single activity-->
                            <div class='col-12 col-sm-6 col-lg-4'>
                                <div class='single-product-wrapper'>
                                    <!-- activity  -->
                                    <div class='product-img'>
										<div class='product-badge offer-badge'>
                                            <span><a href='details.php?details=cart_details'>Cart Details</a></span>
                                        </div> 
                                        <a href='details.php?details=cart_details'><img src='img/product-img/cartDetails.jpg' alt=''></a>
                                        
                                    </div>
                                </div>
                            </div>
                            

                             <!-- Single activity-->
                            <div class='col-12 col-sm-6 col-lg-4'>
                                <div class='single-product-wrapper'>
                                    <!-- activity  -->
                                    <div class='product-img'>
										<div class='product-badge offer-badge'>
                                            <span><a href='details.php?details=delivery_details'>Delivery Details</a></span>
                                        </div> 
                                        <a href='details.php?details=delivery_details'><img src='img/product-img/deliveryDetails.jpg' alt=''></a>
                                        
                                    </div>
                                </div>
                            </div>
							
							<!-- Single activity-->
                            <div class='col-12 col-sm-6 col-lg-4'>
                                <div class='single-product-wrapper'>
                                    <!-- activity  -->
                                    <div class='product-img'>
										<div class='product-badge offer-badge'>
                                            <span><a href='details.php?details=cat_details'>Category Details</a></span>
                                        </div> 
                                        <a href='details.php?details=cat_details'><img src='img/product-img/catDetails.jpg' alt=''></a>
                                        
                                    </div>
                                </div>
                            </div>
                            

                        </div>";
							}else{
									echo"<div id='demo' class='carousel slide' data-ride='carousel'>
										  <ul class='carousel-indicators'>
											<li data-target='#demo' data-slide-to='0' class='active'></li>
											<li data-target='#demo' data-slide-to='1'></li>
											<li data-target='#demo' data-slide-to='2'></li>
										  </ul>
											  <div class='carousel-inner'>
												<div class='carousel-item active'>
												  <img src='img/product-img/carosal4.jpg'  width='1100' height='500'>
												  <div class='carousel-caption'>
													<h3>Nuwara Elliya Fram</h3>
													<p>We had such a great farms</p>
												  </div>   
												</div>
												<div class='carousel-item'>
												  <img src='img/product-img/carosal3.jpg' width='1100' height='500'>
												  <div class='carousel-caption'>
													<h3>Lavender</h3>
													
												  </div>   
												</div>
												<div class='carousel-item'>
												  <img src='img/product-img/carosal2.jpg' alt='New York' width='1100' height='500'>
												  <div class='carousel-caption'>
													
													
												  </div>   
												</div>
												<div class='carousel-item'>
												  <img src='img/product-img/carosal5.jpg' alt='New York' width='1100' height='500'>
												  <div class='carousel-caption'>
													
													
												  </div>   
												</div>
												<div class='carousel-item'>
												  <img src='img/product-img/carosal4.jpg' alt='New York' width='1100' height='500'>
												  <div class='carousel-caption'>
													
													
												  </div>   
												</div>
												<div class='carousel-item'>
												  <img src='img/product-img/carosal6.jpg' alt='New York' width='1100' height='500'>
												  <div class='carousel-caption'>
													
													
												  </div>   
												</div>
										</div>
									  <a class='carousel-control-prev' href='#demo' data-slide='prev'>
										<span class='carousel-control-prev-icon'></span>
									  </a>
									  <a class='carousel-control-next' href='#demo' data-slide='next'>
										<span class='carousel-control-next-icon'></span>
									  </a>
									</div>";
							}
							
						?>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Shop Grid Area End ##### -->

    
    <!-- ##### Footer Area End ##### -->

    <!-- jQuery (Necessary for All JavaScript Plugins) -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="js/plugins.js"></script>
    <!-- Classy Nav js -->
    <script src="js/classy-nav.min.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>

</body>

</html>