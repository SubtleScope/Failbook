<?php
require( "common.php" );

try {

	if( isNullOrEmpty( "username" ) ||
		isNullOrEmpty( "pass" ) ) {

		header( "Location: index.php" );
		exit;
		//handleError( "missing authentication parameters" );
	}

	$username = mysql_real_escape_string( $_POST['username'] );
	$pwd = mysql_real_escape_string( $_POST['pass'] );

	$result = isLoginSuccessful( $username, $pwd );

	if( $result != FALSE ) {
		createSession( $result[0], $result[1], $result[2] );
		header( "Location: posts.php" );
	} else {
		handleError( "Login Failed. Please try again." );
	}
} catch( Exception $e ) {
	header( "Location: index.php" );
}
?>
