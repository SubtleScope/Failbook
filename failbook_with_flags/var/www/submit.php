<?php
session_start();
require( "common.php" );

if( !isUserLoggedIn() ) {
	header( "Location: index.php" );
}

$flagArr = array("96efb5017c547982c44db13348456616", "07e4614c70ada41c08fb7760163e3bc0", "3759987ebe90b156c14a410a7e53e19c", "cc4909ec70ed8a5093d729f463904765", "3771fb5158494117bf1ffa8d87100233", "463291fd2ad232baa208b3b82fcda1e3", "3c4375b65574c1835785a2e4207b17d3", "38dbfdf7665cd21ae679324b45e29b12", "6f297de13b3e1a0cf0033f570ea2e02b", "20174bcabde74cb5a02149787a6974a4", "bdd8a402103d46f047a1840a94c0071e", "42c8da7cbc89df3645200e2fd5f68749", "5f6ce084fe61178990d66b4306b00928", "60f20bfb926a49a522f5ca7a6924f017", "b82fc33e52fe531e9b89048800541701");

$flagSubmission = $_POST['flag_id'];

$alertMsg = "";

if (isset($flagSubmission)) {
  $searchValue = "$flagSubmission";
  
  for ($x = 0; $x < count($flagArr); $x++) {
      if (md5("$flagSubmission") == "$flagArr[$x]") {
         $flagNum = $x + 1;
         $alertMsg = "Correct, you solved Flag $flagNum";
         break;
      } else {
         $alertMsg = "Incorrect Flag, Try Again!"; 
      }
  } 
} else {
  $searchValue = "Enter Flag Here"; 
}

?>
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
 <center>
  <br /><br /><br />
  <div id="test_test" class="test_test">
   <form action="submit.php" method="POST" >
     Flag Submission:
     <input type="text" name="flag_id" id="flag_id" value="<?php echo $searchValue; ?>">
     <input type="submit" value="Submit">
   </form> 
  </div>
  <div id="out">
    <br /><br /><br />
    <?php
       if ($searchValue == "Enter Flag Here") {
          echo "";
       } else {
          echo $alertMsg;
       }
    ?>
  </div>
 </center>
</body>
</html>
