<?php
include 'config.php';

// Query to select all data from user_info table
$query = "SELECT * FROM user_info";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View User Data</title>
    <style>
        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid #333;
            padding: 8px 12px;
            text-align: left;
        }
        th {
            background-color: #555;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #eee;
        }
    </style>
</head>
<body>
    <h2 style="text-align:center;">User Info Table Data</h2>
    <table>
        <thead>
            <tr>
                <?php
                // Fetch and display table headers dynamically
                $fields = mysqli_fetch_fields($result);
                foreach ($fields as $field) {
                    echo "<th>" . htmlspecialchars($field->name) . "</th>";
                }
                ?>
            </tr>
        </thead>
        <tbody>
            <?php
            // Fetch and display table rows
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                foreach ($row as $value) {
                    echo "<td>" . htmlspecialchars($value) . "</td>";
                }
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
