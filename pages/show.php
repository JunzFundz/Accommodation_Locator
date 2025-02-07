<?php

require_once '../database/connection.php';

$dbh = new Dbh();
$conn = $dbh->connect();

$street = isset($_GET['street']) ? $_GET['street'] : '';
$city = isset($_GET['city']) ? $_GET['city'] : '';
$id = isset($_GET['cityid']) ? $_GET['cityid'] : '';

$stmt = $conn->prepare("SELECT * FROM tbl_location WHERE l_id = ?");
$stmt->bind_param("i", $id);

$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) { ?>
        <div class="suggestion-item px-4 py-2 cursor-pointer flex justify-between">
            <a class="hover:bg-gray-200 w-full" href="../pages/show.php?street=<?= urlencode($row['l_st']) ?>&city=<?= urlencode($row['l_city']) ?>">
            <?= $row['l_link'] ?>
                <span class="text-sm text-gray-500"><?= htmlspecialchars($row['l_city']) ?></span>
            </a>
        </div>
    <?php }
} else {
    echo "<div class='px-4 py-2 text-gray-500'>No results found</div>";
}
$stmt->close();
?>

