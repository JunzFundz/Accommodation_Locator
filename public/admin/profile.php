<?php
session_start();
$user = $_SESSION['u_id'];

include('../../Classes/Admin.php');
$viewRequests = new Admin();

$req = $viewRequests->countRequests();
$prop = $viewRequests->countProp();


if (isset($_GET['id']) && isset($_GET['number'])) {
    $id = $_GET['id'];
    $number = $_GET['number'];

    $loads = $viewRequests->getUserInfo2($id);
    $result = $viewRequests->showProfile($id);
    $results = $viewRequests->showItem($number);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.1/dist/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Provider Profile</title>
</head>

<body>
    <nav class="bg-white border-gray-200 dark:bg-blue-900 dark:border-gray-700">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Flowbite</span>
            </a>
            <button data-collapse-toggle="navbar-dropdown" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-dropdown" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
            <div class="hidden w-full md:block md:w-auto" id="navbar-dropdown">
                <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-blue-900 md:dark:bg-blue-900 dark:border-gray-700">
                    <li>
                        <a href="requests.php" class="relative inline-flex items-center p-3 text-sm font-medium text-center text-white">
                            <span class="">Registrations</span>
                            <?php if ($req['req'] > 0) : ?>
                                <div class="absolute inline-flex items-center justify-center w-6 h-6 text-xs font-bold text-white bg-red-500 border-2 border-white rounded-full -top-2 -end-2 dark:border-gray-900"><?php echo $req['req'] ?></div>
                            <?php endif; ?>
                        </a>
                    </li>
                    <li>
                        <a href="properties.php" class="relative inline-flex items-center p-3 text-sm font-medium text-center text-white">
                            <span class="">Properties</span>
                            <?php if ($prop['req'] > 0) : ?>
                                <div class="absolute inline-flex items-center justify-center w-6 h-6 text-xs font-bold text-white bg-red-500 border-2 border-white rounded-full -top-2 -end-2 dark:border-gray-900"><?php echo $prop['req'] ?></div>
                            <?php endif; ?>
                        </a>
                    </li>
                    <li>

                        <button type="button" id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="relative inline-flex items-center p-3 text-sm font-medium text-center text-white">
                            <span class="">Options</span>
                            <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>
                        </button>
                        <!-- Dropdown menu -->
                        <div id="dropdownNavbar" class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44 dark:bg-blue-700 dark:divide-gray-600">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
                                <li>
                                    <a href="home.php" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                                </li>
                                <li>
                                    <a href="settings.php" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Change password</a>
                                </li>
                            </ul>
                            <div class="py-1">
                                <a href="#" class="block px-4 py-2 text-sm text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-600 dark:hover:text-white">Sign out</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="bg-white">
        <div class=" px-4 mx-auto max-w-screen-xl ">
            <div class="mx-auto max-w-screen-sm text-center">
                <section class="bg-white">
                    <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
                        <div class="mx-auto max-w-screen-sm text-center">
                            <h1 class="mb-4 text-7xl tracking-tight font-extrabold lg:text-9xl text-primary-600 ">
                                <center>
                                    <img src="../../uploads/<?php echo $loads['u_profile'] ?>" style="width: 20%; border-radius: 50%; aspect-ratio: 2/2" alt="Flowbite Logo">
                                </center>
                            </h1>
                            <p class="mb-4 text-3xl tracking-tight font-bold text-gray-900 md:text-4xl"><?= htmlspecialchars($results['p_name'] ?? 'N/A'); ?></p>
                            <p class="mb-4 text-lg font-light text-gray-500 dark:text-gray-400">
                                <i class="fa-solid fa-location-dot text-red-500"></i> <a href="<?= htmlspecialchars($results['p_link']); ?>"><?= htmlspecialchars($results['p_address'] ?? 'N/A'); ?></a>
                            </p>
                            <p class="mb-4 text-lg font-light text-gray-500 dark:text-gray-400">
                                <i class="fa-solid fa-phone"></i> <a href="<?= htmlspecialchars($results['p_link']); ?>"><?= htmlspecialchars($results['pi_contact'] ?? 'N/A'); ?></a>
                            </p>
                            <p class="mb-4 text-lg font-bold">
                                <a href="#" class="click_deactivate text-red-500" data-pid="<?= htmlspecialchars($results['p_id']); ?>" data-uid="<?= htmlspecialchars($results['u_id']); ?>">
                                    Deactivate
                                </a>
                                <a href="#" class="click_activate text-green-500" data-pid="<?= htmlspecialchars($results['p_id']); ?>" data-uid="<?= htmlspecialchars($results['u_id']); ?>">
                                    Activate
                                </a>
                            </p>
                        </div>
                    </div>
                </section>
            </div>

            <div class="mb-4 grid gap-4 sm:grid-cols-2 md:mb-8 lg:grid-cols-3 xl:grid-cols-4">

                <?php if (!empty($result)) : ?>
                    <?php foreach ($result as $rows) : ?>
                        <?php
                        $images = json_decode($rows['p_img'], true);
                        $firstImage = (!empty($images) && is_array($images)) ? htmlspecialchars($images[0], ENT_QUOTES, 'UTF-8') : 'default.jpg';
                        ?>
                        <div class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700">
                            <div class="h-56 w-full">
                                <a href="rooms.php?user=<?= $rows['p_id'] ?>">
                                    <img class="mx-auto h-full " src="../../uploads/<?php echo $firstImage; ?>" alt="Property Image" />
                                </a>
                            </div>
                            <div class="pt-6">
                                <a hhref="rooms.php?user=<?= $rows['p_id'] ?>" class="text-lg font-semibold leading-tight text-gray-900 hover:underline "><?php echo $rows['p_name'] ?></a>

                                <ul class="mt-2 flex items-center gap-4">
                                    <li class="flex items-center gap-2">
                                        <p class="text-sm font-medium">
                                            <?= $rows['pi_block'] . " " . $rows['pi_brgy'] . ", " . $rows['pi_street'] . ", " . $rows['pi_city'] ?>
                                        </p>
                                    </li>
                                </ul>

                                <div class="mt-4 flex items-center justify-between gap-4">
                                    <p class="text-2xl font-extrabold leading-tight">₱<?php echo number_format($rows['p_price']) ?></p>

                                    <button type="button" class="inline-flex items-center rounded-lg bg-blue-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4  focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        <a href="rooms.php?user=<?= $rows['p_id'] ?>">
                                            View rooms
                                        </a>
                                    </button>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <p class="text-center text-red-500">No data found.</p>
                <?php endif; ?>

            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.1/dist/flowbite.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        $(document).on('click', '.click_activate', function(e) {
            e.preventDefault();

            const pid = $(this).data('pid');
            const uid = $(this).data('uid');

            $.ajax({
                url: '../../database/admin-auth.php',
                type: 'post',
                data: {
                    'activate': true,
                    'uid': uid
                },
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        Command: toastr["success"](response.success)
                    }
                    else {
                        Command: toastr["error"](response.error)
                    }
                },
                error: function(xhr) {
                    console.error(xhr.responseText);
                    alert('Error: getting data');
                }
            });
        });

        $(document).on('click', '.click_deactivate', function(e) {
            e.preventDefault();

            const pid = $(this).data('pid');
            const uid = $(this).data('uid');

            $.ajax({
                url: '../../database/admin-auth.php',
                type: 'post',
                data: {
                    'deactivate': true,
                    'uid': uid
                },
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        Command: toastr["success"](response.success)
                    }
                    else {
                        Command: toastr["error"](response.error)
                    }
                },
                error: function(xhr) {
                    console.error(xhr.responseText);
                    alert('Error: getting data');
                }
            });
        });

        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-bottom-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "show",
            "hideMethod": "fadeOut"
        }
    </script>
</body>

</html>