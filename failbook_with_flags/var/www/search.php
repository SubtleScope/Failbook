<?php
session_start();
require( "common.php" );

if( !isUserLoggedIn() ) {
	header( "Location: index.php" );
}

$userInput = $_GET['text'];

if (isset($userInput)) {
	$posts = searchPosts($userInput);
	$searchValue = $userInput;
} else $searchValue = "Enter a Search";

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
<div>
   <form action="search.php" method="get">
   Search: <input value="<?php echo $searchValue; ?>" type="text" name="text" id="text"><br>
   <input type="submit">
   </form>
   <br /><br />
   <pre>
   <?
	if ((isset($userInput)) && (empty($posts))) echo "No results found...";
	elseif (!empty($posts)) {
	foreach( $posts as $p ) {
		$likes = getLikes ( $p['pid'] );		
?>
<div class="postbox radius">
  <div class="postboxinner radius">
    <div style="float: left; margin-right: 25px">
		<img src="<?php echo( getAvatar($p['uid']) ) ?>" width="65px">
	</div>
    <div class="loginform">
        <p align="left" style="color: #333333; font-size: 16px">
			<?php echo( $p['text'] ); ?>
        </p>
		<?php if( $p['type'] != NULL ) { ?>
		<p><img src="<?php echo( "data:".$p['type'].";base64,".base64_encode($p['image']) ) ?>" width="300px" /></p>
		<?php } ?>
		<p style="float:left; color: #999999; font-size: 12px"> 
			<?php echo( "<button onclick='likePosts(" . $p['pid'] . ")' style='border: 0; background: transparent'><img src='like.png'</img> $likes</button>" ); ?>
		</p>
		<p style="float:right; color: #999999; font-size: 12px"> 
			<?php echo( $p['fname']." ".$p['lname']." <br/> ".$p['time'] ) ?>
		</p>
<p></p>
    </div>
    <!--loginform-->
  </div>
  <!--loginboxinner-->
</div>
<?
	}

        } else echo "Run a Search!";
   ?>
   </pre>
</div>
</body>
</html>
