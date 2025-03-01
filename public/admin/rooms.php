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

            $('.delete_room').on('click', function(){
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