<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$receiptNumber = isset($_POST['receiptNumber']) ? $_POST['receiptNumber'] : null;
$phonenumber = isset($_POST['phonenumber']) ? $_POST['phonenumber'] : null;

// Set other fields to NULL
$shoppingExperience = null;
$staffBehavior = null;
$productQuality = null;
$feedbackOption = null;
$staffNumber = null;
$staffFeedback = null;
$generalFeedback = null;

// Check if the record with the provided receipt number already exists
$checkRecord = "SELECT * FROM feedback WHERE receipt_number = '$receiptNumber'";
$result = $conn->query($checkRecord);

if ($result->num_rows > 0) {
    echo "Record with receipt number $receiptNumber already exists.";
} else {
    // Insert a new record with NULL values
    $insertSql = "INSERT INTO feedback (receipt_number, phone_number, shopping_experience, staff_behavior, product_quality, 
                    feedback_option, staff_number, staff_feedback, general_feedback) 
                    VALUES ('$receiptNumber', '$phonenumber', '$shoppingExperience', '$staffBehavior', '$productQuality', 
                    '$feedbackOption', '$staffNumber', '$staffFeedback', '$generalFeedback')";

    if ($conn->query($insertSql) === TRUE) {
        echo "Data inserted successfully";
    } else {
        echo "Error: " . $insertSql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
