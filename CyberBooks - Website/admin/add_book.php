<?php
session_start();

// Include your database connection here
include_once "../config/database.php";

// Check if admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit();
}

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if file was uploaded without errors
    if (isset($_FILES["book_file"]) && $_FILES["book_file"]["error"] == 0) {
        $allowed = array("pdf" => "application/pdf", "doc" => "application/msword");
        $filename = $_FILES["book_file"]["name"];
        $filetype = $_FILES["book_file"]["type"];
        $filesize = $_FILES["book_file"]["size"];
    
        // Verify file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if (!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
    
        // Verify file size - 5MB maximum
        $maxsize = 5 * 1024 * 1024;
        if ($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
    
        // Verify MIME type of the file
        if (in_array($filetype, $allowed)) {
            // Check whether file exists before uploading it
            if (file_exists("../uploads/" . $filename)) {
                echo $filename . " is already exists.";
            } else {
                move_uploaded_file($_FILES["book_file"]["tmp_name"], "../uploads/" . $filename);
            } 
        } else {
            echo "Error: There was a problem uploading your file. Please try again."; 
        }
    } else {
        echo "Error: " . $_FILES["book_file"]["error"];
    }

    $name = $db->real_escape_string($_POST['name']);
    $author = $db->real_escape_string($_POST['author']);
    $description = $db->real_escape_string($_POST['description']);
    $file_path = "../uploads/" . $filename;

    $stmt = $db->prepare("INSERT INTO Books (name, author, description, file_path) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $author, $description, $file_path);
    
    if ($stmt->execute()) {
        $message = "New book added successfully!";
    } else {
        $message = "Error: " . $stmt->error;
    }
    
    $stmt->close();
}

$db->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Book</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php
include_once "inc/navbar.php";
?>
    <div class="container mt-5">
        <h2>Add New Book</h2>
        <?php if(!empty($message)){ ?>
       <div class="alert alert-primary" role="alert">
        <?php echo $message; ?>
        </div> 
        <?php } ?>
        <form action="add_book.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Book Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="author">Author:</label>
                <input type="text" class="form-control" id="author" name="author" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description" required></textarea>
            </div>
            <div class="form-group">
                <label for="book_file">Upload Book File:</label>
                <input type="file" class="form-control-file" id="book_file" name="book_file" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Book</button>
        </form>
    </div>
    <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
