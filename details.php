<?php
session_start();
include("function/function.php");
include("bootstrap.php");
?>

<html>

<head>
	<title>Nepshop.com</title>
    <link rel="stylesheet" href="styles/newstyle.css" media="all">
    <link rel="stylesheet" href="styles/style.css" media="all">
    <link rel="stylesheet" href="styles/animate.css-master/animate.css">
     <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/scrolling-nav.css" rel="stylesheet">
    
</head>
	
   <body>
    <!--main wrapper starts here!-->
    <div class="main_wrapper">
    
    
    	<div class="head_wrapper" style=" margin:-15;"><!--head wrapper starts here!-->
    			<img src="images/nepal_640.png" height="150" width="180" style="margin-left:80">
    			<a href="index.php"><img src="images/nep.png" height="100" width="500" align="right" style="margin-top:50px;"></a>
                 
               
                </div><!--head wrapper ends here!-->
                					
                                    
                                     <nav class="navbar navbar-expand-lg navbar navbar-dark bg-primary" style="width:1350px; padding-bottom:10px;">
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
     <li class="nav-item" style="padding-right:20px;">
        <a class="nav-link" href="index.php">Home</a>
      </li>
       <li class="nav-item" style="padding-right:20px;">
        <a class="nav-link" href="all_product.php">All Products</a>
      </li>
      <li class="nav-item " style="padding-right:20px;">
        <?php if(!isset($_SESSION['customer_email']))
																	 {
																		 echo"<a class='nav-link' href='checkout.php' >Login</a>";
																		 }
																	 
																	 else
																	 {
																		 echo"<a class='nav-link' href='customer/my_account.php' >My Account&nbsp;&nbsp;</a>";
																		 }
																		 
																		 
																		 
																	 ?>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contact.php">Contact us</a>
      </li>
      <!--<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>-->
     
    </ul>
   
    <form class="form-inline my-2 my-lg-0" method="get" action="results.php" enctype="multipart/form-data">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="user_query">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="search">Search</button>
    </form>
  </div>
