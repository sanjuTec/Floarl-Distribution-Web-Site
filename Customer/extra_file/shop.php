<?php
	session_start();
	require_once 'conn.php';
	
	if(isset($_GET['cat'])){
		$_SESSION['cat']=$_GET['cat'];
	}
	
	//choose color
  if(isset($_GET['color'])){
	 $_SESSION['color'] =$_GET['color'];
	  

  }
	
	  //Add to cart
  if(isset($_GET['pid'])){
	  $pid=$_GET['pid'];
	  $customer_id = $_SESSION['user_id'];
	  
	  $sql3="SELECT * FROM cart WHERE product_id='$pid' AND customer_id='$customer_id'";
	  $result=mysqli_query($conn,$sql3);
	  if(mysqli_num_rows($result)>0){
		  while($result1=mysqli_fetch_array($result)){
			  $num= $result1['num_of_product'];
			  $num2= ($num+1);
			  $sql4="UPDATE cart SET num_of_product='$num2' WHERE product_id='$pid' AND customer_id='$customer_id'";
			  mysqli_query($conn,$sql4);
			 header('location:shop.php');
		  }
		 
	  }else{
		  $sql= "SELECT * FROM product WHERE pid='$pid'";
				if($qu=mysqli_query($conn,$sql)){
				 while($record=mysqli_fetch_array($qu)){
			 
					 $name= $record['name'];
					 $price= $record['price'];
					 $img = base64_encode($record['img']);
			  
					 $sql2= "INSERT INTO cart (customer_id,product_id,product_name,price,img)
					 VALUES ('$customer_id','$pid','$name','$price','$img')";
			    mysqli_query($conn,$sql2);
				header('location:shop.php');

		         }
			
	            }
	  } 
  }
  
   //remove from cart
 if(isset($_GET['pro'])){
	 $pro_id=$_GET['pro'];
	 $customer_id = $_SESSION['user_id'];
	 
		$sql4 = "DELETE FROM cart WHERE product_id='$pro_id' AND customer_id='$customer_id'";
		mysqli_query($conn,$sql4);
		header('location:shop.php');
	 
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
    <title>shop</title>

    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/favicon.ico">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

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
										echo "<a href='shop.php?pro=$test' class='product-image'><font color='blue'><u><b>Remove</b></u></font></a>";
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
							$_SESSION['subtotal']=0;
							while($row=mysqli_fetch_array($result)){
								
								$price=$row['price'];
								$num_of_product=$row['num_of_product'];
								
								$nettotal=($price*$num_of_product);
							    $_SESSION['subtotal']=($nettotal+$_SESSION['subtotal']);
								
								//if subtotal is LKR5000 or over LKR5000 then delivery will be free,else if delivery fee will be LKR200
								//if subtotal is LKR7000 or over LKR7000 then discounnt will be 5%,else if  no discount
				
								
							}
								if($_SESSION['subtotal']>=7000){
									$_SESSION['delivery']='Free';
									$_SESSION['delivery_db']=0;
									
									$_SESSION['discount']=($_SESSION['subtotal']*(5/100));
									$_SESSION['discount_db']=($_SESSION['subtotal']*(5/100));
									
								}else if($_SESSION['subtotal']>=5000){
									$_SESSION['delivery']='Free';
									$_SESSION['delivery_db']=0;
									
									$_SESSION['discount']='No Discount';
									$_SESSION['discount_db']=0;
								}else{
									$_SESSION['delivery']=200;
									$_SESSION['delivery_db']=200;
									
									$_SESSION['discount']='No Discount';
									$_SESSION['discount_db']=0;
								}
									$_SESSION['total']=(($_SESSION['subtotal']+$_SESSION['delivery_db'])-$_SESSION['discount_db']);
									
									
							echo"<h2>Summary</h2>
									<ul class='summary-table'>
										<li><span>subtotal:</span> <span>".'LKR '.$_SESSION['subtotal']."</span></li>
										<li><span>delivery:</span> <span>".$_SESSION['delivery']."</span></li>
										<li><span>discount:</span> <span>".'(5%) '.$_SESSION['discount']."</span></li>
										<li><span>total:</span> <span>".'LKR '.$_SESSION['total']."</span></li>
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
                
				?>            </div>
        </div>
		</div>
	
    <!-- ##### Right Side Cart End ##### -->

    <!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb_area bg-img" style="background-image: url(img/bg-img/checkout.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h2>
							<?php
								
								if($_SESSION['cat']=="ORC"){
									echo 'Orchids Flower Collection';
								}else if($_SESSION['cat']=="BBD"){
									echo 'Barberton Dasiya Flower Collection';
								}else if($_SESSION['cat']=="FNG"){
									echo 'Frangipani Flower Collection';
								}else if($_SESSION['cat']=="LLY"){
									echo 'LiLy Flower Collection';
								}else if($_SESSION['cat']=="ANT"){
									echo 'Anthurium Flower Collection';
								}else if($_SESSION['cat']=="ROSE"){
									echo 'Rose Flower Collection';
								}else if($_SESSION['cat']=="MIX"){
									echo 'Mixed Flower Collection';
								}else if($_SESSION['cat']=="BID"){
									echo 'Birthday Gifts & Decaration';
								}else if($_SESSION['cat']=="WED"){
									echo 'Wedding Gifts & Decaration';
								}else if($_SESSION['cat']=="ANV"){
									echo 'Anniversary Gifts & Decaration';
								}else if($_SESSION['cat']=="CEL"){
									echo 'Celebration Gifts & Decaration';
								}else if($_SESSION['cat']=="CON"){
									echo 'Conference Gifts & Decaration';
								}else if($_SESSION['cat']=="LTB"){
									echo 'Letter Boxes & Gifts';
								}else if($_SESSION['cat']=="HAM"){
									echo 'Hampers Collection';
								}else if($_SESSION['cat']=="HPLNT"){
									echo 'House Plants';
								}else if($_SESSION['cat']=="HTB"){
									echo 'Hand Tied Bouquets';
								}else if($_SESSION['cat']=="flower_boquet"){
									echo "Flower  Bouquets Collection";
								}else if($_SESSION['cat']=="occasion"){
									echo"Occasion Collection";
									
								}else if($_SESSION['cat']=='houseplant'){
									echo "House Plant Collection";
								}else if($_SESSION['cat']=='offer'){
									echo "Offered Item Collection";
								}
							?>
						</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Shop Grid Area Start ##### -->
    <section class="shop_grid_area section-padding-80">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-4 col-lg-3">
                    <div class="shop_sidebar_area">
						<!-- ##### Single Widget ##### -->
                        <div class="widget catagory mb-50">
                            <!-- Widget Title -->
                            <h6 class="widget-title mb-30">Filter By</h6>

                            <!--  Catagories  -->
                            <div class="catagories-menu">
                                <ul id="menu-content2" class="menu-content collapse show">
                                    <!-- Single Item -->
                                    <li data-toggle="collapse" data-target="#clothing">
                                        <a href="#">Colour</a>
                                        <ul class="sub-menu collapse show" id="clothing">
											   
											<li><a href="shop.php?color=all"><p><button class="w3-button w3-light-grey">All</button></p></a></li>
                                            <li><a href="shop.php?color=red"><p><button class="w3-button w3-red">Red</button></p></a></li>
                                            <li><a href="shop.php?color=pink"><p><button class="w3-button w3-pink">Pink  </button></p></a></li>
                                            <li><a href="shop.php?color=purple"><p><button class="w3-button w3-purple">Purp</button></p></a></li>
                                            <li><a href="shop.php?color=blue"><p><button class="w3-button w3-blue">Blue  </button></p></a></li>
                                            <li><a href="shop.php?color=white"><p><button class="w3-button w3-sand">White</button></p></a></li>
                                            <li><a href="shop.php?color=orange"><p><button class="w3-button w3-orange">Oran</button></p></a></li>
                                            <li><a href="shop.php?color=black"><p><button class="w3-button w3-black">Black</button></p></a></li>
											<li><a href="shop.php?color=yellow"><p><button class="w3-button w3-yellow">Yello</button></p></a></li>
											                                      
                                        </ul>
                                    </li>
									 <li data-toggle="collapse" data-target="#clothing"> <a href="shop.php?color=mix">Mixed Coluor</a></li>
                               
                                </ul>
                            </div>
                        </div>
                        
						

                    

                        <!-- ##### Single Widget ##### -->
                       
                    </div>
                </div>

                <div class="col-12 col-md-8 col-lg-9">
                    <div class="shop_grid_product_area">
                        <div class="row">
                            <div class="col-12">
                                <div class="product-topbar d-flex align-items-center justify-content-between">
                                    <!-- Total Products -->
									  <?php
											if($_SESSION['color']=='all'){
												$sql="SELECT * FROM product WHERE cid='$_SESSION[cat]'";
								
											$result=mysqli_query($conn,$sql);
											$product_count=0;
								
												if(mysqli_num_rows($result)>0){
										
													while($row=mysqli_fetch_assoc($result)){
														$product_count=$product_count+1;
													}
												}
											echo"<div class='total-products'>
											  
												<p><span>".$product_count."</span> ".'products found'."</p>
											
											</div>";
												
											}else{
												$color=$_SESSION['color'];
												$sql="SELECT * FROM product WHERE cid='$_SESSION[cat]' AND color='$color'";
								
											$result=mysqli_query($conn,$sql);
											$product_count=0;
								
												if(mysqli_num_rows($result)>0){
										
													while($row=mysqli_fetch_assoc($result)){
														$product_count=$product_count+1;
													}
												}
											echo"<div class='total-products'>
											  
												<p><span>".$product_count."</span> ".'products found'."</p>
											
											</div>";
											}
										?>
                                    
                                </div>
                            </div>
                        </div>

                        <div class="row">

						   
                            <?php
								
								if($_SESSION['cat']=="flower_boquet"){
										$sql="SELECT * FROM product WHERE pid LIKE 'F%'";
										$result=mysqli_query($conn,$sql);
										
										if(mysqli_num_rows($result)>0){
										
										while($row=mysqli_fetch_assoc($result)){
												
												echo"<!-- Single Product -->
												<div class='col-12 col-sm-6 col-lg-4'>
													<div class='single-product-wrapper'>
													<!-- Product Image -->
														<div class='product-img'>
															<a href='single-product-details.php'><img src='data:image/jpeg;base64,".base64_encode( $row['img'] )."' alt=''></a>

															<!-- Favourite -->
															<div class='product-favourite'>
																<a href='#' class='favme fa fa-heart'></a>
															</div>
														</div>

													<!-- Product Description -->
													<div class='product-description'>
														<span>".'Stock : '.$row['stock']."</span>
														<a href='single-product-details.php'>
															<h6>".$row['name']."</h6>
														</a>
														<p class='product-price'><span class='old-price'></span>".'LKR '.$row['price']."</p>";
		
														echo "<!-- Hover Content -->
															
														<!-- Add to Cart -->";
															if(isset($_SESSION['user_id'])){
																echo "<div class='hover-content'>";
																	echo "<div class='add-to-cart-btn'>";
																		$id = $row['pid'];
																		
																	echo "<a href=\"shop.php?pid=$id&color=all\" class=\"btn essence-btn\">Add to Cart</a>";
																	echo "</div>";
																echo "</div>";
															}
															
															
														
													
													echo"</div>
												</div>
											</div>";
									
										}
									}
									
								}else if($_SESSION['cat']=='offer'){
									$sql="SELECT * FROM product WHERE price BETWEEN 1000 AND 3000";
										$result=mysqli_query($conn,$sql);
										
										if(mysqli_num_rows($result)>0){
										
										while($row=mysqli_fetch_assoc($result)){
												
												echo"<!-- Single Product -->
												<div class='col-12 col-sm-6 col-lg-4'>
													<div class='single-product-wrapper'>
													<!-- Product Image -->
														<div class='product-img'>
															<a href='single-product-details.php'><img src='data:image/jpeg;base64,".base64_encode( $row['img'] )."' alt=''></a>

															<!-- Favourite -->
															<div class='product-favourite'>
																<a href='#' class='favme fa fa-heart'></a>
															</div>
														</div>

													<!-- Product Description -->
													<div class='product-description'>
														<span>".'Stock : '.$row['stock']."</span>
														<a href='single-product-details.php'>
															<h6>".$row['name']."</h6>
														</a>
														<p class='product-price'><span class='old-price'></span>".'LKR '.$row['price']."</p>";
		
														echo "<!-- Hover Content -->
															
														<!-- Add to Cart -->";
															if(isset($_SESSION['user_id'])){
																echo "<div class='hover-content'>";
																	echo "<div class='add-to-cart-btn'>";
																		$id = $row['pid'];
																		
																	echo "<a href=\"shop.php?pid=$id&color=all\" class=\"btn essence-btn\">Add to Cart</a>";
																	echo "</div>";
																echo "</div>";
															}
															
															
														
													
													echo"</div>
												</div>
											</div>";
									
										}
									}
									
								}else if($_SESSION['cat']=='houseplant'){
										$sql="SELECT * FROM product WHERE cid LIKE 'HPLNT%'";
										$result=mysqli_query($conn,$sql);
										
										if(mysqli_num_rows($result)>0){
										
										while($row=mysqli_fetch_assoc($result)){
												
												echo"<!-- Single Product -->
												<div class='col-12 col-sm-6 col-lg-4'>
													<div class='single-product-wrapper'>
													<!-- Product Image -->
														<div class='product-img'>
															<a href='single-product-details.php'><img src='data:image/jpeg;base64,".base64_encode( $row['img'] )."' alt=''></a>

															<!-- Favourite -->
															<div class='product-favourite'>
																<a href='#' class='favme fa fa-heart'></a>
															</div>
														</div>

													<!-- Product Description -->
													<div class='product-description'>
														<span>".'Stock : '.$row['stock']."</span>
														<a href='single-product-details.php'>
															<h6>".$row['name']."</h6>
														</a>
														<p class='product-price'><span class='old-price'></span>".'LKR '.$row['price']."</p>";
		
														echo "<!-- Hover Content -->
															
														<!-- Add to Cart -->";
															if(isset($_SESSION['user_id'])){
																echo "<div class='hover-content'>";
																	echo "<div class='add-to-cart-btn'>";
																		$id = $row['pid'];
																		
																	echo "<a href=\"shop.php?pid=$id&color=all\" class=\"btn essence-btn\">Add to Cart</a>";
																	echo "</div>";
																echo "</div>";
															}
															
															
														
													
													echo"</div>
												</div>
											</div>";
									
										}
									}
									
								}else if($_SESSION['cat']=='occasion'){
											$sql="SELECT * FROM product WHERE pid LIKE 'oc%'";
										$result=mysqli_query($conn,$sql);
										
										if(mysqli_num_rows($result)>0){
										
										while($row=mysqli_fetch_assoc($result)){
												
												echo"<!-- Single Product -->
												<div class='col-12 col-sm-6 col-lg-4'>
													<div class='single-product-wrapper'>
													<!-- Product Image -->
														<div class='product-img'>
															<a href='single-product-details.php'><img src='data:image/jpeg;base64,".base64_encode( $row['img'] )."' alt=''></a>

															<!-- Favourite -->
															<div class='product-favourite'>
																<a href='#' class='favme fa fa-heart'></a>
															</div>
														</div>

													<!-- Product Description -->
													<div class='product-description'>
														<span>".'Stock : '.$row['stock']."</span>
														<a href='single-product-details.php'>
															<h6>".$row['name']."</h6>
														</a>
														<p class='product-price'><span class='old-price'></span>".'LKR '.$row['price']."</p>";
		
														echo "<!-- Hover Content -->
															
														<!-- Add to Cart -->";
															if(isset($_SESSION['user_id'])){
																echo "<div class='hover-content'>";
																	echo "<div class='add-to-cart-btn'>";
																		$id = $row['pid'];
																		
																	echo "<a href=\"shop.php?pid=$id&color=all\" class=\"btn essence-btn\">Add to Cart</a>";
																	echo "</div>";
																echo "</div>";
															}
															
															
														
													
													echo"</div>
												</div>
											</div>";
									
										}
									}
									
								}else if($_SESSION['color']=='all'){
									$sql="SELECT * FROM product WHERE cid='$_SESSION[cat]'";
								
									$result=mysqli_query($conn,$sql);
								
								
									if(mysqli_num_rows($result)>0){
										
										while($row=mysqli_fetch_assoc($result)){
												
												echo"<!-- Single Product -->
												<div class='col-12 col-sm-6 col-lg-4'>
													<div class='single-product-wrapper'>
													<!-- Product Image -->
														<div class='product-img'>
															<a href='single-product-details.php'><img src='data:image/jpeg;base64,".base64_encode( $row['img'] )."' alt=''></a>

															<!-- Favourite -->
															<div class='product-favourite'>
																<a href='#' class='favme fa fa-heart'></a>
															</div>
														</div>

													<!-- Product Description -->
													<div class='product-description'>
														<span>".'Stock : '.$row['stock']."</span>
														<a href='single-product-details.php'>
															<h6>".$row['name']."</h6>
														</a>
														<p class='product-price'><span class='old-price'></span>".'LKR '.$row['price']."</p>";
		
														echo "<!-- Hover Content -->
															
														<!-- Add to Cart -->";
															if(isset($_SESSION['user_id'])){
																echo "<div class='hover-content'>";
																	echo "<div class='add-to-cart-btn'>";
																		$id = $row['pid'];
																		//$color=$_GET['color'];
																	echo "<a href=\"shop.php?pid=$id&color=all\" class=\"btn essence-btn\">Add to Cart</a>";
																	echo "</div>";
																echo "</div>";
															}
															
															
														
													
													echo"</div>
												</div>
											</div>";
											
									    }
									}	
								}else{
									$color=$_SESSION['color'];
									$sql="SELECT * FROM product WHERE cid='$_SESSION[cat]' AND color='$color'";
								
									$result=mysqli_query($conn,$sql);
								
								
									if(mysqli_num_rows($result)>0){
										
										while($row=mysqli_fetch_assoc($result)){
												
												echo"<!-- Single Product -->
												<div class='col-12 col-sm-6 col-lg-4'>
													<div class='single-product-wrapper'>
													<!-- Product Image -->
														<div class='product-img'>
															<a href='single-product-details.php'><img src='data:image/jpeg;base64,".base64_encode( $row['img'] )."' alt=''></a>

															<!-- Favourite -->
															<div class='product-favourite'>
																<a href='#' class='favme fa fa-heart'></a>
															</div>
														</div>

													<!-- Product Description -->
													<div class='product-description'>
														<span>".'Stock : '.$row['stock']."</span>
														<a href='single-product-details.php'>
															<h6>".$row['name']."</h6>
														</a>
														<p class='product-price'><span class='old-price'></span>".'LKR '.$row['price']."</p>";
		
														echo "<!-- Hover Content -->
															
														<!-- Add to Cart -->";
															if(isset($_SESSION['user_id'])){
																echo "<div class='hover-content'>";
																	echo "<div class='add-to-cart-btn'>";
																		$id = $row['pid'];
																		
																	echo "<a href=\"shop.php?pid=$id&color=all\" class=\"btn essence-btn\">Add to Cart</a>";
																	echo "</div>";
																echo "</div>";
															}
															
															
														
													
													echo"</div>
												</div>
											</div>";
									
										}
									}
								}
							?>
                        </div>
						
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Shop Grid Area End ##### -->

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