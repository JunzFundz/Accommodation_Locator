<?php
include('../../database/view.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/user.css">
    <title>View</title>
</head>

<body>

    <!-- drawer component -->
    <div id="drawer-contact" class="fixed top-0 left-0 z-40 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-white w-80 dark:bg-gray-800" tabindex="-1" aria-labelledby="drawer-contact-label">
        <h5 id="drawer-label" class="inline-flex items-center mb-6 text-base font-semibold text-gray-500 uppercase dark:text-gray-400"></h5>
        <button type="button" data-drawer-hide="drawer-contact" aria-controls="drawer-contact" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 absolute top-2.5 end-2.5 inline-flex items-center justify-center dark:hover:bg-gray-600 dark:hover:text-white">
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
            <span class="sr-only">Close menu</span>
        </button>
        <form class="mb-6">
            <div class="mb-6">
                <label for="comp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Company name</label>
                <input style="cursor:not-allowed" disabled type="comp" id="comp" value="<?php echo htmlspecialchars($viewData['p_name']); ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@company.com" required />
            </div>
            <div class="mb-6">
                <label for="rname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Room Name</label>
                <input type="text" id="rname" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
            </div>
            <div class="mb-6">
                <label for="rprice" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                <input type="text" id="rprice" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
            </div>
            <div class="mb-6">
                <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                <textarea id="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write description ..."></textarea>
            </div>
            <div class="mb-6">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Upload an image of the room</label>
                <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file" accept=".jpg, .jpeg, .png" multiple>
            </div>
            <button type="submit"
                data-pid="<?php echo htmlspecialchars($viewData['p_id']); ?>"
                data-uid="<?php echo htmlspecialchars($viewData['u_id']); ?>"
                class="add-room text-white bg-blue-700 hover:bg-blue-800 w-full focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 block">Add room</button>
        </form>
    </div>

    <!-- Breadcrumb -->
    <nav class="flex px-5 py-3 text-gray-700 border border-gray-200 rounded-lg bg-gray-50" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            <li class="inline-flex items-center">
                <a href="home.php" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-700">
                    <svg class="w-6 h-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m15 19-7-7 7-7" />
                    </svg>
                    Go back
                </a>
            </li>
            <li class="inline-flex items-center">
                <a data-drawer-target="drawer-contact" data-drawer-show="drawer-contact" href="#" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-700" style="padding-left: 50px;">
                    <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                    </svg>
                    Add rooms
                </a>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="rtl:rotate-180 block w-3 h-3 mx-1 text-gray-400 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                    </svg>
                    <a href="rooms.php?id=<?php echo htmlspecialchars($viewData['p_id']); ?>" data-pid="<?php echo htmlspecialchars($viewData['p_id']); ?>" class="load-rooms ms-1 text-sm font-medium text-gray-700 hover:text-blue-700 md:ms-2">View Rooms</a>
                </div>
            </li>
        </ol>
    </nav>

    <section class="view-tabs-rooms antialiased">
        <div class="max-w-screen-xl px-4 mx-auto 2xl:px-0">
            <div class="lg:grid lg:grid-cols-1 lg:gap-8 xl:gap-16">
                <?php if (!empty($viewData)): ?>

                    <form class="max-w-sm mx-auto odc">
                        <div class="mt-6 sm:gap-6 sm:items-center sm:flex sm:mt-8">
                            <a
                                href="#"
                                title=""
                                data-id="<?php echo htmlspecialchars($viewData['p_id']); ?>"
                                class="delete-btn flex items-center justify-center py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
                                role="button">
                                <svg class="w-4 h-4 text-gray-800 text-red-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linejoin="round" stroke-width="2" d="M8 8v1h4V8m4 7H4a1 1 0 0 1-1-1V5h14v9a1 1 0 0 1-1 1ZM2 1h16a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1Z" />
                                </svg>
                            </a>

                            <a
                                href="#"
                                title=""
                                data-id="<?php echo htmlspecialchars($viewData['p_id']); ?>"
                                class="update-btn text-white mt-4 sm:mt-0 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 flex items-center justify-center"
                                role="button">
                                Update
                            </a>
                        </div>
                        <br>

                        <div class="mb-5">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Name</label>
                            <input type="text" id="name" value="<?php echo htmlspecialchars($viewData['p_name']); ?>" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>

                        <div class="grid md:grid-cols-2 md:gap-6">
                            <div class="mb-5">
                                <label for="price" class="block mb-2 text-sm font-medium text-gray-900">Price</label>
                                <input type="text" id="price" value="<?php echo htmlspecialchars($viewData['p_price']); ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </div>
                            <div class="mb-5">
                                <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900">Map</label>
                                <input disabled type="text" id="base-input" value="<?php echo htmlspecialchars($viewData['p_link']); ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </div>
                        </div>

                        <div class="mb-5">
                            <label for="address" class="block mb-2 text-sm font-medium text-gray-900">Address</label>
                            <input type="text" id="address" value="<?php echo htmlspecialchars($viewData['p_address']); ?>" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>

                        <div class="mb-5">
                            <label for="description" class="block mb-2 text-m font-medium text-gray-900 ">Description</label>
                            <textarea id="" rows="4" class="description block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500" style=" white-space: normal;"><?php echo htmlspecialchars($viewData['p_desc']); ?></textarea>
                        </div>
                    </form>

                <?php else: ?>
                    <p class="text-red-500">No data found.</p>
                <?php endif; ?>

                <div class="masonry-grid">
                    <?php if (!empty($viewData) && isset($viewData['p_img']) && !empty($viewData['p_img'])):
                        $images = json_decode($viewData['p_img'], true);

                        if (!is_array($images)) {
                            echo '<p style="text-align: center; color: gray;">Invalid image data.</p>';
                        } else {
                            foreach ($images as $index => $image): ?>

                                <!-- Masonry Item -->
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

    <div id="imagePopup" class="fixed inset-0 bg-black bg-opacity-80 flex justify-center items-center hidden">
        <div class="relative max-w-3xl w-full">
            <img id="popupImage" class="w-full h-auto rounded-lg">
            <button onclick="closeImagePopup()" class="absolute top-2 right-2 bg-red-600 text-white p-2 rounded-full">
                ✕
            </button>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.1/dist/flowbite.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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

            $('.load-rooms').on('click', function() {
                const id = $(this).data('pid')
                $.ajax({
                    url: 'rooms.php',
                    method: 'GET',
                    data: {
                        'get': true,
                        id: id
                    },
                    success: function(data) {
                        $('.view-tabs-rooms').html(data);
                    },
                    error: function() {
                        alert("Failed to load rooms.");
                    }
                });
            });

            $('.update-btn').on('click', function(e) {
                e.preventDefault();

                const id = $(this).data('id');

                const name = $('#name').val();
                const address = $('#address').val();
                const price = $('#price').val();
                const description = $('.description').val().trim();

                console.log(id)

                $.ajax({
                    url: '../../database/update.php',
                    method: 'post',
                    data: {
                        'submit': true,
                        id: id,
                        address: address,
                        name: name,
                        price: price,
                        description: description
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

            $('.delete-btn').on('click', function(e) {
                e.preventDefault();
                const id = $(this).data('id');

                $.ajax({
                    url: '../../database/update.php',
                    method: 'post',
                    data: {
                        'delete': true,
                        id: id
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            Command: toastr["success"](response.success)
                            $(".odc").load(".odc");
                            setTimeout(function() {
                                window.location.href = "home.php";
                            }, 2000)
                        }
                        else {
                            Command: toastr["error"](response.error)
                        }
                    }
                })
            })

            $('.add-room').on('click', function(e) {
                e.preventDefault();

                const uid = $(this).data('uid');
                const pid = $(this).data('pid');
                const comp = $('#comp').val();
                const rprice = $('#rprice').val();
                const rname = $('#rname').val();
                const description = $('#description').val();

                const fileInput = document.getElementById('file_input');
                const files = fileInput.files;

                let formData = new FormData();
                formData.append('add_room', true);
                formData.append('uid', uid);
                formData.append('pid', pid);
                formData.append('rprice', rprice);
                formData.append('comp', comp);
                formData.append('rname', rname);
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
        })

        function openImagePopup(imageSrc) {
            document.getElementById('popupImage').src = imageSrc;
            document.getElementById('imagePopup').classList.remove('hidden');
        }

        function closeImagePopup() {
            document.getElementById('imagePopup').classList.add('hidden');
        }
        document.getElementById('showMoreBtn')?.addEventListener('click', function() {
            document.querySelectorAll('[data-index]').forEach(el => el.classList.remove('hidden'));
            this.style.display = 'none';
        });

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
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    </script>

</body>

</html>