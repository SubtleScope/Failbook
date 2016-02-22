<?php
session_start();
require( "common.php" );

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
       if (session_id() == "11111111111111111111111111") {
		var_dump($_SESSION);
       } else {
		echo "Wrong <i>session</i>";
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
