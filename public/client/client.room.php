<?php
session_start();

include('../../Classes/Users.php');
$users = new Users();


if (isset($_GET['number']) && isset($_GET['id'])) {
    $id = $_GET['number'];
    $pr = $_GET['id'];

    $get = $users->showroomById($id);
}
include('../../database/check.php');

$_SESSION['u_id'];

$load = new Users();
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

    <section class="bg-white">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
            <div class="max-w-screen-lg text-gray-500 sm:text-lg dark:text-gray-400">
                <h2 class="mb-4 text-4xl tracking-tight font-bold text-gray-900">
                    <?php echo $get['tr_name'] ?>
                </h2>
                <p class="mb-4 font-light">
                    <?php echo $get['tr_price'] ?>
                </p>
                <p class="mb-4 font-medium">
                    <?php echo $get['tr_description'] ?>
                </p>
            </div>
        </div>
    </section>

    <section class="view-tabs-rooms antialiased">
        <div class="max-w-screen-xl px-4 mx-auto 2xl:px-0">
            <div class="lg:grid lg:grid-cols-1 lg:gap-8 xl:gap-16">
                <div class="masonry-grid">
                    <?php if (!empty($get) && isset($get['tr_images']) && !empty($get['tr_images'])):
                        $images = json_decode($get['tr_images'], true);

                        if (!is_array($images)) {
                            echo '<p style="text-align: center; color: gray;">Invalid image data.</p>';
                        } else {
                            foreach ($images as $index => $image): ?>

                                <div class="masonry-item">
                                    <img src="../../uploads/<?= htmlspecialchars(trim($image)) ?>"
                                        alt="Image <?= $index + 1 ?>">
                                </div>

                            <?php endforeach; ?>
                        <?php }
                    else: ?>
                        <p style="text-align: center; color: gray;">No images available.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-gray-50 py-8 antialiased md:py-16">
        <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
            <div class="mb-4 flex items-center justify-between gap-4 md:mb-8">
                <h2 class="text-xl font-semibold text-gray-900 sm:text-2xl">This room includes:</h2>
            </div>

            <?php
            $icons = [
                "wifi" => '<i class="fa-solid fa-wifi"></i>',
                "Norsu Campus 2" => '<i class="fa-solid fa-location-crosshairs"></i>',
                "Bais City Science High School" => '<i class="fa-solid fa-location-crosshairs"></i>',
            ];

            $jsonString = (string) $get['p_inclusion'];
            $decodedData = json_decode($jsonString, true);
            ?>

            <div class="grid gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                <?php if (is_array($decodedData)) : ?>
                    <?php foreach ($decodedData as $name) : ?>
                        <a href="#" class="flex items-center rounded-lg border border-gray-200 bg-white px-4 py-2 hover:bg-gray-50">
                            <?= $icons[$name] ?? $icons['wifi']; ?>
                            <span class="text-sm font-medium text-gray-900 px-2"><?= htmlspecialchars($name) ?></span>
                        </a>
                    <?php endforeach; ?>
                <?php else : ?>
                    <p class='text-red-500'>Invalid data format</p>
                <?php endif; ?>
            </div>



        </div>
    </section>




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
                <img src="../../../uploads/${image}" class="h-20 w-20 object-cover rounded">
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