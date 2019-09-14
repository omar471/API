<?php
date_default_timezone_set('America/Los_Angeles');
$apiKey="6a94f5f57e6605098d9eb228192b5a77" ;
$cityname="Dhaka";
/*
//  this   is  coplete  code 
  working code 
http://api.openweathermap.org/data/2.5/weather?
q=Hurzuf&appid=6a94f5f57e6605098d9eb228192b5a77
http://api.openweathermap.org/data/2.5/weather?
id=707860&appid=6a94f5f57e6605098d9eb228192b5a77
 */
$googleApiUrl="http://api.openweathermap.org/data/2.5/weather?q=".$cityname."&appid=".$apiKey;
$curl = curl_init();
curl_setopt($curl, CURLOPT_HEADER, 0) ;
curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);
curl_setopt($curl, CURLOPT_URL, $googleApiUrl);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION,1);
curl_setopt($curl, CURLOPT_VERBOSE,0);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER,false);
 $respone=curl_exec($curl) ;
curl_close($curl);
$data=json_decode($respone) ;
/*
 echo"<pre>" ;
print_r($data) ;
 */
$currentTime=time() ;
?>
<!DOCTYPE html>
<html>
<body>
    <title> fprcast weather</title>
     <h1> This  is wather  forcast</h1>
     <h3>Location: <?php  echo $data->name ;?></h3>
     <h1> hello world</h1>
      	<h3>  time : <?php  echo date("H:i:sa",$currentTime) ;?></h3>
      	<h3>  date : <?php  echo date("d:m:y",$currentTime) ;?></h3>
      	<h3>  max- temperature : <?php  echo $data->main->temp_max ;?>&deg:C</h3>
      	<h3>  min- temperature : <?php  echo $data->main->temp_min ;?>&deg:C</h3>
      	<h3>humanity: <?php  echo $data->main->humidity ;?> %</h3>
      	<h3>wind speed: <?php  echo $data->wind->speed ;?> km/h</h3>
      </body>
</html>
