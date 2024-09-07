<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil dan sanitasi input dari user
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

    // Detail koneksi ke database
    $servername = "localhost"; 
    $username = "root";       
    $password = "";            
    $dbname = "contact_form";  

    // Membuat koneksi ke database
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Periksa apakah koneksi berhasil
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Mempersiapkan query SQL untuk menyimpan data
    $stmt = $conn->prepare("INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $message);

    // Mengeksekusi query dan memeriksa apakah berhasil
    if ($stmt->execute()) {
        $messageType = "success";
        $messageText = "Thank you for your message. We will get back to you soon.";
    } else {
        $messageType = "error";
        $messageText = "Error: " . $stmt->error;
    }

    // Menutup statement dan koneksi
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <?php if (isset($messageType) && isset($messageText)): ?>
        <p class="<?php echo $messageType; ?>-message"><?php echo $messageText; ?></p>
    <?php endif; ?>

    <form action="process_form.php" method="POST">
        <h2>Contact Us</h2>
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" required><br><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <label for="message">Message:</label><br>
        <textarea id="message" name="message" rows="5" required></textarea><br><br>

        <input type="submit" value="Submit">
    </form>

</body>
</html>