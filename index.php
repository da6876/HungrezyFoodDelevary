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

<?php
	include_once("phpFiles/conn.php");
	if (!$conn){
		exit("Connection Failed: " . $conn);
	}
		$sql1="SELECT COUNT(0) USER_ID  FROM SOC_FA_USER_TABLE";
		$USER_IDrs=oci_parse($conn,$sql1);
		oci_execute($USER_IDrs);
		
		while(($row = oci_fetch_array($USER_IDrs, OCI_ASSOC+OCI_RETURN_NULLS)) != false){
			 $USER_ID= $row['USER_ID'];
		}
		
		$sql2="SELECT COUNT(0) ORDER_ID  FROM SOC_FA_ORDER_TABLE";
		$USER_INFO_ID_SPrs=oci_parse($conn,$sql2);
		oci_execute($USER_INFO_ID_SPrs);
		
		while(($row = oci_fetch_array($USER_INFO_ID_SPrs, OCI_ASSOC+OCI_RETURN_NULLS)) != false){
			 $ORDER_ID= $row['ORDER_ID'];
		}
		
		$sql3="SELECT COUNT(0) CONT_INFO_ID  FROM FMH_USER_CONNECT_INFO";
		$SERVICE_TYPE_IDrs=oci_parse($conn,$sql3);
		oci_execute($SERVICE_TYPE_IDrs);
		
		while(($row = oci_fetch_array($SERVICE_TYPE_IDrs, OCI_ASSOC+OCI_RETURN_NULLS)) != false){
			 $CONT_INFO_ID= $row['CONT_INFO_ID'];
		}
	
?>
	<div class="card mt-3">
    <div class="card-content">
        <div class="row row-group m-0">
            <div class="col-12 col-lg-6 col-xl-3 border-light">
                <div class="card-body">
                  <h5 class="text-white mb-0"><?php echo $ORDER_ID; ?> <span class="float-right"><i class="fa fa-shopping-cart"></i></span></h5>
                    <div class="progress my-3" style="height:3px;">
                       <div class="progress-bar" style="width:55%"></div>
                    </div>
                  <p class="mb-0 text-white small-font">Total Orders <span class="float-right">+4.2% <i class="zmdi zmdi-long-arrow-up"></i></span></p>
                </div>
            </div>
            <div class="col-12 col-lg-6 col-xl-3 border-light">
                <div class="card-body">
                  <h5 class="text-white mb-0">8323 <span class="float-right"><i class="fa fa-usd"></i></span></h5>
                    <div class="progress my-3" style="height:3px;">
                       <div class="progress-bar" style="width:55%"></div>
                    </div>
                  <p class="mb-0 text-white small-font">Total Revenue <span class="float-right">+1.2% <i class="zmdi zmdi-long-arrow-up"></i></span></p>
                </div>
            </div>
            <div class="col-12 col-lg-6 col-xl-3 border-light">
                <div class="card-body">
                  <h5 class="text-white mb-0"><?php echo $USER_ID;?> <span class="float-right"><i class="fa fa-eye"></i></span></h5>
                    <div class="progress my-3" style="height:3px;">
                       <div class="progress-bar" style="width:55%"></div>
                    </div>
                  <p class="mb-0 text-white small-font">Visitors <span class="float-right">+5.2% <i class="zmdi zmdi-long-arrow-up"></i></span></p>
                </div>
            </div>
            <div class="col-12 col-lg-6 col-xl-3 border-light">
                <div class="card-body">
                  <h5 class="text-white mb-0">5630 <span class="float-right"><i class="fa fa-envira"></i></span></h5>
                    <div class="progress my-3" style="height:3px;">
                       <div class="progress-bar" style="width:55%"></div>
                    </div>
                  <p class="mb-0 text-white small-font">Messages <span class="float-right">+2.2% <i class="zmdi zmdi-long-arrow-up"></i></span></p>
                </div>
            </div>
        </div>
    </div>
 </div>  
	  
	
	
   
  


    
	
	<div class="row">
	 <div class="col-12 col-lg-12">
	   <div class="card">
	     <div class="card-header">Recent Order Tables
		  <div class="card-action">
             <div class="dropdown">
             <a href="javascript:void();" class="dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown">
              <i class="icon-options"></i>
             </a>
              <div class="dropdown-menu dropdown-menu-right">
              <a class="dropdown-item" href="javascript:void();">Action</a>
              <a class="dropdown-item" href="javascript:void();">Another action</a>
              <a class="dropdown-item" href="javascript:void();">Something else here</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="javascript:void();">Separated link</a>
               </div>
              </div>
             </div>
		 </div>
	       <div class="table-responsive">
                 <table class="table align-items-center table-flush table-borderless">
                  <thead>
                   <tr>
                     <th>ORDER_ID</th>
                        <th>USER_ID</th>
                        <th>USER_NAME</th>
                        <th>USER_PHONE</th>
                        <th>USER_EMAIL</th>
                        <th>USER_ADDRESS</th>
                        <th>USER_TYPE_NAME</th>
                        <th>PRODUCT_ID</th>
                        <th>PRODUCT_NAME</th>
                        <th>PRODUCT_PRICE</th>
                        <th>ORDER_DEATILS</th>
                        <th>ORDER_ADDRESS</th>
                        <th>ORDER_STATUS</th>
                        <th>CREATE_DATA</th>
                        <th>CREATE_BY</th>
                   </tr>
                   </thead>
                   <tbody><tr>
                    <?php
							include_once("phpFiles/conn.php");
							$curs=oci_new_cursor($conn);
							$REG = oci_parse($conn, 
							 "begin FOOD_DELIVERY_PROSESS_DATA.FA_GET_ORDER_ALL_J
							 (:CUR_DATA);
							 end;");
							oci_bind_by_name($REG, ":CUR_DATA", $curs, -1, OCI_B_CURSOR);

							oci_execute($REG);
							oci_execute($curs);
							 while (($row = oci_fetch_array($curs, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
						?> 
                    <tr>
                        <td><?php echo $row['ORDER_ID'];?></td>
                        <td><?php echo $row['USER_ID'];?></td>
                        <td><?php echo $row['USER_NAME'];?></td>
                        <td><?php echo $row['USER_PHONE'];?></td>
                        <td><?php echo $row['USER_EMAIL'];?></td>
                        <td><?php echo $row['USER_ADDRESS'];?></td>
                        <td><?php echo $row['USER_TYPE_NAME'];?></td>
                        <td><?php echo $row['PRODUCT_ID'];?></td>
                        <td><?php echo $row['PRODUCT_NAME'];?></td>
                        <td><?php echo $row['PRODUCT_PRICE'];?></td>
                        <td><?php echo $row['ORDER_DEATILS'];?></td>
                        <td><?php echo $row['ORDER_ADDRESS'];?></td>
                        <td><?php echo $row['ORDER_STATUS'];?></td>
                        <td><?php echo $row['CREATE_DATA'];?></td>
                        <td><?php echo $row['CREATE_BY'];?></td>
                    </tr>
					<?php
							}
						oci_free_statement($REG);
						oci_close($conn);
						?>	
                 </tbody></table>
               </div>
	   </div>
	 </div>
	</div><!--End Row-->

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