</nav><!--menubar ends here!-->
                
                
                
         										<div class="content_wrapper"><!--content wrapper starts here!-->
         
        	 												
         														<div id="sidebar" style="background-color:#06C">
                                                            			<div style="text-align:center; color:#FFF; background-color:#09c; 
                                                                		font-size:18px; padding:5px; border-radius:5px;">																														
                                                                		Category
                                                                	</div>
                                                                   <ul id="cats">
                                                                    <?php
                                                                    getcats();?>
                                                                    </ul>
                                                                    <div style="text-align:center; color:#FFF; background-color:#09c; 
                                                                		font-size:18px; padding:5px; border-radius:5px;">																														
                                                                		Brands
                                                                	</div>
                                                                    <ul id="cats">
                                                                    <?php
                                                                    getbrands();?>
                                                                    
                                                                   
                                                                    </ul>
                                                                
                                                                
                                                               		 </div>
                                                                     
                                                                    <div id="content_area">
                                                                    <?php cart();?>
                                                                     
                                                                     <div id="shopping_bar" >
                                                                     <span style=" float:right; line-height:50px; font-size:18px; font-padding:5px"><font color="white">
                                                                     <?php 
																	 if(isset($_SESSION['customer_email']))
																	 {
																		 echo"<b>Welcome </b>&nbsp;";
																		 customer();
																		 }
																		 else
																		 {
																		echo"<b>Welcome guest</b>";	 
																			 }
																	 ?>
                                                                    
                                                                  </font>   
                                                                     <font color="white">
                                                                     <?php 
																	 if(isset($_SESSION['customer_email']))
																	 {
																		echo"Total-items:  ";
																		total_items();
																		echo"  Total-price:  ";
																		total_price();
																		echo" <a href='cart.php' style='text-decoration:none; color:#FF0'>Goto Cart&nbsp;&nbsp;</a>";
																		 }
																		 else
																		 {
																		 
																			 }
																	 ?>
                                                                     </font>
                                                                     <?php
																	 if(!isset($_SESSION['customer_email']))
																	 {
																		 echo"<a href='checkout.php' style='color:White; text-decoration:none;'>Login&nbsp;&nbsp;</a>";
																		 }
																	 else
																	 {
																		 echo"<a href='logout.php'  style='color:White;  text-decoration:none;'>Logout&nbsp;&nbsp;</a>";
																		 }
																		 
																	 ?>
                                                                     
                                                     
                                                                     </span>
                                                                     

                                                                     </div>
                                                                     	
                                                                        <div id="product_box">
                                                                        <?php
																		if(isset($_GET['pro_id']))
																		{
                                                                        $product_id=$_GET['pro_id'];
																		
                                                                        global $con; 
																
																$get_pro = "select * from product WHERE product_id='$product_id'";
															
																$run_pro = mysqli_query($con, $get_pro); 
																
																while($row_pro=mysqli_fetch_array($run_pro)){
																
																	$pro_id = $row_pro['product_id'];
																	$pro_title = $row_pro['product_title'];
																	$pro_price = $row_pro['product_price'];
																	$pro_image = $row_pro['product_image'];
																	$pro_desc=$row_pro['product_desc'];
																
																	echo "
																			<div class='animated fadeIn'>
																			<div id='single_product'>
																			
					
					
																<div class='zoomimage'>
																<img src='admin/product_images/$pro_image' width='300'  			 	    															height='300' style='padding:15px; 		     			               													 margin-left:-50px; float:left;'/></div>
																<h2 style='margin-right:70px; margin-top:0spx;'>
																$pro_title</h2>
																
																<div id='description' class='animated bounce'>
																<b>$pro_price rs </b></br>	

																
																<hr>
																$pro_desc
																
																</div>
																<a href='checkout.php?add_cart=$pro_id'>
																<button type='submit' style='background-color:transparent;       border-color:transparent; cursor:pointer; float:right;'><img src='../Shopping/images/Add-To-Cart-Button-PNG-Pic.png' height='70' width='250' style='float:left; margin-right:200px;'></button></a>



							<a href='index.php' style='text-decoration:none; color:red; font-size:18px; margin-right:200px; margin-bottom:400px;'><input type='button' value='Go to homepage' style='border-radius:20px;margin-top:40px ;margin-right:500px;float:left; height:30px; cursor:pointer;'></a>
													
																				</div>
		</div>
		
		";
	
	}
																		}

  ?>    
    <?php
  if (isset($_GET["pro_id"])) 
{

 $x=$_GET["pro_id"];
 
  updatecount($x);
}
?>                                                                 
																	   
																	    </div>
                                                                     </div>
                                                                      
                                                            <div>
                                                          
</div>
                                                            
                                                            
                                                           		
         
         										</div><!--content wrapper ends here!-->
                                                
                                                <div id="blank" style="padding:50px; clear:both">
                                                <hr>
                                                
                                                </div>
                                              
                                                 
         
                                                
    
    </div><!--main wrapper ends here!-->
  <div  class=" container-fluid well well-lg text wow fadein" style="height:auto; width:1300px; float: left; margin-left: 20px; margin-top: 30px; background-color: #999; color:#000">
                         
                         <h1 align="left"><b>Follow us at</b></h1>
                        <div class="well well-lg text wow fadeinleft" style="height:auto; width:250px; float: left; margin-left: 20px;  background-color: #999; color:#000; border:hidden;">
                         
                         <a href="#"><img src="images/image.png" height="100" width="100"></a>
                         </div>
                        <div class="well well-lg text wow animated fadeInRight" style="height:auto; width:250px; float: left; margin-left: 20px;  background-color: #999; color:#000; border:hidden;">
                         <a href="#"><img src="images/twitter_PNG32.png" height="100" width="100" style="float:right;"></a>
                        </div>
                        
                        
                        <div class="well well-lg text wow animated fadeInRight" style="height:auto; width:250px; float: right; margin-left: 20px;  background-color: #999; color:#000; border:hidden;">
                        <h3 style="font-size:14px"><b>Contact no:01-4456456</b></h3>
                         <h3  style="font-size:14px"><b>Email:Nepshop@gmail.com</b></h3>
                         <h3 style="font-size:14px"><b>Location:Kapan,Kathmandu
                         				Kalanki,Kathmandu
                                        Naikap,Kathmandu</b></h3>
                        
                        </div>
                                              <p align="left"><h3 style="text-align:"> Copyright property of Nepshop &copy;</h3>
                                                </div>
    
    
    
    </div>
    
    
    
    </body>

</html>

