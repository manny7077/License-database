<?php
include 'db.php';

$search = isset($_GET['search']) ? $_GET['search'] : '';
$query = "SELECT * FROM licenses WHERE license_type LIKE '%$search%' OR description LIKE '%$search%' OR date_expiry LIKE '%$search%' ORDER BY date_expiry ASC";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['license_type'] . "</td>";
    echo "<td>" . $row['description'] . "</td>";
    echo "<td>" . $row['date_activation'] . "</td>";
    echo "<td>" . $row['date_expiry'] . "</td>";
    echo "</tr>";
  }
} else {
  echo "<tr><td colspan='4'>No licenses found.</td></tr>";
}

mysqli_close($conn);
?>
