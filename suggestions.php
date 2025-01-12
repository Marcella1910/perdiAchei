<?php
include_once 'dbconnect.php';

$query = isset($_GET['query']) ? $conn->real_escape_string($_GET['query']) : '';

if (!empty($query)) {
    $sql = "SELECT titulo FROM posts WHERE titulo LIKE '%$query%' LIMIT 5";
    $result = $conn->query($sql);

    $suggestions = [];
    while ($row = $result->fetch_assoc()) {
        $suggestions[] = $row['titulo'];
    }

    echo json_encode($suggestions);
} else {
    echo json_encode([]);
}
?>
