<!doctype html>
<html>
<?php
$yourname = "Boston";
$number1 = 20;
$number2 = 50;
$total = $number1 + $number2;
$phpArray = array('PHP', 'HTML', 'JavaScript');
?>
	
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<h1 align="center">PHP Basics</h1>
<h2><?php echo($yourname) ?></h2>
<?php echo("<p>Hi everyone " . $number1 . " plus " . $number2 . " equals " . $total . ".</p>");?>
<?php
	
echo "<script type='text/javascript'>";

echo "var jsArray = [";
foreach ($phpArray as $value) {
    echo "'$value',";
}
echo "];";

echo "document.write('JavaScript Array Values: ' + jsArray.join(', '));";

echo "</script>";
	
?>
</body>
</html>