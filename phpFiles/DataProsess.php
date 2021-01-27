<?php
include 'conn.php';

session_start();
if($_SERVER['REQUEST_METHOD'] === 'POST'){

	if(isset($_POST['adminLogin'])){
		$P_USER_PHONE=$_POST['userPhone'];
		$P_USER_PASSWORD=$_POST['userPassword'];
		 
		 $curs = oci_new_cursor($conn);

		 $REG = oci_parse($conn, 
		 "begin FOOD_DELIVERY_PROSESS_DATA.FA_USER_LOGIN
		 (:CUR_DATA,
		 :P_USER_PHONE,
		 :P_USER_PASSWORD
		 );
		 end;");

		oci_bind_by_name($REG, ":CUR_DATA", $curs, -1, OCI_B_CURSOR);
		oci_bind_by_name($REG, ":P_USER_PHONE", $P_USER_PHONE, -1, SQLT_CHR);
		oci_bind_by_name($REG, ":P_USER_PASSWORD", $P_USER_PASSWORD, -1, SQLT_CHR);

		oci_execute($REG);
		oci_execute($curs);
		 while (($row = oci_fetch_array($curs, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
		  $output[]=$row;
		}
		$data=json_encode($output);
		$obj = json_decode($data);
		$obj[0]->STATUS_CODE;
		if($obj[0]->STATUS_CODE==="500"){
			$_SESSION['USER_ID'] = $obj[0]->USER_ID; 
			$_SESSION['USER_TYPE_ID'] = $obj[0]->USER_TYPE_ID; 
			$_SESSION['USER_NAME'] = $obj[0]->USER_NAME; 
			$_SESSION['USER_ADDRESS'] = $obj[0]->USER_ADDRESS; 
			$_SESSION['USER_EMAIL'] = $obj[0]->USER_EMAIL; 
			$_SESSION['USER_PHONE'] = $obj[0]->USER_PHONE; 
			$_SESSION['USER_PASSWORD'] = $obj[0]->USER_PASSWORD; 
			$_SESSION['USER_STATUS'] = $obj[0]->USER_STATUS;
			header('location: /Hungrezy/index.php');			
		}else{
			 
			print $_SESSION['MSG'] = $obj[0]->MSG;
			header('location: /Hungrezy/login.php');
		}
		
		oci_free_statement($REG);
		oci_close($conn);
	}elseif(isset($_POST['addProduct'])){
		  $P_USER_ID=$_SESSION['USER_ID'];
		  $P_PRODUCT_NAME=$_POST['productName'];
		  $P_PRODUCT_DEATILS=$_POST['productDetails'];
		  $P_PRODUCT_ADDRESS=$_POST['address'];
		  $P_PRODUCT_PRICE=$_POST['price'];
		  $P_PRODUCT_STATUS=$_POST['status'];
		  $P_CREATE_BY=$_SESSION['USER_NAME'];
		 
		 $curs = oci_new_cursor($conn);

		 $REG = oci_parse($conn, 
		 "begin FOOD_DELIVERY_PROSESS_DATA.FA_INSERT_SOC_FA_PRODUCT_TABLE
		 (:CUR_DATA,
		 :P_USER_ID,
		 :P_PRODUCT_NAME,
		 :P_PRODUCT_DEATILS,
		 :P_PRODUCT_ADDRESS,
		 :P_PRODUCT_PRICE,
		 :P_PRODUCT_STATUS,
		 :P_CREATE_BY
		 );
		 end;");

		oci_bind_by_name($REG, ":CUR_DATA", $curs, -1, OCI_B_CURSOR);
		oci_bind_by_name($REG, ":P_USER_ID", $P_USER_ID, -1, SQLT_CHR);
		oci_bind_by_name($REG, ":P_PRODUCT_NAME", $P_PRODUCT_NAME, -1, SQLT_CHR);
		oci_bind_by_name($REG, ":P_PRODUCT_DEATILS", $P_PRODUCT_DEATILS, -1, SQLT_CHR);
		oci_bind_by_name($REG, ":P_PRODUCT_ADDRESS", $P_PRODUCT_ADDRESS, -1, SQLT_CHR);
		oci_bind_by_name($REG, ":P_PRODUCT_PRICE", $P_PRODUCT_PRICE, -1, SQLT_CHR);
		oci_bind_by_name($REG, ":P_PRODUCT_STATUS", $P_PRODUCT_STATUS, -1, SQLT_CHR);
		oci_bind_by_name($REG, ":P_CREATE_BY", $P_CREATE_BY, -1, SQLT_CHR);

		oci_execute($REG);
		oci_execute($curs);
		 while (($row = oci_fetch_array($curs, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
		  $output[]=$row;
		}
		$data=json_encode($output);
		$obj = json_decode($data);
		$obj[0]->STATUS_CODE;
		if($obj[0]->STATUS_CODE==="500"){
			print $_SESSION['MSG'] = $obj[0]->MSG;
			header('location: /Hungrezy/addProduct.php');
		}else{
			print $_SESSION['MSG'] = $obj[0]->MSG;
			header('location: /Hungrezy/addProduct.php');
		}
		oci_free_statement($REG);
		oci_close($conn);
		
	}elseif(isset($_POST['addUser'])){
		
		  $P_USER_TYPE_ID=$_POST['userType'];
		  $P_USER_NAME=$_POST['userName'];
		  $P_USER_ADDRESS=$_POST['userAddress'];
		  $P_USER_EMAIL=$_POST['userEmail'];
		  $P_USER_PHONE=$_POST['userPhone'];
		  $P_USER_PASSWORD=$_POST['userPassword'];
		  $P_USER_STATUS='A';
		  $P_CREATE_BY=$_SESSION['USER_NAME'];
		 
		 $curs = oci_new_cursor($conn);

		 $REG = oci_parse($conn, 
		 "begin FOOD_DELIVERY_PROSESS_DATA.FA_INSERT_SOC_FA_USER_TABLEE
		 (:CUR_DATA,
		 :P_USER_TYPE_ID,
		 :P_USER_NAME,
		 :P_USER_ADDRESS,
		 :P_USER_EMAIL,
		 :P_USER_PHONE,
		 :P_USER_PASSWORD,
		 :P_USER_STATUS,
		 :P_CREATE_BY
		 );
		 end;");

		oci_bind_by_name($REG, ":CUR_DATA", $curs, -1, OCI_B_CURSOR);
		oci_bind_by_name($REG, ":P_USER_TYPE_ID", $P_USER_TYPE_ID, -1, SQLT_CHR);
		oci_bind_by_name($REG, ":P_USER_NAME", $P_USER_NAME, -1, SQLT_CHR);
		oci_bind_by_name($REG, ":P_USER_ADDRESS", $P_USER_ADDRESS, -1, SQLT_CHR);
		oci_bind_by_name($REG, ":P_USER_EMAIL", $P_USER_EMAIL, -1, SQLT_CHR);
		oci_bind_by_name($REG, ":P_USER_PHONE", $P_USER_PHONE, -1, SQLT_CHR);
		oci_bind_by_name($REG, ":P_USER_PASSWORD", $P_USER_PASSWORD, -1, SQLT_CHR);
		oci_bind_by_name($REG, ":P_USER_STATUS", $P_USER_STATUS, -1, SQLT_CHR);
		oci_bind_by_name($REG, ":P_CREATE_BY", $P_CREATE_BY, -1, SQLT_CHR);

		oci_execute($REG);
		oci_execute($curs);
		 while (($row = oci_fetch_array($curs, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
		  $output[]=$row;
		}
		$data=json_encode($output);
		$obj = json_decode($data);
		$obj[0]->STATUS_CODE;
		if($obj[0]->STATUS_CODE==="500"){
			print $_SESSION['MSG'] = $obj[0]->MSG;
			header('location: /Hungrezy/addUser.php');
		}else{
			print $_SESSION['MSG'] = $obj[0]->MSG;
			header('location: /Hungrezy/addUser.php');
		}
		
		oci_free_statement($REG);
		oci_close($conn);
		
	}elseif(isset($_POST['addUserType'])){
		
		  $P_USER_TYPE_NAME=$_POST['userTypeName'];
		  $P_USER_TYPE_STATUS=$_POST['status'];
		  $P_CREATE_BY=$_SESSION['USER_NAME'];
		 
		 $curs = oci_new_cursor($conn);

		 $REG = oci_parse($conn, 
		 "begin FOOD_DELIVERY_PROSESS_DATA.FA_INSERT_SOC_FA_USER_TYPE
		 (:CUR_DATA,
		 :P_USER_TYPE_NAME,
		 :P_USER_TYPE_STATUS,
		 :P_CREATE_BY
		 );
		 end;");

		oci_bind_by_name($REG, ":CUR_DATA", $curs, -1, OCI_B_CURSOR);
		oci_bind_by_name($REG, ":P_USER_TYPE_NAME", $P_USER_TYPE_NAME, -1, SQLT_CHR);
		oci_bind_by_name($REG, ":P_USER_TYPE_STATUS", $P_USER_TYPE_STATUS, -1, SQLT_CHR);
		oci_bind_by_name($REG, ":P_CREATE_BY", $P_CREATE_BY, -1, SQLT_CHR);

		oci_execute($REG);
		oci_execute($curs);
		 while (($row = oci_fetch_array($curs, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
		  $output[]=$row;
		}
		$data=json_encode($output);
		$obj = json_decode($data);
		$obj[0]->STATUS_CODE;
		if($obj[0]->STATUS_CODE==="500"){
			print $_SESSION['MSG'] = $obj[0]->MSG;
			header('location: /Hungrezy/userType.php');
		}else{
			print $_SESSION['MSG'] = $obj[0]->MSG;
			header('location: /Hungrezy/userType.php');
		}
		
		oci_free_statement($REG);
		oci_close($conn);
	}
}

?>