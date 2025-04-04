<?php
require 'dbconnect.php'; // Include the database connection file

try {
    // Prepare the SQL SELECT query
    $sql = "SELECT events_name, events_description, events_presenter, events_date, events_time FROM wdv341_events";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    // Fetch all results
    $events = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error retrieving events: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Listings</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 0;
            background-color: #f4f4f4;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #333;
            color: white;
        }
        .no-events {
            text-align: center;
            font-size: 18px;
            color: red;
        }
    </style>
</head>
<body>

<h2>Event Listings</h2>

<?php if (!empty($events)): ?>
    <table>
        <tr>
            <th>Event Name</th>
            <th>Description</th>
            <th>Presenter</th>
            <th>Date</th>
            <th>Time</th>
        </tr>
        <?php foreach ($events as $event): ?>
            <tr>
                <td><?= htmlspecialchars($event['events_name']) ?></td>
                <td><?= htmlspecialchars($event['events_description']) ?></td>
                <td><?= htmlspecialchars($event['events_presenter']) ?></td>
                <td><?= (new DateTime($event['events_date']))->format('F j, Y') ?></td> <!-- Formatted date -->
                <td><?= htmlspecialchars($event['events_time']) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php else: ?>
    <p class="no-events">No events found.</p>
<?php endif; ?>

</body>
</html>