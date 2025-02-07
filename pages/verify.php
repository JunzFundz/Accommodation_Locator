<?php
include('../database/verifiy-account.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.1/dist/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
    <style>
        html,
        body {
            min-height: 100%;
        }

        body {
            height: 100vh;
        }
    </style>

</head>

<body>

    <section class="h-full">
        <div class="py-8 lg:py-16 px-4 mx-auto max-w-screen-md">
            <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-center text-gray-900 ">Verify Account</h2>
            <p class="mb-8 lg:mb-16 font-light text-center text-black-500 dark:text-gray-400 sm:text-xl">Verification code was sent to your email <?php echo htmlspecialchars($maskedEmail) ?></p>
            <form action="#" class="space-y-8">
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ">Code</label>
                    <input type="text" id="code1" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light" required>
                </div>
                <div>
                    <label for="subject" class="block mb-2 text-sm font-medium text-gray-900">Re-enter code</label>
                    <input type="text" id="code2" class="block p-3 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 shadow-sm focus:ring-primary-500 focus:border-primary-500  dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light" placeholder="" required>
                </div>
                <button type="submit" data-id="<?php echo htmlspecialchars($id)?>" data-email="<?php echo htmlspecialchars($email) ?>" class="verify-otp py-3 px-5 text-sm font-medium text-center text-white rounded-lg bg-blue-700 sm:w-fit hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Verify</button>

                <a href="#" data-id="<?php echo htmlspecialchars($id)?>" data-email="<?php echo htmlspecialchars($email) ?>" class="resend-mail font-medium text-blue-600 dark:text-blue-500 hover:underline" id="resendLink" style="pointer-events: none; color: gray;">
                    Re-send (<span id="countdown">10</span>s)
                </a>

            </form>
        </div>
    </section>

</body>
<script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.1/dist/flowbite.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    let countdown;
    let countdownElement = document.getElementById("countdown");
    let resendLink = document.getElementById("resendLink");
    let timer;

    function startCountdown(reset = false) {
        clearInterval(timer);

        let storedEndTime = localStorage.getItem("countdownEndTime");
        let currentTime = Date.now();

        if (storedEndTime && !reset) {
            countdown = Math.floor((storedEndTime - currentTime) / 1000);
            if (countdown <= 0) {
                countdown = 0;
                localStorage.removeItem("countdownEndTime");
            }
        } else {
            countdown = 10;
            localStorage.setItem("countdownEndTime", currentTime + countdown * 1000);
        }

        updateCountdownDisplay();

        if (countdown > 0) {
            timer = setInterval(() => {
                countdown--;
                updateCountdownDisplay();

                if (countdown <= 0) {
                    clearInterval(timer);
                    localStorage.removeItem("countdownEndTime");
                }
            }, 1000);
        }
    }

    function updateCountdownDisplay() {
        if (countdown > 0) {
            resendLink.style.pointerEvents = "none";
            resendLink.style.color = "gray";
            resendLink.innerHTML = `Re-send (<span id="countdown">${countdown}</span>s)`;
        } else {
            resendLink.style.pointerEvents = "auto";
            resendLink.style.color = "#1d4ed8";
            resendLink.textContent = "Re-send";
        }
    }

    window.onload = startCountdown;

    resendLink.addEventListener("click", (event) => {
        event.preventDefault();
        startCountdown(true);
    });

    $(document).ready(function() {
        $('.verify-otp').on('click', function(e) {
            e.preventDefault();

            const email = $(this).attr('data-email');
            const id = $(this).attr('data-id');
            const otp1 = $('#code1').val();
            const otp = $('#code2').val();

            console.log(email, otp)

            $.ajax({
                type: 'POST',
                url: '../database/check-otp.php',
                data: {
                    "verify_otp": true,
                    email: email,
                    otp: otp,
                    id: id
                },
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        Swal.fire({
                            title: response.success,
                            icon: "success",
                            confirmButtonText: "OK",
                            customClass: {
                                popup: "custom-popup",
                                title: "custom-title",
                                confirmButton: "custom-confirm-btn"
                            }
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "home.php";
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
                    Swal.fire({
                        title: "Error submitting the form: " + xhr.responseText,
                        icon: "error",
                        confirmButtonText: "OK"
                    })
                }
            })
        })

        $('.resend-mail').on('click', function(e) {
            e.preventDefault();
            const email = $(this).attr('data-email');
            const id = $(this).attr('data-id');

            $.ajax({
                type: 'POST',
                url: '../database/check-otp.php',
                data: {
                    "resend": true,
                    email: email,
                    id: id
                },
                error: function(xhr, status, error) {
                    Swal.fire({
                        title: "Error submitting the form: " + xhr.responseText,
                        icon: "error",
                        confirmButtonText: "OK"
                    })
                }
            })
        })
    });
</script>

</html>