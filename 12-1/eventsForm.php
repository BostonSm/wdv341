<?php
require_once 'dbConnect.php';

// Initialize variables
$name = $desc = $presenter = $date = $time = "";
$errors = [];
$success = false;

// Handle POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// Honeypot trap
	if (!empty($_POST['hidden_field'])) {
		die("Bot detected.");
	}

	// Sanitize input
	$name = trim($_POST['event_name']);
	$desc = trim($_POST['event_description']);
	$presenter = trim($_POST['event_presenter']);
	$date = trim($_POST['event_date']);
	$time = trim($_POST['event_time']);

	// Basic validation
	if (empty($name)) $errors[] = "Event Name is required.";
	if (empty($desc)) $errors[] = "Description is required.";
	if (empty($presenter)) $errors[] = "Presenter is required.";
	if (empty($date)) $errors[] = "Date is required.";
	if (empty($time)) $errors[] = "Time is required.";

	if (empty($errors)) {
		$sql = "INSERT INTO wdv341_events 
				(events_name, events_description, events_presenter, events_date, events_time, events_date_inserted, events_date_updated)
				VALUES (:name, :desc, :presenter, :date, :time, CURRENT_DATE(), CURRENT_DATE())";

		try {
			$stmt = $pdo->prepare($sql);
			$stmt->bindParam(':name', $name);
			$stmt->bindParam(':desc', $desc);
			$stmt->bindParam(':presenter', $presenter);
			$stmt->bindParam(':date', $date);
			$stmt->bindParam(':time', $time);
			$stmt->execute();
			$success = true;
		} catch (PDOException $e) {
			$errors[] = "Database error: " . $e->getMessage();
		}
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Submit Event</title>
	<style>
		body { font-family: Arial; background: #f4f4f4; padding: 20px; }
		form { background: #fff; padding: 20px; border-radius: 10px; max-width: 450px; margin: auto; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
		label { display: block; margin-top: 10px; }
		input, textarea { width: 100%; padding: 8px; margin-top: 4px; }
		.error { color: red; }
		.success { color: green; font-weight: bold; }
	</style>
</head>
<body>

<h2>Event Submission</h2>

<?php if ($success): ?>
	<p class="success">✅ Your event was successfully submitted.</p>
<?php else: ?>
	<?php
	if (!empty($errors)) {
		echo '<div class="error"><ul>';
		foreach ($errors as $err) {
			echo "<li>$err</li>";
		}
		echo '</ul></div>';
	}
	?>

	<form method="post" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
		<!-- Honeypot field -->
		<input type="text" name="hidden_field" style="display:none" autocomplete="off">

		<label for="event_name">Event Name:</label>
		<input type="text" id="event_name" name="event_name" value="<?= htmlspecialchars($name) ?>">

		<label for="event_description">Description:</label>
		<textarea id="event_description" name="event_description"><?= htmlspecialchars($desc) ?></textarea>

		<label for="event_presenter">Presenter:</label>
		<input type="text" id="event_presenter" name="event_presenter" value="<?= htmlspecialchars($presenter) ?>">

		<label for="event_date">Date:</label>
		<input type="date" id="event_date" name="event_date" value="<?= htmlspecialchars($date) ?>">

		<label for="event_time">Time:</label>
		<input type="time" id="event_time" name="event_time" value="<?= htmlspecialchars($time) ?>">

		<button type="submit">Submit Event</button>
	</form>
<?php endif; ?>

</body>
</html>