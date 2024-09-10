<!doctype html>

<?php
//MODEL - data
//assign variables at top of page
//access a database at top of page

$firstName = "Mary"; //PHP variable - datatype? String

$colors = array("red","Green", "Blue");

//CONTROLLER - business logic/general code



//VIEW - user interface
?>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<body>
	<h1>WDV341 Intro Html</h1>
	<h2>PHP Basics and Examples</h2>
	<?php
		echo "<h3>Hello from PHP</h3>";
	?>

	<h3 class =<?php echo "greetingLine" ?>>Welcome: <?php echo "Mary"; ?> </h3>
	
	<label for="colorRed">Red:</label>
	<input type="radio" name="colorGroup" value="red">
	
	<?php
		echo "<label for='colorBlue'>Blue:</label>";
		echo "<input type='radio' name='colorGroup' value='blue'>";
	?>
	
	<?php
		for($x=0; $x < count($colors); $x++){
			echo $colors[$x];
			echo "<div>";
			echo "<label for='colorBlue'>Blue:</label>";
			echo "<input type='radio' name='colorGroup' value='blue'>";
			echo "</div>";
		}
	echo date("H");
	
	if(date("H") <= 12){
		echo "<h3>Good Morning</h3>";
	}
	else{
		echo "<h3>Good Afternoon</h3>";
	}
	?>
</body>
</html>
