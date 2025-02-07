<?php

require_once 'connection.php';
$dbh = new Dbh();
$conn = $dbh->connect();

if (isset($_POST["query"])) {
    $searchTerm = '%' . $_POST['query'] . '%';

    $stmt = $conn->prepare("SELECT l_id, l_st, l_city FROM tbl_location WHERE l_st LIKE ? OR l_city LIKE ? LIMIT 5");
    $stmt->bind_param("ss", $searchTerm, $searchTerm);

    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) { ?>
            <div class="suggestion-item px-4 py-2 cursor-pointer flex justify-between">
                <a class="hover:bg-gray-200 w-full" href="../pages/show.php?street=<?= urlencode($row['l_st']) ?>&city=<?= urlencode($row['l_city']) ?>&cityid=<?= urlencode($row['l_id']) ?>">
                    <span class="text-blue-500"><?= htmlspecialchars($row['l_st']) ?></span>
                    <span class="text-sm text-gray-500"><?= htmlspecialchars($row['l_city']) ?></span>
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
