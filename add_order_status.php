<?php
include 'config.php';
// Add 'status' column to orders table if it does not exist
$sql = "ALTER TABLE orders ADD COLUMN status VARCHAR(20) NOT NULL DEFAULT 'Pending'";
if(mysqli_query($conn, $sql)) {
    echo "Status column added successfully!";
} else {
    if (strpos(mysqli_error($conn), 'Duplicate column name') !== false) {
        echo "Status column already exists.";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?> 