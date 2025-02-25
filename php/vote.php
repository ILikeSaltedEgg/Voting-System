<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST" && !isset($_COOKIE['has_voted'])) {
    $candidate = $_POST['candidate'];

    $stmt = $conn->prepare("INSERT INTO votes (candidate) VALUES (?)");
    $stmt->bind_param("s", $candidate);
    $stmt->execute();
    $stmt->close();

    setcookie("has_voted", "yes", time() + 86400, "/");

    header("Location: ../index.php");
    exit();
}
?>

