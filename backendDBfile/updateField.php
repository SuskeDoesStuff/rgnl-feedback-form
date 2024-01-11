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

// Check if the record with the provided receipt number already exists
$checkRecord = "SELECT * FROM feedback WHERE receipt_number = '$receiptNumber'";
$result = $conn->query($checkRecord);

if ($result->num_rows > 0) {
    // Update the existing record
    $updateSql = "UPDATE feedback SET
                  shopping_experience = '$shoppingExperience',
                  staff_behavior = '$staffBehavior',
                  product_quality = '$productQuality',
                  feedback_option = '$feedbackOption',
                  staff_number = '$staffNumber',
                  staff_feedback = '$staffFeedback',
                  general_feedback = '$generalFeedback'
                  WHERE receipt_number = '$receiptNumber'";

    if ($conn->query($updateSql) === TRUE) {
        echo "Data updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
} else {
    echo "Record with receipt number $receiptNumber does not exist.";
}

$conn->close();
// remember to edit php.ini for uncommenting extension for mysqli
?>
