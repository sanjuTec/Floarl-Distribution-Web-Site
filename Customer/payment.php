<?php
	session_start();
	require_once 'conn.php';
	$msg="";


	if(isset($_POST['pay'])){
		 $id=$_SESSION['user_id'];
		 $fname=$_SESSION['fname'];
		 $lname=$_SESSION['lname'];
		 $address=$_SESSION['address'];
		 $city=$_SESSION['city'];
		 $district=$_SESSION['district'];
		 $phone=$_SESSION['phone'];
		 $shipping=$_SESSION['shipping'];
		 $discount=$_SESSION['discount'];
		 $total=$_SESSION['total'];
		 $date= date("Y-m-d");
		
		$sql="INSERT INTO delivery (customer_id,fname,lname,address,city,district,phone,shipping,discount,total,order_date)
			   VALUES('$id','$fname','$lname','$address','$city','$district','$phone','$shipping','$discount','$total','$date')";
			   
			   if(mysqli_query($conn,$sql)){
				   
			   }else{
				   echo "MYSQL Error".mysqli_error($conn);
			   }
	}
	
	
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
    <title>Payment</title>

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
                <a class="nav-brand" href="index.php"><img src="img/core-img/logoen.jpg" alt=""></a>
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
							
                            <li><a href="#">Shop</a>
                                <div class="megamenu">
									<?php
									echo"
										<ul class='single-mega cn-col-4'>
									
											 <li class='title'>Flower Collection</li>";
												 $orc="ORC";$bbd="BBD";$fng="FNG";$lly="LLY";$ant="ANT";$rose="ROSE";$mix="MIX";
												 $bid="BID";$wed="WED";$anv="ANV";$cel="CEL";$con="CON";
												 $ltb="LTB";$ham="HAM";$hplnt="HPLNT";$htb="HTB";
										echo"<li><a href='shop.php?cat=$orc&color=all'>Orchids</a></li>
											 <li><a href='shop.php?cat=$bbd&color=all'>Barberton daisy</a></li>
											 <li><a href='shop.php?cat=$fng&color=all'>frangipani</a></li>
											 <li><a href='shop.php?cat=$lly&color=all'>Lily</a></li>
											 <li><a href='shop.php?cat=$ant&color=all'>Anthurium</a></li>
											 <li><a href='shop.php?cat=$rose&color=all'>Roses</a></li>
											 <li><a href='shop.php?cat=$mix&color=all'>Mixed</a></li>
                                        </ul>
                                        <ul class='single-mega cn-col-4'>
											 <li class='title'>Occasion</li>
											 <li><a href='shop.php?cat=$bid&color=all'>Birthdays</a></li>
											 <li><a href='shop.php?cat=$wed&color=all'>Weddings</a></li>
											 <li><a href='shop.php?cat=$anv&color=all'>Anniversary</a></li>
											 <li><a href='shop.php?cat=$cel&color=all'>Celebrations</a></li>
											 <li><a href='shop.php?cat=$con&color=all'>Conference</a></li>
                                        </ul>
										<ul class='single-mega cn-col-4'>
											 <li class='title'>Others</li>
											 <li><a href='shop.php?cat=$ltb&color=all'>Letterbox Flowers</a></li>
											 <li><a href='shop.php?cat=$ham&color=all'>Hampers</a></li>
											 <li><a href='shop.php?cat=$hplnt&color=all'>House Plant</a></li>
											 <li><a href='shop.php?cat=$htb&color=all'>Hand Tied Bouquets</a></li>
											
										</ul>";
									?>
                                    <div class="single-mega cn-col-4">
                                        <img src="img/bg-img/bg_rose.jpg" alt="">
                                    </div>
                                </div>
                            </li>

                            <li><a href="contact.php">Contact</a></li>
							<li>
								<?php
									if(!isset($_SESSION["current_user"])){
										echo "<a href='join.php'>Join</a>";
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
                <!-- Favourite Area -->
                <div class="favourite-area">
                    <a href="#"><img src="img/core-img/heart.svg" alt=""></a>
                </div>
                <!-- User Login Info -->
                <div class="user-login-info">
                    <a href="#"><img src="img/core-img/user.svg" alt=""></a>
                </div>
                <!-- Cart Area -->
                <?php
				//show cart item number
				if(isset($_SESSION['user_id'])){
					  $customer_id = $_SESSION['user_id'];
	  
					  $sql="SELECT * FROM cart WHERE customer_id='$customer_id'";
					  $result=mysqli_query($conn,$sql);
					  $_SESSION['num_item']=mysqli_num_rows($result);
					  
					  echo"<div class='cart-area'>
                             <a href='#' id='essenceCartBtn'><img src='img/core-img/bag.svg' alt=''><span>".$_SESSION['num_item']."</span></a>
                          </div>";
				}
                
				?>
            </div>

        </div>
    </header>
    <!-- ##### Header Area End ##### -->

    <!-- ##### Right Side Cart Area ##### -->
    <div class="cart-bg-overlay"></div>

    <div class="right-side-cart-area">

        <!-- Cart Button -->
       <?php
			echo " <div class='cart-button'>
				<a href='#' id='rightSideCart'><img src='img/core-img/bag.svg' alt=''><span>".$_SESSION['num_item']."</span></a>
			</div>";
		?>

        <div class="cart-content d-flex">

            <!-- Cart List Area -->
            <div class="cart-list">
                <?php
			
			if(isset($_SESSION['user_id'])){
				$cus_id= $_SESSION['user_id'];
				$sql = "SELECT * FROM cart WHERE customer_id='$cus_id'";
			    $result= mysqli_query($conn,$sql);
				
						if(mysqli_num_rows($result)>0){
					while($row=mysqli_fetch_assoc($result)){
						
						echo " 
					    <!-- Single Cart Item -->
							<div class='single-cart-item'>
								<div class='product-image'>
								<img src='data:image/jpeg;base64,".( $row['img'] )."' class='cart-thumb' alt=''>
								<!-- Cart Item Desc -->
									<div class='cart-item-desc'>";
										$test=$row['product_id'];
										echo "<a href='index.php?pro=$test' class='product-image'><font color='blue'><u><b>Remove</b></u></font></a>";
											echo"<h6>".$row['product_name']."</h6>
												<p class='color'>Quantity : ".$row['num_of_product']."</p>
												<p class='price'>LKR ".$row['price']."</p>
												
									</div>
								</div>
							</div>";
					}
				}
			}
			
			
			
				
            ?>
            </div>

            <!-- Cart Summary -->
            <div class="cart-amount-summary">

                <?php
				if(isset($_SESSION['user_id'])){
					$cus_id=$_SESSION['user_id'];
					
					$sql="SELECT * FROM cart WHERE customer_id='$cus_id'";
					$result=mysqli_query($conn,$sql);
					
						if(mysqli_num_rows($result)>0){
							$subtotal=0;
							while($row=mysqli_fetch_array($result)){
								
								$price=$row['price'];
								$num_of_product=$row['num_of_product'];
								
								$nettotal=($price*$num_of_product);
							    $subtotal=($nettotal+$subtotal);
								
								//if subtotal is LKR5000 or over LKR5000 then delivery will be free,else if delivery fee will be LKR200
								//if subtotal is LKR7000 or over LKR7000 then discounnt will be 5%,else if  no discount
				
								
							}
								if($subtotal>=7000){
									$delivery='Free';
									$delivery_db=0;
									
									$discount=($subtotal*(5/100));
									$discount_db=($subtotal*(5/100));
									
								}else if($subtotal>=5000){
									$delivery='Free';
									$delivery_db=0;
									
									$discount='No Discount';
									$discount_db=0;
								}else{
									$delivery=200;
									$delivery_db=200;
									
									$discount='No Discount';
									$discount_db=0;
								}
									$total=(($subtotal+$delivery_db)-$discount_db);
									
							echo"<h2>Summary</h2>
									<ul class='summary-table'>
										<li><span>subtotal:</span> <span>".'LKR '.$subtotal."</span></li>
										<li><span>delivery:</span> <span>".$delivery."</span></li>
										<li><span>discount:</span> <span>".'(5%) '.$discount."</span></li>
										<li><span>total:</span> <span>".'LKR '.$total."</span></li>
									</ul>
									<div class='checkout-btn mt-100'>
										<a href='checkout.php' class='btn essence-btn'>check out</a>
									</div>";
						}else{
							echo"<h2>Cart Is Empty</h2>";
							echo"<img src='img/bg-img/emptycart.png'>";
						}
				}else{
					echo"<h2>Cart Is Empty</h2>";
					echo"<img src='img/bg-img/emptycart.png'>";
									
				}
                
				?>
            </div>
        </div>
    </div>
    <!-- ##### Right Side Cart End ##### -->

    <!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb_area bg-img" style="background-image: url(img/bg-img/checkout.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h2>Payment</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Checkout Area Start ##### -->
    <div class="checkout_area section-padding-80">
        <div class="container">
            <div class="row">

                <div class="col-12 col-md-6">
                    <div class="checkout_details_area mt-50 clearfix">

                        <div class="cart-page-heading mb-30">
                            <h5>Card Details</h5>
                        </div>

                        <form action="payment.php" method="post">
                            <div class="row">
                              
                                
                               
                                <div class="col-12 mb-3">
                                    <label> Card Number <span>*</span></label>
                                    <input type="number" class="form-control mb-3"  value="" name="card_number" required>
                                </div>
                                
								  <div class="col-md-6 mb-3">
                                    <label>Valid Until<span>*</span></label>
                                    <input type="number" class="form-control"  value="" name="MM" placeholder="MM"  required>
                                </div>
								
                                <div class="col-md-6 mb-3">
                                    <label> <span>.</span></label>
                                    <input type="number" class="form-control"  value="" name="YY" placeholder="YY" required>
                                </div>
								
								<div>
									<?php 
									    echo $msg;
								    ?>
								</div>
                                <div class="col-md-6 mb-3">
                                    <label> CVV<span>*</span></label>
                                    <input type="number" class="form-control"  value="" name="CVV" placeholder="CVV" required>
								</div>
								
								<div>
									<?php 
									    echo $msg;
								    ?>
								</div>
                               
                                <div class="col-12 mb-3">
                                    <label>Card Holder<span>*</span></label>
                                    <input type="text" class="form-control"   value="" name="holder" required>
									
                                </div>
								
								 
									
                            </div>
								<div>
									<input type='submit' class='btn essence-btn' name='pay' value='Pay'>
											
											
								</div>
                        </form>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-5 ml-lg-auto">
					<div class="col-12 mb-3">
                        <img src='img/core-img/pay.jpg'>
									
                    </div>
								
                    <div class="order-details-confirmation">
					    
							<?php
												if(isset($_POST['pay'])){
													$card_no=$_POST['card_number'];
													$MM=$_POST['MM'];
													$YY=$_POST['YY'];
													$CVV=$_POST['CVV'];
													$holder=$_POST['holder'];
													
													
													
													if(strlen($MM)==2 && strlen($YY)==2){
														if(strlen($CVV)==3){
															if(isset($card_no)){
																echo"<div class='cart-page-heading'>
																		
																		<h4>Your Order Sucessfull</h4>
																	 </div>

																			<ul class='order-details-form mb-4'>
																				<li><span><b><u>Shippinng Address</u></b></span></li>
																					<ulclass='order-details-form mb-4'>
																						<li><span>".$_SESSION['fname']." ".$_SESSION['lname']."".','."".'<br>'."".$_SESSION['address']."".','."".'<br>'."".$_SESSION['city']."".','."".'<br>'."".$_SESSION['district']."</span></li>
																						<li><span>".'Phone : '."".$_SESSION['phone']."</span></li>
								
																					</ul>
																	
																			
																			</ul>";
															}else{
																
															}
												
														}else{
															$msg="invalid CVV number";
														}
														
													}else{
														$msg="Invalid Expriy date";
													}
												}else{
													
												}
												
											?>
											
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Checkout Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
        <footer class="footer_area clearfix">
        <div class="container">
            <div class="row">
                <!-- Single Widget Area -->
                <div class="col-12 col-md-6">
                    <div class="single_widget_area d-flex mb-30">
                        <!-- Logo -->
                        <div class="footer-logo mr-50">
                            <a href="#"><img src="img/core-img/logogray.jpg" alt=""></a>
                        </div>
                        <!-- Footer Menu -->
                        <div class="footer_menu">
                            <ul>
                                <li><a href="shop.php">Shop</a></li>
                                
                                <li><a href="contact.php">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Single Widget Area -->
                <div class="col-12 col-md-6">
                    <div class="single_widget_area mb-30">
                        <ul class="footer_widget_menu">
                            <li><a href="#">Order Status</a></li>
                            <li><a href="#">Payment Options</a></li>
                            <li><a href="#">Shipping and Delivery</a></li>
                            <li><a href="#">Guides</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Terms of Use</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row align-items-end">
                <!-- Single Widget Area -->
                <div class="col-12 col-md-6">
                    <div class="single_widget_area">
                        
                        
                    </div>
                </div>
                <!-- Single Widget Area -->
                <div class="col-12 col-md-6">
                    <div class="single_widget_area">
                        <div class="footer_social_area">
                            <a href="www.facebook.com" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            <a href="www.instagram.com" data-toggle="tooltip" data-placement="top" title="Instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                            <a href="www.twitter.com" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            <a href="www.pinterest.com" data-toggle="tooltip" data-placement="top" title="Pinterest"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                            <a href="www.youtube.com" data-toggle="tooltip" data-placement="top" title="Youtube"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>

<div class="row mt-5">
                <div class="col-md-12 text-center">
                    <p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved - Faculty Of Technology,University Of Ruhuna,Sri Lanka
                    </p>
                </div>
            </div>

        </div>
    </footer>
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