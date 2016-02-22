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
