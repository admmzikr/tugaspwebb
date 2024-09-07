
# Contact Form Project

## Overview

This project is a simple **Contact Form** that allows users to submit their name, email, and message. Once the form is submitted, the data is processed and stored in a MySQL database. Users will receive a confirmation message indicating whether their submission was successful or if an error occurred.

## Files Structure

The project consists of the following files:

1. `index.html`: This file contains the HTML form that the user interacts with. The form includes fields for the user's name, email, and message.
2. `process_form.php`: This file handles the form submission. It sanitizes the input, inserts the data into a MySQL database, and returns a success or error message.
3. `style.css`: This file contains the styling for the form (optional and not included in the provided code).
4. `README.md`: The documentation for the project.

## Requirements

- **Web Server**: You need a server that supports PHP (e.g., Apache with PHP).
- **Database**: MySQL or MariaDB should be installed, and a database with a table to store the contact form submissions should be created.
- **PHP**: Make sure PHP is installed and properly configured to work with your web server.
  
## Database Setup

1. **Create the Database**:

   You need to create a database in MySQL. You can run the following SQL command in your MySQL client:

   ```sql
   CREATE DATABASE contact_form;
   ```

2. **Create the Table**:

   Once the database is created, you can create a table named `contacts` to store the form data:

   ```sql
   USE contact_form;

   CREATE TABLE contacts (
       id INT AUTO_INCREMENT PRIMARY KEY,
       name VARCHAR(255) NOT NULL,
       email VARCHAR(255) NOT NULL,
       message TEXT NOT NULL,
       created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
   );
   ```

## Configuration

In the `process_form.php` file, make sure to adjust the following lines to match your database connection details:

```php
$host = "localhost";
$username = "root";
$password = "";
$database = "contact_form";
```

- `localhost`: The hostname of your database (usually `localhost` for local development).
- `root`: The username of your MySQL server.
- `password`: The password for your MySQL user.
- `contact_form`: The name of the database created earlier.

## How It Works

1. **Form Submission**: 
   Users fill out the form with their name, email, and message, then click the "Submit" button.
   
2. **Form Processing**:
   - When the form is submitted, the `process_form.php` file is triggered.
   - The user input is sanitized using `filter_var()` to prevent security risks like SQL Injection or XSS attacks.
   - The data is inserted into the `contacts` table in the MySQL database.

3. **Feedback to the User**:
   - If the submission is successful, the user sees a "Thank you" message.
   - If there is an error (e.g., a problem with the database connection), the user receives an error message.

## Error Handling

The form handles errors by checking the database connection and the execution of the SQL query. If an error occurs, it is displayed on the screen.

## Usage

1. Clone or download this repository to your web server's document root (e.g., `htdocs` for XAMPP or `www` for LAMP).
2. Set up your database and configure the connection details in `process_form.php`.
3. Access the `index.html` form through your browser and start submitting test data.

## Example

- Navigate to the `index.html` page in your browser.
- Fill out the form with your **name**, **email**, and **message**.
- Click **Submit**.
- A success message or an error message will be displayed based on the result of the submission.

## License

This project is open-source and free to use under the MIT License.
