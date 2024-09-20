<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Function Examples</title>
</head>
<body>
	<h1>PHP Function Examples</h1>

	<?php
	// 1. Function to format date into mm/dd/yyyy
	function formatDateMMDDYYYY($timestamp) {
		return date('m/d/Y', $timestamp);
	}

	// 2. Function to format date into dd/mm/yyyy (International)
	function formatDateDDMMYYYY($timestamp) {
		return date('d/m/Y', $timestamp);
	}

		// 3. Function to handle the diffrent string operations
	function stringOperations($inputString) {
		$trimmedString = trim($inputString);
		$lowerString = strtolower($trimmedString);
		$containsDMACC = strpos($lowerString, 'dmacc') !== false ? 'Yes' : 'No';

		echo "<p>Original String: $inputString</p>";
		echo "<p>Number of characters: " . strlen($inputString) . "</p>";
		echo "<p>Trimmed String: '$trimmedString'</p>";
		echo "<p>Lowercase String: '$lowerString'</p>";
		echo "<p>Contains " . '"DMACC"' . ": $containsDMACC</p>";
	}

	// 4. Function to format a number into a phone number
	function formatPhoneNumber($number) {
		$formatted = substr($number, 0, 3) . '-' . substr($number, 3, 3) . '-' . substr($number, 6);
		echo "<p>Formatted Phone Number: $formatted</p>";
	}

	// 5. Function to format numbers into us currency
	function formatCurrency($number) {
		$formattedCurrency = '$' . number_format($number, 2);
		echo "<p>Formatted Currency: $formattedCurrency</p>";
	}

	$timestamp = time();

	echo "<h2>Formatted Dates</h2>";
	echo "<p>MM/DD/YYYY: " . formatDateMMDDYYYY($timestamp) . "</p>";
	echo "<p>DD/MM/YYYY (International): " . formatDateDDMMYYYY($timestamp) . "</p>";

	echo "<h2>String Operations</h2>";
	$testString = "   Welcome to DMACC   ";
	stringOperations($testString);

	echo "<h2>Phone Number Format</h2>";
	$testPhoneNumber = "1234567890";
	formatPhoneNumber($testPhoneNumber);

	echo "<h2>US Currency Format</h2>";
	$testCurrency = 123456;
	formatCurrency($testCurrency);

	?>
</body>
</html>