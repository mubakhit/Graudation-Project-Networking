<?php
session_start();

include_once "../config/database.php";

// Check if admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit();
}

// Handle book deletion
if (isset($_POST['delete'])) {
    $bookId = $db->real_escape_string($_POST['book_id']);

        // First, fetch the file path
        $filePathQuery = "SELECT file_path FROM Books WHERE book_id = ?";
        $stmt = $db->prepare($filePathQuery);
        $stmt->bind_param("i", $bookId);
        $stmt->execute();
        $result = $stmt->get_result();
        $file = $result->fetch_assoc();
    
        if ($file) {
            $filePath = $file['file_path'];
        }
    $stmt = $db->prepare("DELETE FROM Books WHERE book_id = ?");
    $stmt->bind_param("i", $bookId);
    if ($stmt->execute()) {

        if (file_exists($filePath)) {
        unlink($filePath);    
        } 

        $message = "Book deleted successfully.";
    } else {
        $message = "Error: " . $stmt->error;
    }
    $stmt->close();
}

// Fetch all books
$query = "SELECT * FROM Books";
$result = $db->query($query);

$db->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Books</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php
include_once "inc/navbar.php";
?>
    <div class="container mt-5">
        <h2>Books List</h2>
        <?php if(!empty($message)){ ?>
       <div class="alert alert-primary" role="alert">
        <?php echo $message; ?>
        </div> 
        <?php } ?>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Author</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['book_id']; ?></td>
                        <td><?php echo htmlspecialchars($row['name']); ?></td>
                        <td><?php echo htmlspecialchars($row['author']); ?></td>
                        <td><?php echo htmlspecialchars($row['description']); ?></td>
                        <td>
                            <form action="books.php" method="post">
                                <input type="hidden" name="book_id" value="<?php echo $row['book_id']; ?>">
                                <button type="submit" name="delete" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this book?');">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
