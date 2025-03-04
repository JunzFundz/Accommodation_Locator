<?php
session_start();
$user = $_SESSION['u_id'];

include('../../Classes/Admin.php');
$admin = new Admin();
$data = $admin->showAdminData($user);
$requests = $admin->viewRequest();
$registration = $admin->viewUploads();
$users = $admin->allUsers();

$req = $admin->countRequests();
$prop = $admin->countProp();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.min.css">
    <link rel="stylesheet" href="../css/settings.css">
    <link rel="stylesheet" href="../css/user.css">
    <title>Settings</title>
    <style>

    </style>
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

    <div class="antialiased ">
        <main class="p-4 md:ml-64 h-auto">

            <div class="p-4 border-2 rounded-lg border-gray-300 dark:border-gray-600 mb-4">
                <section class="dark:bg-blue-900">
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
                                    <button type="button" class="flex items-center justify-center flex-shrink-0 px-3 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg focus:outline-none hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-blue-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700">
                                        <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                                        </svg>
                                        Export
                                    </button>
                                </div>
                            </div>
                            <div class="overflow-x-auto" style="height: 60vh">
                                <table id="myTable" class="w-full text-sm text-left text-gray-500 text-gray-700">
                                    <thead class="text-xs text-gray-700 uppercase text-gray-700">
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
                            <!-- <span class="absolute -start-2.5 flex h-5 w-5 items-center justify-center rounded-full bg-gray-100 ring-8 ring-white dark:bg-blue-800 dark:ring-gray-900">
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