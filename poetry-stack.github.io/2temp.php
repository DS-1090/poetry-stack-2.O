<?php
header('Access-Control-Allow-Origin: *');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $names = $_POST["text"];
    $no = $_POST["name"];

    $conn = new mysqli("db", "root", "pass", "poemdb");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO contacts (name, phno) VALUES (?, ?)");
    $stmt->bind_param("ss", $names, $no);

    if ($stmt->execute()) {
        echo "Comment saved successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request method";
}
?>
