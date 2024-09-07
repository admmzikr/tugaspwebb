<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    </div>

    <form action="process_form.php" method="POST">
        <h2>Kontak Kami</h2>
        <label for="name">Nama:</label><br>
        <input type="text" id="name" name="name" required><br><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <label for="message">Pesan:</label><br>
        <textarea id="message" name="message" rows="5" required></textarea><br><br>

        <input type="submit" value="Submit">
    </form>

</body>
</html>