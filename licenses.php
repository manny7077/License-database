<?php

include 'db.php';

// Retrieve the license data from the database
$sql = "SELECT license_type, description, date_expiry, date_activation FROM licenses";
$result = mysqli_query($conn, $sql);

// Output the license data in an HTML table
echo "<table>";
echo "<tr><th>License Type</th><th>Description</th><th>Date of Expiry</th><th>Date of Activation</th></tr>";
while ($row = mysqli_fetch_assoc($result)) {
  echo "<tr><td>".$row['license_type']."</td><td>".$row['description']."</td><td>".$row['date_expiry']."</td><td>".$row['date_activation']."</td></tr>";
}
echo "</table>";

mysqli_close($conn);
?>
