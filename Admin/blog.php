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

// Fetch blog posts from the database
$sql = "SELECT * FROM submissions ORDER BY date DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Concretech India: Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="../       njhuy76">Concretech India</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item mx-1">
                    <a class="nav-link" href="./index.html">Dashboard</a>
                </li>
                <li class="nav-item mx-1">
                    <a class="nav-link" href="add_blog.php">Add Blog</a>
                </li>
                <li class="nav-item mx-1">
                    <a class="nav-link active" href="blog.php" style="font-weight: 700">Show Blog</a>
                </li>
            </ul>
            <button onclick="logout()" class="btn btn-outline-light">Logout</button>
        </div>
    </div>
</nav>

<div class="container mt-5">
    <h2 class="text-center mb-4">Our Blogs</h2>
    
    <div class="row">
        <?php if ($result->num_rows > 0) { 
            while($row = $result->fetch_assoc()) { ?>
                <div class="col-md-4 my-4">
                    <div class="card blog-card">
                        <a href="showBlog.php?id=<?php echo $row['id']; ?>" >
                            <img src="<?php echo $row['image_path']; ?>" class="card-img-top" alt="Blog Image">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['title']; ?></h5>
                            <a href="showBlog.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Read More</a>
                            <hr>
                            <div class="container row d-flex justify-content-center">
                                <a href="edit_blog.php?id=<?php echo $row['id']; ?>" class="btn btn-warning mt-2 mx-2 col-md-5 col-12">Edit</a>
                                <button class="btn btn-danger mt-2 deleteBtn col-md-5 col-12 mx-2" data-id="<?php echo $row['id']; ?>">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } 
        } else { ?>
            <h1>No blogs found.</h1>
        <?php } ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Delete blog functionality
    document.querySelectorAll('.deleteBtn').forEach(button => {
        button.addEventListener('click', function() {
            const blogId = this.getAttribute('data-id');
            if (confirm("Are you sure you want to delete this blog?")) {
                // Send AJAX request to delete the blog
                fetch('delete_blog.php?id=' + blogId, {
                    method: 'GET',
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === "success") {
                        alert("Blog deleted successfully.");
                        // Remove the blog from the DOM
                        this.closest('.col-md-4').remove();
                    } else {
                        alert("Error deleting blog: " + data.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert("An error occurred while deleting the blog.");
                });
            }
        });
    });

    // Logout function to clear session and redirect to login page
    function logout() {
        sessionStorage.clear();
        window.location.href = "login.html";
    }
</script>

</body>
</html>

<?php
$conn->close();
?>
