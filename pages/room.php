<?php
include('../Classes/Users.php');
$users = new Users();


if (isset($_GET['number'])) {
    $id = $_GET['number'];

    $get = $users->showroomById($id);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <title>View</title>
</head>

<body>

    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
            <div class="max-w-screen-lg text-gray-500 sm:text-lg dark:text-gray-400">
                <h2 class="mb-4 text-4xl tracking-tight font-bold text-gray-900 dark:text-white">
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
                                    <img src="../uploads/<?= htmlspecialchars(trim($image)) ?>"
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