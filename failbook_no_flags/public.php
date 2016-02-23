<?php
require( "common.php" );

if ( empty($_GET['user']) ) {
    header( "Location: index.php" );
} else if ( isValidUser($_GET['user']) == "0" ) {
    echo "<script>alert(\"Error! The entered user was not found!\");</script>";
} else {
    $user = $_GET['user'];
    $uid = getUidFromUsername($user)['0']['uid'];
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
				<td><span style="color:#ccc;"></span></td>
				<td><span style="color:#ccc;"></span></td>
			</tr>
			<tr>
				<td><label></label></td>
				<td><label></label></td>
              	                <td><label><a href="login.php" style="color:#999; text-decoration:none">login</a></label></td>
			</tr>
		</table>
      </div>
    </div>
  </div>
</div>
<!-- header ends here -->
<!--loginbox-->

<div class="userpostbox radius">
<h3><font color="white"><?php echo $user; ?>'s Posts:</font></h3>
</div>

<?

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
