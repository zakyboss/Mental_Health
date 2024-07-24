<?php 
session_start();  // Start the session

require_once 'php/db.php';

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $sql = "DELETE FROM mhp WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['message'] = "MHP deleted successfully";  // Set the session message
        header("Location: manage-mhp.php");
        exit();
    } else {
        $_SESSION['message'] = "Error deleting record: " . $conn->error;
        header("Location: manage-mhp.php");
        exit();
    }
}
?>
