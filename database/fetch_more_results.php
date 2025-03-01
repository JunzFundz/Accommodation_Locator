<?php
include('../Classes/Admin.php');
$show = new Admin();

$limit = 6;
$offset = isset($_GET['offset']) ? (int)$_GET['offset'] : 0;

$providers = $show->showProvidersPage($limit, $offset);

if (empty($providers)) {
    echo '';
    exit;
}

foreach ($providers as $row):
    $images = json_decode($row['p_img'], true);
    $firstImage = (!empty($images) && is_array($images)) ? htmlspecialchars($images[0], ENT_QUOTES, 'UTF-8') : 'default.jpg';
?>
    <div class="card-custom rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700">
        <div class="h-56 w-full">
            <a href="view.php?number=<?= htmlspecialchars($row['p_id']) ?>&&name=<?= htmlspecialchars($row['p_name']) ?>">
                <img class="mx-auto h-full" src="../uploads/<?php echo $firstImage; ?>" alt="Property Image" />
            </a>
        </div>
        <div class="pt-6">
            <a href="view.php?number=<?= htmlspecialchars($row['p_id']) ?>&&name=<?= htmlspecialchars($row['p_name']) ?>" class="text-lg font-semibold leading-tight text-gray-900 hover:underline">
                <?= htmlspecialchars($row['p_name']) ?>
            </a>
            <ul class="mt-2 flex items-center gap-4">
                <li class="flex items-center gap-2">
                    <p class="text-sm font-medium"><?= htmlspecialchars($row['p_address']) ?></p>
                </li>
            </ul>
            <div class="mt-4 flex items-center justify-between gap-4">
                <p class="text-2xl font-extrabold leading-tight">₱<?= number_format($row['p_price']) ?></p>
                <button type="button" class="inline-flex items-center rounded-lg bg-blue-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-blue-800">
                    <a href="view.php?number=<?= htmlspecialchars($row['p_id']) ?>&&name=<?= htmlspecialchars($row['p_name']) ?>">
                        View in details
                    </a>
                </button>
            </div>
        </div>
    </div>
<?php endforeach; ?>