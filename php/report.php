<?php
require_once 'db.php';

// Check if the form is submitted and all keys are set
if (isset($_POST['q1'], $_POST['q2'], $_POST['q3'], $_POST['q4'], $_POST['q5'], $_POST['q6'], $_POST['q7'], $_POST['q8'])) {
    // Fetch data from POST request
    $q1 = $_POST['q1'];
    $q2 = $_POST['q2'];
    $q3 = $_POST['q3'];
    $q4 = $_POST['q4'];
    $q5 = $_POST['q5'];
    $q6 = $_POST['q6'];
    $q7 = $_POST['q7'];
    $q8 = $_POST['q8'];

    // Calculate the score
    $score = $q1 + $q2 + $q3 + $q4 + $q5 + $q6 + $q7 + $q8;

    // Determine the depression severity
    $status_string = 'Not Depressed';
    if ($score <= 4) {
        $status_string = 'Minimal depression';
    } elseif ($score <= 9) {
        $status_string = 'Mild depression';
    } elseif ($score <= 14) {
        $status_string = 'Moderate depression';
    } elseif ($score <= 19) {
        $status_string = 'Moderately severe depression';
    } elseif ($score <= 24) {
        $status_string = 'Severe depression';
    }

    // Determine if the user is considered depressed
    $status = $score >= 10 ? 1 : 0;

    // Write query to insert into table
    $sql = "INSERT INTO report (`q1`, `q2`, `q3`, `q4`, `q5`, `q6`, `q7`, `q8`, `score`, `status`) 
            VALUES ('$q1', '$q2', '$q3', '$q4', '$q5', '$q6', '$q7', '$q8', '$score', '$status')";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "<p>Your Depression score is : $score </p>";
        echo "<p>Your Depression status is : $status_string </p>";
        echo "<a href='report.html'>Take another test? </a>";
    } else {
        echo "Something went wrong: " . $conn->error;
        echo "<a href='contact.html'>Contact us </a>";
    }

    // Close the connection
    $conn->close();
} else {
    echo "Form data is missing. Please fill out all the fields.";
    echo "<a href='report.html'>Go back to the form</a>";
}
?>
