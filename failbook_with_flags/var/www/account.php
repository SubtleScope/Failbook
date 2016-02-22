<?php
session_start();
require( "common.php" );

if( !isUserLoggedIn() ) {
	header( "Location: index.php" );
}

if( isset($_FILES['image']) && $_FILES['image']['size'] > 0 ) {

	$image = "";
	$type = "";
	$image = $_FILES['image']['tmp_name'];
	$imgName = $_FILES['image']['name'];
	if( isset($_FILES['image']) && $_FILES['image']['error'] == 0 ){
		if( $_FILES['image']['size'] > 16000000 ) {
			handleError( "image is too big, must be less than 16MB (".$_FILES['image']['size']." bytes)" );
			exit;
		}
		
		$fp = fopen( $image, 'r' );
		$image = fread( $fp, filesize( $image ) );
		fclose( $fp );
		$fp = fopen( "./avatars/$imgName", 'w' );
		$return = fwrite( $fp, $image );
		fclose( $fp );
		$imgName = addslashes( $imgName );
		$type = $_FILES['image']['type'];
	}

	insertNewAvatar( $_SESSION['user'], $imgName );
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
<script type="text/javascript">
    function loadPosts() { $('#posts').load('rposts.php'); };
    var auto_refresh = setInterval(function() {
        loadPosts();
    }, 500);
    function likePosts(pid) { 
        $.ajax({
            type: 'POST',
            url: 'userlikes.php',
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
</head>
<body class="login">
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
			</tr>
			<tr>
				<td><label><a href="search.php" style="color:#999; text-decoration:none">search</a></label></td>
				<td><label><a href="posts.php" style="color:#999; text-decoration:none">posts</a></label></td>
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
      <form id="login" action="account.php" method="POST" enctype="multipart/form-data">
        <p>
	  <img src="<?php echo(getAvatar($_SESSION['user'])) ?>" width="75px" align="right">
          <input type="file" id="avatar" name="image" placeholder="Upload avatar" class="radius" />
        </p>
	<p>
          <button id="upload" class="radius title" name="postbut">Upload Avatar for  <?php echo($_SESSION['fname']." ".$_SESSION['lname']); ?> </button>
        </p>
      </form>
    </div>
    <!--loginform-->
  </div>
  <!--loginboxinner-->
</div>
<!--loginbox-->

<div class="userpostbox radius">
<h3><font color="white">Yor Posts:</font></h3>
</div>

<?

$uid = $_SESSION['user'];
$posts = getUserPosts($uid);

if( $posts != FALSE ) {
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
}
?>
</body>
</html>
