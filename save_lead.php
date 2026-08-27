<?php

include "config.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {

    echo "Invalid request";
    exit;

}


$service = $_POST["service"] ?? "";
$requirement = $_POST["requirement"] ?? "";
$name = $_POST["name"] ?? "";
$phone = $_POST["phone"] ?? "";
$email = $_POST["email"] ?? "";


if (
    empty($service) ||
    empty($name) ||
    empty($phone) ||
    empty($email)
) {

    echo "Required fields are missing";
    exit;

}


$sql = "INSERT INTO leads
        (service, requirement, name, phone, email)
        VALUES (?, ?, ?, ?, ?)";


$stmt = $conn->prepare($sql);


if (!$stmt) {

    echo "Database query error";
    exit;

}


$stmt->bind_param(
    "sssss",
    $service,
    $requirement,
    $name,
    $phone,
    $email
);


if ($stmt->execute()) {

    echo "Lead saved successfully";

} else {

    echo "Failed to save lead";

}


$stmt->close();

$conn->close();

?>