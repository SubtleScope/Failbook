<?php
	require( "common.php" );

if ($_POST) {
	$username = mysql_real_escape_string( $_POST['username'] );
	$fname = mysql_real_escape_string( $_POST['fname'] );
	$lname = mysql_real_escape_string( $_POST['lname'] );
	$pwd1 = mysql_real_escape_string( $_POST['password'] );
	$pwd = str_rot13(base64_encode($username.$pwd1));
	resetPassword($pwd, $fname, $lname, $username);

	if (resetPassword($pwd, $fname, $lname, $username) == TRUE) {
	   header( "Location: index.php" );
	}
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
</head>
<body class="login">
<!--background="background.png"-->
<!-- header starts here -->
<div id="facebook-Bar">
  <div id="facebook-Frame">
    <div id="logo"><a href="index.php"><img src="failbook.png"></img></a></div>
    <div id="header-main-right">
      <div id="header-main-right-nav">
<?php if( !isUserLoggedIn() ) { ?>
        <form method="post" action="login.php" id="login_form" name="login_form">
          <table border="0" style="border:none">
            <tr>
              <td ><input required type="text" tabindex="1"  id="username" placeholder="Username" name="username" class="inputtext radius1" maxlength="20" value=""></td>
              <td ><input required type="password" tabindex="2" id="pass" placeholder="Password" name="pass" class="inputtext radius1" ></td>
              <td ><input type="submit" class="fbbutton" name="login" value="Login" /></td>
            </tr>
            <tr>
              <td><label>
                  <input id="persist_box" type="checkbox" name="persistent" value="1" checked="1"/>
                  <span style="color:#ccc;">Keep me logged in</span></label></td>
              <td><label><a href="" style="color:#ccc; text-decoration:none">forgot your password?</a></label></td>
            </tr>
          </table>
        </form>
<?php } else { ?>
		<table border="0" style="border:none">
			<tr>
				<td><span style="color:#ccc;">Welcome </span></td>
				<td><span style="color:#ccc;"><?php echo( $_SESSION['fname'] ); ?>!</span></td>
			</tr>
			<tr>
				<td><label><a href="posts.php" style="color:#999; text-decoration:none">posts</a></label></td>
              	                <td><label><a href="logout.php" style="color:#999; text-decoration:none">logout</a></label></td>
			</tr>
		</table>
<?php } ?>
      </div>
    </div>
  </div>
</div>
<!-- header ends here -->
<div class="registration">
<div class="loginbox radius2">
  <h2 style="color:#141823; text-align:center;">Password Reset</h2>
  <div class="loginboxinner radius">
    <div class="loginheader">
    </div>
    <!--loginheader-->
    <div class="loginform">
      <form id="login" action="reset.php" method="POST">
        <p>
          <input required type="text" id="firstname" name="fname" placeholder="First Name" value="" class="radius mini" />
          <input required type="text" id="lastname" name="lname" placeholder="Last Name" value="" class="radius mini" />
        </p>
        <p>
          <input required type="text" id="username" name="username" placeholder="Username" class="radius" />
        </p>
        <p>
          <input required type="password" id="password" name="password" placeholder="Password" class="radius" />
        </p>
	<p>
	  <?php echo generateQuestion(); ?>
          <input required type="security" id="security" name="security" placeholder="Security Answer" class="radius" />
        </p>
        <style>
            span.flip { display: inline-block; -moz-transform: scaleX(-1); -o-transform: scaleX(-1); -webkit-transform: scaleX(-1); transform: scaleX(-1); filter: fliph; }
        </style> 
        <button class="radius title" name="reset">Reset <span class="flip">f</span>ailbook Password</button>
        </p>
      </form>
    </div>
    <!--loginform-->
  </div>
  <!--loginboxinner-->
</div>
<!--loginbox-->
</div>
</body>
</html>
