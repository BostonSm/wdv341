<?php
// Include database connection
require_once 'dbConnect.php';

// Hard-coded event ID for testing
$eventID = 1;

try {
    // Prepare the SQL SELECT statement using a WHERE clause
    $sql = "SELECT events_id, events_name, events_presenter, events_date FROM wdv341_events WHERE events_id = :eventID";
    $stmt = $pdo->prepare($sql); // Use $pdo instead of $conn

    // Bind the parameter
    $stmt->bindParam(':eventID', $eventID, PDO::PARAM_INT);

    // Execute the query
    $stmt->execute();

    // Check if any records were returned
    if ($stmt->rowCount() > 0) {
        // Start HTML output
        echo "<h2>Event Details</h2>";
        echo "<table border='1' cellpadding='10'>";
        echo "<tr><th>ID</th><th>Name</th><th>Presenter</th><th>Date</th></tr>";

        // Fetch and display the event
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['events_id']) . "</td>";
            echo "<td>" . htmlspecialchars($row['events_name']) . "</td>";
            echo "<td>" . htmlspecialchars($row['events_presenter']) . "</td>";
            echo "<td>" . htmlspecialchars($row['events_date']) . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "<p>No event found with ID $eventID.</p>";
    }
} catch (PDOException $e) {
    echo "<p>Error retrieving event: " . $e->getMessage() . "</p>";
}
?>
