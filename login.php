<?php 
include ('layoutFile/headerLinks.php')
?>

<body class="bg-theme bg-theme1">

   <!-- start loader -->
   <div id="pageloader-overlay" class="visible incoming"><div class="loader-wrapper-outer"><div class="loader-wrapper-inner" ><div class="loader"></div></div></div></div>
   <!-- end loader -->

<!-- Start wrapper-->
 <div id="wrapper">
 


<div class="clearfix"></div>
	
  <div class="card-authentication2 mx-auto my-5">
	    <div class="card-group">
	    	<div class="card mb-0">
	    	   <div class="bg-signin2"></div>
	    		<div class="card-img-overlay rounded-left my-5">
                 <h1 class="text-dark">Hungrezy</h1>
				 <img alt="logo" src="img/hungrezy.png"  width="250" height="250"/>
             </div>
	    	</div>

	    	<div class="card mb-0 ">
	    		<div class="card-body">
	    			<div class="card-content p-3">
	    				<div class="text-center">
					 		<img src="img/hungrezy.png"  width="50" height="50"alt="logo icon">
					 	</div>
					 <div class="card-title text-uppercase text-center py-3">Sign In</div>
					 
					<?php if(isset($_SESSION['MSG'])):?>
					<div class="alert alert-danger alert-dismissible" role="alert">
					   <button type="button" class="close" data-dismiss="alert">×</button>
						<div class="alert-icon">
						 <i class="fa fa-times"></i>
						</div>
						<div class="alert-message">
						  <span> <?php echo $_SESSION['MSG']; unset($_SESSION['MSG']);?></span>
						</div>
					  </div>
					<?php endif?>
					   <form action="phpFiles/DataProsess.php" method="post">
						  <div class="form-group">
						   <div class="position-relative has-icon-left">
							   <label for="exampleInputUsername" class="sr-only">User Phone</label>
								 <input type="text" name="userPhone" class="form-control" placeholder="Phone Number">
								 <div class="form-control-position">
									<i class="icon-user"></i>
								</div>
						   </div>
						  </div>
						  <div class="form-group">
						   <div class="position-relative has-icon-left">
							  <label for="exampleInputPassword" class="sr-only">Password</label>
							  <input type="password" name="userPassword" class="form-control" placeholder="Password">
							  <div class="form-control-position">
								  <i class="icon-lock"></i>
							  </div>
						   </div>
						  </div>
						  <div class="form-row mr-0 ml-0">
						  <div class="form-group col-6">
							  <div class="icheck-material-white">
				               <input type="checkbox" id="user-checkbox" checked="" />
				               <label for="user-checkbox">Remember me</label>
							 </div>
							</div>
							
						</div>
						<button type="submit" name="adminLogin" class="btn btn-light btn-block waves-effect waves-light">Sign In</button>


						<div class="form-row mt-4">
						  <div class="form-group mb-0 col-6">
						 </div>
						 <div class="form-group mb-0 col-6 text-right">
						 </div>
						</div>

						<hr>
						<p class="text-warning"></p>
						</div>
					</form>
				 </div>
				</div>
	    	</div>
	     </div>
	    </div>
   <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->

	

   
   <?php 
//include('layoutFile/rightSideBar.php');
?>
  <!--end color switcher-->
   
  </div><!--End wrapper-->

  	<?php 
include('layoutFile/footerLinks.php');
?>