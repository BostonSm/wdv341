<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>WDV101 Basic Form Handler Example</title>
</head>

<body>
<h1>WDV101 Intro HTML and CSS</h1>
<h2>UNIT 3 Forms - Lesson 2 Server Side Processes</h2>
<p>This page will demonstrate how a server side application will take the data that was entered on a form and display it within an HTML table. This example will work for any form. It is setup to read any or all fields on a form without needing any changes.  Other applications are more specific to the form they process and require updates anytime the form is changed.</p>

<h3>Instructions</h3>
<ol>
  <li>Place the file name 'demonstrateFormHandler.php' in the action attribute of your form. This is using the default pathname and will look for this file in the same location as the form.html page. You may place server side processes in their own folder on the server.  It is common to use a folder called 'files' which contains server side processes. In that case you would include the pathname in your action attribute. Example: action='files/demonstrateFormHandler.php' </li>
  <li>Move your form.html page AND this page to your host server.</li>
  <li>Use your browser to locate and run the form.html page on your host server. </li>
  <li>Complete the form and click Submit.</li>
</ol>
<p>The table below displays the 'name=value' pairs that were entered on the form and processed on the server.  This page is a result of that server side process.</p>
<p>The <strong>Field Name</strong> column contains the value of the name attribute for each field on the form. <em>Example: &lt;input name=&quot;first_name&quot;&gt;</em>  This displays what you coded into the HTML. NOTE: If you do not have a name attribute for a field OR if the name attribute does not have a value the form will NOT send the data to the server.</p>
<p>The <strong>Value of Field</strong> column contains the value of each field that was sent to the server by the form. This will vary depending upon the HTML form element and how the value attribute was used for a field.</p>
<h3>Form Name-Value Pairs</h3>
	
<div class="container">
	<?php
		$firstName = $_POST['first_name'];
		$academicStanding = $_POST['academic_standing'];
		$selectedMajor = $_POST['major'];
		$emailAddress = $_POST['email'];
		$comments = $_POST['comments'];
		$contactInfo = isset($_POST['contact_info']) ? $_POST['contact_info'] : '';
		$advisorContact = isset($_POST['advisor_contact']) ? $_POST['advisor_contact'] : '';

		echo "<p>Dear $firstName,</p>";
		echo "<p>Thank you for your interest in DMACC.</p>";
		echo "<p>We have you listed as a $academicStanding starting this fall.</p>";
		echo "<p>You have declared $selectedMajor as your major.</p>";
		echo "<p>Based on your responses, we will provide the following information in our confirmation email to you at $emailAddress.</p>";

		if ($contactInfo) echo "<p>- $contactInfo</p>";
		if ($advisorContact) echo "<p>- $advisorContact</p>";
		if (empty($comments)) {
			echo "The comment was left blank";
		} else {
			echo "<p>You have shared the following comments, which we will review:</p>";
			echo "<p>$comments</p>";
		}
	?>
</div>

</body>
</html>
