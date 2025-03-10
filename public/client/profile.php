<?php
session_start();
$user = $_SESSION['u_id'];
include('../../Classes/Users.php');
include('../../database/check.php');

$_SESSION['u_id'];

$load = new Users();
$result = $load->getUserInfo($user);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/settings.css">
    <link rel="stylesheet" href="../css/user.css">
    <title>Settings</title>

</head>

<body class="">

    <nav class="bg-white border-gray-200 custom-nav-bg sticky top-0 z-40">
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

    <!-- Main modal -->
    <div id="up-modal" tabindex="-1" aria-hidden="true" class="add-modal-custom-text hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full" style="z-index: 1;">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow-sm ">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900 ">
                        Profile picture
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="up-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form class="p-4 md:p-5">

                    <div class="flex items-center justify-center w-full">
                        <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                </svg>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                            </div>
                            <input id="dropzone-file" type="file" class="hidden" />
                        </label>
                    </div>
                    <br>
                    <button type="submit" data-id="<?php echo $user ?>" class="add-prof text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Add
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div class="antialiased ">

        <div class="mx-auto max-w-screen-sm pt-5 text-center mb-3 lg:mb-5">
            <h2 class="mb-1 text-2xl tracking-tight font-extrabold text-gray-900">Profile Settings</h2>
        </div>

        <section class="bg-white">
            <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
                <div class="mx-auto max-w-screen-sm text-center">
                    <h1 class="mb-4 text-7xl tracking-tight font-extrabold lg:text-9xl text-primary-600 ">
                        <center>
                            <img src="../../uploads/<?php echo $loads['u_profile'] ?>" style="width: 20%; border-radius: 50%; aspect-ratio: 2/2" alt="Flowbite Logo">
                        </center>
                    </h1>
                    <p class="mb-4 text-lg font-light text-gray-500 dark:text-blue-600 cursor-pointer" data-modal-target="up-modal" data-modal-toggle="up-modal" style="text-decoration:underline !important;">
                        Change profile
                    </p>
                </div>
            </div>
        </section>

        <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-tab" data-tabs-toggle="#default-tab-content" role="tablist">
                <li class="me-2" role="presentation">
                    <button class="inline-block p-4 border-b-2 rounded-t-lg" id="profile-tab" data-tabs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">My Accommodations</button>
                </li>
                <li class="me-2" role="presentation">
                    <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab" aria-controls="dashboard" aria-selected="false">Change credentials</button>
                </li>
            </ul>
        </div>
        <div id="default-tab-content">
            <div class="hidden p-4 rounded-lg" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <?php include('render_acc.php') ?>
            </div>
            <div class="hidden p-4 rounded-lg" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                <main class="p-4 md:ml-64 h-auto">
                    <div class="grid lg:grid-cols-1 gap-6 ">
                        <form>
                            <h2 class=" text-2xl tracking-tight font-extrabold text-gray-900 ">Personal Information</h2>
                            <div class="grid gap-6 mb-6 md:grid-cols-3 card-custom">
                                <div>
                                    <label for="fname" class="block mb-2 text-sm font-medium text-gray-900 ">First name</label>
                                    <input value="<?php echo $result['u_fname'] ?? null ?>" type="text" id="fname" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John" required />
                                </div>
                                <div>
                                    <label for="lname" class="block mb-2 text-sm font-medium text-gray-900 ">Last name</label>
                                    <input value="<?php echo $result['u_lname'] ?? null ?>" type="text" id="lname" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Doe" required />
                                </div>
                                <div>
                                    <label for="mname" class="block mb-2 text-sm font-medium text-gray-900 ">Middle name</label>
                                    <input value="<?php echo $result['u_mname'] ?? null ?>" type="text" id="mname" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Doe" required />
                                </div>
                                <div>
                                    <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 ">Phone number</label>
                                    <input value="<?php echo $result['pi_contact'] ?? null ?>" type="" id="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="123-45-678" required />
                                </div>
                                <div>
                                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ">Email</label>
                                    <input value="<?php echo $result['u_email'] ?? null ?>" type="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="123-45-678" required />
                                </div>
                                <br>
                            </div>
                            <h2 class=" text-2xl tracking-tight font-extrabold text-gray-900 ">Address</h2>
                            <div class="grid gap-6 mb-6 md:grid-cols-3 card-custom">
                                <div>
                                    <label for="brgy" class="block mb-2 text-sm font-medium text-gray-900 ">Baranggay</label>
                                    <input value="<?php echo $result['pi_brgy'] ?? null ?>" type="text" id="brgy" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John" required />
                                </div>
                                <div>
                                    <label for="block" class="block mb-2 text-sm font-medium text-gray-900 ">Block</label>
                                    <input value="<?php echo $result['pi_block'] ?? null ?>" type="text" id="block" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Doe" required />
                                </div>
                                <div>
                                    <label for="street" class="block mb-2 text-sm font-medium text-gray-900 ">Street</label>
                                    <input value="<?php echo $result['pi_street'] ?? null ?>" type="text" id="street" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Doe" required />
                                </div>
                                <div>
                                    <label for="city" class="block mb-2 text-sm font-medium text-gray-900 ">City</label>
                                    <input value="<?php echo $result['pi_city'] ?? null ?>" type="" id="city" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="123-45-678" required />
                                </div>
                                <div>
                                    <label for="zip" class="block mb-2 text-sm font-medium text-gray-900 ">Zip</label>
                                    <input value="<?php echo $result['pi_zip'] ?? null ?>" type="" id="zip" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="123-45-678" required />
                                </div>
                                <br>
                            </div>
                            <button type="submit" id="submit_info" data-id="<?php echo $result['u_id'] ?? null ?>" class="submit_info text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                        </form>
                    </div>
                </main>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.1/dist/flowbite.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let submitButton = document.getElementById("submit_info");
            let userId = submitButton.getAttribute("data-id");

            if (!userId) {
                submitButton.disabled = true;
                submitButton.classList.add("opacity-50", "cursor-not-allowed"); 
            }
        });

        $(document).ready(function() {

            $('.update_pass').on('click', function(e) {
                e.preventDefault();

                const id = $(this).data('id');
                const npass = $('#npass').val();
                const rpass = $('#rpass').val();

                $.ajax({
                    url: '../../database/update.php',
                    method: 'POST',
                    data: {
                        'update_password': true,
                        id: id,
                        npass: npass,
                        rpass: rpass
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
                            });
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

            $('#submit_info').on('click', function(e) {
                e.preventDefault();

                const id = $(this).data('id');
                const fname = $('#fname').val().trim();
                const lname = $('#lname').val().trim();
                const mname = $('#mname').val().trim();
                const phone = $('#phone').val().trim();
                const email = $('#email').val().trim();
                const brgy = $('#brgy').val().trim();
                const block = $('#block').val().trim();
                const street = $('#street').val().trim();
                const city = $('#city').val().trim();
                const zip = $('#zip').val().trim();

                if (!fname || !lname || !phone || !email || !brgy || !city || !zip) {
                    alert("Please fill in all required fields.");
                    return;
                }

                if (!/^\d{11}$/.test(phone)) {
                    alert("Invalid phone number. It should be 11 digits.");
                    return;
                }

                if (!/^\d{4,6}$/.test(zip)) {
                    alert("Invalid ZIP code.");
                    return;
                }

                if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
                    alert("Invalid email address.");
                    return;
                }

                let formData = new FormData();
                formData.append('update_pi_s', true);
                formData.append('id', id);
                formData.append('fname', fname);
                formData.append('lname', lname);
                formData.append('mname', mname);
                formData.append('phone', phone);
                formData.append('email', email);
                formData.append('brgy', brgy);
                formData.append('block', block);
                formData.append('street', street);
                formData.append('city', city);
                formData.append('zip', zip);

                $.ajax({
                    url: '../../database/update.php',
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                title: response.success,
                                icon: "success",
                                confirmButtonText: "OK"
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    $('#dashbord').load('#dashboard');
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
                });
            });

            $('.add-prof').on('click', function() {
                const id = $(this).data('id');
                const pic = $('#dropzone-file')[0].files[0]; // Get file

                if (!pic) {
                    alert("Please select an image.");
                    return;
                }

                let formData = new FormData();
                formData.append('add_prof', true);
                formData.append('id', id);
                formData.append('pic', pic);

                $.ajax({
                    url: '../../database/update.php',
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false, 
                    success: function(response) {
                        let res = JSON.parse(response);
                        if (res.success) {
                            alert(res.success);
                            location.reload();
                        } else {
                            alert(res.error);
                        }
                    }
                });
            });

            $('.add-acc').on('click', function(e) {
                e.preventDefault();

                const id = $(this).data('id');
                const name = $('#nameof').val();
                const price = $('#price').val();
                const type = $('#type').val();
                const address = $('#address').val();
                const description = $('#description').val();

                let selectedLabels = [];
                $('input[type="checkbox"]:checked').each(function() {
                    let label = $('label[for="' + $(this).attr('id') + '"]').text().trim();
                    selectedLabels.push(label);
                });

                let selectedLabelsJSON = JSON.stringify(selectedLabels);

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
                formData.append('labels', selectedLabelsJSON);

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

</html>