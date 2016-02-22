<?php
require( "common.php" );

try {

	//$scheck = mysql_real_escape_string( $_POST['securityq'] );

	if( isNullOrEmpty( "username" ) ||
		isNullOrEmpty( "fname" ) ||
		isNullOrEmpty( "lname" ) ||
		isNullOrEmpty( "password" ) ||
		isNullOrEmpty( "pconfirm" ) ) {

		header( "Location: index.php" );
		//handleError( "You have an error in the registration form!" );

	} else {


		$username = mysql_real_escape_string( $_POST['username'] );
		$fname = mysql_real_escape_string( $_POST['fname'] );
		$lname = mysql_real_escape_string( $_POST['lname'] );
		$pwd1 = mysql_real_escape_string( $_POST['password'] );
		$pwd2 = mysql_real_escape_string( $_POST['pconfirm'] );
		$avatar = "";

		if( $pwd1 != $pwd2 ) {
			handleError( "The passwords are not equal." );
			exit;
		}
		
		$uid = rand();
		
		if( insertNewUser( $uid, $username, $fname, $lname, $pwd1, $avatar ) == FALSE ) {
			handleError( "An error has occured. Please try again." );
		} else {
			createSession( $uid, $fname, $lname );
			header( "Location: posts.php" );
		}
	}
} catch( Exception $e ) {
	header( "Location: index.php" );
}
?>
