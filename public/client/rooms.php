<?php
include __DIR__ . "/../../database/load-rooms.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/user.css">
    <title>View</title>
</head>

<body>

    <nav class="custom-nav-bg sticky top-0 z-50 bg-white border-gray-200 dark:border-gray-700" style="z-index: 11;">
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
                        <a href="home.php" class="block py-2 px-3 text-white bg-blue-700 rounded-sm md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500 dark:bg-blue-600 md:dark:bg-transparent" aria-current="page">Home</a>
                    </li>
                    <li>
                        <a href="service.php" class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Services</a>
                    </li>
                    <li>
                        <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="flex items-center justify-between w-full py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto dark:text-white md:dark:hover:text-blue-500 dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent">Options<svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg></button>
                        <div id="dropdownNavbar" class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44 dark:bg-gray-700 dark:divide-gray-600">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
                                <li>
                                    <a href="settings.php" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Account settings</a>
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

    <nav class="bg-gray-50 bg-gray-500">
        <div class="max-w-screen-xl px-4 py-3 mx-auto">
            <div class="flex items-center">
                <ul class="flex flex-row font-medium mt-0 space-x-8 rtl:space-x-reverse text-sm">
                    <li>
                        <a href="home.php" class="inline-flex items-center text-sm font-medium text-white">
                            <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m15 19-7-7 7-7" />
                            </svg>
                            Go back
                        </a>
                    </li>
                    <li>
                        <a data-drawer-target="drawer-contact" data-drawer-show="drawer-contact" class="inline-flex items-center text-sm font-medium text-white">
                            <svg class="w-6 h-6 text-gray-800 text-white mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M20 6H10m0 0a2 2 0 1 0-4 0m4 0a2 2 0 1 1-4 0m0 0H4m16 6h-2m0 0a2 2 0 1 0-4 0m4 0a2 2 0 1 1-4 0m0 0H4m16 6H10m0 0a2 2 0 1 0-4 0m4 0a2 2 0 1 1-4 0m0 0H4" />
                            </svg>
                            Add rooms
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="mb-4 grid gap-4 sm:grid-cols-2 md:mb-8 lg:grid-cols-3 xl:grid-cols-4 p-5">
        <?php if (!empty($result)) : ?>
            <?php foreach ($result as $row) : ?>
                <?php include 'drawer.php' ?>
                <?php
                $images = json_decode($row['tr_images'], true);
                $firstImage = (!empty($images) && is_array($images)) ? htmlspecialchars($images[0], ENT_QUOTES, 'UTF-8') : 'default.jpg';
                ?>
                <div class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700">

                    <div style="font-size: 20px; margin-bottom: .5rem; float:right">
                        <i data-tid="<?= $row['tr_id'] ?>" class="show-update fa-solid fa-pen-to-square text-green-600 cursor-pointer"></i>&nbsp;&nbsp;&nbsp;&nbsp;
                        <i class="fa-solid fa-trash text-red-400 cursor-pointer delete_room" data-tid="<?= $row['tr_id'] ?>"></i>
                    </div>
                    <br>
                    <div class="h-56 w-full">
                        <a href="view.php?number=<?= $row['p_id'] ?> && name=<?= $row['p_name'] ?>">
                            <img class="mx-auto h-full " src="../../uploads/<?php echo $firstImage; ?>" alt="Property Image" />
                        </a>
                    </div>
                    <div class="pt-6">
                        <a href="view.php?number=<?= $row['p_id'] ?> && name=<?= $row['p_name'] ?>" class="text-lg font-semibold leading-tight text-gray-900 hover:underline "><?php echo $row['tr_name'] ?></a>

                        <ul class="mt-2 flex items-center gap-4">
                            <li class="flex items-center gap-2">
                                <p class="text-sm font-medium"><?php echo $row['p_address'] ?></p>
                            </li>
                        </ul>

                        <div class="mt-4 flex items-center justify-between gap-4">
                            <p class="text-2xl font-extrabold leading-tight">₱<?php echo number_format($row['tr_price']) ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <p class="text-center text-red-500">No data found.</p>
        <?php endif; ?>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.1/dist/flowbite.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const drawerElement = document.getElementById("show-update-form");
            if (drawerElement) {
                window.drawerInstance = new Drawer(drawerElement);
            } else {
                console.error("Drawer element not found.");
            }
        });

        function showDrawer() {
            if (window.drawerInstance) {
                window.drawerInstance.show();
            } else {
                console.error("Drawer instance is not initialized.");
            }
        }

        function closeDrawer() {
            if (window.drawerInstance) {
                window.drawerInstance.hide();
            } else {
                console.error("Drawer instance is not initialized.");
            }
        }

        $(document).ready(function() {
            $('.show-update').on('click', function() {
                const tid = $(this).data('tid');

                $.ajax({
                    url: '../../database/update-rooms.php',
                    method: 'post',
                    data: {
                        'get_data': true,
                        tid: tid
                    },
                    dataType: 'json',
                    success: function(response) {
                        $('#rname').val(response.tr_name);
                        $('#rprice').val(response.tr_price);
                        $('#description').val(response.tr_description);

                        if (!Array.isArray(response.tr_images)) {
                            response.tr_images = [];
                        }

                        $('#image_preview').html("");

                        response.tr_images.forEach(function(image) {
                            $('#image_preview').append(`
            <div class="relative inline-block m-2">
                <img src="../../uploads/${image}" class="h-20 w-20 object-cover rounded">
                <button class="absolute top-0 right-0 bg-red-500 text-white text-xs px-2 py-1 rounded remove-image" data-roomid="${tid}" data-image="${image}">X</button>
            </div>`);
                        });

                        showDrawer();
                    }

                })
            })

            $(document).on('click', '.remove-image', function(e) {
                e.preventDefault();

                const imageName = $(this).data('image');
                const roomId = $(this).data('roomid');
                const imageElement = $(this).closest('div');

                console.log("Deleting:", roomId, imageName);

                $.ajax({
                    url: '../../database/update-rooms.php',
                    method: 'POST',
                    data: {
                        delete_image: true,
                        image_name: imageName,
                        room_id: roomId
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            console.log(response.success);
                            imageElement.remove();
                        } else {
                            console.log(response.error);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("AJAX Error:", error);
                        console.log("Response Text:", xhr.responseText);
                    }
                });
            });

            $('.update-room').on('click', function(e) {
                e.preventDefault();

                const id = $(this).data('id');
                const name = $('#rname').val();
                const price = $('#rprice').val();
                const address = $('#address').val();
                const description = $('#description').val();

                const fileInput = document.getElementById('file_input');
                const files = fileInput.files;

                let formData = new FormData();
                formData.append('update_room', true);
                formData.append('id', id);
                formData.append('name', name);
                formData.append('price', price);
                formData.append('description', description);

                for (let i = 0; i < files.length; i++) {
                    formData.append('images[]', files[i]);
                }

                for (let pair of formData.entries()) {
                    console.log(pair[0], pair[1]);
                }

                $.ajax({
                    url: '../../database/update-rooms.php',
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

            $('.delete_room').on('click', function() {
                const id = $(this).data('tid');

                $.ajax({
                    url: '../../database/update-rooms.php',
                    method: 'POST',
                    data: {
                        'delete_room': true,
                        id: id
                    },
                    dataType: 'json',
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
                    }
                })
            })

        })
    </script>
</body>

</html>