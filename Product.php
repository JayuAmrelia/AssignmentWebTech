<?php

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "my_ass2";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function createProduct($description, $image, $pricing, $shipping_cost) {
    global $conn;
    $sql = "INSERT INTO Product (description, image, pricing, shipping_cost) VALUES ('$description', '$image', $pricing, $shipping_cost)";
    if ($conn->query($sql) === TRUE) {
        return "Product created successfully";
    } else {
        return "Error creating product: " . $conn->error;
    }
}

function getAllProducts() {
    global $conn;
    $sql = "SELECT * FROM Product";
    $result = $conn->query($sql);
    $products = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $products[] = $row;
        }
    }
    return $products;
}

function getProductById($id) {
    global $conn;
    $sql = "SELECT * FROM Product WHERE id=$id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return "Product not found";
    }
}

function updateProduct($id, $description, $image, $pricing, $shipping_cost) {
    global $conn;
    $sql = "UPDATE Product SET description='$description', image='$image', pricing=$pricing, shipping_cost=$shipping_cost WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        return "Product updated successfully";
    } else {
        return "Error updating product: " . $conn->error;
    }
}

function deleteProduct($id) {
    global $conn;
    $sql = "DELETE FROM Product WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        return "Product deleted successfully";
    } else {
        return "Error deleting product: " . $conn->error;
    }
}
?>
