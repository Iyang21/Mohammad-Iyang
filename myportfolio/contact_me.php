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
    // Process and insert contact details into the database
    // Assuming form fields are named "email", "phone_number", "facebook", "twitter", "instagram", and "telegram"
    $email = $_POST["email"];
    $phone_number = $_POST["phone_number"];
    $facebook = $_POST["facebook"];
    $twitter = $_POST["twitter"];
    $instagram = $_POST["instagram"];
    $telegram = $_POST["telegram"];

    // Perform SQL query to insert new contact details into the "contact_me" table
    $sql = "INSERT INTO contact_me (email, phone_number, facebook, twitter, instagram, telegram) 
            VALUES ('$email', '$phone_number', '$facebook', '$twitter', '$instagram', '$telegram')";
    if (mysqli_query($conn, $sql)) {
        echo "Contact details added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Query the database to fetch contact details
$sql = "SELECT * FROM contact_me";
$result = mysqli_query($conn, $sql);

// Check if there are any rows returned
if (mysqli_num_rows($result) > 0) {
    // Output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "<h3>Email: " . $row["email"] . "</h3>";
        echo "<p>Phone Number: " . $row["phone_number"] . "</p>";
        echo "<p>Facebook: " . $row["facebook"] . "</p>";
        echo "<p>Twitter: " . $row["twitter"] . "</p>";
        echo "<p>Instagram: " . $row["instagram"] . "</p>";
        echo "<p>Telegram: " . $row["telegram"] . "</p>";
    }
} else {
    echo "0 results";
}

// Close the database connection
mysqli_close($conn);
?>
