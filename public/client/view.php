<?php
include('../../database/view.php')
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <title>View</title>
</head>

<body>

    <section class="py-8 bg-white md:py-16 antialiased">
        <div class="max-w-screen-xl px-4 mx-auto 2xl:px-0">
            <div class="lg:grid lg:grid-cols-1 lg:gap-8 xl:gap-16">
                <?php if (!empty($viewData)): ?>

                    <div class="mt-6 sm:gap-4 sm:items-center sm:flex sm:mt-8">
                        <a
                            href="#"
                            title=""
                            data-id="<?php echo htmlspecialchars($viewData['p_id']); ?>"
                            class="delete-btn flex items-center justify-center py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
                            role="button">
                            <svg class="w-6 h-6 text-gray-800 text-red-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
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

                    <div class="mt-6 sm:mt-8 lg:mt-0">
                        <p
                            class="text-2xl font-extrabold text-gray-900 sm:text-3xl">
                            <label for="name" class="block mb-2 text-m font-medium text-gray-900 ">Name</label>
                            <input value="<?php echo htmlspecialchars($viewData['p_name']); ?>" type="text" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                        </p>
                        <p
                            class="text-2xl font-extrabold text-gray-900 sm:text-3xl">
                            <label for="address" class="block mb-2 text-m font-medium text-gray-900 ">Address</label>
                            <input value="<?php echo htmlspecialchars($viewData['p_address']); ?>" type="text" id="address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                        </p>
                        <div class="mt-4 sm:items-center sm:gap-4 sm:flex">
                            <p
                                class="text-2xl font-extrabold text-gray-900 sm:text-3xl ">
                                <label for="price" class="block mb-2 text-m font-medium text-gray-900 ">Price</label>
                                <input type="text" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?php echo htmlspecialchars($viewData['p_price']); ?>" required />
                            </p>
                        </div>

                        <hr class="my-6 md:my-8 border-gray-200 dark:border-gray-800" />

                        <p class="mb-6 text-gray-500 dark:text-gray-400">
                            <label for="description" class="block mb-2 text-m font-medium text-gray-900 ">Description</label>
                            <textarea id="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500" style=" white-space: normal;"><?php echo htmlspecialchars($viewData['p_desc']); ?></textarea>
                        </p>
                    </div>
                <?php else: ?>
                    <p class="text-red-500">No data found.</p>
                <?php endif; ?>

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-2 max-w-4xl w-full mx-auto">
                    <?php if (!empty($viewData) && isset($viewData['p_img']) && !empty($viewData['p_img'])):
                        $images = json_decode($viewData['p_img'], true);

                        if (!is_array($images)) {
                            echo '<p class="text-white text-center col-span-4">Invalid image data.</p>';
                        } else {
                            $totalImages = count($images); ?>

                            <?php foreach ($images as $index => $image):

                                $gridClasses = [
                                    "col-span-1 sm:col-span-1 md:col-span-2",
                                    "col-span-1 sm:col-span-1 md:col-span-2",
                                    "col-span-1 sm:col-span-2 md:col-span-3",
                                    "col-span-1 sm:col-span-1 md:col-span-1",
                                    "col-span-1 sm:col-span-1 md:col-span-1",
                                ];
                                $class = $gridClasses[$index] ?? "col-span-1 sm:col-span-1 md:col-span-1";

                                $hiddenClass = ($index >= 4) ? "hidden" : "";
                            ?>

                                <div onclick="openImagePopup('../../uploads/<?= htmlspecialchars(trim($image)) ?>')"
                                    class="<?= $class ?> h-auto rounded-lg flex items-center justify-center <?= $hiddenClass ?>"
                                    data-index="<?= $index ?>">
                                    <img src="../../uploads/<?= htmlspecialchars(trim($image)) ?>"
                                        alt="Image <?= $index + 1 ?>"
                                        class="h-full w-full object-cover rounded-lg">
                                </div>
                            <?php endforeach; ?>

                            <?php if ($totalImages > 4): ?>
                                <div class="col-span-4 flex justify-center mt-4">
                                    <button id="showMoreBtn" class="px-4 py-2 text-black bg-blue-600 rounded-lg hover:bg-blue-700">
                                        Show More
                                    </button>
                                </div>
                            <?php endif; ?>

                        <?php }
                    else: ?>
                        <p class="text-white text-center col-span-4">No images available.</p>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        $(document).ready(function() {

            $('.update-btn').on('click', function(e) {
                e.preventDefault();

                const id = $(this).data('id');

                const name = $('#name').val();
                const address = $('#address').val();
                const price = $('#price').val();
                const description = $('#description').val().trim();

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
                            $("#myTable tbody").load(" #myTable tbody > *");
                            setTimeout(function(){
                                window.location.href = "home.php";
                            }, 2000)
                        }
                        else {
                            Command: toastr["error"](response.error)
                        }
                    }
                })
            })
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