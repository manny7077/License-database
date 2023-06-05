<?php

include 'db.php';

// Get the current date
$current_date = date('Y-m-d');

// Fetch license data from database where the date_expiry is less than the current date
$sql = "SELECT * FROM licenses WHERE date_expiry < '$current_date'";
$result = mysqli_query($conn, $sql);

// Loop through license data and output table rows
while ($row = mysqli_fetch_assoc($result)) {
  echo "<tr>";
  echo "<td>" . $row['license_type'] . "</td>";
  echo "<td>" . $row['description'] . "</td>";
  echo "<td>" . $row['date_activation'] . "</td>";
  echo "<td>" . $row['date_expiry'] . "</td>";
  echo "</tr>";
}



// Close database connection
mysqli_close($conn);

?>
