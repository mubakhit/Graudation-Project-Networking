<?php
session_start();

include_once "../config/database.php";

// Check if admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit();
}

// Fetch some basic stats to display
$booksQuery = "SELECT COUNT(*) AS total_books FROM Books";
$usersQuery = "SELECT COUNT(*) AS total_users FROM Users";
$reservationsQuery = "SELECT COUNT(*) AS total_reservations FROM Reservation";

$totalBooks = $db->query($booksQuery)->fetch_assoc()['total_books'];
$totalUsers = $db->query($usersQuery)->fetch_assoc()['total_users'];
$totalReservations = $db->query($reservationsQuery)->fetch_assoc()['total_reservations'];

$db->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php
include_once "inc/navbar.php";
?>
    <div class="container mt-5">
        <h1>Welcome to the Admin Dashboard</h1>
        <div class="row">
            <div class="col">
                <div class="alert alert-info">
                    Total Books: <?php echo $totalBooks; ?>
                </div>
            </div>
            <div class="col">
                <div class="alert alert-success">
                    Total Users: <?php echo $totalUsers; ?>
                </div>
            </div>
            <div class="col">
                <div class="alert alert-warning">
                    Total Reservations: <?php echo $totalReservations; ?>
                </div>
            </div>
        </div>
        <!-- Additional dashboard information can go here -->
    </div>
    <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
