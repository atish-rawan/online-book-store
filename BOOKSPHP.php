<?php
// Database connection settings
$servername = "localhost"; // or your server name
$username = "root";        // your MySQL username
$password = "";            // your MySQL password
$dbname = "book";        // your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$name = $_POST['name'];
$address = $_POST['address'];
$Qty = intval($_POST['Qty']); // Ensure size is an integer
$pname = $_POST['pname'];
$price = floatval($_POST['price']); // Ensure price is a float

// Calculate amount with 18% GST
$amount_with_gst = $price * 1.18;

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO book (name, address, Qty, pname, price) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("ssisi", $name, $address, $Qty, $pname, $amount_with_gst);

// Execute statement
if ($stmt->execute()) {
    ?>
    <html>
    <head>
        <style>
            body {
                font-family: Arial, sans-serif;
                text-align: center;
                margin: 0;
                padding: 0;
            }
            .container {
                width: 50%;
                margin: 40px auto;
                padding: 20px;
                border: 1px solid #ccc;
                border-radius: 10px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }
            h2 {
                color: #00698f;
                margin-top: 0;
            }
            p {
                margin-bottom: 20px;
            }
            a {
                text-decoration: none;
                color: #00698f;
            }
            a:hover {
                color: #0099cc;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h2>Order Summary</h2>
            <p>Name: <?= htmlspecialchars($name) ?></p>
            <p>Address: <?= htmlspecialchars($address) ?></p>
            <p>Qty: <?= htmlspecialchars($Qty) ?></p>
            <p>Product Name: <?= htmlspecialchars($pname) ?></p>
            <p>Amount (with 18% GST): ₹<?= number_format($amount_with_gst, 2) ?></p
   <p>DO VISIT AGAIN!!!!!!</p>
            <p><a href='layout.html'>Go Back to Main Page</a></p>
        </div>
    </body>
    </html>
    <?php
} else {
    echo "Error: " . $stmt->error;
}