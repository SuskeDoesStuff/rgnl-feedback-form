<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$receiptNumber = $_POST['receiptNumber'];
$shoppingExperience = $_POST['shoppingExperience'];
$staffBehavior = $_POST['staffBehavior'];
$productQuality = $_POST['productQuality'];
$feedbackOption = isset($_POST['feedbackOption']) ? $_POST['feedbackOption'] : null;
$staffNumber = isset($_POST['staffNumber']) ? $_POST['staffNumber'] : null;
$staffFeedback = isset($_POST['staffFeedback']) ? $_POST['staffFeedback'] : null;
$generalFeedback = $_POST['feedback'];

$sql = "INSERT INTO feedback (receipt_number, shopping_experience, staff_behavior, product_quality, 
        feedback_option, staff_number, staff_feedback, general_feedback) 
        VALUES ('$receiptNumber', '$shoppingExperience', '$staffBehavior', '$productQuality', 
        '$feedbackOption', '$staffNumber', '$staffFeedback', '$generalFeedback')";


if ($conn->query($sql) === TRUE) {
    echo "Data inserted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
// remember to edit php.ini for uncommenting extension for mysqli
?>
