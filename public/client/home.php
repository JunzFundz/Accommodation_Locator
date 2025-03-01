<?php
session_start();

include('../../database/check.php');
include('add.php');

$_SESSION['u_id'];

foreach ($data as $datas) {
    $res = $datas['p_status'];
}
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

<body class="home-bg">
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

    <section class="py-8 antialiased md:py-12 h-full">
        <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">


            <?php if ($checkStatus['r_status'] === 'pending' || $checkStatus['r_status'] === 'declined' || $checkStatus['r_status'] === 'deactivated') : ?>
            <?php else : ?>
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
                            </ol>
                        </nav>
                        <h2 class="mt-3 text-xl font-semibold text-gray-900 sm:text-2xl"></h2>
                    </div>
                </div>
            <?php endif; ?>


            <?php if ($result === true) { ?>
                <?php if (!empty($data)) : ?>
                    <div class="mb-4 grid gap-4 sm:grid-cols-2 md:mb-8 lg:grid-cols-3 xl:grid-cols-4">
                        <?php foreach ($data as $row) :

                            $images = json_decode($row['p_img'], true);
                            $firstImage = (!empty($images) && is_array($images)) ? htmlspecialchars($images[0], ENT_QUOTES, 'UTF-8') : 'default.jpg';

                            if ($row['p_status'] == 3) { ?>

                                <div class="cursor-not-allowed relative rounded-lg border border-gray-200  p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                                    <div style="background-color: white; opacity: 40%" class="absolute inset-0 flex items-center justify-center z-10">
                                        <span class="text-gray-900 font-semibold text-lg">Under Validation</span>
                                    </div>

                                    <div class="h-56 w-full opacity-60 pointer-events-none">
                                        <a href="view.php?name=<?php echo $row['p_name'] ?>&type=<?php echo $row['p_type'] ?>&number=<?php echo $row['p_id'] ?>">
                                            <img class="mx-auto h-full" src="../../uploads/<?php echo $firstImage; ?>" alt="Property Image" />
                                        </a>
                                    </div>

                                    <div class="pt-6 opacity-60 pointer-events-none">
                                        <a href="view.php?name=<?php echo $row['p_name'] ?>&type=<?php echo $row['p_type'] ?>&number=<?php echo $row['p_id'] ?>"
                                            class="text-lg font-semibold leading-tight text-gray-900 dark:text-white">
                                            <?php echo htmlspecialchars($row['p_name']); ?>
                                        </a>
                                    </div>
                                </div>


                            <?php } else { ?>

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

                            <?php } ?>

                        <?php endforeach; ?>
                    <?php else : ?>
                        <section class="card-custom">
                            <div class="gap-8 items-center py-8 px-4 mx-auto max-w-screen-xl xl:gap-16 md:grid md:grid-cols-2 sm:py-16 lg:px-6">
                                <img class="w-full dark:hidden" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/cta/cta-dashboard-mockup.svg" alt="dashboard image">
                                <img class="w-full hidden dark:block" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/cta/cta-dashboard-mockup-dark.svg" alt="dashboard image">
                                <div class="mt-4 md:mt-0">
                                    <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900">Let's create more tools and ideas that brings us together.</h2>
                                    <p class="mb-6 font-light text-gray-800 md:text-lg custom-p-font">Flowbite helps you connect with friends and communities of people who share your interests. Connecting with your friends and family as well as discovering new ones is easy with features like Groups.</p>
                                    <a href="#" class="inline-flex items-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:focus:ring-blue-900">
                                        Get started
                                        <svg class="ml-2 -mr-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </section>
                    <?php endif; ?>
                    </div>
        </div>
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
        $('input[type="checkbox"]').change(function() {
            if ($(this).is(':checked')) {
                var labelText = $('label[for="' + $(this).attr('id') + '"]').text();
                console.log("Checked Label:", labelText);
            }
        });
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

            // Get all checked checkboxes and store their labels in an array
            let selectedLabels = [];
            $('input[type="checkbox"]:checked').each(function() {
                let label = $('label[for="' + $(this).attr('id') + '"]').text();
                selectedLabels.push(label);
            });

            // Convert to JSON
            let selectedLabelsJSON = JSON.stringify(selectedLabels);

            // Handle file uploads
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
            formData.append('labels', selectedLabelsJSON); // 🟢 Send JSON Data

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
                        });
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