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

initDb();

function isNullOrEmpty( $var ) {
	return (!isset($_POST[$var]) || trim($_POST[$var])==='');
}

function handleError( $var ) {
	//echo( "<html><body>oops! an error occured:<br />".$var."<br/> <a href='index.php'>get out of here</a></body></html>" );
	echo ( "<html><body><script>alert( \"" . $var . "\" ); window.location = \"index.php\"</script></body></html>" );
}

function createSession( $user, $fname, $lname ) {
	if( !isSessionStarted() ) {
		session_start();
	}

	$_SESSION['user'] = $user;
	$_SESSION['fname'] = $fname;
	$_SESSION['lname'] = $lname;
	$_SESSION['expiretime'] = time() + 600;
}

function isUserLoggedIn() {
	if( !isSessionStarted() ) {
		session_start();
	}

	return isset( $_SESSION['user'] );
}

function isSessionStarted() {
	if( php_sapi_name() !== 'cli' ) {
		if( version_compare( phpversion(), '5.4.0', '>=') ) {
			return session_status() === PHP_SESSION_ACTIVE ? TRUE : FALSE;
		} else {
			return session_id() === '' ? FALSE : TRUE;
		}
	}
	return FALSE;
}

function initDb() {
	$conn = mysql_connect( "localhost", "root", "" );
	$db = mysql_select_db( "failbook", $conn );
}

function getAvatar( $uid ) {
	$ret = FALSE;
	
	$sql = "SELECT avatar from users WHERE uid = '$uid'";

	initDb();
	$res = mysql_query( $sql );
	if( $res && mysql_num_rows( $res ) > 0 ) {
		$ret = array();
		while( $row = mysql_fetch_assoc( $res ) ) {
			$avatar = $row['avatar'];
		}
	}
	mysql_close();

	if ($uid == "1931921182") {
	    $files = array( "tom.jpg" );

	    return "avatars/".$files[($uid + sizeof($files)) % sizeof($files)];
	} else if ($avatar) {
	    return "avatars/$avatar";
	} else {
	    $files = array( "alien.png",
			    "astronaut.png",
			    "attendant.png",
	  		    "contractor.png",
			    "dandy.png",
			    "king.png",
		            "librarian.png",
			    "ninja.png",
			    "nurse.png",
			    "queen.png",
			    "robot.png",
			    "sportsman.png" );
	    return "avatars/".$files[($uid + sizeof($files)) % sizeof($files)];
	}
}


function insertNewUser( $uid, $username, $fname, $lname, $pwd, $avatar ) {
	$ret = FALSE;
	
	//salt pwd with username
	$pwrd = md5( sha1( md5( $username.$pwd ) ) );
	$pwd = str_rot13(base64_encode($username.$pwd));
	$sql = "INSERT INTO users VALUES( '$uid','$username','$fname','$lname','$pwd', '$avatar' )";

	initDb();
	$res = mysql_query( $sql );
	mysql_close();
	return $res;
}

function insertNewAvatar( $uid, $avatar ) {
	$ret = FALSE;
	
	$sql = "UPDATE users SET avatar='$avatar' WHERE uid = '$uid'";
echo $sql;

	initDb();
	$res = mysql_query( $sql );
	mysql_close();
	return $res;
}

function isLoginSuccessful( $username, $password ) {
	$ret = FALSE;

	//salt pwd with username
	$pwrd = md5( sha1( md5( $username.$password ) ) );
	$pwd = str_rot13(base64_encode($username.$password));
	$sql = "SELECT uid, fname, lname FROM users WHERE username='$username' AND pass='$pwd'";
	initDb();
	$result = mysql_query( $sql );

	if( $result && $row = mysql_fetch_array( $result ) ) {
		$ret = array( $row[0], $row[1], $row[2] );
	}

	mysql_close();
	return $ret;
}

