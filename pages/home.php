<?php
include('../Classes/Admin.php');
$show = new Admin();
$result = $show->showProvidersPage(3, 0);

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

<body class="page-body h-full">
    <!-- Log in modal -->
    <div id="authentication-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative rounded-lg shadow-sm dark:bg-gray-700 card-custom">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Sign in to our platform
                    </h3>
                    <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="authentication-modal">
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
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="youremail@gmail.com" required />
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
                        </div>
                        <div class="flex justify-between">
                            <a href="forgot-password.php" class="text-sm text-blue-700 hover:underline dark:text-blue-500">Lost Password?</a>
                        </div>
                        <button type="submit" class="log-in w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login to your account</button>
                        <div class="text-sm font-medium text-gray-500 dark:text-gray-300">
                            Not registered? <a href="signup.php" class="text-blue-700 hover:underline dark:text-blue-500">Create account</a>
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
                <span class="logotext self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Acommodation Locator</span>
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
                        <a href="about.php" class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">About</a>
                    </li>
                    <li>
                        <a href="service.php" class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Services</a>
                    </li>
                    <li>
                        <a href="contact.php" class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div id="animation-carousel" class="relative w-full" data-carousel="static">
        <div class="relative h-56 overflow-hidden rounded-lg md:h-96" style="z-index: 0;">
            <div class="hidden duration-200 ease-linear" data-carousel-item>
                <img src="bg.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
        </div>

        <form class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-full max-w-md p-4 rounded-lg " style="z-index: 1;">
            <label for="location-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <i class="fa-solid fa-location-dot"></i>
                </div>
                <input type="search" id="location-search" class="block w-full p-4 ps-10 text-sm border border-gray-300 rounded-full focus:ring-blue-500 focus:border-blue-500 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Location" required autocomplete="off" />
                <button type="submit" class="search-btn text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                <div id="suggestions" class="absolute w-full border border-gray-300 shadow-md mt-1 hidden"></div>
            </div>
        </form>
    </div>

    <div class="w-full h-full py-8 antialiased md:py-12">
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

                    <div id="dropdownSort1" class="z-50 hidden w-40 divide-y divide-gray-100 rounded-lg bg-white shadow dark:bg-gray-700" data-popper-placement="bottom">
                        <ul class="p-2 text-left text-sm font-medium text-gray-500 dark:text-gray-400" aria-labelledby="sortDropdownButton">
                            <li>
                                <a href="#hs" class="group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                                    Hotels
                                </a>
                            </li>
                            <li>
                                <a href="#bh" class="group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                                    Boarding House
                                </a>
                            </li>
                            <li>
                                <a href="#lh" class="group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
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

            if (!empty($result)) {
                foreach ($result as $row) {
                    $grouped[$row['p_type']][] = $row;
                }
            }

            function displayProperties($properties, $title, $type)
            {
                if (empty($properties)) return; ?>
                <section class="color-white" id="<?= htmlspecialchars($type) ?>">
                    <div class="mx-auto max-w-screen-xl px-4">
                        <h2 class="mb-8 text-3xl font-extrabold tracking-tight leading-tight text-center text-gray-900 md:text-4xl"><?= htmlspecialchars($title) ?></h2>
                    </div>
                </section>
                <div id="properties-container" class="mb-4 grid gap-4 sm:grid-cols-2 md:mb-8 lg:grid-cols-3 xl:grid-cols-4">
                    <?php foreach ($properties as $row):
                        $images = json_decode($row['p_img'], true);
                        $firstImage = (!empty($images) && is_array($images)) ? htmlspecialchars($images[0], ENT_QUOTES, 'UTF-8') : 'default.jpg'; ?>

                        <div class="card-custom rounded-lg border border-gray-200 p-6 shadow-sm dark:border-gray-700">
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
                <div class="w-full text-center">
                    <button id="show-more-btn" data-offset="3">
                        <span class="text-white">Show More</span>
                    </button>
                </div>
            <?php } ?>

            <?php
            displayProperties($grouped['bh'], "Boarding Houses", "bh");
            displayProperties($grouped['lh'], "Lodging Houses", "lh");
            displayProperties($grouped['hs'], "Home Stays", "hs");
            ?>
        </div>

        <!-- Filter modal -->
        <form method="get" id="filterModal" tabindex="-1" aria-hidden="true" class="card-custom fixed left-0 right-0 top-0 z-50 hidden h-modal w-full overflow-y-auto overflow-x-hidden p-4 md:inset-0 md:h-full">
            <div class="relative h-full w-full max-w-xl md:h-auto">
                <!-- Modal content -->
                <div class="relative rounded-lg shadow dark:bg-gray-800">
                    <!-- Modal header -->
                    <div class="flex items-start justify-between rounded-t p-4 md:p-5">
                        <h3 class="text-lg font-normal text-gray-500 dark:text-gray-400">Filters</h3>
                        <button type="button" class="ml-auto inline-flex items-center rounded-lg bg-transparent p-1.5 text-sm text-gray-400 hover:bg-gray-100 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="filterModal">
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
                                    <h5 class="text-lg font-medium text-black dark:text-white">Accomodation type</h5>

                                    <div class="flex items-center">
                                        <input id="apple" type="checkbox" value="Boarding Houses" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />

                                        <label for="apple" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                            Boarding Houses
                                        </label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="asus" type="checkbox" value="hs" class="checkbox h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />

                                        <label for="asus" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                            Hotels
                                        </label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="acer" type="checkbox" value="Lodging Houses" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />

                                        <label for="acer" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                            Lodging Houses
                                        </label>
                                    </div>
                                </div>

                                <div class="space-y-2">
                                    <h5 class="text-lg font-medium text-black dark:text-white">Near</h5>

                                    <div class="flex items-center">
                                        <input id="beats" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />

                                        <label for="beats" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">NORSU Campus 1</label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="bose" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />

                                        <label for="bose" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Norsu Campus 2</label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="benq" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />

                                        <label for="benq" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Bais City Science High School</label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="bosch" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />

                                        <label for="bosch" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Bais City High School</label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="brother" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />

                                        <label for="brother" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">LCC</label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="biostar" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />

                                        <label for="biostar" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Centre of Bais</label>
                                    </div>
                                </div>

                                <div class="space-y-2">
                                    <h5 class="text-lg font-medium text-black dark:text-white">Boarding house amenities</h5>

                                    <div class="flex items-center">
                                        <input id="canon" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />

                                        <label for="canon" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Private room</label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="cisco" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />

                                        <label for="cisco" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                            Shared room
                                        </label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="cowon" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />

                                        <label for="cowon" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"> Wifi</label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="clevo" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />

                                        <label for="clevo" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"> Bathroom</label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="corsair" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />

                                        <label for="corsair" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"> Laundry area</label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="csl" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />

                                        <label for="csl" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Kitchen</label>
                                    </div>
                                </div>

                                <div class="space-y-2">
                                    <h5 class="text-lg font-medium text-black dark:text-white">Hotels ammenities</h5>

                                    <div class="flex items-center">
                                        <input id="dell" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />

                                        <label for="dell" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Wifi</label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="dogfish" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />

                                        <label for="dogfish" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"> Air conditioned</label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="dyson" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />

                                        <label for="dyson" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                            Swimming pool
                                        </label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="dobe" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />

                                        <label for="dobe" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                            Parking
                                        </label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="digitus" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />

                                        <label for="digitus" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"> Complimentary breakfast</label>
                                    </div>
                                </div>

                                <div class="space-y-2">
                                    <h5 class="text-lg font-medium text-black dark:text-white">Lodging House Amenities</h5>

                                    <div class="flex items-center">
                                        <input id="emetec" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />

                                        <label for="emetec" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                            Wifi
                                        </label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="extreme" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />

                                        <label for="extreme" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                            Air conditioned
                                        </label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="elgato" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />

                                        <label for="elgato" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                            Bathroom
                                        </label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="emerson" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />

                                        <label for="emerson" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"> Kitchen</label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="emi" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />

                                        <label for="emi" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
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
                                        <label for="min-price" class="block text-sm font-medium text-gray-900 dark:text-white"> Min Price </label>
                                        <input id="min-price" type="range" min="0" max="7000" value="300" step="1" class="h-2 w-full cursor-pointer appearance-none rounded-lg bg-gray-200 dark:bg-gray-700" />
                                    </div>

                                    <div>
                                        <label for="max-price" class="block text-sm font-medium text-gray-900 dark:text-white"> Max Price </label>
                                        <input id="max-price" type="range" min="0" max="7000" value="3500" step="1" class="h-2 w-full cursor-pointer appearance-none rounded-lg bg-gray-200 dark:bg-gray-700" />
                                    </div>

                                    <div class="col-span-2 flex items-center justify-between space-x-2">
                                        <input type="number" id="min-price-input" value="300" min="0" max="7000" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500 " placeholder="" required />

                                        <div class="shrink-0 text-sm font-medium dark:text-gray-300">to</div>

                                        <input type="number" id="max-price-input" value="3500" min="0" max="7000" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500" placeholder="" required />
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="flex items-center space-x-4 rounded-b p-4 dark:border-gray-600 md:p-5">
                        <button id="show-results-btn" type="submit" class="rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-700 dark:hover:bg-blue-800 dark:focus:ring-blue-800">Show 0 results</button>
                        <button type="reset" class="rounded-lg border border-gray-200 px-5 py-2.5 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700">Reset</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- <footer class="custom-nav-bg bottom-0 left-0 z-20 w-full p-4 bg-white border-t border-gray-200 shadow-sm md:flex md:items-center md:justify-between md:p-6 dark:bg-gray-800 dark:border-gray-600">
        <span class="text-sm text-white sm:text-center ">© 2025 <a href="home.php" class="hover:underline">ACL</a>. All Rights Reserved.
        </span>
        <ul class="flex flex-wrap items-center mt-3 text-sm font-medium text-white  sm:mt-0">
            <li>
                <a href="condition.php" class="hover:underline me-4 md:me-6">Privacy Policy</a>
            </li>
        </ul>
    </footer> -->

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
                url: "../database/fetch_more_results.php",
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
                    url: "../database/search_loc.php",
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
                url: '../database/login.php',
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
    });

    $(document).ready(function() {
        let selectedFilters = [];

        $(document).ready(function() {
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
                    url: "../database/fetch-results-count.php",
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

            $(document).ready(function() {
                function fetchResults() {
                    let minPrice = $("#min-price-input").val();
                    let maxPrice = $("#max-price-input").val();

                    $.ajax({
                        url: "../database/fetch-price.php",
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
            });


            $("#show-results-btn").click(function() {
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

    });
</script>

</html>