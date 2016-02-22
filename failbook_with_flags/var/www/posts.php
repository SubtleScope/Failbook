<?php
session_start();
require( "common.php" );

if( !isUserLoggedIn() ) {
	header( "Location: index.php" );
}

if( !isNullOrEmpty('text') || (isset($_FILES['image']) && $_FILES['image']['size'] > 0) ) {
	$text = isset($_POST['text']) ? $_POST['text'] : "";
	$text = mysql_real_escape_string( $text );

	$image = "";
	$type = "";
	$tmpname = $_FILES['image']['tmp_name'];
	if( isset($_FILES['image']) && $_FILES['image']['error'] == 0 ){
		if( $_FILES['image']['size'] > 16000000 ) {
			handleError( "image is too big, must be less than 16MB (".$_FILES['image']['size']." bytes)" );
			exit;
		}
		
		$fp = fopen( $tmpname, 'r' );
		$image = fread( $fp, filesize( $tmpname ) );
		fclose( $fp );
		$image = addslashes( $image );
		$type = $_FILES['image']['type'];
	}

	addPost( $_SESSION['user'], $text, $type, $image );
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" href="failbook.ico">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<script type="text/javascript" src="scripts/jquery.js"></script>
<script type="text/javascript">
    function loadPosts() { $('#posts').load('rposts.php'); };
    var auto_refresh = setInterval(function() {
        loadPosts();
    }, 500);
    function likePosts(pid) { 
        $.ajax({
            type: 'POST',
            url: 'likes.php',
            dataType: 'html',
	    data: {pid: pid},
            success: function(html, textStatus) {
                //Handle the return data (1 for refresh, 0 for no refresh)
                if(html == true) {
                    location.reload();
                }
            },
            error: function(xhr, textStatus, errorThrown) {
                alert(errorThrown?errorThrown:xhr.status);
            }
        });
	loadPosts();
     }
</script>
<title>Failbook</title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body class="login" onLoad="loadPosts();">
<!-- header starts here -->
<div id="facebook-Bar">
  <div id="facebook-Frame">
    <div id="logo"><a href="index.php"><img src="failbook.png"></img></a></div>
    <div id="header-main-right">
      <div id="header-main-right-nav">
		<table border="0" style="border:none">
			<tr>
				<td><span style="color:#ccc;">Welcome </span></td>
				<td><span style="color:#ccc;"><?php echo( $_SESSION['fname'] ); ?>!</span></td>
				<!--<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>-->
			</tr>
			<tr>
				<td><label><a href="search.php" style="color:#999; text-decoration:none">search</a></label></td>
				<td><label><a href="account.php" style="color:#999; text-decoration:none">account</a></label></td>
              	                <td><label><a href="logout.php" style="color:#999; text-decoration:none">logout</a></label></td>
			</tr>
		</table>
      </div>
    </div>
  </div>
</div>
<!-- header ends here -->
<div class="loginbox radius">
  <div class="loginboxinner radius">
    <!--loginheader-->
    <div class="loginform">
      <form id="login" action="posts.php" method="POST" enctype="multipart/form-data">
        <p>
	  <img src="<?php echo(getAvatar($_SESSION['user'])) ?>" width="75px" align="right">
          <input type="textarea" id="text" name="text" placeholder="Post an update" rows="5" cols="75" value="" class="radius"/>
        </p>
        <p>
          <input type="file" id="image" name="image" placeholder="Attach an image" class="radius" />
        </p>
	<p>
          <button id="post" class="radius title" name="postbut">Post as <?php echo($_SESSION['fname']." ".$_SESSION['lname']); ?> </button>
        </p>
      </form>
    </div>
    <!--loginform-->
  </div>
  <!--loginboxinner-->
</div>
<!--loginbox-->
<div id="posts">
</div>
</body>
</html>