function addPost( $user, $text, $type, $image ) {
	$pid = rand();
	$sql = "INSERT INTO posts VALUES( '$pid','$user','$text',NOW() )";
	$sql2 = "INSERT INTO images VALUES( '$pid', '$type','$image' )";
	
	initDb();
	$res = mysql_query( $sql );

	if( $type != "" && $res ) {
		$res = mysql_query( $sql2 );
	}

	mysql_close();
	return $res;
}

function getPosts() {
	$ret = FALSE;
	$sql = "SELECT posts.pid, users.uid, fname, lname, time, text, type, image FROM posts JOIN users ON posts.uid = users.uid LEFT JOIN images ON posts.pid = images.pid ORDER BY time DESC LIMIT 25;";

	initDb();
	$res = mysql_query( $sql );

	if( $res && mysql_num_rows( $res ) > 0 ) {
		$ret = array();
		while( $row = mysql_fetch_assoc( $res ) ) {
			$ret[] = $row;
		}
	}
	mysql_close();
	return $ret;
}

function searchPosts($query=NULL) {
	$ret = FALSE;
	$conn1 = mysql_connect( "localhost", "flaguser", "flaguser" );
	$db1 = mysql_select_db( "failbook", $conn1 );

        $sql = "SELECT * FROM posts WHERE text LIKE \"%$query%\"";
	$res = mysql_query( $sql );

	if( $res && mysql_num_rows( $res ) > 0 ) {
		$ret = array();
		while( $row = mysql_fetch_assoc( $res ) ) {
			$ret[] = $row;
		}
	}
	mysql_close();
	return $ret;
}

function getUserPosts($uid) {
	$ret = FALSE;
	$sql = "SELECT posts.pid, users.uid, fname, lname, time, text, type, image FROM posts JOIN users ON posts.uid = users.uid AND users.uid = $uid LEFT JOIN images ON posts.pid = images.pid ORDER BY time DESC LIMIT 25;";

	initDb();
	$res = mysql_query( $sql );

	if( $res && mysql_num_rows( $res ) > 0 ) {
		$ret = array();
		while( $row = mysql_fetch_assoc( $res ) ) {
			$ret[] = $row;
		}
	}
	mysql_close();
	return $ret;
}

function getTopPost() {
	$ret = FALSE;

	$sql = "SELECT COUNT(*) AS likes, likes.pid FROM likes LEFT JOIN posts ON posts.pid = likes.pid GROUP BY pid ORDER BY likes DESC,time DESC LIMIT 1";
	initDb();
	$res = mysql_query( $sql );

	if( $res && mysql_num_rows( $res ) > 0 ) {
		$ret = array();
		while( $row = mysql_fetch_assoc( $res ) ) {
			$pid = $row['pid'];
		}
	}
	mysql_close();

	$sql = "SELECT posts.pid, users.uid, fname, lname, time, text, type, image FROM posts JOIN users ON posts.uid = users.uid LEFT JOIN images ON posts.pid = images.pid WHERE posts.pid = $pid ORDER BY time DESC LIMIT 1;";

	initDb();
	$res = mysql_query( $sql );

	if( $res && mysql_num_rows( $res ) > 0 ) {
		$ret = array();
		while( $row = mysql_fetch_assoc( $res ) ) {
			$ret[] = $row;
		}
	}
	mysql_close();
	return $ret[0];
}
/*
function getUserTopPost($uid) {
        $ret = FALSE;

        $sql = "SELECT COUNT(*) AS likes, likes.uid FROM likes LEFT JOIN posts ON posts.uid = likes.uid AND posts.uid = $uid GROUP BY pid ORDER BY likes DESC,time DESC LIMIT 1;";
        initDb();
        $res = mysql_query( $sql );

        if( $res && mysql_num_rows( $res ) > 0 ) {
                $ret = array();
                while( $row = mysql_fetch_assoc( $res ) ) {
                        $pid = $row['pid'];
                }
        }
        mysql_close();

        $sql = "SELECT posts.pid, users.uid, fname, lname, time, text, type, image FROM posts JOIN users ON posts.uid = users.uid AND users.id = $uid LEFT JOIN images ON posts.pid = images.pid WHERE posts.pid = $pid ORDER BY time DESC LIMIT 1;";

        initDb();
        $res = mysql_query( $sql );

        if( $res && mysql_num_rows( $res ) > 0 ) {
                $ret = array();
                while( $row = mysql_fetch_assoc( $res ) ) {
                        $ret[] = $row;
                }
        }
        mysql_close();
        return $ret[0];
}
*/
function getLikes( $pid ) {
	$ret = FALSE;
	$sql = "SELECT COUNT(*) AS likes FROM likes WHERE pid = $pid";

	initDb();
	$res = mysql_query( $sql );

	if( $res && mysql_num_rows( $res ) > 0 ) {
		$ret = array();
		while( $row = mysql_fetch_assoc( $res ) ) {
			$ret[] = $row;
		}
	}
	mysql_close();
	return $ret[0]['likes'];
}

