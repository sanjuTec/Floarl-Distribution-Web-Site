<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Contact</title>

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
                
            </div>

        </div>
    </header>
    <!-- ##### Header Area End ##### -->


    <!-- ##### Right Side Cart End ##### -->


    <div class="contact-area d-flex align-items-center">

        <div class="google-map">
            <div id="googleMap"></div>
        </div>

        <div class="contact-info">
            <h2>Enchanter Office Location</h2>
            

            <div class="contact-address mt-50">
				<ol>
					<li><p><span>address:</span></p></li>
					<ol>
						<li>245/23</li>
						<li>Martine Wikramasinghe Mawata,</li>
						<li>Colombo 5,</li>
						<li>Sri Lanka</li>
						<li><b>Phone  : </b>+94112323456</li>
						<li><b>Fax    : </b>+94112323456</li>
						<li><a href="mailto:contact@essence.com"><b>E-mail : </b>enchanterorg@gmail.com</a></li>
					</ol>
				</ol>
                
                
                
            </div>
        </div>

    </div>

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
    </footer>s
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
    <!-- Google Maps -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAwuyLRa1uKNtbgx6xAJVmWy-zADgegA2s"></script>
    <script src="js/map-active.js"></script>

</body>

</html>