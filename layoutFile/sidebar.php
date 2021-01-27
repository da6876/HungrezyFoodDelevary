<div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
     <div class="brand-logo">
      <a href="index.php">
       <img src="img/hungrezy.png"  width="30" height="30" alt="logo icon">
       <h5 class="logo-text">Hungrezy Admin</h5>
     </a>
   </div>
   <div class="user-details">
    <div class="media align-items-center user-pointer collapsed" data-toggle="collapse" data-target="#user-dropdown">
      <div class="avatar"><img class="mr-3 side-user-img" src="https://via.placeholder.com/110x110" alt="user avatar"></div>
       <div class="media-body">
       <h6 class="side-user-name"><?php echo $_SESSION['USER_NAME'];?></h6>
      </div>
       </div>
     <div id="user-dropdown" class="collapse">
      <ul class="user-setting-menu">
            <li><a href="javaScript:void();"><i class="icon-user"></i>  My Profile</a></li>
      <li><a href="javaScript:void();"><i class="icon-power"></i> Logout</a></li>
      </ul>
     </div>
      </div>
   <ul class="sidebar-menu">
      <li class="sidebar-header">MAIN NAVIGATION</li>
      <li>
        <a href="index.php" class="waves-effect">
          <i class="zmdi zmdi-view-dashboard"></i> <span>Dashboard</span>
        </a>
      </li>
      <li>
        <a href="javaScript:void();" class="waves-effect">
          <i class="zmdi zmdi-card-travel"></i>
          <span>Froms</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="sidebar-submenu">
          <li><a href="addProduct.php"><i class="zmdi zmdi-dot-circle-alt"></i>Add Products</a></li>
          <li><a href="addUser.php"><i class="zmdi zmdi-dot-circle-alt"></i>Add User</a></li>
          <li><a href="adduserType.php"><i class="zmdi zmdi-dot-circle-alt"></i>Add User Type</a></li>
        </ul>
      </li>
      <li>
        <a href="javaScript:void();" class="waves-effect">
          <i class="zmdi zmdi-card-travel"></i>
          <span>Tables</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="sidebar-submenu">
		
      <li class="sidebar-header">MAIN Tables</li>
          <li><a href="customerTable.php"><i class="zmdi zmdi-dot-circle-alt"></i>Customer Table</a></li>
          <li><a href="productTable.php"><i class="zmdi zmdi-dot-circle-alt"></i>Product Table</a></li>
          <li><a href="orderTable.php"><i class="zmdi zmdi-dot-circle-alt"></i>Oder Table</a></li>
          <li><a href="userTypeTable.php"><i class="zmdi zmdi-dot-circle-alt"></i>User Type Table</a></li>
        
		
      <li class="sidebar-header">Joining Tables Data</li>
          <li><a href="customerTableInfo.php"><i class="zmdi zmdi-dot-circle-alt"></i>Customer Table Info</a></li>
          <li><a href="productTableInfo.php"><i class="zmdi zmdi-dot-circle-alt"></i>Product Table Info</a></li>
          <li><a href="orderTableInfo.php"><i class="zmdi zmdi-dot-circle-alt"></i>Oder Table Details</a></li>
        
		</ul>
      </li>
    </ul>
   
   </div>