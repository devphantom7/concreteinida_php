<?php
// Database connection
$servername = "localhost";
$username = "concrete_root";
$password = "0rlvRHdN~y^7"; // Update with your MySQL root password if necessary
$dbname = "concrete_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get post ID from URL (e.g., showBlog.php?id=1)
if (isset($_GET['id'])) {
    $postId = $_GET['id'];

    // Query to get post details
    $sql = "SELECT * FROM submissions WHERE id = '$postId'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Fetch the post details
        $post = $result->fetch_assoc();
    } else {
        echo "Post not found.";
        exit();
    }
} else {
    echo "Invalid request.";
    exit();
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Post Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Concretech India</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item mx-1">
                    <a class="nav-link" href="index.html">Dashboard</a>
                </li>
                <li class="nav-item mx-1">
                    <a class="nav-link" href="add_blog.html">Add Blog</a>
                </li>
                <li class="nav-item mx-1">
                    <a class="nav-link active" href="blog.php" style="font-weight: 700;">Show Blog</a>
                </li>
            </ul>
            <button onclick="logout()" class="btn btn-outline-light">Logout</button>
        </div>
    </div>
</nav>

<div class="container mt-5">
    <h2 class="text-center mb-4"><?php echo $post['title']; ?></h2>
    <p class="text-muted">Published on: <?php echo $post['date']; ?></p>

    <!-- Post Image -->
    <?php if ($post['image_path'] != ''): ?>
        <img src="<?php echo $post['image_path']; ?>" class="img-fluid mb-4" alt="Post Image" />
    <?php endif; ?>

    <!-- Post Content -->
    <div>
        <?php echo $post['description']; ?> <!-- You can change this to content if you're storing full content in the description -->
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