function likePosts( $pid, $uid) {
	$ret = FALSE;
	$sql = "SELECT COUNT(*) AS likes FROM likes WHERE pid = $pid AND uid = $uid";

	initDb();
	$res = mysql_query( $sql );

	if( $res && mysql_num_rows( $res ) > 0 ) {
		$ret = array();
		while( $row = mysql_fetch_assoc( $res ) ) {
			$ret[] = $row;
		}
	}
	mysql_close();
	if ( $ret[0]['likes'] >= 1 ) { return false; };

	$sql1 = "INSERT INTO likes VALUES ($pid, $uid)";

	initDb();
	$res = mysql_query( $sql1 );

	mysql_close();
}

function likeUsersPosts( $pid, $uid) {
        $ret = FALSE;
        $sql = "SELECT COUNT(*) AS likes FROM likes WHERE pid = $pid AND uid = $uid";

        initDb();
        $res = mysql_query( $sql );

        if( $res && mysql_num_rows( $res ) > 0 ) {
                $ret = array();
                while( $row = mysql_fetch_assoc( $res ) ) {
                        $ret[] = $row;
                }
        }
        mysql_close();
        if ( $ret[0]['likes'] >= 1 ) { return false; };

        $sql1 = "INSERT INTO likes VALUES ($pid, $uid)";

        initDb();
        $res = mysql_query( $sql1 );

        mysql_close();
}

function resetPassword($pass, $fname, $lname, $username) {
	$ret = FALSE;
	$sql = "UPDATE users set pass='$pass' where fname='$fname' and lname='$lname' and username='$username'";

	initDb();
	$res = mysql_query( $sql );

	mysql_close();
	return true;
}

function generateQuestion() {
	$files = array( "Security Question: What is your mother's maiden name?",
			"Security Question:What is your favorite color?",
			"Security Question:What is your dog's name?",
	  		"Security Question:What was the model fo your first car?",
			"Security Question:What was your high school's name?" );

	return $files[array_rand($files)];
}

function adminPortal() {
        $ret = FALSE;
        #$sql = "SELECT *, SUBSTRING(pass, 1, 20) from users ORDER BY uid LIMIT 50";
        $sql = "SELECT username, fname, lname, pass from users ORDER BY uid LIMIT 20";

        initDb();
        $res = mysql_query( $sql );
	
	
	$table = "<table rules = \"rows\">";
   	$table .= "<tr>";
	//$table .= "<td>uid</td>";
   	$table .= "<td>username</td>";
   	$table .= "<td>fname</td>";
   	$table .= "<td>lname</td>";
   	$table .= "<td>pass</td>";
	$table .= "</tr>";
   	$table .= "<tr>";
 	while( $row = mysql_fetch_row( $res ) )
 	{
   		$table .= "<tr>";
		$table .= "<td>$row[0]</td>";
   		$table .= "<td>$row[1]</td>";
   		$table .= "<td>$row[2]</td>";
   		$table .= "<td>$row[3]</td>";
   		//$table .= "<td>$row[4]</td>";
		$table .= "</tr>";
 	}
 	$table .= "</table>";
        echo '<center>';
 	echo $table;
 	echo '</center>';

        mysql_close();
        return true;
}

?>
