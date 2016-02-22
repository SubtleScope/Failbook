<?php

session_start();
require( "common.php" );

$pid = $_POST['pid'];

if( !isUserLoggedIn() ) {
	header( "Location: index.php" );
}

likeUsersPosts($pid, $_SESSION['user']);

?>


