<?php

	$productName = "hammer";
	$productPrice = 8.99;

	function productInfo($inProdName,$inProdPrice){
		
		
		
		
		
		$formattedProduct = $inProdName . ": unit price " . $inProdPrice;
		return $formattedProduct;
	}
	
	"Pliers: unit price: 4.99";
	productInfo("Pliers",4.99);
	






?>
	
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	
	<ol>
		<li><?php echo productInfo("Pliers",4.99); ?></li>
		<li><?php echo productInfo($productName,$productPrice); ?></li>
	</ol>
	
</body>
</html>