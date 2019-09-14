<?php

// this  is   complete code

	//$api_url  = "http://cricapi.com/api/matches?apikey=<apikey>"
  $api_url="http://cricapi.com/api/matches?apikey=A67K718aIyW53px2Q4Dn53Vp5er2" ;

//  $api_url  = "http://cricapi.com/api/fantasySummary?apikey=<apikey>&unique_id=<unique_id>"

         //   api A67K718aIyW53px2Q4Dn53Vp5er2






   //$api_url  = "http://cricapi.com/api/fantasySummary?apikey=A67K718aIyW53px2Q4Dn53Vp5er2&unique_id=1188629";

//  Initiate curl
$ch = curl_init();
// Disable SSL verification
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
// Will return the response, if false it print the response
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// Set the url
curl_setopt($ch, CURLOPT_URL,$api_url);
// Execute
$result=curl_exec($ch);
// Closing
curl_close($ch);

// Will dump a json - you can save in variable and use the json
$cricketMatches=json_decode($result);
  echo"<pre>" ;

 //print_r($cricketMatches) ;

?>
<!DOCTYPE html>
<html>
<body>
    <title>  cricket api</title>
     <h1> this  is  cricket api  </h1>
  
     <h3>Location: <?php   echo $cricketMatches->matches[0]->type   ;?></h3>
     <h3>Location: <?php   echo $cricketMatches->matches[1]->type   ;?></h3>
      <h3>Location: <?php   echo $cricketMatches->matches[2]->type   ;?></h3>
   

     
      </body>
</html>