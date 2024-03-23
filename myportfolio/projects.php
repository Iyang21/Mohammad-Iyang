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
    // Process and update project details in the database
    // Assuming form fields are named "title", "description", and "image_url"
    $title = $_POST["title"];
    $description = $_POST["description"];
    $image_url = $_POST["image_url"];

    // Perform SQL query to insert new project into the "projects" table
    $sql = "INSERT INTO projects (title, description, image_url) VALUES ('$title', '$description', '$image_url')";
    if (mysqli_query($conn, $sql)) {
        echo "New project added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Query the database to fetch project details
$sql = "SELECT * FROM projects";
$result = mysqli_query($conn, $sql);

// Check if there are any rows returned
if (mysqli_num_rows($result) > 0) {
    // Output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "<h3>Title: " . $row["title"] . "</h3>";
        echo "<p>Description: " . $row["description"] . "</p>";
        echo "<img src='" . $row["image_url"] . "' alt='" . $row["title"] . "'><br>";
    }
} else {
    echo "0 results";
}

// Close the database connection
mysqli_close($conn);
?>
