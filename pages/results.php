<?php
require_once('../database/connection.php');
$dbh = new Dbh();
$conn = $dbh->connect();

if (isset($_GET['filters'])) {
    $filters = explode(",", $_GET['filters']);

    if (!empty($filters)) {
        $conditions = array_fill(0, count($filters), "JSON_SEARCH(p_inclusion, 'one', ?) IS NOT NULL");
        $query = "SELECT * FROM tbl_provider WHERE p_status =1 AND p_inclusion IS NOT NULL AND p_inclusion != '' AND JSON_VALID(p_inclusion) AND (" . implode(" OR ", $conditions) . ")";

        $stmt = $conn->prepare($query);
        if ($stmt === false) {
            die("Query preparation failed: " . $conn->error);
        }

        $types = str_repeat('s', count($filters));
        $stmt->bind_param($types, ...$filters);

        if (!$stmt->execute()) {
            die("Query execution failed: " . $stmt->error);
        }

        $providers = $stmt->get_result();
    }
}

if (isset($_GET['min_price']) && isset($_GET['max_price'])) {
    $min_price = isset($_GET['min_price']) ? (int) $_GET['min_price'] : 0;
    $max_price = isset($_GET['max_price']) ? (int) $_GET['max_price'] : 7000;

    $query = "SELECT * FROM tbl_provider WHERE p_status = 1 AND p_price BETWEEN ? AND ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ii", $min_price, $max_price);
    $stmt->execute();
    $number = $stmt->get_result();
}

