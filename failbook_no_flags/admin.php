<?php

  /*
    Failbook - A Vulnerable Web Application Platform
    Copyright (C) 2015 Andy Meyers, Nathan Wray (m4dh4tt3r)

    This file is part of Failbook.

    Failbook is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    Failbook is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with Failbook.  If not, see <http://www.gnu.org/licenses/>.
  */

session_start();
require( "common.php" );

if ($_SESSION['user'] != '1931921182') {
        header( "Location: unauthorized.php" );
}

if( !isUserLoggedIn() ) {
	header( "Location: index.php" );
}

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
    <?php
    adminPortal();
    ?>
    </div>
    <!--loginform-->
  </div>
  <!--loginboxinner-->
</div>
<!--loginbox-->

</body>
</html>
