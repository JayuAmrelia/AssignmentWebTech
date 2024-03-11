<?php

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "my_ass2";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

function createUser($email, $password, $username, $purchase_history, $shipping_address) {
    global $conn;
    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);
    $username = mysqli_real_escape_string($conn, $username);
    $purchase_history = mysqli_real_escape_string($conn, $purchase_history);
    $shipping_address = mysqli_real_escape_string($conn, $shipping_address);

    $sql = "INSERT INTO User (email, password, username, purchase_history, shipping_address) VALUES ('$email', '$password', '$username', '$purchase_history', '$shipping_address')";
    if (mysqli_query($conn, $sql)) {
        return "User created successfully";
    } else {
        return "Error creating user: " . mysqli_error($conn);
    }
}

function getUserById($id) {
    global $conn;
    $id = mysqli_real_escape_string($conn, $id);
    $sql = "SELECT * FROM User WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        return mysqli_fetch_assoc($result);
    } else {
        return "User not found";
    }
}

function updateUser($id, $email, $password, $username, $purchase_history, $shipping_address) {
    global $conn;
    $id = mysqli_real_escape_string($conn, $id);
    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);
    $username = mysqli_real_escape_string($conn, $username);
    $purchase_history = mysqli_real_escape_string($conn, $purchase_history);
    $shipping_address = mysqli_real_escape_string($conn, $shipping_address);

    $sql = "UPDATE User SET email='$email', password='$password', username='$username', purchase_history='$purchase_history', shipping_address='$shipping_address' WHERE id='$id'";
    if (mysqli_query($conn, $sql)) {
        return "User updated successfully";
    } else {
        return "Error updating user: " . mysqli_error($conn);
    }
}

function deleteUser($id) {
    global $conn;
    $id = mysqli_real_escape_string($conn, $id);
    $sql = "DELETE FROM User WHERE id='$id'";
    if (mysqli_query($conn, $sql)) {
        return "User deleted successfully";
    } else {
        return "Error deleting user: " . mysqli_error($conn);
    }
}

?>
