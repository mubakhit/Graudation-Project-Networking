<?php
session_start(); // Start the session.

// Database connection setup
include_once "../config/database.php";

// Check if user is logged in, if not redirect to login page.
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Define the action if it's a download or reserve request
if (isset($_GET['action']) && isset($_GET['book_id'])) {
    $bookId = $_GET['book_id'];
    if ($_GET['action'] == 'download') {
        $query = "SELECT file_path FROM Books WHERE book_id = ?";
        if ($stmt = $db->prepare($query)) {
            $stmt->bind_param("i", $bookId);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                $book = $result->fetch_assoc();
                $filePath = $book['file_path'];
                // Make sure the file exists.
                if (file_exists($filePath)) {
                    // Set headers for download
                    header('Content-Description: File Transfer');
                    header('Content-Type: application/octet-stream');
                    header('Content-Disposition: attachment; filename="' . basename($filePath) . '"');
                    header('Expires: 0');
                    header('Cache-Control: must-revalidate');
                    header('Pragma: public');
                    header('Content-Length: ' . filesize($filePath));
                    flush(); // Flush system output buffer
                    readfile($filePath);
                    exit();
                }
            }
            $stmt->close();
        }
    } elseif ($_GET['action'] == 'reserve') {
        // Check if the book is already reserved
        $checkReservation = "SELECT * FROM Reservation WHERE book_id = ? AND user_id = ?";
        $stmt = $db->prepare($checkReservation);
        $userId = $_SESSION['user_id'];
        $stmt->bind_param("ii", $bookId, $userId);
        $stmt->execute();
        $reservations = $stmt->get_result();
        if ($reservations->num_rows == 0) {
            // If not, insert the reservation
            $insertReservation = "INSERT INTO Reservation (user_id, book_id) VALUES (?, ?)";
            $stmt = $db->prepare($insertReservation);
            $stmt->bind_param("ii", $userId, $bookId);
            if (!$stmt->execute()) {
                echo "Error: " . $stmt->error;
            }
            $message = "Book has been reserved successfully!";
        }else{
            $message = "You already reserved this book!";
        }
    }
}

// Query to fetch books from the database
$query = "SELECT * FROM Books";
$result = $db->query($query);
?>

<?php
include_once "inc/header.php";
?>

<section class="w3l-skill-breadcrum">
  <div class="breadcrum">
    <div class="container">
      <p><a href="index.php">Home</a> &nbsp; / &nbsp; Books</p>
    </div>
  </div>
</section>

    <div class="container mt-5">
        <h2>Books List</h2>
        <?php if(!empty($message)){ ?>
       <div class="alert alert-primary" role="alert">
        <?php echo $message; ?>
        </div> 
        <?php } ?>
        <?php if ($result->num_rows > 0): ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Author</th>
                        <th>Description</th>
                        <th>Download</th>
                        <th>Reserve</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['name']); ?></td>
                            <td><?php echo htmlspecialchars($row['author']); ?></td>
                            <td><?php echo htmlspecialchars($row['description']); ?></td>
                            <td>
                                <a href="books.php?book_id=<?php echo $row['book_id']; ?>&action=download" class="btn btn-primary">Download</a>
                            </td>
                            <td>
                                <a href="books.php?book_id=<?php echo $row['book_id']; ?>&action=reserve" class="btn btn-secondary">Reserve</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No books found.</p>
        <?php endif; ?>
    </div>

    <!-- Include Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
$db->close();
?>
