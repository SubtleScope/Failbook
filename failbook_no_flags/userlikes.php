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

session_start();
require( "common.php" );

$pid = $_POST['pid'];

if( !isUserLoggedIn() ) {
	header( "Location: index.php" );
}

likeUsersPosts($pid, $_SESSION['user']);

?>