if (isset($_GET['location'])) {
    $location = isset($_GET['location']) ? trim($_GET['location']) : '';

    $query = "SELECT * FROM tbl_provider WHERE p_status = 1";

    if (!empty($location)) {
        $query .= " AND p_address LIKE ?";
    }

    $stmt = $conn->prepare($query);

    if (!empty($location)) {
        $location = "%$location%";
        $stmt->bind_param("s", $location);
    }

    $stmt->execute();
    $result = $stmt->get_result();
    $newp = $result->fetch_all(MYSQLI_ASSOC);

    $stmt->close();
    $conn->close();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <title>Accommodation Locator</title>
</head>

<body>
    <div id="authentication-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative rounded-lg shadow-sm dark:bg-gray-700 card-custom">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                    <h3 class="text-xl font-semibold text-white">
                        Sign in to our platform
                    </h3>
                    <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-white rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="authentication-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5">
                    <form class="space-y-4">
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-white">Your email</label>
                            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400" placeholder="youremail@gmail.com" required />
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-white">Your password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400" required />
                        </div>
                        <div class="flex justify-between">
                            <a href="forgot-password.php" class="text-sm text-blue-700 hover:underline">Lost Password?</a>
                        </div>
                        <button type="submit" class="log-in w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login to your account</button>
                        <div class="text-sm font-medium text-white">
                            Not registered? <a href="signup.php" class="text-blue-700 hover:underline">Create account</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <nav class="custom-nav-bg border-gray-200">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="https://flowbite.com/" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="logo.png" class="h-12" alt="Flowbite Logo">
                <span class="logotext self-center text-white text-2xl font-semibold whitespace-nowrap">Acommodation Locator</span>
            </a>
            <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Sign in</button>
                <button data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-sticky" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
            </div>
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
                <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0">
                    <li>
                        <a href="home.php" class="block py-2 px-3 text-white bg-blue-700 rounded-sm md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500" aria-current="page">Home</a>
                    </li>
                    <li>
                        <a href="about.php" class="block py-2 px-3 text-white rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">About</a>
                    </li>
                    <li>
                        <a href="service.php" class="block py-2 px-3 text-white rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Services</a>
                    </li>
                    <li>
                        <a href="contact.php" class="block py-2 px-3 text-white rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="bg-gray-50 py-8 antialiased md:py-12">
        <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
            <section class="color-white">
                <div class="mx-auto max-w-screen-xl px-4">
                    <h2 class="mb-8 text-2xl font-extrabold tracking-tight leading-tight text-center text-black md:text-4xl">
                        Results
                    </h2>
                </div>
            </section>

            <?php if (!empty($providers)) { ?>

                <div class="mb-4 grid gap-4 sm:grid-cols-2 md:mb-8 lg:grid-cols-3 xl:grid-cols-4">
                    <?php foreach ($providers as $row):
                        $images = json_decode($row['p_img'], true);
                        $firstImage = (!empty($images) && is_array($images)) ? htmlspecialchars($images[0], ENT_QUOTES, 'UTF-8') : 'default.jpg';
                    ?>
                        <div class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700">
                            <div class="h-56 w-full">
                                <a href="view.php?number=<?= htmlspecialchars($row['p_id']) ?>&name=<?= htmlspecialchars($row['p_name']) ?>">
                                    <img class="mx-auto h-full" src="../uploads/<?php echo $firstImage; ?>" alt="Property Image" />
                                </a>
                            </div>
                            <div class="pt-6">
                                <a href="view.php?number=<?= htmlspecialchars($row['p_id']) ?>&name=<?= htmlspecialchars($row['p_name']) ?>" class="text-lg font-semibold leading-tight text-gray-900 hover:underline">
                                    <?= htmlspecialchars($row['p_name']) ?>
                                </a>
                                <ul class="mt-2 flex items-center gap-4">
                                    <li class="flex items-center gap-2">
                                        <p class="text-sm font-medium"><?= htmlspecialchars($row['p_address']) ?></p>
                                    </li>
                                </ul>
                                <div class="mt-4 flex items-center justify-between gap-4">
                                    <p class="text-2xl font-extrabold leading-tight">₱<?= number_format($row['p_price']) ?></p>
                                    <button type="button" class="inline-flex items-center rounded-lg bg-blue-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        <a href="view.php?number=<?= htmlspecialchars($row['p_id']) ?>&name=<?= htmlspecialchars($row['p_name']) ?>">
                                            View in details
                                        </a>
                                    </button>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

            <?php
            } else if (!empty($number)) { ?>

                <div class="mb-4 grid gap-4 sm:grid-cols-2 md:mb-8 lg:grid-cols-3 xl:grid-cols-4">
                    <?php foreach ($number as $row):
                        $images = json_decode($row['p_img'], true);
                        $firstImage = (!empty($images) && is_array($images)) ? htmlspecialchars($images[0], ENT_QUOTES, 'UTF-8') : 'default.jpg';
                    ?>
                        <div class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700">
                            <div class="h-56 w-full">
                                <a href="view.php?number=<?= htmlspecialchars($row['p_id']) ?> && name=<?= htmlspecialchars($row['p_name']) ?>">
                                    <img class="mx-auto h-full" src="../uploads/<?php echo $firstImage; ?>" alt="Property Image" />
                                </a>
                            </div>
                            <div class="pt-6">
                                <a href="view.php?number=<?= htmlspecialchars($row['p_id']) ?> && name=<?= htmlspecialchars($row['p_name']) ?>" class="text-lg font-semibold leading-tight text-gray-900 hover:underline">
                                    <?= htmlspecialchars($row['p_name']) ?>
                                </a>
                                <ul class="mt-2 flex items-center gap-4">
                                    <li class="flex items-center gap-2">
                                        <p class="text-sm font-medium"><?= htmlspecialchars($row['p_address']) ?></p>
                                    </li>
                                </ul>
                                <div class="mt-4 flex items-center justify-between gap-4">
                                    <p class="text-2xl font-extrabold leading-tight">₱<?= number_format($row['p_price']) ?></p>
                                    <button type="button" class="inline-flex items-center rounded-lg bg-blue-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        <a href="view.php?number=<?= htmlspecialchars($row['p_id']) ?> && name=<?= htmlspecialchars($row['p_name']) ?>">
                                            View in details
                                        </a>
                                    </button>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

            <?php } else if (!empty($newp)) { ?>

                <div class="mb-4 grid gap-4 sm:grid-cols-2 md:mb-8 lg:grid-cols-3 xl:grid-cols-4">
                    <?php foreach ($newp as $row):
                        $images = json_decode($row['p_img'], true);
                        $firstImage = (!empty($images) && is_array($images)) ? htmlspecialchars($images[0], ENT_QUOTES, 'UTF-8') : 'default.jpg';
                    ?>
                        <div class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700">
                            <div class="h-56 w-full">
                                <a href="view.php?number=<?= htmlspecialchars($row['p_id']) ?> && name=<?= htmlspecialchars($row['p_name']) ?>">
                                    <img class="mx-auto h-full" src="../uploads/<?php echo $firstImage; ?>" alt="Property Image" />
                                </a>
                            </div>
                            <div class="pt-6">
                                <a href="view.php?number=<?= htmlspecialchars($row['p_id']) ?> && name=<?= htmlspecialchars($row['p_name']) ?>" class="text-lg font-semibold leading-tight text-gray-900 hover:underline">
                                    <?= htmlspecialchars($row['p_name']) ?>
                                </a>
                                <ul class="mt-2 flex items-center gap-4">
                                    <li class="flex items-center gap-2">
                                        <p class="text-sm font-medium"><?= htmlspecialchars($row['p_address']) ?></p>
                                    </li>
                                </ul>
                                <div class="mt-4 flex items-center justify-between gap-4">
                                    <p class="text-2xl font-extrabold leading-tight">₱<?= number_format($row['p_price']) ?></p>
                                    <button type="button" class="inline-flex items-center rounded-lg bg-blue-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        <a href="view.php?number=<?= htmlspecialchars($row['p_id']) ?> && name=<?= htmlspecialchars($row['p_name']) ?>">
                                            View in details
                                        </a>
                                    </button>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>


            <?php } else { ?>
                <p class="text-center">No results</p>
            <?php } ?>

        </div>
    </section>

</body>
<script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.1/dist/flowbite.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</html>