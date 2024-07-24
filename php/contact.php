<?php 
// Debugging: Check if form data is received
var_dump($_POST);

// Check if the submit button is clicked
if (isset($_POST['submit'])) {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    // Connect to the database
    $host = "localhost";
    $user = "root";
    $password = "";
    $dbname = "wad";
    $port = "3306";

    $conn = new mysqli($host, $user, $password, $dbname, $port);
    
    if ($conn->connect_error) {
        die('Connection Failed: ' . $conn->connect_error);
    } else {
        echo "Connected";
        
        // Write query to insert the data into the database
        $sql = "INSERT INTO contacts (name, email, phone, message) VALUES ('$name', '$email', '$phone', '$message')";
        
        // Execute the query
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
        $conn->close();
    }
} else {
    echo "Form not submitted properly";
}




?>
