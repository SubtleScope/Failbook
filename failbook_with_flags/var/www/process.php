<?php
session_start();
require( "common.php" );

if( !isUserLoggedIn() ) {
	header( "Location: index.php" );
}

?>
<!-- GET:  input --!>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" href="failbook.ico">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Failbook</title>
<link rel="stylesheet" href="style.css" type="text/css" />
<script type="text/javascript" src="scripts/jquery.js"></script>
</head>
<body class="login">
<!-- header starts here -->
<div id="facebook-Bar">
  <div id="facebook-Frame">
    <div id="logo"><a href="index.php"><img src="failbook.png"></img></a></div>
    <div id="header-main-right">
      <div id="header-main-right-nav">
      </div>
    </div>
  </div>
</div>
<!-- header ends here -->
<div class="loginbox radius" style="width:75%">
  <div class="loginboxinner radius">
    <!--loginheader-->
    <div class="loginform">
    <!-- Note: Remove this page before going operational. -->
        <script>
    var username = "tom"
    var pass = new Array()
    pass[0] = "onjcpQ6sOsyP2ZKJ"
    pass[1] = "HpWRiNYWXnjQxlFA"
    pass[2] = "lwQ1BegAg8fyM2B0"
    pass[3] = "CqluIKVSVToA6bJr"
    pass[4] = "Dx2YdFwZq80YoIh0"
    pass[5] = "MXzTWiWE8slqjmnd"
    pass[6] = "hwxKxpUH0rFQq24R"
    pass[7] = "6mL6Qtmi4ByKfURf"
    pass[8] = "LkAiFMDSWSEb0eIQ"
    pass[9] = "M6eNtnCiiBkHct1N"
    
    var alphaNumeric = "abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"

    var char9 = pass[5].charCodeAt(7).toString(16)
    var char4 = pass[8].charCodeAt(0).toString(16)
    var char1 = pass[3].charCodeAt(15).toString(16)
    var char7 = pass[2].charCodeAt(12).toString(16)
    var char5 = pass[7].charCodeAt(3).toString(16)
    var char2 = pass[1].charCodeAt(11).toString(16)
    var char6 = pass[4].charCodeAt(4).toString(16)
    var char3 = pass[9].charCodeAt(8).toString(16)
    var char8 = pass[0].charCodeAt(9).toString(16)
    var char0 = pass[6].charCodeAt(5).toString(16)

    var tempPass = char0.concat(char1, char2, char3, char4, char5, char6, char7, char8, 
char9).toUpperCase()

    var tempChar1 = tempPass.search("C")
    var tempChar2 = tempPass.search("D")

    var tempCharCode1 = tempPass.charCodeAt(tempChar1).toString(16)
    var tempCharCode2 = tempPass.charCodeAt(tempChar2).toString(16)

    tempPass = tempPass.replace("C",tempCharCode1)
    tempPass = tempPass.replace("D",tempCharCode2)
  
    tempPass = tempPass.match(/.{1,2}/g)

    char0 = parseInt(tempPass[9], 8).toString()
    char1 = parseInt(tempPass[8], 8).toString()
    char2 = parseInt(tempPass[7], 8).toString()
    char3 = parseInt(tempPass[6], 8).toString()
    char4 = parseInt(tempPass[5], 8).toString()
    char5 = parseInt(tempPass[4], 8).toString()
    char6 = parseInt(tempPass[3], 8).toString()
    char7 = parseInt(tempPass[2], 8).toString()
    char8 = parseInt(tempPass[1], 8).toString()
    char9 = parseInt(tempPass[0], 8).toString()

    var charPass = char9.concat(char8, char7,char6, char5, char4, char3, char2, char1, char0)

    var multiPass = "2"

    function setPass(pass) {
       for (i = 0; i < pass.length; i++) {
          multiPass += pass.charCodeAt(i)
       }
       var passWord = multiPass
       return passWord
    }

    password = setPass(charPass)

    function checkPass() {
       var un = document.login.username.value
       var pw = document.login.password.value
 
       if ((un == username) && (pw == password)) {
          //window.location.href = 'http://www.google.com';
          alert("Admin access granted!")
          return true;
       } else {
          alert("Login failed. Please try again!")
          return false;
       }
    }
    </script>

    <form name="login" onSubmit="checkPass()" method="POST">
       Username: <input type="text" name="username" id="username">
       <br /><br />
       Password: <input type="password" name="password" id="password">
       <br /><br />
       <input type="submit" value="Submit">
    </form>
    </div>
    <!--loginform-->
  </div>
  <!--loginboxinner-->
</div>
<!--loginbox-->

</body>
</html>
