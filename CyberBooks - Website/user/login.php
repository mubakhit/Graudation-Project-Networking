<?php
session_start(); // Start the session.

// Database connection setup
include_once "../config/database.php"; 

$message = '';

// Check if the form is submitted.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data.
    $email = $db->real_escape_string($_POST['email']);
    $password = $_POST['password']; // We'll compare this after fetching the hash.

    // Prepare the SELECT statement.
    $stmt = $db->prepare("SELECT user_id, name, password FROM Users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        // Verify the password with the hashed password in the database.
        if (password_verify($password, $user['password'])) {
            // Password is correct, so start a new session.
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['name'] = $user['name'];
            // Redirect to user dashboard or wherever you wish.
            header("Location: books.php");
            exit();
        } else {
            $message = "Invalid password.";
        }
    } else {
        $message = "No user found with that email address.";
    }
    
    $stmt->close();
    $db->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php
include_once "inc/header.php";
?>

<section class="w3l-skill-breadcrum">
  <div class="breadcrum">
    <div class="container">
      <p><a href="index.php">Home</a> &nbsp; / &nbsp; Login</p>
    </div>
  </div>
</section>

<section class="w3l-contacts-12" id="contact">
	<div class="container py-5">
		<div class="contacts12-main py-md-3">
			<div class="header-section text-center">
				<h3 class="mb-md-5 mb-4">Login
			</div>
            <p><?php echo $message; ?></p>
            <div class="main-input">

        <form action="login.php" method="post">
            <div class="form-group">
                <input type="email" class="contact-input" placeholder="Enter your email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <input type="password" class="contact-input" placeholder="Enter your password" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary theme-button">Login</button>
        </form>
        </div>
		</div>
	</div>
</section>

<?php
include_once "inc/footer.php";
?>
</body>
</html>
