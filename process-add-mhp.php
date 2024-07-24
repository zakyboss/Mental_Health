<?php
session_start();
require_once 'php/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $photo = $_FILES['photo'];
    $title = $_POST['title'];
    $name = $_POST['name'];
    $contact = $_POST['email'];
    $license_number = $_POST['license'];
    $special = $_POST['specialization'];
    $yos = $_POST['yos'];
    $county = $_POST['county'];
    $town = $_POST['town'];
    $building = $_POST['building'];
    $location = $county . ', ' . $town . ', ' . $building;

    // Handle file upload
    $uploadDir = __DIR__ . '/assets/images/Professionals/';
    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    if (isset($photo) && $photo['error'] == UPLOAD_ERR_OK) {
        $fileName = uniqid() . '_' . basename($photo['name']);
        $uploadPath = $uploadDir . $fileName;

        if (move_uploaded_file($photo['tmp_name'], $uploadPath)) {
            $relativePath = 'assets/images/Professionals/' . $fileName;
            $sql = "INSERT INTO mhp (photo, title, name, contact, license_number, special, yos, location) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

            if ($stmt = mysqli_prepare($conn, $sql)) {
                mysqli_stmt_bind_param($stmt, "ssssssss", $relativePath, $title, $name, $contact, $license_number, $special, $yos, $location);

                if (mysqli_stmt_execute($stmt)) {
                    $_SESSION['message'] = "Mental Health Professional has been successfully added.";
                    header("Location: manage-mhp.php");
                    exit();
                } else {
                    echo "ERROR: Could not add MHP: $sql. " . mysqli_error($conn);
                }

                mysqli_stmt_close($stmt);
            } else {
                echo "ERROR: Could not prepare query: $sql. " . mysqli_error($conn);
            }
        } else {
            echo "Failed to upload file. Error: " . error_get_last()['message'];
        }
    } else {
        echo "Failed to upload file. Error: " . $photo['error'];
    }

    mysqli_close($conn);
}
?>
