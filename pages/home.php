<?php
$conn = new Mysqli("localhost", "root", "fundador142", "capstone");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../node_modules/flowbite/dist/flowbite.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
    <style>
        .fa-location-crosshairs {
            font-size: 1.5rem;
            color: gray;
            transition: color 0.3s ease;
        }

        /* nav{
            background-color: #191970;
        } */

        @media screen and (max-width: 424px) {
            .logo-text {
                font-size: 1rem;
                /* display: none; */
            }

            .fa-location-crosshairs {
                font-size: 1rem;
            }

            .menu-below li a {
                font-size: .7rem;
            }
        }
    </style>
</head>

<body>
    <nav class="bg-white border-gray-200 dark:bg-gray-900">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="https://flowbite.com/" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="logo.png" class="h-8" alt="Flowbite Logo">
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white logo-text">Accommodation Locator</span>
            </a>
            <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                <label class="inline-flex items-center cursor-pointer">
                    <i class="fa-solid fa-location-crosshairs" id="locationIcon"></i>
                </label>
            </div>
        </div>
    </nav>

    <nav class="bg-gray-50 dark:bg-gray-700">
        <div class="max-w-screen-xl px-4 py-3 mx-auto">
            <div class="flex items-center">
                <ul class="flex flex-row font-medium mt-0 space-x-8 rtl:space-x-reverse text-sm menu-below">
                    <li>
                        <a href="#" class="text-gray-900 dark:text-white hover:underline" aria-current="page">Boarding House</a>
                    </li>
                    <li>
                        <a href="#" class="text-gray-900 dark:text-white hover:underline">Lodging House</a>
                    </li>
                    <li>
                        <a href="#" class="text-gray-900 dark:text-white hover:underline">Hotels</a>
                    </li>
                    <li>
                        <a href="#" class="text-gray-900 dark:text-white hover:underline">Transportation</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <form class="max-w-md mx-auto">
    <label for="location-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
    <div class="relative">
        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
            <i class="fa-solid fa-location-dot"></i>
        </div>
        <input type="search" id="location-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Location" required autocomplete="off"/>
        <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
        <div id="suggestions" class="absolute w-full bg-white border border-gray-300 rounded-lg shadow-md mt-1 hidden"></div>
    </div>
</form>



</body>
<script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.1/dist/flowbite.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
    $("#location-search").on("input", function(){
        let query = $(this).val();
        if (query.length > 0) {
            $.ajax({
                url: "../database/search_loc.php", 
                method: "POST",
                data: {query: query},
                success: function(data) {
                    $("#suggestions").html(data).show();
                }
            });
        } else {
            $("#suggestions").hide();
        }
    });

    $(document).on("click", ".suggestion-item", function(){
        $("#location-search").val($(this).text());
        $("#suggestions").hide();
    });

    $(document).click(function(e) {
        if (!$(e.target).closest("#location-search, #suggestions").length) {
            $("#suggestions").hide();
        }
    });
});

    function checkLocation() {
        if ("geolocation" in navigator) {
            navigator.geolocation.getCurrentPosition(
                function(position) {
                    document.getElementById("locationIcon").style.color = "blue";
                },
                function(error) {
                    if (error.code === error.PERMISSION_DENIED) {
                        alert("Please turn on your location for a better experience.");
                    }
                }
            );
        } else {
            alert("Geolocation is not supported by your device.");
        }
    }

    window.onload = checkLocation;

    navigator.geolocation.watchPosition(
        function(position) {
            document.getElementById("locationIcon").style.color = "blue";
        },
        function(error) {
            document.getElementById("locationIcon").style.color = "gray";
        }
    );
</script>

</html>