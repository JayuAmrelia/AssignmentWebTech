<?php

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "my_ass2";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function createOrder($user_id, $total_amount, $products) {
    global $conn;
    $sql = "INSERT INTO `Order` (user_id, total_amount, products) VALUES ('$user_id', '$total_amount', '$products')";
    if ($conn->query($sql) === TRUE) {
        return "Order created successfully";
    } else {
        return "Error creating order: " . $conn->error;
    }
}

function getAllOrders() {
    global $conn;
    $sql = "SELECT * FROM `Order`";
    $result = $conn->query($sql);
    $orders = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $orders[] = $row;
        }
    }
    return $orders;
}

function getOrderById($id) {
    global $conn;
    $sql = "SELECT * FROM `Order` WHERE id=$id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return "Order not found";
    }
}

function updateOrder($id, $user_id, $total_amount, $products) {
    global $conn;
    $sql = "UPDATE `Order` SET user_id='$user_id', total_amount='$total_amount', products='$products' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        return "Order updated successfully";
    } else {
        return "Error updating order: " . $conn->error;
    }
}

function deleteOrder($id) {
    global $conn;
    $sql = "DELETE FROM `Order` WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        return "Order deleted successfully";
    } else {
        return "Error deleting order: " . $conn->error;
    }
}


?>
