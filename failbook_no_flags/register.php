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
