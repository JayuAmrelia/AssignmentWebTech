<?php

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "my_ass2";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function createCart($user_id) {
    global $conn;
    $sql = "INSERT INTO Cart (user_id) VALUES ('$user_id')";
    if ($conn->query($sql) === TRUE) {
        return "Cart created successfully";
    } else {
        return "Error creating cart: " . $conn->error;
    }
}

function getAllCarts() {
    global $conn;
    $sql = "SELECT * FROM Cart";
    $result = $conn->query($sql);
    $carts = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $carts[] = $row;
        }
    }
    return $carts;
}

function getCartById($id) {
    global $conn;
    $sql = "SELECT * FROM Cart WHERE id=$id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return "Cart not found";
    }
}

function updateCart($id, $user_id) {
    global $conn;
    $sql = "UPDATE Cart SET user_id='$user_id' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        return "Cart updated successfully";
    } else {
        return "Error updating cart: " . $conn->error;
    }
}

function deleteCart($id) {
    global $conn;
    $sql = "DELETE FROM Cart WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        return "Cart deleted successfully";
    } else {
        return "Error deleting cart: " . $conn->error;
    }
}
?>
