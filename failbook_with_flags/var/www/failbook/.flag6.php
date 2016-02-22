<?php

$userAgent = $_SERVER['HTTP_USER_AGENT'];

if ($userAgent == "Failbook v1.0") {
   echo "Flag 6: TmV2ZXIgZm9yZ2V0IHRoZSBVc2VyIEFnZW50IFN0cmluZwo=";
} else {
   echo "You must connect using 'Failbook v1.0'!";
}

?>
