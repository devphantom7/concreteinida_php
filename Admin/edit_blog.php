<?php
// Database connection
$servername = "localhost";
$username = "concrete_root";
$password = "0rlvRHdN~y^7"; // Update with your MySQL root password if necessary
$dbname = "concrete_database";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the blog ID from the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the existing blog post data
    $sql = "SELECT * FROM submissions WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $post = $result->fetch_assoc();
    $stmt->close();

    if (!$post) {
        echo "Blog post not found!";
        exit();
    }
} else {
    echo "No ID provided!";
    exit();
}

// Handle form submission for updating the post
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['post-title'];
    $date = $_POST['post-date'];
    $content = $_POST['post-content'];

    // Handle image upload
    if (isset($_FILES['post-image']) && $_FILES['post-image']['error'] === 0) {
        $imagePath = 'uploads/' . basename($_FILES['post-image']['name']);
        
        // Only allow image files
        $allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];
        if (in_array($_FILES['post-image']['type'], $allowedTypes)) {
            move_uploaded_file($_FILES['post-image']['tmp_name'], $imagePath);
        } else {
            echo "<script>alert('Only JPG, JPEG, and PNG files are allowed.');</script>";
            exit();
        }
    } else {
        $imagePath = $post['image_path']; // Use the existing image path if no new image is uploaded
    }

    // Update the database
    $sql = "UPDATE submissions SET title = ?, date = ?, description = ?, image_path = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi", $title, $date, $content, $imagePath, $id);

    if ($stmt->execute()) {
        echo "<script>alert('Blog post updated successfully!'); window.location.href = 'blog.php';</script>";
    } else {
        echo "Error updating record: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Blog Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Concretech India</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item mx-1"><a class="nav-link" href="./index.html">Dashboard</a></li>
                <li class="nav-item mx-1"><a class="nav-link" href="add_blog.php">Add Blog</a></li>
                <li class="nav-item mx-1"><a class="nav-link active" href="blog.php">Show Blog</a></li>
            </ul>
            <button onclick="logout()" class="btn btn-outline-light">Logout</button>
        </div>
    </div>
</nav>

<div class="container my-5">
    <h1 class="text-center mb-4">Edit Blog Post</h1>
    <form action="" method="POST" enctype="multipart/form-data" onsubmit="submitContent();">
        <div class="mb-3">
            <label for="post-title" class="form-label">Title</label>
            <input type="text" class="form-control" id="post-title" name="post-title" value="<?= htmlspecialchars($post['title']); ?>" required>
        </div>

        <div class="mb-3">
            <label for="post-date" class="form-label">Date</label>
            <input type="date" class="form-control" id="post-date" name="post-date" value="<?= htmlspecialchars($post['date']); ?>" required>
        </div>

        <div class="mb-3">
            <label for="post-image" class="form-label">Upload New Image</label>
            <input type="file" class="form-control" id="post-image" name="post-image" accept="image/*">
            <p>Current Image: <img src="<?= htmlspecialchars($post['image_path']); ?>" width="100" alt="Current Image"></p>
        </div>

        <div class="mb-3">
            <label for="post-content" class="form-label">Content</label>
            <div class="editable-div" contenteditable="true" id="post-content" name="post-content" style="border: 1px solid #ccc; padding: 10px;"><?= htmlspecialchars($post['description']); ?></div>
        </div>

        <input type="hidden" name="post-content" id="post-content-hidden">
        <button type="submit" class="btn btn-primary">Update Post</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script>
function submitContent() {
    document.getElementById("post-content-hidden").value = document.getElementById("post-content").innerHTML;
}

// Logout function to clear session and redirect to login page
function logout() {
    sessionStorage.clear();
    window.location.href = "login.html";
}
</script>
</body>
</html>
