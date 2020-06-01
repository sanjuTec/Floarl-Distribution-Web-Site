<?php 
session_start();
require_once 'conn.php';
?>


<div class='container'>
            <div class='row'>
			<?php
				$sql = "SELECT * FROM product";
				$result = mysqli_query($conn,$sql);

				if(mysqli_num_rows($result)>0){
					while ($row = mysqli_fetch_assoc($result)) {
							$id=$row['pid'];
						echo "<div class='col-3'>";
							echo "<!-- Single Product -->";
							echo "<div class='single-product-wrapper'>";
								echo "<!-- Product Image -->";
								echo "<div class='product-img'>";
										$id =$row['pid'];
									echo "<a href='single-product-details.php?proid=$id'><img class='d-block img-fluid' src='data:image/jpeg;base64,".base64_encode( $row['img'] )."'</a>";
							
									echo"<!-- Favourite -->";
										echo"<div class='product-favourite'>";
										echo "<a href='#' class='favme fa fa-heart'></a>";
										echo "</div>";
								echo "</div>";
						
									echo "<!-- Product Description -->";
									echo "<div class='product-description'>";
										
										echo "<a href='single-product-details.html'>";
											echo "<h4>" . $row['name']. "</h4>";
										echo "</a>";
										echo "<h5>" .'LKR '. $row['price'] ."</h5>";

											echo "<!-- Hover Content -->";
											
												echo "<!-- Add to Cart -->";
												if(isset($_SESSION['current_user'])){
													echo "<div class='hover-content'>";
														echo "<div class='add-to-cart-btn'>";
															$id = $row['pid'];
															echo "<a href='index.php?pid=$id' class='btn essence-btn'>Add to Cart</a>";
														echo "</div>";
													echo "</div>";
												}
													
											
									echo "</div>";
								echo "</div>";
				
					
							echo "</div>";	
				    }
			}else{}
					
			?>	
				</div>
			</div>