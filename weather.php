<?php
	$location = "";

	if(array_key_exists('search', $_GET)){
		$url="http://api.openweathermap.org/data/2.5/weather?q=".$_GET['search']."&appid=";
		$cont = file_get_contents($url);

		$addressArray = json_decode($cont,true);

		echo "<br><br>";

		$location =  "The latitude ".$addressArray["coord"]["lat"]."<br> The longitutde is ".$addressArray["coord"]["lon"];

		$temperature =  "<br>The temperature is ".($addressArray["main"]["temp"] - 273)." &degC";
		// echo $addressArray['results'][0]['formatted_address'];		
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Weather Forecast</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0,shrink-to-fit=yes">
	<link rel="stylesheet" href="bootstrap.css">
	<style type = "text/css">
		body{
			background: url("mount.jpg")  no-repeat fixed;
			-webkit-background-size: cover;
		    -moz-background-size: cover;
		    -o-background-size: cover;
		    background-size: cover;
		}
		h1{
			margin-top: 50px;
			text-align: center;
		}
		input{
			margin: auto;

		}
		#search{
			margin-top : 40px;
			width:50%;
			font-size: 24px;
			font-family: Verdana;

		}
		#submit{
			margin-left : 70%;
			font-size: 24px;
		}
		#result{
			width : 30%;
			margin : 20px auto;
			/*background-color: rgb(237,245,90);*/
			background-color: hsla(174, 100%, 87%, 0.63);
			color: hsla(117, 56%, 42%, 1);
			font-size: 1.3em;
		}
	</style>
</head>
<body>
	<h1>What's  the weather ?</h1>
		<form method= "get" >
			<input type="text" name="search"  class = "form-control" placeholder="Enter name of the city..." id="search"><br>
			<input type="submit" id = "submit" value = "Search" class="btn btn-info">
		</form>

		<div id = "result">
			<?php
				if($location){
					echo $location;
					echo $temperature;	
				}
				
			?>

		</div>
	

		<!-- <div>
			this is abhishek rathore .
			lkpofkdpofjjjjjjjjjfdddddddddddddddddddnnnnnnnnnnnnnnnnnnnnnnnnnnnnnncccccccccccccccccccccccccccyyyyyyyyyy
		</div> -->

		<!-- <script type = "text/javascript">
			var el = document.getElementById('result');
			el.innerHTML = "err";
		
			var obj = JSON.parse($cont);
			var address= obj.results[0].formatted_addres;
			  
		</script> -->

		
</body>
</html>
