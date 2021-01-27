<?php 
include ('layoutFile/headerLinks.php')
?>
<?php 
	if(isset($_SESSION['USER_NAME'])){
?>
<body class="bg-theme bg-theme1">

   <!-- start loader -->
   <div id="pageloader-overlay" class="visible incoming"><div class="loader-wrapper-outer"><div class="loader-wrapper-inner" ><div class="loader"></div></div></div></div>
   <!-- end loader -->

<!-- Start wrapper-->
 <div id="wrapper">
 
  <!--Start sidebar-wrapper-->
<?php 
include('layoutFile/sidebar.php');
?>
   <!--End sidebar-wrapper-->

<!--Start topbar header-->
<?php 
include('layoutFile/header.php');
?>
<!--End topbar header-->

<div class="clearfix"></div>
	
  <div class="content-wrapper">
    <div class="container-fluid">

      <!--Start Dashboard Content-->

 <div class="card">
           <div class="card-body">
           <div class="card-title">Add Product From</div>
           <hr>
		   <?php if(isset($_SESSION['MSG'])):?>
		   <div class="alert alert-success alert-dismissible" role="alert">
					   <button type="button" class="close" data-dismiss="alert">×</button>
						<div class="alert-icon">
						 <i class="fa fa-times"></i>
						</div>
						<div class="alert-message">
						  <span> <?php echo $_SESSION['MSG'];  unset($_SESSION['MSG']);?></span>
						</div>
					  </div>
					  
					<?php endif?>
	   <form action="phpFiles/DataProsess.php" method="post">
           <div class="form-group row">
            <label for="input-26" class="col-sm-2 col-form-label">Product Name</label>
            <div class="col-sm-10">
            <input type="text" class="form-control form-control-rounded" name="productName" >
            </div>
          </div>
          <div class="form-group row">
            <label for="input-27" class="col-sm-2 col-form-label">Product Details</label>
            <div class="col-sm-10">
            <input type="text" class="form-control form-control-rounded" name="productDetails">
            </div>
          </div>
          <div class="form-group row">
            <label for="input-28" class="col-sm-2 col-form-label">Address</label>
            <div class="col-sm-10">
            <input type="text" class="form-control form-control-rounded" name="address" >
            </div>
          </div>
          <div class="form-group row">
            <label for="input-29" class="col-sm-2 col-form-label">Price</label>
            <div class="col-sm-10">
            <input type="text" class="form-control form-control-rounded" name="price" >
            </div>
          </div>
          <div class="form-group row">
            <label for="input-30" class="col-sm-2 col-form-label">Status</label>
            <div class="col-sm-10">
            <input type="text" class="form-control form-control-rounded" name="status" >
            </div>
          </div>
           <div class="form-group row">
            <label class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
            <button type="submit" name="addProduct" class="btn btn-white btn-round px-5"> Add Product</button>
            </div>
          </div>
          </form>
         </div>
         </div>
	  
	

      <!--End Dashboard Content-->
    <!--start overlay-->
	  <div class="overlay toggle-menu"></div>
	<!--end overlay-->
	
    </div>
    <!-- End container-fluid-->
    
    </div><!--End content-wrapper-->
   <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
	
	<!--Start footer-->
	
	<?php 
include('layoutFile/footer.php');
?>
	<!--End footer-->
	
  <!--start color switcher-->
   
   <?php 
//include('layoutFile/rightSideBar.php');
?>
  <!--end color switcher-->
   
  </div><!--End wrapper-->

  	<?php 
include('layoutFile/footerLinks.php');
?>
<?php
	}else{
		print $_SESSION['MSG'] = "Your Section Has Expired";
		header('location: /Hungrezy/login.php');
	}
?>