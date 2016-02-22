<?php

session_start();
require( "common.php" );

if( !isUserLoggedIn() ) {
	header( "Location: index.php" );
}
?>

<?php

$topPost = getTopPost();
$topLikes = getLikes ( $topPost['pid'] );

if ( $topPost['pid'] ) {

?>
<div class="toppostbox radius">
<h3>Top Liked Post:</h3>
  <div class="postboxinner radius">
    <div style="float: left; margin-right: 25px">
		<img src="<?php echo( getAvatar($topPost['uid']) ) ?>" width="65px">
	</div>
    <div class="loginform">
        <p align="left" style="color: #333333; font-size: 16px">
			<?php echo( $topPost['text'] ); ?>
        </p>
		<?php if( $topPost['type'] != NULL ) { ?>
		<p><img src="<?php echo( "data:".$topPost['type'].";base64,".base64_encode($topPost['image']) ) ?>" width="300px" /></p>
		<?php } ?>
		<p style="float:left; color: #999999; font-size: 12px"> 
		<?php echo( "<button onclick='likePosts(" . $topPost['pid'] . ")' style='border: 0; background: transparent'><img src='like.png'</img> $topLikes</button>" ); ?>
		</p>
		<p style="float:right; color: #999999; font-size: 12px"> 
			<a name="poster" id="poster"><?php echo( $topPost['fname']." ".$topPost['lname'] ); ?></a><? echo(" <br/> ".$topPost['time'] ) ?>
		</p>
<p></p>
    </div>
    <!--loginform-->
  </div>
  <!--loginboxinner-->
</div>

<? } ?>

<?

$posts = getPosts();

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
