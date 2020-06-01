<?php
	session_start();
	require_once 'conn.php';
	
	

								if(isset($_GET['details'])){
									$_SESSION['details']=$_GET['details'];
								}
								
								//add,update,delete button activities
								if($_SESSION['details']=="customer_details"){
								echo "Customer Details";
							}//product details
							else if($_SESSION['details']=="product_details"){
								
								//add button
								if(isset($_POST['add'])){
									$cat_id=$_POST['cat_id'];
									$cat_name=$_POST['cat_name'];
									
									$sql="INSERT INTO category(catid,name)
										   VALUES('$cat_id','$cat_name')";
										   if(mysqli_query($conn,$sql)){
											 echo "<script>alert('Category ID and Name have been added succesfully');</script>"; 
										   }else{
											   echo "<script>alert('Sorry, It can not be added!');</script>"; 
										   }
									
									
									
								}//update button
								else if(isset($_POST['update'])){
									$pid=$_POST['pid'];
									$cat_id=$_POST['cat_id'];
									$pname=$_POST['pname'];
									$cat_name=$_POST['cat_name'];
									
									$sql="UPDATE category SET name='$cat_name' WHERE catid='$cat_id'";
									if(mysqli_query($conn,$sql)){
										echo"<script>alert('Updated Succesfully..');</script>";
									}else{
										echo"<script>alert('Sorry.. It can not be Updated..');</script>";
									}
								}//delete button
								else if(isset($_POST['delete'])){
									$cat_id=$_POST['cat_id'];
									
									$sql="DELETE FROM category WHERE catid='$cat_id'";
									if(mysqli_query($conn,$sql)){
										echo"<script>alert('Deleted Succesfully..');</script>";
									}else{
										echo"<script>alert('Sorry.. It can not be Deleted..');</script>";
									}
								}
							}else if($_SESSION['details']=="cart_details"){
								echo "Cart Details";
							}else if($_SESSION['details']=="delivery_details"){
								echo "Delivery Details";
							}//cart details
							else if($_SESSION['details']=="cat_details"){
							
								//add button
								if(isset($_POST['add'])){
									$cat_id=$_POST['cat_id'];
									$cat_name=$_POST['cat_name'];
									
									$sql="INSERT INTO category(catid,name)
										   VALUES('$cat_id','$cat_name')";
										   if(mysqli_query($conn,$sql)){
											 echo "<script>alert('Category ID and Name have been added succesfully');</script>"; 
										   }else{
											   echo "<script>alert('Sorry, It can not be added!');</script>"; 
										   }
									
									
									
								}//update button
								else if(isset($_POST['update'])){
									$cat_id=$_POST['cat_id'];
									$cat_name=$_POST['cat_name'];
									
									$sql="UPDATE category SET name='$cat_name' WHERE catid='$cat_id'";
									if(mysqli_query($conn,$sql)){
										echo"<script>alert('Updated Succesfully..');</script>";
									}else{
										echo"<script>alert('Sorry.. It can not be Updated..');</script>";
									}
								}//delete button
								else if(isset($_POST['delete'])){
									$cat_id=$_POST['cat_id'];
									
									$sql="DELETE FROM category WHERE catid='$cat_id'";
									if(mysqli_query($conn,$sql)){
										echo"<script>alert('Deleted Succesfully..');</script>";
									}else{
										echo"<script>alert('Sorry.. It can not be Deleted..');</script>";
									}
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
    <title>Admin Home Page</title>
	 <link rel="icon" href="img/core-img/favicon.ico">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images_table/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor_table/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts_table/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor_table/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor_table/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor_table/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css_table/util.css">
	<link rel="stylesheet" type="text/css" href="css_table/main.css">
<!--===============================================================================================-->

    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="style.css">

</head>

<body>
		<!--##get table value to text feilds##-->
	


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
                    <a href="#"><img src="img/core-img/user.svg" alt=""></a>
                </div>
               
            </div>

        </div>
    </header>
    <!-- ##### Header Area End ##### -->

    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Shop Grid Area Start ##### -->
    <section class="shop_grid_area section-padding-80">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-4 col-lg-3">
                    <div class="shop_sidebar_area">

                        <!-- ##### Single Widget ##### -->

							<?php
							//coustomer details
								if($_SESSION['details']=="customer_details"){
								
							}//product details
							else if($_SESSION['details']=="product_details"){
								echo'<div class="widget catagory mb-50">';
								echo"<form action='details.php' method='post' class='form-control mb-3'>
								<table>";
									$pi="";
									$pn="";
									$ci="";
									$color="";
									$price="";
									$stock="";
										if(isset($_GET["pid"])){
											$pi=$_GET["pid"];
											$ci=$_GET["cid"];
											$pn=$_GET["proname"];
											$color=$_GET['color'];
											$price=$_GET['price'];
											$stock=$_GET['stock'];
										}
									echo"<tr>
											<td><input type='text' id='pid' placeholder='Product ID' name='pid' value='".$pi."' required></td>
										</tr>";
									echo"<tr>";
										
										
										echo '<td><input type="text" id="catid" placeholder="Category ID" name="cat_id" value="'.$ci.'" required></td>';
									echo "</tr>
									<tr>";
										
										echo'<td><input type="text" id="pname" placeholder="Product Name" name="pname" value="'.$pn.'" required></td>';
									echo"</tr>";
									echo'<tr>
											<td><input type="text" id="color" placeholder="Color" name="color" value="'.$color.'" required></td>
										</tr>';
									echo'<tr>
											<td><input type="text" id="price" placeholder="Price" name="price" value="'.$price.'" required></td>
										</tr>';
									echo'<tr>
											<td><input type="text" id="stock" placeholder="Stock" name="stock" value="'.$stock.'" required></td>
										</tr>';
									
								echo"</table>";

							
                        echo"</div>
						
						<div>
							<div><input  type='submit' class='btn essence-btn' name='add'  value='Add'></div>
						</div>
						<div></div>
						<div>
							<div><input  type='submit' class='btn essence-btn' name='update'  value='Update'></div>
						</div>
						<div></div>
						<div>
							<input  type='submit' class='btn essence-btn' name='delete'  value='Delete'>
						</div>
						</form>";
							}//cart details
							else if($_SESSION['details']=="cart_details"){
								echo "Cart Details";
							}//delivery details
							else if($_SESSION['details']=="delivery_details"){
								echo "Delivery Details";
							}//category details
							else if($_SESSION['details']=="cat_details"){
								echo'<div class="widget catagory mb-50">';
								echo"<form action='details.php' method='post' class='form-control mb-3'>
								<table>
									<tr>";
										$ci="";
										$cn="";
										if(isset($_GET["catid"])){
											$ci=$_GET["catid"];
											$cn=$_GET["catname"];
										}
										
										echo '<td><input type="text" id="catid" placeholder="Category ID" name="cat_id" value="'.$ci.'" required></td>';
									echo "</tr>
									<tr>";
										
										echo'<td><input type="text" id="catname" placeholder="Category Name" name="cat_name" value="'.$cn.'" required></td>';
									echo"</tr>	
									
								</table>

							
                        </div>
						
						<div>
							<div><input  type='submit' class='btn essence-btn' name='add'  value='Add'></div>
						</div>
						<div></div>
						<div>
							<div><input  type='submit' class='btn essence-btn' name='update'  value='Update'></div>
						</div>
						<div></div>
						<div>
							<input  type='submit' class='btn essence-btn' name='delete'  value='Delete'>
						</div>
						</form>";
							}
							?>
                            
						
								

                     
                      
                    </div>
                </div>

                <div class="col-12 col-md-8 col-lg-9">
                    <div class="shop_grid_product_area">
                        <div class="row">
                            <div class="col-12">
                                <div class="product-topbar d-flex align-items-center justify-content-between">
											<div class="total-products">
												<p><span>186</span> products found</p>
											</div>
                                   
                                </div>
                            </div>
                        </div>

                        <div class="row">
						
		<div class="limiter">
			
			<div class="container-table100">
					<h3>
						<?php
							if($_SESSION['details']=="customer_details"){
								echo "Customer Details";
							}else if($_SESSION['details']=="product_details"){
								echo "Product Details";
							}else if($_SESSION['details']=="cart_details"){
								echo "Cart Details";
							}else if($_SESSION['details']=="delivery_details"){
								echo "Delivery Details";
							}else if($_SESSION['details']=="cat_details"){
								echo "Category Details";
							}
						?>
					</h3>
				<div class="wrap-table100">
					<div class="table100">
						<?php
							if($_SESSION['details']=="customer_details"){
									echo "<table id='table'>
									<thead>
										<tr class='table100-head'>
											<th class='column1'>Customer ID</th>
											<th class='column2'>Name</th>
											<th class='column3'>E-mail</th>
										</tr>
									</thead>";
										$sql="SELECT * FROM customer";
										$result=mysqli_query($conn,$sql);
										
											if(mysqli_num_rows($result)>0){
												while($row=mysqli_fetch_assoc($result)){
													echo"<tbody>
															<tr>
																<td class='column1'>".$row['id']."</td>
																<td class='column2'>".$row['fname'].' '.$row['lname']."</td>
																<td class='column3'>".$row['email']."</td>
															</tr>
														</tbody>";
												}
											}
									echo "</table>";
							}else if($_SESSION['details']=="product_details"){
									echo "<table id='table'>
									<thead>
										<tr class='table100-head'>
											<th class='column1'>Pro ID</th>
											<th class='column2'>Cat ID</th>
											<th class='column3'>Name</th>
											<th class='column4'>Color</th>
											<th class='column5'>Price</th>
											<th class='column6'>Stock</th>
											<th class='column7'>Image</th>
										</tr>
									</thead>";
										$sql="SELECT * FROM product";
										$result=mysqli_query($conn,$sql);
										
											if(mysqli_num_rows($result)>0){
												while($row=mysqli_fetch_assoc($result)){
													echo"<tbody>
															<tr>
																<td class='column1'><a href='details.php?pid=$row[pid]&proname=$row[name]&cid=$row[cid]&color=$row[color]&price=$row[price]&stock=$row[stock]'>".$row['pid']."</a></td>
																<td class='column2'><a href='details.php?pid=$row[pid]&proname=$row[name]&cid=$row[cid]&color=$row[color]&price=$row[price]&stock=$row[stock]'>".$row['cid']."</a></td>
																<td class='column3'><a href='details.php?pid=$row[pid]&proname=$row[name]&cid=$row[cid]&color=$row[color]&price=$row[price]&stock=$row[stock]'>".$row['name']."</a></td>
																<td class='column4'><a href='details.php?pid=$row[pid]&proname=$row[name]&cid=$row[cid]&color=$row[color]&price=$row[price]&stock=$row[stock]'>".$row['color']."</a></td>
																<td class='column5'><a href='details.php?pid=$row[pid]&proname=$row[name]&cid=$row[cid]&color=$row[color]&price=$row[price]&stock=$row[stock]'>".$row['price']."</a></td>
																<td class='column6'><a href='details.php?pid=$row[pid]&proname=$row[name]&cid=$row[cid]&color=$row[color]&price=$row[price]&stock=$row[stock]'>".$row['stock']."</a></td>
																
																<td class='column8'><img src='data:image/jpeg;base64,".base64_encode($row['img'])."'></td>
															</tr>
														</tbody>";
												}
											}
									echo "</table>";
								
							}else if($_SESSION['details']=="cart_details"){
									echo "<table id='table'>
									<thead>
										<tr class='table100-head'>
											<th class='column1'>Cart ID</th>
											<th class='column2'>Customer ID</th>
											<th class='column3'>Product ID</th>
											<th class='column4'>Product Name</th>
											<th class='column5'>Number Of Product</th>
											<th class='column6'>Price</th>
											<th class='column7'>Image</th>
										</tr>
									</thead>";
										$sql="SELECT * FROM cart";
										$result=mysqli_query($conn,$sql);
										
											if(mysqli_num_rows($result)>0){
												while($row=mysqli_fetch_assoc($result)){
													echo"<tbody>
															<tr>
																<td class='column1'>".$row['cart_id']."</td>
																<td class='column2'>".$row['customer_id']."</td>
																<td class='column3'>".$row['product_id']."</td>
																<td class='column4'>".$row['product_name']."</td>
																<td class='column5'>".$row['num_of_product']."</td>
																<td class='column6'>".$row['price']."</td>
																<td class='column7'><img src='data:image/jpeg;base64,".base64_encode($row['img'])."'></td>
															</tr>
														</tbody>";
												}
											}
									echo "</table>";
								
							}else if($_SESSION['details']=="delivery_details"){
									echo "<table id='table'>
									<thead>
										<tr class='table100-head'>
											<th class='column1'>DelID</th>
											<th class='column2'>CusID</th>
											<th class='column3'>Name</th>
											<th class='column4'>Address</th>
											<th class='column5'>Phone</th>
											<th class='column6'>Shipping</th>
											<th class='column7'>Discount</th>
											<th class='column8'>Total</th>
											<th class='column9'>Order date</th>
										</tr>
									</thead>";
										$sql="SELECT * FROM delivery";
										$result=mysqli_query($conn,$sql);
										
											if(mysqli_num_rows($result)>0){
												while($row=mysqli_fetch_assoc($result)){
													echo"<tbody>
															<tr>
																<td class='column1'>".$row['delivery_id']."</td>
																<td class='column2'>".$row['customer_id']."</td>
																<td class='column3'>".$row['fname'].' '.$row['lname']."</td>
																<td class='column4'>".$row['address'].','.'<br>'.$row['city'].','.'<br>'.$row['district']."</td>
																<td class='column5'>".$row['phone']."</td>
																<td class='column6'>".$row['shipping']."</td>
																<td class='column7'>".$row['discount']."</td>
																<td class='column8'>".$row['total']."</td>
																<td class='column9'>".$row['order_date']."</td>
															</tr>
														</tbody>";
												}
											}
									echo "</table>";
								
							}else if($_SESSION['details']=="cat_details"){
									echo "<table id='table'>
									<thead>
										<tr class='table100-head'>
											<th class='column1'>catagory ID</th>
											<th class='column2'>Catagory Name</th>
										</tr>
									</thead>";
										$sql="SELECT * FROM category";
										$result=mysqli_query($conn,$sql);
										
											if(mysqli_num_rows($result)>0){
												while($row=mysqli_fetch_assoc($result)){
													echo"<tbody>
															<tr>
																
																<td class='column1'><a href=\"details.php?catid=$row[catid]&catname=$row[name]\">".$row['catid']."</a></td>
																<td class='column2'><a href=\"details.php?catid=$row[catid]&catname=$row[name]\">".$row['name']."</a></td>
																
															</tr>
														</tbody>";
												}
											}
									echo "</table>";
								
							}
						?>
						
					</div>
				</div>
			</div>
		</div>

                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Shop Grid Area End ##### -->

  
	

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
	
	<!--===============================================================================================-->	
	<script src="vendor_table/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor_table/bootstrap/js/popper.js"></script>
	<script src="vendor_table/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor_table/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="js_table/main.js"></script>
	
	
	


</body>

</html>