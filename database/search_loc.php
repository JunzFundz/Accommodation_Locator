<?php

$host = "localhost";
$dbname = "capstone";
$username = "root";
$password = "fundador142";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Enables exceptions for errors
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Fetches data as an associative array
        PDO::ATTR_EMULATE_PREPARES => false // Ensures real prepared statements are used
    ]);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

if (isset($_POST["query"])) {
    $query = $_POST["query"];
    $stmt = $pdo->prepare("SELECT l_st, l_city FROM tbl_location WHERE l_st LIKE ? LIMIT 5");
    $stmt->execute(["%$query%"]);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($results) {
        foreach ($results as $row) { 
        ?>
            <div class='suggestion-item px-4 py-2 hover:bg-gray-200 cursor-pointer flex justify-between'>
                <a href="../pages/route.php?street=<?= urlencode($row['l_st']) ?>&city=<?= urlencode($row['l_city']) ?>">
                    <span><?= htmlspecialchars($row['l_st']) ?></span>
                    <span class='text-sm text-gray-500'><?= htmlspecialchars($row['l_city']) ?></span>
                </a>
            </div>
        <?php
        }
        
    } else {
        echo "<div class='px-4 py-2 text-gray-500'>No results found</div>";
    }
}
