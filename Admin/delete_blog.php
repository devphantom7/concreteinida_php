<?php
// Database connection
$servername = "localhost";
$username = "concrete_root";
$password = "0rlvRHdN~y^7"; // Update with your MySQL root password if necessary
$dbname = "concrete_database";

// Connect to the database
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if an ID is provided
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete the blog entry
    $sql = "DELETE FROM submissions WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "message" => "Blog deleted successfully."]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error deleting blog: " . $stmt->error]);
    }
    $stmt->close();
} else {
    echo json_encode(["status" => "error", "message" => "ID is missing."]);
}

$conn->close();
?>
