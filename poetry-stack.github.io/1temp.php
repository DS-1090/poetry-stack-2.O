<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $commentText = $_POST["text"];
    $POEMNAME = $_POST["name"];

    $conn = new mysqli("db", "root", "pass", "poemdb");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO comment (poemname, comment) VALUES ('$POEMNAME', '$commentText')";
    if ($conn->query($sql) === TRUE) {
        echo "Comment saved successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid request method";
}
?>
