<?php

require_once 'connection.php';
$dbh = new Dbh();
$conn = $dbh->connect();

if (isset($_POST["query"])) {
    $searchTerm = '%' . $_POST['query'] . '%';

    $stmt = $conn->prepare("SELECT p_name, p_address FROM tbl_provider WHERE p_address LIKE ? LIMIT 5");
    $stmt->bind_param("s", $searchTerm);

    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) { ?>
            <div class="suggestion-item px-4 py-2 cursor-pointer flex justify-between">
                <a class="hover:bg-gray-200 w-full" href="../pages/results.php?street=<?= urlencode($row['p_name']) ?>&city=<?= urlencode($row['p_address']) ?>&cityid=<?= urlencode($row['p_name']) ?>">
                    <span class="text-blue-500"><?= htmlspecialchars($row['p_name']) ?></span>
                    <span class="text-sm text-gray-500"><?= htmlspecialchars($row['p_address']) ?></span>
                </a>
            </div>
        <?php }
    } else {
        echo "<div class='px-4 py-2 text-gray-500'>No results found</div>";
    }
    $stmt->close();
}
$conn->close();
?>
