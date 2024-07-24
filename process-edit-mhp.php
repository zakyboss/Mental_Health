<?php
session_start();
require_once 'php/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $current_photo = $_POST['current_photo'];
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

    $uploadDir = __DIR__ . '/assets/images/Professionals/';

    // Handle file upload if a new photo is provided
    if (isset($photo) && $photo['error'] == UPLOAD_ERR_OK) {
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $fileName = uniqid() . '_' . basename($photo['name']);
        $uploadPath = $uploadDir . $fileName;

        if (move_uploaded_file($photo['tmp_name'], $uploadPath)) {
            $relativePath = 'assets/images/Professionals/' . $fileName;
        } else {
            echo "Failed to upload file. Error: " . error_get_last()['message'];
            exit();
        }
    } else {
        $relativePath = $current_photo;
    }

    // Update the MHP record in the database
    $sql = "UPDATE mhp SET photo = ?, title = ?, name = ?, contact = ?, license_number = ?, special = ?, yos = ?, location = ? WHERE id = ?";
    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "ssssssssi", $relativePath, $title, $name, $contact, $license_number, $special, $yos, $location, $id);

        if (mysqli_stmt_execute($stmt)) {
            $_SESSION['message'] = "MHP  has been successfully edited";
            header("Location: manage-mhp.php");
            exit();
        } else {
            echo "ERROR: Could not update MHP: $sql. " . mysqli_error($conn);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "ERROR: Could not prepare query: $sql. " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
