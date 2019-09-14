<html>
<script src="javascript/city.js"></script>
<script>
    function showHint(str) {
        if (str.length == 0) {
            document.getElementById("txtHint").innerHTML = "";
            return;
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("txtHint").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "cityname.php?q=" + str, true);
            xmlhttp.send();
        }
    }
</script>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">
    <title>weather api</title>
    <!--Template based on URL below-->
    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/starter-template/">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Place your stylesheet here-->
    <link href="/css/stylesheet.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class=" ">
            <h1> This is weather App</h1>
            <p>Enter your city name</p>
            <form action="u2.php" method="post">
                <input type="text" name="textfield" placeholder="TextField"  onkeyup="showHint(this.value)">
                <input type="submit" value="Submit">
            </form>
            <p>Suggestions: <span id="txtHint"></span></p>
        </div>
        <h5>
<?php
$a=$_POST["textfield"] ;
date_default_timezone_set('America/Los_Angeles');
$apiKey="6a94f5f57e6605098d9eb228192b5a77" ;
$cityname=$a;
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
$currentTime=time() ;
            echo"city : ";
            echo $a ;
            echo"<br>";
            echo"time : ";
            echo date("H:i:sa",$currentTime) ;
            echo"<br>";
             echo"date : ";
            echo date("d:m:y",$currentTime) ;
            echo"<br>";
             echo"maximum-temperature : ";
            echo $data->main->temp_max ;
            echo"<br>";
            echo"minimum-temperature : ";
           
            echo $data->main->temp_min ;
            echo"<br>";
            echo"humanity : ";
            echo $data->main->humidity ;
            echo"<br>";
            echo"wind- speed : ";
            echo $data->wind->speed ;
            ?><br> </h5>
    </div>
</body>
</html>