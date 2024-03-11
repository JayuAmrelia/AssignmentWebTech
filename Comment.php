<?php

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "my_ass2";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function createComment($product_id, $user_id, $rating, $image, $text) {
    global $conn;
    $sql = "INSERT INTO Comment (product_id, user_id, rating, image, text) VALUES ('$product_id', '$user_id', '$rating', '$image', '$text')";
    if ($conn->query($sql) === TRUE) {
        return "Comment created successfully";
    } else {
        return "Error creating comment: " . $conn->error;
    }
}

function getAllComments() {
    global $conn;
    $sql = "SELECT * FROM Comment";
    $result = $conn->query($sql);
    $comments = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $comments[] = $row;
        }
    }
    return $comments;
}

function getCommentById($id) {
    global $conn;
    $sql = "SELECT * FROM Comment WHERE id=$id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return "Comment not found";
    }
}

function updateComment($id, $product_id, $user_id, $rating, $image, $text) {
    global $conn;
    $sql = "UPDATE Comment SET product_id='$product_id', user_id='$user_id', rating='$rating', image='$image', text='$text' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        return "Comment updated successfully";
    } else {
        return "Error updating comment: " . $conn->error;
    }
}

function deleteComment($id) {
    global $conn;
    $sql = "DELETE FROM Comment WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        return "Comment deleted successfully";
    } else {
        return "Error deleting comment: " . $conn->error;
    }
}

?>
