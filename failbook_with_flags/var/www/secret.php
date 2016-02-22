<?php
session_start();
require( "common.php" );

if( !isUserLoggedIn() ) {
	header( "Location: index.php" );
}

setcookie("admin", 0);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" href="failbook.ico">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Failbook</title>
<link rel="stylesheet" href="style.css" type="text/css" />
<script type="text/javascript" src="scripts/jquery.js"></script>
</head>
<body class="login">
<!-- header starts here -->
<div id="facebook-Bar">
  <div id="facebook-Frame">
    <div id="logo"><a href="index.php"><img src="failbook.png"></img></a></div>
    <div id="header-main-right">
      <div id="header-main-right-nav">
      </div>
    </div>
  </div>
</div>
<!-- header ends here -->
<div class="loginbox radius" style="width:75%">
  <div class="loginboxinner radius">
    <!--loginheader-->
    <div class="loginform">
    <!-- Note: Remove this page before going operational. -->
    <?php 
       if (isset($_COOKIE['admin']) && $_COOKIE['admin'] == 1) {
          echo "Flag2: U3BlYWsgZnJpZW5kIGFuZCBlbnRlcgo=";
       } else {
          echo "There's nothing to see here, move along!";
   	  echo "<p>\n</p>";
   	  echo "You are not authorized to view this page.";
       }
    ?>
    </div>
    <!--loginform-->
  </div>
  <!--loginboxinner-->
</div>
<!--loginbox-->

</body>
</html>
