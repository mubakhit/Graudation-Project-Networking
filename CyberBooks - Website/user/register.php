<?php

// Database connection setup
include_once "../config/database.php"; 

$message = '';

// Check if the form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // get the form data
    $name = $db->real_escape_string($_POST['name']);
    $email = $db->real_escape_string($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Check if email already exists
    $checkEmail = $db->prepare("SELECT email FROM Users WHERE email = ?");
    $checkEmail->bind_param("s", $email);
    $checkEmail->execute();
    $checkEmail->store_result();

    if ($checkEmail->num_rows > 0) {
        $message = "Email already exists. Please use another email.";
    } else {
        // Prepare and bind
        $stmt = $db->prepare("INSERT INTO Users (name, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $password);
        
        // Execute and check for success
        if ($stmt->execute()) {
            $message = "Registration successful!";
            // Redirect to login page or wherever you wish
            header("Location: login.php");
            exit();
        } else {
            $message = "Error: " . $stmt->error;
        }
        
        $stmt->close();
    }

    $checkEmail->close();
    $db->close();
}
?>

<?php
include_once "inc/header.php";
?>

<section class="w3l-skill-breadcrum">
  <div class="breadcrum">
    <div class="container">
      <p><a href="index.php">Home</a> &nbsp; / &nbsp; Register</p>
    </div>
  </div>
</section>


<section class="w3l-contacts-12" id="contact">
	<div class="container py-5">
		<div class="contacts12-main py-md-3">
			<div class="header-section text-center">
				<h3 class="mb-md-5 mb-4">Register
			</div>
            <p><?php echo $message; ?></p>
            <div class="main-input">

        <form action="register.php" method="post">
            <div class="form-group">
                <input type="name" class="contact-input" placeholder="Enter your name" id="name" name="name" required>
            </div>
            <div class="form-group">
                <input type="email" class="contact-input" placeholder="Enter your email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <input type="password" class="contact-input" placeholder="Enter your password" id="password" name="password" required>
            </div>

            <button type="submit" class="btn btn-primary theme-button">Register</button>
        </form>
        </div>
		</div>
	</div>
</section>

   

    <!-- Include Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
