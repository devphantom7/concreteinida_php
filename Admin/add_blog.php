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

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['post-title'];
    $date = $_POST['post-date'];
    $content = $_POST['post-content'];

    // Image upload
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
        $imagePath = ''; // default if no image uploaded
    }

    // Insert into database
    $sql = "INSERT INTO submissions (title, date, description, image_path) VALUES ('$title', '$date', '$content', '$imagePath')";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Blog post saved successfully!');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Blog Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
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
                <li class="nav-item mx-1">
                    <a class="nav-link" aria-current="page" href="./index.html">Dashboard</a>
                </li>
                <li class="nav-item mx-1">
                    <a class="nav-link active" aria-current="page" href="add_blog.html" style="font-weight: 700;">Add Blog</a>
                </li>
                <li class="nav-item mx-1">
                    <a class="nav-link " aria-current="page" href="blog.php">Show Blog</a>
                </li>
            </ul>
            <button onclick="logout()" class="btn btn-outline-light">Logout</button>
        </div>
    </div>
</nav>

<div class="container my-5">
    <h1 class="text-center mb-4">Create Blog Post</h1>

    <!-- Blog Post Form -->
    <form action="add_blog.php" method="POST" enctype="multipart/form-data" onsubmit="submitContent();">
        <!-- Title Input -->
        <div class="mb-3">
            <label for="post-title" class="form-label">Title</label>
            <input type="text" class="form-control" id="post-title" name="post-title" placeholder="Enter blog title" required>
        </div>

        <!-- Date Input -->
        <div class="mb-3">
            <label for="post-date" class="form-label">Date</label>
            <input type="date" class="form-control" id="post-date" name="post-date" value="<?= date('Y-m-d') ?>" required>
        </div>

        <!-- Image Upload -->
        <div class="mb-3">
            <label for="post-image" class="form-label">Upload Image</label>
            <input type="file" class="form-control" id="post-image" name="post-image" accept="image/*">
        </div>

        <!-- Content (editable div) -->
        <div class="mb-3">
            <label for="post-content" class="form-label">Content</label>
            <div class="editable-div" contenteditable="true" id="post-content" name="post-content" style="border: 1px solid #ccc; padding: 10px;"></div>
        </div>

        <!-- Hidden field to store the content -->
        <input type="hidden" name="post-content" id="post-content-hidden">

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Save Post</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<script>
// This function will copy the content of the editable div to the hidden field before submitting the form
function submitContent() {
    var content = document.getElementById("post-content").innerHTML;  // Get the HTML content of the editable div
    document.getElementById("post-content-hidden").value = content;   // Set it to the hidden input
}




    // Check if the user is logged in
    if (sessionStorage.getItem("isLoggedIn") === "true") {
        const username = sessionStorage.getItem("username");
        document.getElementById("welcomeMessage").innerHTML = `<h2 class="text-success">Welcome, ${username}!</h2>`;
    } else {
        window.location.href = "login.html"; // Redirect to login if not logged in
    }

    // Logout function to clear session and redirect to login page
    function logout() {
        sessionStorage.clear();
        window.location.href = "login.html";
    }

</script>

</body>
</html>
