<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$database = "portfolio";

$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process and update "about me" details in the database
    // Assuming form fields are named "full_name", "bio", "skills", and "education"
    $full_name = $_POST["full_name"];
    $bio = $_POST["bio"];
    $skills = $_POST["skills"];
    $education = $_POST["education"];

    // Perform SQL query to update the "about_me" table
    $sql = "UPDATE about_me SET full_name='$full_name', bio='$bio', skills='$skills', education='$education' WHERE id=1"; // Assuming id=1 is the row for "about me" details
    if (mysqli_query($conn, $sql)) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}

// Query the database to fetch "about me" details
$sql = "SELECT * FROM about_me";
$result = mysqli_query($conn, $sql);

// Check if there are any rows returned
if (mysqli_num_rows($result) > 0) {
    // Output data of the first row (assuming only one row for "about me" details)
    $row = mysqli_fetch_assoc($result);
    echo "<h3>Full Name: " . $row["full_name"] . "</h3>";
    echo "<p>Bio: " . $row["bio"] . "</p>";
    echo "<h4>Skills:</h4>";
    echo "<p>" . $row["skills"] . "</p>";
    echo "<h4>Education:</h4>";
    echo "<p>" . $row["education"] . "</p>";
} else {
    echo "0 results";
}

// Close the database connection
mysqli_close($conn);
?>
