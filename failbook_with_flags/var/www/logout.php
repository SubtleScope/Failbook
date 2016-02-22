<?php
session_start();
$_SESSION = array();
session_destroy();

$_COOKIES=array();

foreach ($_COOKIE as $cookieId => $cookieValue) {
	setcookie($cookieId,NULL,-1);
};

header( "Location: index.php" );
?>
