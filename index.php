<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Parking Receipt Application</title>
    <style>
        .form-container {
            width: 50%;
            margin: auto;
        }
    </style>
    <script>
        function updateFee() {
            var vehicleType = document.getElementById("vehicle_type").value;
            var fee = 0;
            switch (vehicleType) {
                case "Car":
                    fee = 10; // Example fee for Car
                    break;
                case "Motorcycle":
                    fee = 5; // Example fee for Motorcycle
                    break;
                case "Truck":
                    fee = 15; // Example fee for Truck
                    break;
            }
            document.getElementById("fee").value = fee;
        }
    </script>
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
        <marquee behavior="scroll" direction="left">
            <h1>Welcome to the Parking Receipt Application</h1>
        </marquee>
        <p>Your solution for efficient parking management.</p>
    </header>
    
    <section class="form-container">
        <h2>Vehicle Parking Form</h2>
        <form action="registered_vehicles.php" method="POST">
            <div class="form-group">
                <label for="vehicle_number">Vehicle Number:</label>
                <input type="text" class="form-control" id="vehicle_number" name="vehicle_number" required>
            </div>
            <div class="form-group">
                <label for="owner_name">Owner Name:</label>
                <input type="text" class="form-control" id="owner_name" name="owner_name" required>
            </div>
            <div class="form-group">
                <label for="vehicle_type">Vehicle Type:</label>
                <select class="form-control" id="vehicle_type" name="vehicle_type" required onchange="updateFee()">
                    <option value="Car">Car</option>
                    <option value="Motorcycle">Motorcycle</option>
                    <option value="Truck">Truck</option>
                </select>
            </div>
            <div class="form-group">
                <label for="entry_time">Entry Time:</label>
                <input type="datetime-local" class="form-control" id="entry_time" name="entry_time" required>
            </div>
            <div class="form-group">
                <label for="exit_time">Exit Time:</label>
                <input type="datetime-local" class="form-control" id="exit_time" name="exit_time" required>
            </div>
            <div class="form-group">
                <label for="fee">Fee:</label>
                <input type="text" class="form-control" id="fee" name="fee" readonly>
            </div>
            <button type="submit" class="btn btn-primary">Register Vehicle</button>
        </form>
    </section>

    <footer class="footer">
        <p>Contact us at: info@parkingreceiptapp.com</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
