<?php
include '../../Classes/Admin.php';

session_start();
$_SESSION['u_id'];


$view = new Admin();
$requests = $view->viewUploads();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.1/dist/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <title>Document</title>
</head>

<body>
    <nav class="bg-white border-gray-200 dark:bg-gray-900 dark:border-gray-700">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Flowbite</span>
            </a>
            <button data-collapse-toggle="navbar-multi-level" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-multi-level" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
            <div class="hidden w-full md:block md:w-auto" id="navbar-multi-level">
                <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <a href="home.php" class="block py-2 px-3 text-white bg-blue-700 rounded-sm md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500 dark:bg-blue-600 md:dark:bg-transparent" aria-current="page">Home</a>
                    </li>
                    <li>
                        <a href="properties.php" class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Properties</a>
                    </li>
                    <li>
                        <a href="requests.php" class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Requests</a>
                    </li>
                    <li>
                        <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="flex items-center justify-between w-full py-2 px-3 text-gray-900 hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto dark:text-white md:dark:hover:text-blue-500 dark:focus:text-white dark:hover:bg-gray-700 md:dark:hover:bg-transparent">Profile <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg></button>
                        <!-- Dropdown menu -->
                        <div id="dropdownNavbar" class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44 dark:bg-gray-700 dark:divide-gray-600">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownLargeButton">
                                <li>
                                    <a href="settings.php" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Account Settings</a>
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

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg px-3 py-3">
        <?php if (!empty($requests)) { ?>
            <table id="myTable" class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Contact Number
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Address
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Date requested
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($requests as $rows): ?>

                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <?= $rows['u_email'] ?>
                            </th>
                            <td class="px-6 py-4">
                                <?= $rows['pi_contact'] ?>
                            </td>
                            <td class="px-6 py-4">
                                <?= $rows['pi_brgy'] . ", " . $rows['pi_city'] ?>
                            </td>
                            <td class="px-6 py-4">
                                <?= $rows['pi_date_added'] ?>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="#" data-pid="<?= $rows['p_id'] ?>" class="get_id font-medium text-blue-600 dark:text-blue-500 hover:underline">View</a>
                            </td>
                        </tr>

                    <?php endforeach; ?>

                    <?php ?>
                </tbody>
            </table>
        <?php } else { ?>

            <p class="text-center"> No data found</p>

        <?php  } ?>
    </div>

    <?php include 'modal_properties.php'; ?>

</body>
<script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.1/dist/flowbite.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const modalElement = document.getElementById("custom-modal");
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

</html>