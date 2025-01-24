<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Registered Vehicles - Parking Receipt Application</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Parking Receipt App</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="features.php">Features</a></li>
                <li class="nav-item"><a class="nav-link" href="technology_stack.php">Technology Stack</a></li>
                <li class="nav-item"><a class="nav-link" href="benefits.php">Benefits</a></li>
                <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
            </ul>
        </div>
    </nav>
    <header class="jumbotron">
        <h1>Registered Vehicles</h1>
        
        <?php
        // Database connection
        $conn = new mysqli("localhost", "root", "", "parking_receipt");

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Insert new vehicle data if form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $vehicle_number = htmlspecialchars($_POST['vehicle_number']);
            $owner_name = htmlspecialchars($_POST['owner_name']);
            $vehicle_type = htmlspecialchars($_POST['vehicle_type']);
            $entry_time = htmlspecialchars($_POST['entry_time']);
            $exit_time = htmlspecialchars($_POST['exit_time']);
            $fee = htmlspecialchars($_POST['fee']);

            $insert_sql = "INSERT INTO registered_vehicles (vehicle_number, owner_name, vehicle_type, entry_time, exit_time, fee) VALUES ('$vehicle_number', '$owner_name', '$vehicle_type', '$entry_time', '$exit_time', '$fee')";

            if ($conn->query($insert_sql) === TRUE) {
                echo "<div class='alert alert-success'>New vehicle registered successfully!</div>";
            } else {
                echo "<div class='alert alert-danger'>Error: " . $conn->error . "</div>";
            }
        }

        // Fetch registered vehicles
        $sql = "SELECT vehicle_number, owner_name, vehicle_type, entry_time, exit_time, fee FROM registered_vehicles";
        $result = $conn->query($sql);

        if ($result) {
            if ($result->num_rows > 0) {
                echo "<table class='table'>
                        <thead>
                            <tr>
                                <th>Vehicle Number</th>
                                <th>Owner Name</th>
                                <th>Vehicle Type</th>
                                <th>Entry Time</th>
                                <th>Exit Time</th>
                                <th>Fee</th>
                            </tr>
                        </thead>
                        <tbody>";
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['vehicle_number']}</td>
                            <td>{$row['owner_name']}</td>
                            <td>{$row['vehicle_type']}</td>
                            <td>{$row['entry_time']}</td>
                            <td>{$row['exit_time']}</td>
                            <td>\${$row['fee']}</td>
                          </tr>";
                }
                echo "</tbody></table>";
            } else {
                echo "<tr><td colspan='6'>No registered vehicles found.</td></tr>";
            }
        } else {
            echo "Error: " . $conn->error;
        }

        $conn->close();
        ?>
        
        <button onclick="window.print()" class="btn btn-secondary">Print Receipt</button>
    </header>
    <footer class="footer">
        <p>Contact us at: info@parkingreceiptapp.com</p>
    </footer>
</body>
</html>
