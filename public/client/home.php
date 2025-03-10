<?php
session_start();

$_SESSION['u_id'];

include('../../database/check.php');
include('add.php');
require_once('../../Classes/Admin.php');
$show = new Admin();
$showall = $show->showProvidersPage(3, 0);


foreach ($data as $datas) {
    $res = $datas['p_status'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/user.css">
    <link rel="stylesheet" href="../../pages/style.css">
    <title>Home</title>
</head>

<body class="">

    <!-- Main modal -->
    <div id="change-password" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow-sm">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-700">
                        Change password
                    </h3>
                    <button type="button" class="text-gray-700 bg-transparent rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="change-password">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4">
                    <form>
                        <input value="<?php echo $_SESSION['u_email'] ?>" type="hidden" id="email" />
                        <div class="mb-6">
                            <label for="npass" class="block mb-2 text-sm font-medium text-gray-900 ">Password</label>
                            <input type="password" id="npass" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="•••••••••" required />
                        </div>
                        <div class="mb-6">
                            <label for="rpass" class="block mb-2 text-sm font-medium text-gray-900 ">Confirm password</label>
                            <input type="password" id="rpass" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="•••••••••" required />
                        </div>
                    </form>

                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button type="submit" id="update_pass" data-id="<?php echo $_SESSION['u_id'] ?? null ?>" class="update_pass text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                </div>
            </div>
        </div>
    </div>

    <nav class="bg-white border-gray-200 custom-nav-bg sticky top-0 z-50">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="home.php" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="logo.png" class="h-12" alt="Flowbite Logo" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap text-white">Accommodation Locator</span>
            </a>
            <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                <button type="button" class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                    <span class="sr-only">Open user menu</span>
                    <img class="w-8 h-8 rounded-full" src="../../uploads/<?php echo htmlspecialchars($loads['u_profile']) ?>" alt="user photo">
                </button>

                <!-- Dropdown menu -->
                <div class="z-40 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow-sm " id="user-dropdown">
                    <div class="px-4 py-3">
                        <span class="block text-sm text-gray-900 "><?php echo htmlspecialchars($_SESSION['u_email']) ?></span>
                        <span class="block text-sm text-gray-500 truncate"></span>
                    </div>
                    <ul class="py-2" aria-labelledby="user-menu-button">
                        <li>
                            <a href="profile.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">My profile</a>
                        </li>
                        <li>
                            <a data-modal-target="change-password" data-modal-toggle="change-password" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Change password</a>
                        </li>
                        <li>
                            <a href="logout.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Sign out</a>
                        </li>
                    </ul>
                </div>

                <button data-collapse-toggle="navbar-user" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-user" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
            </div>
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
                <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0">
                    <li>
                        <a href="home.php" class="block py-2 px-3 text-white bg-blue-700 rounded-sm md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500" aria-current="page">Home</a>
                    </li>
                    <li>
                        <a href="about.php" class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">About</a>
                    </li>
                    <li>
                        <a href="service.php" class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Services</a>
                    </li>
                    <li>
                        <a href="contact.php" class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="w-full py-8 antialiased md:py-12">
        <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
            <div class="mb-4 items-end justify-between space-y-4 sm:flex sm:space-y-0 md:mb-8">
                <div class="flex items-center space-x-4">
                    <button data-modal-toggle="filterModal" data-modal-target="filterModal" type="button" class="custom-nav-bg flex w-full items-center justify-center rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-white sm:w-auto">
                        <svg class="-ms-0.5 me-2 h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M18.796 4H5.204a1 1 0 0 0-.753 1.659l5.302 6.058a1 1 0 0 1 .247.659v4.874a.5.5 0 0 0 .2.4l3 2.25a.5.5 0 0 0 .8-.4v-7.124a1 1 0 0 1 .247-.659l5.302-6.059c.566-.646.106-1.658-.753-1.658Z" />
                        </svg>
                        Filters
                        <svg class="-me-0.5 ms-2 h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7" />
                        </svg>
                    </button>

                    <button id="sortDropdownButton1" data-dropdown-toggle="dropdownSort1" type="button" class="custom-nav-bg flex w-full items-center justify-center rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-white sm:w-auto">
                        <svg class="-ms-0.5 me-2 h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4v16M7 4l3 3M7 4 4 7m9-3h6l-6 6h6m-6.5 10 3.5-7 3.5 7M14 18h4" />
                        </svg>
                        Sort
                        <svg class="-me-0.5 ms-2 h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7" />
                        </svg>
                    </button>

                    <div id="dropdownSort1" class="z-10 hidden w-40 divide-y divide-gray-100 rounded-lg bg-white shadow dark:bg-gray-700" data-popper-placement="bottom">
                        <ul class="p-2 text-left text-sm font-medium text-gray-500 " aria-labelledby="sortDropdownButton">
                            <li>
                                <a href="#hs" class="group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-white 
                                dark:hover:text-white">
                                    Hotels
                                </a>
                            </li>
                            <li>
                                <a href="#bh" class="group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-white  dark:hover:bg-gray-600 dark:hover:text-white">
                                    Boarding House
                                </a>
                            </li>
                            <li>
                                <a href="#lh" class="group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-white  dark:hover:bg-gray-600 dark:hover:text-white">
                                    Lodging House
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <?php
            $grouped = [
                'hs' => [],
                'lh' => [],
                'bh' => []
            ];

            if (!empty($showall)) {
                foreach ($showall as $row) {
                    $grouped[$row['p_type']][] = $row;
                }
            }

            function displayProperties($properties, $title, $type)
            {
                if (empty($properties)) return; ?>
                <section class="color-white" id="<?= htmlspecialchars($type) ?>">
                    <div class="mx-auto max-w-screen-xl px-4">
                        <h2 class="mb-8 text-3xl font-extrabold tracking-tight leading-tight text-center text-black md:text-4xl"><?= htmlspecialchars($title) ?></h2>
                    </div>
                </section>
                <div id="properties-container" class="p-3 mb-1 grid gap-4 sm:grid-cols-2 md:mb-8 lg:grid-cols-3 xl:grid-cols-4">
                    <?php foreach ($properties as $row):
                        $images = json_decode($row['p_img'], true);
                        $firstImage = (!empty($images) && is_array($images)) ? htmlspecialchars($images[0], ENT_QUOTES, 'UTF-8') : 'default.jpg'; ?>

                        <div class="card-custom rounded-lg border border-gray-200 p-6 shadow-sm dark:border-gray-700">
                            <div class="h-56 w-full">
                                <a href="client.view.php?number=<?= htmlspecialchars($row['p_id']) ?> && name=<?= htmlspecialchars($row['p_name']) ?>">
                                    <img class="mx-auto h-full" src="../../uploads/<?php echo $firstImage; ?>" alt="Property Image" />
                                </a>
                            </div>
                            <div class="pt-6">
                                <a href="client.view.php?number=<?= htmlspecialchars($row['p_id']) ?> && name=<?= htmlspecialchars($row['p_name']) ?>" class="text-lg font-semibold leading-tight text-gray-700 hover:underline">
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
                                        <a href="client.view.php?number=<?= htmlspecialchars($row['p_id']) ?> && name=<?= htmlspecialchars($row['p_name']) ?>">
                                            View in details
                                        </a>
                                    </button>
                                </div>
                            </div>
                        </div>

                    <?php endforeach; ?>
                </div>
                <div class="w-full text-center">
                    <button id="show-more-btn" data-offset="3">
                        <span class="text-white">Show More</span>
                    </button>
                </div>
            <?php } ?>

            <?php
            displayProperties($grouped['bh'], "Boarding Houses", "bh");
            displayProperties($grouped['lh'], "Lodging Houses", "lh");
            displayProperties($grouped['hs'], "Hotels", "hs");
            ?>
        </div>

        <!-- Filter modal -->
        <form method="get" id="filterModal" tabindex="-1" aria-hidden="true" class="fixed left-0 right-0 top-0 z-50 hidden h-modal w-full overflow-y-auto overflow-x-hidden p-4 md:inset-0 md:h-full">
            <div class="relative h-full w-full max-w-xl md:h-auto">
                <!-- Modal content -->
                <div class="relative rounded-lg shadow dark:bg-gray-800">
                    <!-- Modal header -->
                    <div class="flex items-start justify-between rounded-t p-4 md:p-5">
                        <h3 class="text-lg font-normal text-gray-500 dark:text-gray-400">Filters</h3>
                        <button type="button" class="ml-auto inline-flex items-center rounded-lg bg-transparent p-1.5 text-sm text-gray-400 hover:bg-gray-100 hover:text-white dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="filterModal">
                            <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="px-4 md:px-5">
                        <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
                            <ul class="-mb-px flex flex-wrap text-center text-sm font-medium" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
                                <li class="mr-1" role="presentation">
                                    <button class="inline-block pb-2 pr-1" id="brand-tab" data-tabs-target="#brand" type="button" role="tab" aria-controls="profile" aria-selected="false">Brand</button>
                                </li>
                                <li class="mr-1" role="presentation">
                                    <button class="inline-block px-2 pb-2 hover:border-gray-300 hover:text-gray-600 dark:hover:text-gray-300" id="advanced-filers-tab" data-tabs-target="#advanced-filters" type="button" role="tab" aria-controls="advanced-filters" aria-selected="false">Advanced Filters</button>
                                </li>
                            </ul>
                        </div>
                        <div id="myTabContent">
                            <div class="grid grid-cols-2 gap-4 md:grid-cols-3" id="brand" role="tabpanel" aria-labelledby="brand-tab">
                                <div class="space-y-2">
                                    <h5 class="text-lg font-medium text-white">Accomodation type</h5>

                                    <div class="flex items-center">
                                        <input id="apple" type="checkbox" value="Boarding Houses" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />

                                        <label for="apple" class="ml-2 text-sm font-medium text-white dark:text-gray-300">
                                            Boarding Houses
                                        </label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="asus" type="checkbox" value="hs" class="checkbox h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />

                                        <label for="asus" class="ml-2 text-sm font-medium text-white dark:text-gray-300">
                                            Hotels
                                        </label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="acer" type="checkbox" value="Lodging Houses" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />

                                        <label for="acer" class="ml-2 text-sm font-medium text-white dark:text-gray-300">
                                            Lodging Houses
                                        </label>
                                    </div>
                                </div>

                                <div class="space-y-2">
                                    <h5 class="text-lg font-medium text-white">Near</h5>

                                    <div class="flex items-center">
                                        <input id="beats" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />

                                        <label for="beats" class="ml-2 text-sm font-medium text-white dark:text-gray-300">NORSU Campus 1</label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="bose" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />

                                        <label for="bose" class="ml-2 text-sm font-medium text-white dark:text-gray-300">Norsu Campus 2</label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="benq" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />

                                        <label for="benq" class="ml-2 text-sm font-medium text-white dark:text-gray-300">Bais City Science High School</label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="bosch" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />

                                        <label for="bosch" class="ml-2 text-sm font-medium text-white dark:text-gray-300">Bais City High School</label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="brother" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />

                                        <label for="brother" class="ml-2 text-sm font-medium text-white dark:text-gray-300">LCC</label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="biostar" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />

                                        <label for="biostar" class="ml-2 text-sm font-medium text-white dark:text-gray-300">Centre of Bais</label>
                                    </div>
                                </div>

                                <div class="space-y-2">
                                    <h5 class="text-lg font-medium text-white">Boarding house amenities</h5>

                                    <div class="flex items-center">
                                        <input id="canon" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />

                                        <label for="canon" class="ml-2 text-sm font-medium text-white dark:text-gray-300">Private room</label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="cisco" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />

                                        <label for="cisco" class="ml-2 text-sm font-medium text-white dark:text-gray-300">
                                            Shared room
                                        </label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="cowon" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />

                                        <label for="cowon" class="ml-2 text-sm font-medium text-white dark:text-gray-300"> Wifi</label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="clevo" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />

                                        <label for="clevo" class="ml-2 text-sm font-medium text-white dark:text-gray-300"> Bathroom</label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="corsair" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />

                                        <label for="corsair" class="ml-2 text-sm font-medium text-white dark:text-gray-300"> Laundry area</label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="csl" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />

                                        <label for="csl" class="ml-2 text-sm font-medium text-white dark:text-gray-300">Kitchen</label>
                                    </div>
                                </div>

                                <div class="space-y-2">
                                    <h5 class="text-lg font-medium text-white">Hotels ammenities</h5>

                                    <div class="flex items-center">
                                        <input id="dell" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />

                                        <label for="dell" class="ml-2 text-sm font-medium text-white dark:text-gray-300">Wifi</label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="dogfish" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />

                                        <label for="dogfish" class="ml-2 text-sm font-medium text-white dark:text-gray-300"> Air conditioned</label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="dyson" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />

                                        <label for="dyson" class="ml-2 text-sm font-medium text-white dark:text-gray-300">
                                            Swimming pool
                                        </label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="dobe" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />

                                        <label for="dobe" class="ml-2 text-sm font-medium text-white dark:text-gray-300">
                                            Parking
                                        </label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="digitus" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />

                                        <label for="digitus" class="ml-2 text-sm font-medium text-white dark:text-gray-300"> Complimentary breakfast</label>
                                    </div>
                                </div>

                                <div class="space-y-2">
                                    <h5 class="text-lg font-medium text-white">Lodging House Amenities</h5>

                                    <div class="flex items-center">
                                        <input id="emetec" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />

                                        <label for="emetec" class="ml-2 text-sm font-medium text-white dark:text-gray-300">
                                            Wifi
                                        </label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="extreme" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />

                                        <label for="extreme" class="ml-2 text-sm font-medium text-white dark:text-gray-300">
                                            Air conditioned
                                        </label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="elgato" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />

                                        <label for="elgato" class="ml-2 text-sm font-medium text-white dark:text-gray-300">
                                            Bathroom
                                        </label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="emerson" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />

                                        <label for="emerson" class="ml-2 text-sm font-medium text-white dark:text-gray-300"> Kitchen</label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="emi" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />

                                        <label for="emi" class="ml-2 text-sm font-medium text-white dark:text-gray-300">
                                            Parking
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-4" id="advanced-filters" role="tabpanel" aria-labelledby="advanced-filters-tab">
                            <div class="grid grid-cols-1 gap-8 md:grid-cols-2">
                                <div class="grid grid-cols-2 gap-3">
                                    <div>
                                        <label for="min-price" class="block text-sm font-medium text-white"> Min Price </label>
                                        <input id="min-price" type="range" min="0" max="7000" value="300" step="1" class="h-2 w-full cursor-pointer appearance-none rounded-lg bg-gray-200 dark:bg-gray-700" />
                                    </div>

                                    <div>
                                        <label for="max-price" class="block text-sm font-medium text-white"> Max Price </label>
                                        <input id="max-price" type="range" min="0" max="7000" value="3500" step="1" class="h-2 w-full cursor-pointer appearance-none rounded-lg bg-gray-200 dark:bg-gray-700" />
                                    </div>

                                    <div class="col-span-2 flex items-center justify-between space-x-2">
                                        <input type="number" id="min-price-input" value="300" min="0" max="7000" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-white focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500 " placeholder="" required />

                                        <div class="shrink-0 text-sm font-medium dark:text-gray-300">to</div>

                                        <input type="number" id="max-price-input" value="3500" min="0" max="7000" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-white focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500" placeholder="" required />
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="flex items-center space-x-4 rounded-b p-4 dark:border-gray-600 md:p-5">
                        <button id="show-results-btn" type="submit" class="rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-700 dark:hover:bg-blue-800 dark:focus:ring-blue-800">Show 0 results</button>
                        <button type="reset" class="rounded-lg border border-gray-200 px-5 py-2.5 text-sm font-medium text-white hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700">Reset</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <footer class="bg-white dark:bg-gray-900">
        <div class="mx-auto w-full max-w-screen-xl p-4 py-6 lg:py-8">
            <div class="md:flex md:justify-between">
                <div class="mb-6 md:mb-0">
                    <a href="https://flowbite.com/" class="flex items-center">
                        <img src="logo.png" class="h-8 me-3" alt="FlowBite Logo" />
                        <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Accommodation Locator</span>
                    </a>
                </div>
                <div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-3">
                    <div>
                        <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Resources</h2>
                        <ul class="text-gray-500 dark:text-gray-400 font-medium">
                            <li class="mb-4">
                                <a href="https://flowbite.com/" class="hover:underline">Flowbite</a>
                            </li>
                            <li>
                                <a href="https://tailwindcss.com/" class="hover:underline">Tailwind CSS</a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Follow us</h2>
                        <ul class="text-gray-500 dark:text-gray-400 font-medium">
                            <li class="mb-4">
                                <a href="https://github.com/themesberg/flowbite" class="hover:underline ">Github</a>
                            </li>
                            <li>
                                <a href="https://discord.gg/4eeurUVvTy" class="hover:underline">Discord</a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Legal</h2>
                        <ul class="text-gray-500 dark:text-gray-400 font-medium">
                            <li class="mb-4">
                                <a href="privacy.php" class="hover:underline">Privacy Policy</a>
                            </li>
                            <li>
                                <a href="condition.php" class="hover:underline">Terms &amp; Conditions</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
            <div class="sm:flex sm:items-center sm:justify-between">
                <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2023 <a href="home.php" class="hover:underline">ACLS</a>. All Rights Reserved.
                </span>
                <div class="flex mt-4 sm:justify-center sm:mt-0">
                    <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 8 19">
                            <path fill-rule="evenodd" d="M6.135 3H8V0H6.135a4.147 4.147 0 0 0-4.142 4.142V6H0v3h2v9.938h3V9h2.021l.592-3H5V3.591A.6.6 0 0 1 5.592 3h.543Z" clip-rule="evenodd" />
                        </svg>
                        <span class="sr-only">Facebook page</span>
                    </a>
                    <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white ms-5">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 21 16">
                            <path d="M16.942 1.556a16.3 16.3 0 0 0-4.126-1.3 12.04 12.04 0 0 0-.529 1.1 15.175 15.175 0 0 0-4.573 0 11.585 11.585 0 0 0-.535-1.1 16.274 16.274 0 0 0-4.129 1.3A17.392 17.392 0 0 0 .182 13.218a15.785 15.785 0 0 0 4.963 2.521c.41-.564.773-1.16 1.084-1.785a10.63 10.63 0 0 1-1.706-.83c.143-.106.283-.217.418-.33a11.664 11.664 0 0 0 10.118 0c.137.113.277.224.418.33-.544.328-1.116.606-1.71.832a12.52 12.52 0 0 0 1.084 1.785 16.46 16.46 0 0 0 5.064-2.595 17.286 17.286 0 0 0-2.973-11.59ZM6.678 10.813a1.941 1.941 0 0 1-1.8-2.045 1.93 1.93 0 0 1 1.8-2.047 1.919 1.919 0 0 1 1.8 2.047 1.93 1.93 0 0 1-1.8 2.045Zm6.644 0a1.94 1.94 0 0 1-1.8-2.045 1.93 1.93 0 0 1 1.8-2.047 1.918 1.918 0 0 1 1.8 2.047 1.93 1.93 0 0 1-1.8 2.045Z" />
                        </svg>
                        <span class="sr-only">Discord community</span>
                    </a>
                    <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white ms-5">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 17">
                            <path fill-rule="evenodd" d="M20 1.892a8.178 8.178 0 0 1-2.355.635 4.074 4.074 0 0 0 1.8-2.235 8.344 8.344 0 0 1-2.605.98A4.13 4.13 0 0 0 13.85 0a4.068 4.068 0 0 0-4.1 4.038 4 4 0 0 0 .105.919A11.705 11.705 0 0 1 1.4.734a4.006 4.006 0 0 0 1.268 5.392 4.165 4.165 0 0 1-1.859-.5v.05A4.057 4.057 0 0 0 4.1 9.635a4.19 4.19 0 0 1-1.856.07 4.108 4.108 0 0 0 3.831 2.807A8.36 8.36 0 0 1 0 14.184 11.732 11.732 0 0 0 6.291 16 11.502 11.502 0 0 0 17.964 4.5c0-.177 0-.35-.012-.523A8.143 8.143 0 0 0 20 1.892Z" clip-rule="evenodd" />
                        </svg>
                        <span class="sr-only">Twitter page</span>
                    </a>
                    <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white ms-5">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 .333A9.911 9.911 0 0 0 6.866 19.65c.5.092.678-.215.678-.477 0-.237-.01-1.017-.014-1.845-2.757.6-3.338-1.169-3.338-1.169a2.627 2.627 0 0 0-1.1-1.451c-.9-.615.07-.6.07-.6a2.084 2.084 0 0 1 1.518 1.021 2.11 2.11 0 0 0 2.884.823c.044-.503.268-.973.63-1.325-2.2-.25-4.516-1.1-4.516-4.9A3.832 3.832 0 0 1 4.7 7.068a3.56 3.56 0 0 1 .095-2.623s.832-.266 2.726 1.016a9.409 9.409 0 0 1 4.962 0c1.89-1.282 2.717-1.016 2.717-1.016.366.83.402 1.768.1 2.623a3.827 3.827 0 0 1 1.02 2.659c0 3.807-2.319 4.644-4.525 4.889a2.366 2.366 0 0 1 .673 1.834c0 1.326-.012 2.394-.012 2.72 0 .263.18.572.681.475A9.911 9.911 0 0 0 10 .333Z" clip-rule="evenodd" />
                        </svg>
                        <span class="sr-only">GitHub account</span>
                    </a>
                    <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white ms-5">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 0a10 10 0 1 0 10 10A10.009 10.009 0 0 0 10 0Zm6.613 4.614a8.523 8.523 0 0 1 1.93 5.32 20.094 20.094 0 0 0-5.949-.274c-.059-.149-.122-.292-.184-.441a23.879 23.879 0 0 0-.566-1.239 11.41 11.41 0 0 0 4.769-3.366ZM8 1.707a8.821 8.821 0 0 1 2-.238 8.5 8.5 0 0 1 5.664 2.152 9.608 9.608 0 0 1-4.476 3.087A45.758 45.758 0 0 0 8 1.707ZM1.642 8.262a8.57 8.57 0 0 1 4.73-5.981A53.998 53.998 0 0 1 9.54 7.222a32.078 32.078 0 0 1-7.9 1.04h.002Zm2.01 7.46a8.51 8.51 0 0 1-2.2-5.707v-.262a31.64 31.64 0 0 0 8.777-1.219c.243.477.477.964.692 1.449-.114.032-.227.067-.336.1a13.569 13.569 0 0 0-6.942 5.636l.009.003ZM10 18.556a8.508 8.508 0 0 1-5.243-1.8 11.717 11.717 0 0 1 6.7-5.332.509.509 0 0 1 .055-.02 35.65 35.65 0 0 1 1.819 6.476 8.476 8.476 0 0 1-3.331.676Zm4.772-1.462A37.232 37.232 0 0 0 13.113 11a12.513 12.513 0 0 1 5.321.364 8.56 8.56 0 0 1-3.66 5.73h-.002Z" clip-rule="evenodd" />
                        </svg>
                        <span class="sr-only">Dribbble account</span>
                    </a>
                </div>
            </div>
        </div>
    </footer>

</body>

<script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.1/dist/flowbite.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {

        $("#show-more-btn").click(function() {
            let button = $(this);
            let offset = parseInt(button.data("offset"));

            $.ajax({
                url: "../../database/fetch_more_results.php",
                type: "GET",
                data: {
                    offset: offset
                },
                success: function(data) {
                    if (data.trim() === "") {
                        button.prop("disabled", true).text("No more properties to show");
                    } else {
                        $("#properties-container").append(data);
                        button.data("offset", offset + 6);
                    }
                },
                error: function(xhr, status, error) {
                    console.error("AJAX Error:", status, error);
                },
            });
        });

        $("#location-search").on("input", function() {
            let query = $(this).val();
            if (query.length > 0) {
                $.ajax({
                    url: "../../database/search_loc.php",
                    method: "POST",
                    data: {
                        query: query
                    },
                    success: function(data) {
                        $("#suggestions").html(data).show();
                    }
                });
            } else {
                $("#suggestions").hide();
            }
        });

        $(".search-btn").click(function() {
            let location = $("#location-search").val().trim();

            if (location.length > 0) {
                window.location.href = "results.php?location=" + encodeURIComponent(location);
            } else {
                alert("Please enter a location before searching.");
            }
        });

        $(document).on("click", ".suggestion-item", function() {
            $("#location-search").val($(this).text());
            $("#suggestions").hide();
        });

        $(document).click(function(e) {
            if (!$(e.target).closest("#location-search, #suggestions").length) {
                $("#suggestions").hide();
            }
        });

        $('.log-in').on('click', function(e) {
            e.preventDefault();

            const email = $('#email').val();
            const password = $('#password').val();

            $.ajax({
                url: '../../database/login.php',
                method: 'POST',
                data: {
                    'login-user': true,
                    email: email,
                    password: password
                },
                dataType: 'json',
                success: function(response) {
                    if (response.redirect) {
                        window.location.href = response.redirect;
                    } else {
                        Swal.fire({
                            title: response.error,
                            icon: "error",
                            confirmButtonText: "OK"
                        })
                    }
                },
                error: function(xhr, status, error) {
                    Swal.fire({
                        title: "Error submitting the form: " + xhr.responseText,
                        icon: "error",
                        confirmButtonText: "OK"
                    })
                }
            })
        })


        let selectedFilters = [];

        $("input[type='checkbox']").change(function() {
            selectedFilters = $("input[type='checkbox']:checked")
                .map(function() {
                    return $(this).next("label").text().trim();
                })
                .get();

            console.log(selectedFilters);

            updateResultsCount(selectedFilters);
        });


        function updateResultsCount(filters) {
            console.log("Sending filters to server:", filters);
            $.ajax({
                url: "../../database/fetch-results-count.php",
                type: "POST",
                data: {
                    filters: filters
                },
                dataType: "json",
                success: function(response) {
                    console.log("AJAX Success:", response);
                    if (response.count !== undefined) {
                        $("#show-results-btn").text(`Show ${response.count} results`);
                    } else {
                        console.warn("Response does not contain 'count' property:", response);
                    }
                },
                error: function(xhr, status, error) {
                    console.error("AJAX Error:", status, error);
                    console.error("Response Text:", xhr.responseText);
                },
            });
        }

        function fetchResults() {
            let minPrice = $("#min-price-input").val();
            let maxPrice = $("#max-price-input").val();

            $.ajax({
                url: "../../database/fetch-price.php",
                type: "POST",
                data: {
                    min_price: minPrice,
                    max_price: maxPrice
                },
                dataType: "json",
                success: function(response) {
                    console.log("AJAX Success:", response);
                    if (response.count !== undefined) {
                        $("#show-results-btn").text(`Show ${response.count} results`);
                    }
                },
                error: function(xhr, status, error) {
                    console.error("AJAX Error:", xhr.responseText);
                }
            });

        }

        $("#min-price, #max-price").on("input", function() {
            $("#min-price-input").val($("#min-price").val());
            $("#max-price-input").val($("#max-price").val());
            fetchResults();
        });

        $("#min-price-input, #max-price-input").on("input", function() {
            $("#min-price").val($("#min-price-input").val());
            $("#max-price").val($("#max-price-input").val());
            fetchResults();
        });

        fetchResults();

        $("#show-results-btn").click(function(e) {
            e.preventDefault();

            let selectedFilters = $("input[type='checkbox']:checked")
                .map(function() {
                    return $(this).next("label").text().trim();
                })
                .get();

            let minPrice = $("#min-price-input").val();
            let maxPrice = $("#max-price-input").val();

            let queryString = `min_price=${encodeURIComponent(minPrice)}&max_price=${encodeURIComponent(maxPrice)}`;

            if (selectedFilters.length > 0) {
                queryString += `&filters=${encodeURIComponent(selectedFilters.join(","))}`;
            }

            window.location.href = "results.php?" + queryString;
        });


    });
</script>

</html>