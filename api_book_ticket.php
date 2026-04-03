<?php



require 'db.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // 3. Retrieve and sanitize the form data
    $fullName = htmlspecialchars($_POST['fullName'] ?? '');
    $emailAddress = filter_var($_POST['emailAddress'] ?? '', FILTER_SANITIZE_EMAIL);
    $phoneNumber = htmlspecialchars($_POST['phoneNumber'] ?? '');
    $destination = htmlspecialchars($_POST['destination'] ?? '');
    $departureDate = $_POST['departureDate'] ?? '';
    $travelers = (int)($_POST['travelers'] ?? 1);
    $specialRequests = htmlspecialchars($_POST['specialRequests'] ?? '');

    // 4. Basic validation to ensure required fields aren't empty
    if (empty($fullName) || empty($emailAddress) || empty($destination) || empty($departureDate)) {
        die("Error: Please fill out all required fields.");
    }

    try {
        
        $sql = "INSERT INTO bookings (full_name, email_address, phone_number, destination, departure_date, travelers, special_requests) 
                VALUES (:fullName, :emailAddress, :phoneNumber, :destination, :departureDate, :travelers, :specialRequests)";
        
        $stmt = $pdo->prepare($sql);

        // 6. Execute the query with the data
        $stmt->execute([
            ':fullName' => $fullName,
            ':emailAddress' => $emailAddress,
            ':phoneNumber' => $phoneNumber,
            ':destination' => $destination,
            ':departureDate' => $departureDate,
            ':travelers' => $travelers,
            ':specialRequests' => $specialRequests
        ]);

       
        echo "<div style='font-family: sans-serif; text-align: center; margin-top: 50px;'>";
        echo "<h2 style='color: #4b8cfb;'>Booking Confirmed!</h2>";
        echo "<p>Thank you, <strong>$fullName</strong>. Your trip to <strong>$destination</strong> has been successfully booked for $travelers traveler(s).</p>";
        echo "<h2 style='color: #FF0000;'>we will contact you soon.</h2>";
        echo "<a href='index.php' style='display: inline-block; margin-top: 20px; padding: 10px 20px; background-color: #2d2d2d; color: white; text-decoration: none; border-radius: 5px;'>Return to Homepage</a>";
        echo "</div>";

    } catch (PDOException $e) {
        
        echo "Error saving booking: " . $e->getMessage();
    }
} else {
    
    echo "Invalid request method.";
}
?>