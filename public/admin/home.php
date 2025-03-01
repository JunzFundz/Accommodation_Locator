<?php
session_start();
$user = $_SESSION['u_id'];

include('../../Classes/Admin.php');
$admin = new Admin();
$data = $admin->showAdminData($user);
$requests = $admin->viewRequest();
$registration = $admin->viewUploads();
$users = $admin->allUsers();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.min.css">
    <link rel="stylesheet" href="../css/settings.css">
    <link rel="stylesheet" href="../css/user.css">
    <title>Settings</title>
    <style>

    </style>
</head>

<body>

    <div class="antialiased ">
        <nav class="bg-white border-b border-gray-200 px-4 py-2.5 dark:bg-gray-800 dark:border-gray-700 fixed left-0 right-0 top-0 z-50">
            <div class="flex flex-wrap justify-between items-center">
                <div class="flex justify-start items-center">
                    <a href="https://flowbite.com" class="flex items-center justify-between mr-4">
                        <img src="logo.png"
                            class="mr-3 h-14"
                            alt="Flowbite Logo" />
                        <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Accommodation Locator</span>
                    </a>
                </div>
                <div class="flex items-center lg:order-2">
                    
                    <!-- <button
                        type="button"
                        data-dropdown-toggle="notification-dropdown"
                        class="p-2 mr-1 text-gray-500 rounded-lg hover:text-gray-900 hover:bg-gray-100 text-gray-700 dark:hover:text-white dark:hover:bg-gray-700 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600">
                        <span class="sr-only">View notifications</span>
                        
                        <svg
                            aria-hidden="true"
                            class="w-6 h-6"
                            fill="currentColor"
                            viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"></path>
                        </svg>
                    </button> -->

                    <!-- Dropdown menu -->
                    <div class="hidden overflow-hidden z-50 my-4 max-w-sm text-base list-none bg-white rounded divide-y divide-gray-100 shadow-lg dark:divide-gray-600 dark:bg-gray-700 rounded-xl"
                        id="notification-dropdown">
                        <div class="block py-2 px-4 text-base font-medium text-center text-gray-700 bg-gray-50 dark:bg-gray-600 dark:text-gray-300">
                            Notifications
                        </div>
                        <div>
                            <a
                                href="#"
                                class="flex py-3 px-4 border-b hover:bg-gray-100 dark:hover:bg-gray-600 dark:border-gray-600">
                                <div class="flex-shrink-0">
                                    <img
                                        class="w-11 h-11 rounded-full"
                                        src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/bonnie-green.png"
                                        alt="Bonnie Green avatar" />
                                    <div
                                        class="flex absolute justify-center items-center ml-6 -mt-5 w-5 h-5 rounded-full border border-white bg-primary-700 dark:border-gray-700">
                                        <svg
                                            aria-hidden="true"
                                            class="w-3 h-3 text-white"
                                            fill="currentColor"
                                            viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M8.707 7.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l2-2a1 1 0 00-1.414-1.414L11 7.586V3a1 1 0 10-2 0v4.586l-.293-.293z"></path>
                                            <path
                                                d="M3 5a2 2 0 012-2h1a1 1 0 010 2H5v7h2l1 2h4l1-2h2V5h-1a1 1 0 110-2h1a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V5z"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="pl-3 w-full">
                                    <div
                                        class="text-gray-500 font-normal text-sm mb-1.5 text-gray-700">
                                        New message from
                                        <span class="font-semibold text-gray-900 dark:text-white">Bonnie Green</span>: "Hey, what's up? All set for the presentation?"
                                    </div>
                                    <div
                                        class="text-xs font-medium text-primary-600 dark:text-primary-500">
                                        a few moments ago
                                    </div>
                                </div>
                            </a>
                            <a
                                href="#"
                                class="flex py-3 px-4 border-b hover:bg-gray-100 dark:hover:bg-gray-600 dark:border-gray-600">
                                <div class="flex-shrink-0">
                                    <img
                                        class="w-11 h-11 rounded-full"
                                        src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/jese-leos.png"
                                        alt="Jese Leos avatar" />
                                    <div
                                        class="flex absolute justify-center items-center ml-6 -mt-5 w-5 h-5 bg-gray-900 rounded-full border border-white dark:border-gray-700">
                                        <svg
                                            aria-hidden="true"
                                            class="w-3 h-3 text-white"
                                            fill="currentColor"
                                            viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="pl-3 w-full">
                                    <div
                                        class="text-gray-500 font-normal text-sm mb-1.5 text-gray-700">
                                        <span class="font-semibold text-gray-900 dark:text-white">Jese leos</span>
                                        and
                                        <span class="font-medium text-gray-900 dark:text-white">5 others</span>
                                        started following you.
                                    </div>
                                    <div
                                        class="text-xs font-medium text-primary-600 dark:text-primary-500">
                                        10 minutes ago
                                    </div>
                                </div>
                            </a>
                            <a
                                href="#"
                                class="flex py-3 px-4 border-b hover:bg-gray-100 dark:hover:bg-gray-600 dark:border-gray-600">
                                <div class="flex-shrink-0">
                                    <img
                                        class="w-11 h-11 rounded-full"
                                        src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/joseph-mcfall.png"
                                        alt="Joseph McFall avatar" />
                                    <div
                                        class="flex absolute justify-center items-center ml-6 -mt-5 w-5 h-5 bg-red-600 rounded-full border border-white dark:border-gray-700">
                                        <svg
                                            aria-hidden="true"
                                            class="w-3 h-3 text-white"
                                            fill="currentColor"
                                            viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                fill-rule="evenodd"
                                                d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="pl-3 w-full">
                                    <div
                                        class="text-gray-500 font-normal text-sm mb-1.5 text-gray-700">
                                        <span class="font-semibold text-gray-900 dark:text-white">Joseph Mcfall</span>
                                        and
                                        <span class="font-medium text-gray-900 dark:text-white">141 others</span>
                                        love your story. See it and view more stories.
                                    </div>
                                    <div
                                        class="text-xs font-medium text-primary-600 dark:text-primary-500">
                                        44 minutes ago
                                    </div>
                                </div>
                            </a>
                            <a
                                href="#"
                                class="flex py-3 px-4 border-b hover:bg-gray-100 dark:hover:bg-gray-600 dark:border-gray-600">
                                <div class="flex-shrink-0">
                                    <img
                                        class="w-11 h-11 rounded-full"
                                        src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/roberta-casas.png"
                                        alt="Roberta Casas image" />
                                    <div
                                        class="flex absolute justify-center items-center ml-6 -mt-5 w-5 h-5 bg-green-400 rounded-full border border-white dark:border-gray-700">
                                        <svg
                                            aria-hidden="true"
                                            class="w-3 h-3 text-white"
                                            fill="currentColor"
                                            viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                fill-rule="evenodd"
                                                d="M18 13V5a2 2 0 00-2-2H4a2 2 0 00-2 2v8a2 2 0 002 2h3l3 3 3-3h3a2 2 0 002-2zM5 7a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1zm1 3a1 1 0 100 2h3a1 1 0 100-2H6z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="pl-3 w-full">
                                    <div
                                        class="text-gray-500 font-normal text-sm mb-1.5 text-gray-700">
                                        <span class="font-semibold text-gray-900 dark:text-white">Leslie Livingston</span>
                                        mentioned you in a comment:
                                        <span
                                            class="font-medium text-primary-600 dark:text-primary-500">@bonnie.green</span>
                                        what do you say?
                                    </div>
                                    <div
                                        class="text-xs font-medium text-primary-600 dark:text-primary-500">
                                        1 hour ago
                                    </div>
                                </div>
                            </a>
                            <a
                                href="#"
                                class="flex py-3 px-4 hover:bg-gray-100 dark:hover:bg-gray-600">
                                <div class="flex-shrink-0">
                                    <img
                                        class="w-11 h-11 rounded-full"
                                        src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/robert-brown.png"
                                        alt="Robert image" />
                                    <div
                                        class="flex absolute justify-center items-center ml-6 -mt-5 w-5 h-5 bg-purple-500 rounded-full border border-white dark:border-gray-700">
                                        <svg
                                            aria-hidden="true"
                                            class="w-3 h-3 text-white"
                                            fill="currentColor"
                                            viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="pl-3 w-full">
                                    <div
                                        class="text-gray-500 font-normal text-sm mb-1.5 text-gray-700">
                                        <span class="font-semibold text-gray-900 dark:text-white">Robert Brown</span>
                                        posted a new video: Glassmorphism - learn how to implement
                                        the new design trend.
                                    </div>
                                    <div
                                        class="text-xs font-medium text-primary-600 dark:text-primary-500">
                                        3 hours ago
                                    </div>
                                </div>
                            </a>
                        </div>
                        <a
                            href="#"
                            class="block py-2 text-md font-medium text-center text-gray-900 bg-gray-50 hover:bg-gray-100 dark:bg-gray-600 dark:text-white dark:hover:underline">
                            <div class="inline-flex items-center">
                                <svg
                                    aria-hidden="true"
                                    class="mr-2 w-4 h-4 text-gray-500 text-gray-700"
                                    fill="currentColor"
                                    viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                                    <path
                                        fill-rule="evenodd"
                                        d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                View all
                            </div>
                        </a>
                    </div>

                    <!-- Dropdown menu -->
                    <div class="hidden overflow-hidden z-50 my-4 max-w-sm text-base list-none bg-white rounded divide-y divide-gray-100 shadow-lg dark:bg-gray-700 dark:divide-gray-600 rounded-xl"
                        id="apps-dropdown">
                        <div
                            class="block py-2 px-4 text-base font-medium text-center text-gray-700 bg-gray-50 dark:bg-gray-600 dark:text-gray-300">
                            Apps
                        </div>
                        <div class="grid grid-cols-3 gap-4 p-4">
                            <a
                                href="#"
                                class="block p-4 text-center rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 group">
                                <svg
                                    aria-hidden="true"
                                    class="mx-auto mb-1 w-7 h-7 text-gray-400 group-hover:text-gray-500 text-gray-700 dark:group-hover:text-gray-400"
                                    fill="currentColor"
                                    viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        fill-rule="evenodd"
                                        d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <div class="text-sm text-gray-900 dark:text-white">Sales</div>
                            </a>
                            <a
                                href="users.php"
                                class="block p-4 text-center rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 group">
                                <svg
                                    aria-hidden="true"
                                    class="mx-auto mb-1 w-7 h-7 text-gray-400 group-hover:text-gray-500 text-gray-700 dark:group-hover:text-gray-400"
                                    fill="currentColor"
                                    viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path>
                                </svg>
                                <div class="text-sm text-gray-900 dark:text-white">Users</div>
                            </a>
                            <a
                                href="#"
                                class="block p-4 text-center rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 group">
                                <svg
                                    aria-hidden="true"
                                    class="mx-auto mb-1 w-7 h-7 text-gray-400 group-hover:text-gray-500 dark:text-gray-400 dark:group-hover:text-gray-400"
                                    fill="currentColor"
                                    viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        fill-rule="evenodd"
                                        d="M5 3a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V5a2 2 0 00-2-2H5zm0 2h10v7h-2l-1 2H8l-1-2H5V5z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <div class="text-sm text-gray-900 dark:text-white">Inbox</div>
                            </a>
                            <a
                                href="#"
                                class="block p-4 text-center rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 group">
                                <svg
                                    aria-hidden="true"
                                    class="mx-auto mb-1 w-7 h-7 text-gray-400 group-hover:text-gray-500 dark:text-gray-400 dark:group-hover:text-gray-400"
                                    fill="currentColor"
                                    viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <div class="text-sm text-gray-900 dark:text-white">
                                    Profile
                                </div>
                            </a>
                            <a
                                href="#"
                                class="block p-4 text-center rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 group">
                                <svg
                                    aria-hidden="true"
                                    class="mx-auto mb-1 w-7 h-7 text-gray-400 group-hover:text-gray-500 dark:text-gray-400 dark:group-hover:text-gray-400"
                                    fill="currentColor"
                                    viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        fill-rule="evenodd"
                                        d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <div class="text-sm text-gray-900 dark:text-white">
                                    Settings
                                </div>
                            </a>
                            <a
                                href="#"
                                class="block p-4 text-center rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 group">
                                <svg
                                    aria-hidden="true"
                                    class="mx-auto mb-1 w-7 h-7 text-gray-400 group-hover:text-gray-500 dark:text-gray-400 dark:group-hover:text-gray-400"
                                    fill="currentColor"
                                    viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4 3a2 2 0 100 4h12a2 2 0 100-4H4z"></path>
                                    <path
                                        fill-rule="evenodd"
                                        d="M3 8h14v7a2 2 0 01-2 2H5a2 2 0 01-2-2V8zm5 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <div class="text-sm text-gray-900 dark:text-white">
                                    Products
                                </div>
                            </a>
                            <a
                                href="#"
                                class="block p-4 text-center rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 group">
                                <svg
                                    aria-hidden="true"
                                    class="mx-auto mb-1 w-7 h-7 text-gray-400 group-hover:text-gray-500 dark:text-gray-400 dark:group-hover:text-gray-400"
                                    fill="currentColor"
                                    viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z"></path>
                                    <path
                                        fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <div class="text-sm text-gray-900 dark:text-white">
                                    Pricing
                                </div>
                            </a>
                            <a
                                href="#"
                                class="block p-4 text-center rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 group">
                                <svg
                                    aria-hidden="true"
                                    class="mx-auto mb-1 w-7 h-7 text-gray-400 group-hover:text-gray-500 dark:text-gray-400 dark:group-hover:text-gray-400"
                                    fill="currentColor"
                                    viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        fill-rule="evenodd"
                                        d="M5 2a2 2 0 00-2 2v14l3.5-2 3.5 2 3.5-2 3.5 2V4a2 2 0 00-2-2H5zm2.5 3a1.5 1.5 0 100 3 1.5 1.5 0 000-3zm6.207.293a1 1 0 00-1.414 0l-6 6a1 1 0 101.414 1.414l6-6a1 1 0 000-1.414zM12.5 10a1.5 1.5 0 100 3 1.5 1.5 0 000-3z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <div class="text-sm text-gray-900 dark:text-white">
                                    Billing
                                </div>
                            </a>
                            <a
                                href="#"
                                class="block p-4 text-center rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 group">
                                <svg
                                    aria-hidden="true"
                                    class="mx-auto mb-1 w-7 h-7 text-gray-400 group-hover:text-gray-500 dark:text-gray-400 dark:group-hover:text-gray-400"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                                </svg>
                                <div class="text-sm text-gray-900 dark:text-white">
                                    Logout
                                </div>
                            </a>
                        </div>
                    </div>
                    <button
                        type="button"
                        class="flex mx-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                        id="user-menu-button"
                        aria-expanded="false"
                        data-dropdown-toggle="dropdown">
                        <span class="sr-only">Open user menu</span>
                        <img
                            class="w-8 h-8 rounded-full"
                            src="logo.png"
                            alt="user photo" />
                    </button>
                    <!-- Dropdown menu -->
                    <div class="hidden z-50 my-4 w-56 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600 rounded-xl"
                        id="dropdown">
                        <div class="py-3 px-4">
                            <span
                                class="block text-sm font-semibold text-gray-900 dark:text-white">Admin</span>
                            <span
                                class="block text-sm text-gray-900 truncate dark:text-white"><?php echo $_SESSION['u_email'] ?></span>
                        </div>
                        <ul
                            class="py-1 text-gray-700 dark:text-gray-300"
                            aria-labelledby="dropdown">
                            <li>
                                <a
                                    href="#"
                                    class="block py-2 px-4 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-400 dark:hover:text-white">My profile</a>
                            </li>
                            <li>
                                <a
                                    href="settings.php"
                                    class="block py-2 px-4 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-400 dark:hover:text-white">Account settings</a>
                            </li>
                        </ul>
                        <ul
                            class="py-1 text-gray-700 dark:text-gray-300"
                            aria-labelledby="dropdown">
                            <li>
                                <a
                                    href="logout.php"
                                    class="block py-2 px-4 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Sign out</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <main class="p-4 md:ml-64 h-auto pt-20">

            <div class="grid grid-cols-2 gap-4 mb-4">
                <div class="border-2 p-1 rounded-lg border-gray-300 dark:border-gray-600 mb-4 overflow-x-auto whitespace-nowrap">
                    <!-- From Uiverse.io by cssbuttons-io -->
                    <a href="properties.php">
                        <button id="buttonnew" class="w-full">
                            Properties
                        </button>
                    </a>
                </div>

                <div class="border-2 p-1 rounded-lg border-gray-300 dark:border-gray-600 mb-4 overflow-x-auto whitespace-nowrap">
                    <a href="requests.php">
                        <button id="buttonnew" class="w-full">
                            Registrations
                        </button>
                    </a>
                </div>
            </div>

            <div class="p-4 border-2 rounded-lg border-gray-300 dark:border-gray-600 mb-4">
                <section class="bg-gray-50 dark:bg-gray-900">
                    <div class="mx-auto max-w-screen-2xl">
                        <div class="relative overflow-hidden bg-white shadow-md sm:rounded-lg">
                            <div class="flex flex-col py-3 space-y-3 lg:flex-row lg:items-center lg:justify-between lg:space-y-0 lg:space-x-4">
                                <div class="flex items-center flex-1 space-x-4">
                                    <h5>
                                        <span class="text-gray-600">Total providers:</span>
                                        <?php foreach ($users as $user): ?>
                                            <span class=""><?= $user['number_of_us'] ?></span>
                                        <?php endforeach; ?>
                                    </h5>
                                </div>
                                <div class="flex flex-col flex-shrink-0 space-y-3 md:flex-row md:items-center lg:justify-end md:space-y-0 md:space-x-3">
                                    <button type="button" class="flex items-center justify-center flex-shrink-0 px-3 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg focus:outline-none hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                        <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                                        </svg>
                                        Export
                                    </button>
                                </div>
                            </div>
                            <div class="overflow-x-auto" style="height: 60vh">
                                <table id="myTable" class="w-full text-sm text-left text-gray-500 text-gray-700">
                                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 text-gray-700">
                                        <tr>
                                            <th scope="col" class="px-4 py-3">Full name</th>
                                            <th scope="col" class="px-4 py-3">Email</th>
                                            <th scope="col" class="px-4 py-3">Address</th>
                                            <th scope="col" class="px-4 py-3">Total Accommodations</th>
                                            <th scope="col" class="px-4 py-3">Status</th>
                                            <th scope="col" class="px-4 py-3">Account created</th>
                                            <th scope="col" class="px-4 py-3">Profile</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($users as $user): ?>
                                            <tr class="border-b dark:border-gray-600 hover:bg-gray-100">
                                                <th scope="row" class="flex items-center px-4 py-2 font-medium text-gray-900 whitespace-nowrap">
                                                    <img src="default.jpg" alt="iMac Front Image" class="rounded-full w-auto h-8 mr-3">
                                                    <?= $user['u_fname'] . ", " . $user['u_lname'] . " " . $user['u_mname']; ?>
                                                </th>
                                                <td class="px-4 py-2">
                                                    <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2 py-0.5 ">
                                                        <?= $user['u_email'] ?>
                                                    </span>
                                                </td>
                                                <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap ">
                                                    <?= $user['pi_brgy'] . " " . $user['pi_block'] . " " . $user['pi_street'] . " " . $user['pi_city']; ?>
                                                </td>
                                                <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap ">
                                                    <?= $user['number_of_acc'] ?>
                                                </td>
                                                <td class="text-center px-4 py-2 font-medium text-gray-900 whitespace-nowrap ">
                                                    <div class="flex items-center">
                                                        <?php if ($user['r_status'] == 'pending') { ?>
                                                            <span class="bg-orange-100 text-orange-800 text-xs font-medium px-2 py-0.5 ">Pending registration</span>
                                                        <?php } else if ($user['r_status'] == 'declined') { ?>
                                                            <span class="bg-red-100 text-red-800 text-xs font-medium px-2 py-0.5 ">Registration declined</span>
                                                        <?php } else if ($user['r_status'] == 'deactivated') { ?>
                                                            <span class="bg-red-100 text-red-800 text-xs font-medium px-2 py-0.5 ">Account deactivated</span>
                                                        <?php } else { ?>
                                                            <span class="bg-green-100 text-green-800 text-xs font-medium px-2 py-0.5 ">Provider</span>
                                                        <?php } ?>

                                                    </div>
                                                </td>
                                                <?php
                                                function timeAgo($datetime)
                                                {
                                                    date_default_timezone_set('Asia/Manila');
                                                    $timestamp = strtotime($datetime);
                                                    $difference = time() - $timestamp;

                                                    if ($difference < 60) {
                                                        return $difference . " seconds ago";
                                                    } elseif ($difference < 3600) {
                                                        return round($difference / 60) . " minutes ago";
                                                    } elseif ($difference < 86400) {
                                                        return round($difference / 3600) . " hours ago";
                                                    } elseif ($difference < 2592000) {
                                                        return round($difference / 86400) . " days ago";
                                                    } elseif ($difference < 31536000) {
                                                        return round($difference / 2592000) . " months ago";
                                                    } else {
                                                        return round($difference / 31536000) . " years ago";
                                                    }
                                                }
                                                ?>

                                                <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap">
                                                    <?= date("F j, Y, g:i A", strtotime($user['pi_date_added'])) ?>
                                                    <span class="text-gray-500">(<?= timeAgo($user['pi_date_added']) ?>)</span>
                                                </td>

                                                <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap ">
                                                    <div class="flex items-center">
                                                        <a href="profile.php?id=<?= $user['u_id'] ?> && number=<?= $user['p_id'] ?>">
                                                            <svg class="w-6 h-6 text-gray-800 cursor-pointer" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                                <path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z" />
                                                                <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                            </svg>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </section>
            </div>

            <div class="grid grid-cols-2 gap-4 mb-4" id="settings-section">

                <div class="border-2 rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72 p-5 overflow-x-auto whitespace-nowrap">
                    <ol class="relative border-s border-gray-200 dark:border-gray-700">
                        <li class="mb-5 ms-6">
                            <!-- <span class="absolute -start-2.5 flex h-5 w-5 items-center justify-center rounded-full bg-gray-100 ring-8 ring-white dark:bg-gray-800 dark:ring-gray-900">
                                <svg class="h-3 w-3 text-gray-500 text-gray-700" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 11.917 9.724 16.5 19 7.5" />
                                </svg>
                            </span> -->
                            <h3 class="mb-1.5 text-lg font-semibold leading-none text-gray-900 ">Pick up product from the address</h3>
                            <p class="text-base font-normal text-gray-500 ">Estimated time 2 February 2024 - 5 February 2024.</p>
                        </li>
                    </ol>
                </div>
            </div>
        </main>
    </div>

    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.1/dist/flowbite.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    </script>
    <script>
        let table = new DataTable('#myTable');
        document.addEventListener("DOMContentLoaded", function() {
            const modalElement = document.getElementById("request-modal");
            if (modalElement) {
                window.modalInstance = new Modal(modalElement);
            }
        });

        function showModal() {
            if (window.modalInstance) {
                window.modalInstance.show();
            } else {
                console.error("Modal instance is not initialized.");
            }
        }

        function closeModal() {
            if (window.modalInstance) {
                window.modalInstance.hide();
            } else {
                console.error("Modal instance is not initialized.");
            }
        }


        $(document).on('click', '.get_id', function(e) {
            e.preventDefault();
            const pid = $(this).data('pid');

            $.ajax({
                url: '../../database/admin_view.php',
                type: 'post',
                data: {
                    'view_modal': true,
                    'pid': pid
                },
                success: function(response) {
                    $('.modal-body').html(response);
                    showModal()
                },
                error: function(xhr) {
                    console.error(xhr.responseText);
                    alert('Error: getting data');
                }
            });
        });

        $(document).on('click', '.approve', function(e) {
            e.preventDefault();
            const pid = $('#pid').val();
            const embedded = $('#embedded-link').val();

            if (embedded == "") {
                Command: toastr["error"]("Field is empty");
                return false;
            }

            $.ajax({
                url: '../../database/accept.php',
                type: 'post',
                data: {
                    'approve': true,
                    pid: pid,
                    embedded: embedded
                },
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        closeModal();
                        Command: toastr["success"](response.success)
                        $("#myTable tbody").load(" #myTable tbody > *");
                    } else {
                        Command: toastr["error"](response.error)
                    }
                }
            })
        })

        $(document).on('click', '.declined', function() {
            const rid = $('#rid').val();

            $.ajax({
                url: '../../database/accept.php',
                type: 'post',
                data: {
                    'declined': true,
                    rid: rid
                },
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        Command: toastr["success"](response.success)
                        $("#myTable tbody").load(" #myTable tbody > *");
                    }
                    else {
                        Command: toastr["error"](response.error)
                    }
                }
            })
        })

        // request

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

        $(document).ready(function() {

            function changeInputs() {
                $('#change_input').text('Confirm').css(
                    'background-color', 'green'
                )
                $('#input_hide').removeClass('hidden').fadeIn(1000);
                $('#input_hide2').removeClass('hidden').fadeIn(1000);
            }

            $('#change_input').on('click', function() {


                $.ajax({
                    url: '',
                    method: 'POST',
                    data: {

                    },
                    success: function() {
                        changeInputs();
                    }
                })
            });
        })
    </script>

</html>