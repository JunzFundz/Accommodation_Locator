<?php
session_start();
include('../../database/check.php');
include('add.php');

$_SESSION['u_id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/user.css">
    <title>Home</title>
</head>

<body>
    <nav class="custom-nav-bg sticky top-0 z-50 bg-white border-gray-200 dark:border-gray-700" style="z-index: 0;">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="../images/logo.png" class="h-11" alt="Flowbite Logo" />
            </a>
            <button data-collapse-toggle="navbar-dropdown" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-dropdown" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
            <div class="hidden w-full md:block md:w-auto" id="navbar-dropdown">
                <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg  md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0">
                    <li>
                        <a href="#" class="block py-2 px-3 text-white bg-blue-700 rounded-sm md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500 dark:bg-blue-600 md:dark:bg-transparent" aria-current="page">Home</a>
                    </li>
                    <li>
                        <a href="#" class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Services</a>
                    </li>
                    <li>
                        <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="flex items-center justify-between w-full py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto dark:text-white md:dark:hover:text-blue-500 dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent">Options<svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg></button>
                        <div id="dropdownNavbar" class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44 dark:bg-gray-700 dark:divide-gray-600">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
                                <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Account settings</a>
                                </li>
                            </ul>
                            <div class="py-1">
                                <a href="logout.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign out</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <?php if ($result === true) { ?>
        <section class="py-8 antialiased md:py-12 h-full">
            <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
                <!-- Heading & Filters -->
                <div class="mb-4 items-end justify-between space-y-4 sm:flex sm:space-y-0 md:mb-8">
                    <div class="custom-size">
                        <nav class="flex" aria-label="Breadcrumb">
                            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                                <li class="inline-flex items-center">
                                    <a href="#" data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="inline-flex items-center text-sm font-medium">
                                        <svg class="me-2.5 h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                                        </svg>
                                        Add new
                                    </a>
                                </li>
                                <li>
                                    <div class="flex items-center">
                                        <svg class="h-5 w-5 text-gray-400 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7" />
                                        </svg>
                                        <a href="#" class="ms-1 text-sm font-medium md:ms-2">Boarding Houses</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="flex items-center">
                                        <svg class="h-5 w-5 text-gray-400 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7" />
                                        </svg>
                                        <a href="#" class="ms-1 text-sm font-medium md:ms-2">Hotels</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="flex items-center">
                                        <svg class="h-5 w-5 text-gray-400 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7" />
                                        </svg>
                                        <a href="#" class="ms-1 text-sm font-medium md:ms-2">Lodging Houses</a>
                                    </div>
                                </li>
                            </ol>
                        </nav>
                        <h2 class="mt-3 text-xl font-semibold text-gray-900  sm:text-2xl"></h2>
                    </div>

                </div>

                <?php if (!empty($data)) : ?>
                    <div class="mb-4 grid gap-4 sm:grid-cols-2 md:mb-8 lg:grid-cols-3 xl:grid-cols-4">
                        <!-- box -->

                        <?php foreach ($data as $row) : ?>
                            <?php
                            $images = json_decode($row['p_img'], true);
                            $firstImage = (!empty($images) && is_array($images)) ? htmlspecialchars($images[0], ENT_QUOTES, 'UTF-8') : 'default.jpg';
                            ?>
                            <div class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                                <div class="h-56 w-full">
                                    <a href="view.php?name=<?php echo $row['p_name'] ?>&type=<?php echo $row['p_type'] ?>&number=<?php echo $row['p_id'] ?>">
                                        <img class="mx-auto h-full " src="../../uploads/<?php echo $firstImage; ?>" alt="Property Image" />
                                    </a>
                                </div>
                                <div class="pt-6">
                                    <a href="view.php?name=<?php echo $row['p_name'] ?>&type=<?php echo $row['p_type'] ?>&number=<?php echo $row['p_id'] ?>" class="text-lg font-semibold leading-tight text-gray-900 hover:underline dark:text-white">
                                        <?php echo htmlspecialchars($row['p_name']); ?>
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <p class="text-center text-red-500">No data found.</p>
                    <?php endif; ?>

                    </div>
                    <!-- <div class="w-full text-center">
                    <button type="button" class="rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700">Show more</button>
                </div> -->
            </div>

            <!-- Filter modal -->
            <form action="#" method="get" id="filterModal" tabindex="-1" aria-hidden="true" class="fixed left-0 right-0 top-0 z-50 hidden h-modal w-full overflow-y-auto overflow-x-hidden p-4 md:inset-0 md:h-full">
                <div class="relative h-full w-full max-w-xl md:h-auto">
                    <!-- Modal content -->
                    <div class="relative rounded-lg bg-white shadow dark:bg-gray-800">
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
                                            <input id="asus" type="checkbox" value="Hotels" class="checkbox h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />

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
                            <button type="reset" class="rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700">Reset</button>
                        </div>
                    </div>
                </div>
            </form>
        </section>
    <?php } else { ?>
        <section class="bg-white" id="remove-content">
            <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 lg:px-12">
                <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl ">Be a provider</h1>
                <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione minima iusto ipsa vero minus voluptas praesentium laudantium pariatur rem. Ipsa perspiciatis sequi neque! Officia natus voluptatum assumenda, ex odit ea.</p>
                <div class="flex flex-col mb-8 lg:mb-16 space-y-4 sm:flex-row sm:justify-center sm:space-y-0 sm:space-x-4">
                    <a href="apply.php" class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                        Apply now
                        <svg class="ml-2 -mr-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </section>
    <?php } ?>

</body>

<script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.1/dist/flowbite.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.getElementById('file_input').addEventListener('change', function(event) {
        const files = event.target.files;
        for (let i = 0; i < files.length; i++) {
            const fileType = files[i].type;
            if (!['image/jpeg', 'image/jpg', 'image/png'].includes(fileType)) {
                alert('Only JPG, JPEG, and PNG files are allowed!');
                event.target.value = '';
                break;
            }
        }
    });

    $(document).ready(function() {
        let selectedFilters = [];

        $(".checkbox").change(function() {
            selectedFilters = $(".checkbox:checked")
                .map(function() {
                    return $(this).val();
                })
                .get();

            console.log(selectedFilters)

            updateResultsCount(selectedFilters);
        });

        function updateResultsCount(filters) {
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

    });

    $(document).ready(function() {

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
        });

        $('.add-acc').on('click', function(e) {
            e.preventDefault();

            const id = $(this).data('id');
            const name = $('#nameof').val();
            const price = $('#price').val();
            const type = $('#type').val();
            const address = $('#address').val();
            const description = $('#description').val();

            const fileInput = document.getElementById('file_input');
            const files = fileInput.files;

            let formData = new FormData();
            formData.append('add_acc', true);
            formData.append('id', id);
            formData.append('name', name);
            formData.append('price', price);
            formData.append('type', type);
            formData.append('address', address);
            formData.append('description', description);

            for (let i = 0; i < files.length; i++) {
                formData.append('images[]', files[i]);
            }

            for (let pair of formData.entries()) {
                console.log(pair[0], pair[1]);
            }

            $.ajax({
                url: '../../database/add.php',
                method: 'POST',
                data: formData,
                dataType: 'json',
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.success) {
                        Swal.fire({
                            title: response.success,
                            icon: "success",
                            confirmButtonText: "OK"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.reload();
                            }
                        });
                    } else {
                        Swal.fire({
                            title: response.error,
                            icon: "error",
                            confirmButtonText: "OK"
                        })
                    }
                },
                error: function(xhr, status, error) {
                    console.error("AJAX Error:", error);
                }
            });
        });



    });
</script>

</html>