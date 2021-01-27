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
      <!-- Breadcrumb-->
     
    <!-- End Breadcrumb-->
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header"><i class="fa fa-table"></i> Customer Table Info</div>
            <div class="card-body">
              <div class="table-responsive">
              <table id="default-datatable" class="table table-bordered">
                <thead>
                    <tr>
                        <th>USER_ID</th>
                        <th>USER_TYPE_ID</th>
                        <th>USER_TYPE_NAME</th>
                        <th>USER_NAME</th>
                        <th>USER_ADDRESS</th>
                        <th>USER_EMAIL</th>
                        <th>USER_PHONE</th>
                        <th>USER_PASSWORD</th>
                        <th>USER_STATUS</th>
                        <th>CREATE_DATA</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
							include_once("phpFiles/conn.php");
							$curs=oci_new_cursor($conn);
							$REG = oci_parse($conn, 
							 "begin FOOD_DELIVERY_PROSESS_DATA.FA_GET_CUSTOMER_ALL_J
							 (:CUR_DATA);
							 end;");
							oci_bind_by_name($REG, ":CUR_DATA", $curs, -1, OCI_B_CURSOR);

							oci_execute($REG);
							oci_execute($curs);
							 while (($row = oci_fetch_array($curs, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
						?> 
                    <tr>
                        <td><?php echo $row['USER_ID'];?></td>
                        <td><?php echo $row['USER_TYPE_ID'];?></td>
                        <td><?php echo $row['USER_TYPE_NAME'];?></td>
                        <td><?php echo $row['USER_ADDRESS'];?></td>
                        <td><?php echo $row['USER_EMAIL'];?></td>
                        <td><?php echo $row['USER_PHONE'];?></td>
                        <td><?php echo $row['USER_PASSWORD'];?></td>
                        <td><?php echo $row['USER_STATUS'];?></td>
                        <td><?php echo $row['CREATE_DATA'];?></td>
                    </tr>
					<?php
							}
						oci_free_statement($REG);
						oci_close($conn);
						?>	
                </tbody>
            </table>
            </div>
            </div>
          </div>
        </div>
      </div><!-- End Row-->


      
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