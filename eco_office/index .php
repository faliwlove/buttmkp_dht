<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="js/gauge.js"></script>
    <link href="style/main.css" type="text/css" rel="stylesheet">
    <title>eFarming Corpora Monitoring Rasana Rasyidah</title>
	<link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script>
	$(document).ready(function(){
		setInterval(function() {
			$(".test").load("auto.php");
		}, 1000);
	});
	</script>
</head>
   

<?php 
include ('datacontainer_temp.php');
include ('datacontainer_humi.php');
include ('koneksi.php');
?>

<body>
    <Header>
        <h1>eFarming Corpora Monitoring System<br> Eco Office</h1>
    </Header>
        <div class="container">
			<div class="card">
                <h3>Temperature</h3>
                <canvas id="g-temp" class="gauge"></canvas>
                <div id="value-temp" class="value"></div>
                <span>&#8451;</span>
            </div>
            <div class="card">
                <h3>DHumidity/h3>
                <canvas id="g-humi" class="gauge"></canvas>
                <div id="value-humi" class="value"></div>
                <span>%</span>

            </div>
            <div class="card">
                <h3>Total Dissolve Solid</h3>
                <canvas id="g-tds" class="gauge"></canvas>
                <div id="value-tds" class="value"></div>
                <span>ec/ppm</span>
            </div>
			
			<div class="card">
                <h3>Relative Humidity</h3>
                <canvas id="g-rh" class="gauge"></canvas>
                <div id="value-rh" class="value"></div>
                <span>%</span>
            </div>
			
			<div class="card">
                <h3>Power of Hydrogen</h3>
                <canvas id="g-ph" class="gauge"></canvas>
                <div id="value-ph" class="value"></div>
                <span>pH</span>
            </div>
			
       
		</div>
		<div class="container2">	
			<h1>MONITORING KEBUN LIVE STREAM</h1>

			<iframe width="800" height="600" src="http://192.168.137.158/picture/1/frame/" frameborder="2";></iframe>
		</div>
		<div class="test">

			<p>Nilai temperature = <?php echo $temp;?></p>
			<p>Nilai Humidity = <?php echo $humi;?></p>
			<p>Nilai pH = <?php echo $ph;?></p>
			<p>Nilai Total Dissolved Solid = <?php echo $tds; ?></p>
			<p>Nilai Water temperature = <?php echo $wt; ?></p>

		</div>
</body>
    <script src="js/g.js"></script>
	<script>
		//gauge temp
		var target = document.getElementById('g-temp');
		var gauge = new Donut(target).setOptions(opts);
		gauge.setTextField(document.getElementById('value-temp'));
		gauge.maxValue = 50;
		gauge.setMinValue(0);
		gauge.set(<?php echo $temp;?>);
		gauge.animationSpeed = 1;
		
		//gauge do
		var target = document.getElementById('g-humi');
		var gdo = new Donut(target).setOptions(opts);
		gdo.setTextField(document.getElementById('value-humi'));
		gdo.maxValue = 100;
		gdo.setMinValue(0);
		gdo.set(<?php echo $humi;?>);
		gdo.animationSpeed = 1;
		
		//gauge tds
		var target = document.getElementById('g-tds');
		var gtds = new Donut(target).setOptions(opts);
		gtds.setTextField(document.getElementById('value-tds'));
		gtds.maxValue = 300;
		gtds.setMinValue(0);
		gtds.set(<?php echo $tds;?>);
		gtds.animationSpeed = 1;
		
		//gauge rh
		var target = document.getElementById('g-rh');
		var grh = new Donut(target).setOptions(opts);
		grh.setTextField(document.getElementById('value-rh'));
		grh.maxValue = 100;
		grh.setMinValue(0);
		grh.set(<?php echo $a;?>);
		grh.animationSpeed = 1;
		
		//gauge ph
		var target = document.getElementById('g-ph');
		var gph = new Donut(target).setOptions(opts);
		gph.setTextField(document.getElementById('value-ph'));
		gph.maxValue = 14;
		gph.setMinValue(0);
		gph.set(<?php echo $ph;?>);
		gph.animationSpeed = 1;
		
		console.log(<?php echo $ph;?>)
		
	
	</script>
</html>

<?php
// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		echo "Connected successfully";

		$sql = "INSERT INTO `tabelsensor_eco_office` (`A`) VALUES($a);";
		if ($conn->query($sql) === TRUE) {
		echo "New record created successfully";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}

			$conn->close();
?>