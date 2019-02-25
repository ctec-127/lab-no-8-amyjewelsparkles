<!DOCTYPE html>
<html lang="en">
<head>
	<title>Temperature Converter</title>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
	<div class="container">
		<?php 
		require "inc/function.inc.php";
		// nav bar
		require "inc/header.inc.php";

		#CHECK TO SEE IF FORM WAS SUBMITTED
		if($_SERVER['REQUEST_METHOD'] == "POST"){
			$originalTemperature = $_POST['originaltemp'];
			$originalUnit= $_POST['originalunit'];
			$conversionUnit = $_POST['conversionunit'];
			$convertedTemp = convertTemp($originalTemperature,$originalUnit,$conversionUnit);
		} // end if

		if (isset($_POST['originalunit'])){
			$originalUnit = $_POST['originalunit'];
		} else {
			// looks like the form wasn't being posted
			$originalUnit = "";
		} // end if

		if (isset($_POST['conversionunit'])){
			$conversionUnit = $_POST['conversionunit'];
		} else {
			// looks like the form wasn't being posted
			$conversionUnit = "";
		} // end if
		?>

		<div id="wrapper">

		<!-- jumbotron -->
			<div class="jumbotron jumbotron-fluid p-4 mb-4">
				<h1 class="display-5 text-center text-white bg-info p-3"><img src="img/temp2.png" alt="thermometer"> Temperature Converter</h1>
				<div class="container p-2">
					<div class="row">
						<div class="col">
							<p class="lead">This is a basic temperature converter. To get started, please enter the termperatrue, original unit, the desired unit to be converted into, and click on convert.</p>
						</div>
						<div class="col">
						<!-- Temperature converter form -->	
						<div class="container-fluid">
							<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
								<div class="section">
									<label for="temp">Temperature</label>
									<div class="form-row">
										<div class="col">
											<input class="form-control mb-4" type="text" value="<?php if (isset($_POST['originaltemp'])) echo $_POST['originaltemp'];?>" name="originaltemp" size="7" maxlength="7" id="temp">
										</div>
										<div class="col">
											<select class="custom-select mr-sm-2" name="originalunit">
												<option value="--Select--"<?php if($originalUnit == "--Select--") echo ' selected="selected"';?>>--Select--</option>
												<option value="celsius"<?php if($originalUnit == "celsius") echo ' selected="selected"';?>>Celsius</option>
												<option value="farenheit"<?php if($originalUnit == "farenheit") echo ' selected="selected"';?>>Farenheit</option>
												<option value="kelvin"<?php if($originalUnit == "kelvin") echo ' selected="selected"';?>>Kelvin</option>
											</select>
										</div>
									</div>
									
								</div>
								<div class="section">
									<label for="convertedtemp">Converted Temperature</label>
									<div class="form-row">
										<div class="col">
											<input class="form-control" type="text" value="<?php if (isset($_POST['originaltemp'])) echo round($convertedTemp, 1);?>" 
											name="convertedtemp" size="7" maxlength="7" id="convertedtemp">
										</div>
										<div class="col">
											<select class="custom-select mr-sm-2 mb-4" name="conversionunit">
												<option value="--Select--"<?php if($conversionUnit == "--Select--") echo ' selected="selected"';?>>--Select--</option>
												<option value="celsius"<?php if($conversionUnit == "celsius") echo ' selected="selected"';?>>Celsius</option>
												<option value="farenheit"<?php if($conversionUnit == "farenheit") echo ' selected="selected"';?>>Farenheit</option>
												<option value="kelvin"<?php if($conversionUnit == "kelvin") echo ' selected="selected"';?>>Kelvin</option>
											</select>
										</div>
									</div>
								</div>
								<input class="btn btn-info" type="submit" value="Convert"/>   
							</form>
						</div>
					</div>
				</div>
			</div><!-- jumbotron -->
		</div><!-- end wrapper div-->
	</div> <!--container -->

	<div class="container my-4 pt-2">
		<div class="row">
			<div class="col-6">
				<div class="card">
					<div class="card-header bg-dark text-white">
						<h4>Formulas</h4>
					</div>
					<div class="card-body bg-light">
						<h5 class="card-title text-info">Coversion from Celsius (C) to:</h5>
						<p class="card-text">Fahrenheit (F) = (C * 9/5) + 32<br>Kelvin (K) = C + 273.15.</p>
						<h5 class="card-title text-info">Coversion from Fahrenheit (F) to:</h5>
						<p class="card-text">Celsius (C) = (F - 32) * 5/9<br>Kelvin (K) = (F - 32) * 5/9 + 273.15</p>
						<h5 class="card-title text-info">Coversion from Kelvin (K) to:</h5>
						<p class="card-text">Fahenheit (F) = (K - 273.15) * 9/5 + 32<br>Celsius (C) = K - 273.15</p>
					</div>
				</div>
			</div>
			<div class="col-6">
				<div class="card">
					<div class="card-header bg-dark text-white">
						<h4>Interesting Facts</h4>
					</div>
					<div class="card-body bg-light pb-5">
						<h5 class="card-title text-info">Temperature of Substance</h5>
						<p class="card-text">The temperature of a substance is a result of the speed at which its molecules are moving. The faster the molecules are moving, the higher the temperature of the substance.</p>
						<h5 class="card-title text-info">Absolute Zero</h5>
						<p class="card-text">Absolute zero is a theoretical temperature. It is that temperature at which all substances have no heat energy. It is defined as zero Kelvin (0 Kelvin). 0 Kelvin is equivalent to -273.16 degrees Celsius, and -459.69 degrees Fahrenheit .</p>
					</div>
				</div>
			</div>
		</div><!-- row -->
	</div>

<!-- jQuery -->
<script src="js/jquery-3.3.1.min.js"></script>
<!-- Bootstrap JavaScript -->
<script src="js/bootstrap.min.js"></script>

</body>
</html>