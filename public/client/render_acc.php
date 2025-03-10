    <!-- Main modal -->
    <div id="change-password" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow-sm">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-700">
                        Change password
                    </h3>
                    <button type="button" class="text-gray-700 bg-transparent rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="change-password">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4">
                    <form>
                        <input value="<?php echo $_SESSION['u_email'] ?>" type="hidden" id="email" />
                        <div class="mb-6">
                            <label for="npass" class="block mb-2 text-sm font-medium text-gray-900 ">Password</label>
                            <input type="password" id="npass" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="•••••••••" required />
                        </div>
                        <div class="mb-6">
                            <label for="rpass" class="block mb-2 text-sm font-medium text-gray-900 ">Confirm password</label>
                            <input type="password" id="rpass" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="•••••••••" required />
                        </div>
                    </form>

                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button type="submit" id="update_pass" data-id="<?php echo $_SESSION['u_id'] ?? null ?>" class="update_pass text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                </div>
            </div>
        </div>
    </div>

    <?php include('add.php') ?>

    <section class="py-8 antialiased md:py-12 h-full">
        <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">

            <?php if (
                !empty($checkStatus) && isset($checkStatus['r_status']) &&
                ($checkStatus['r_status'] === 'pending' ||
                    $checkStatus['r_status'] === 'declined' ||
                    $checkStatus['r_status'] === 'deactivated')
            ) : ?>

            <?php elseif (!empty($checkStatus) && isset($checkStatus['r_status']) && $checkStatus['r_status'] === "approved") : ?>

                <div class="mb-4 items-end justify-between space-y-4 sm:flex sm:space-y-0 md:mb-8">
                    <div class="custom-size">
                        <nav class="flex" aria-label="Breadcrumb">
                            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                                <li class="inline-flex items-center">
                                    <a href="#" data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="inline-flex items-center text-sm font-medium bg-blue-700 p-3 text-white rounded-lg">
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


            <?php if (!empty($data)) : ?>
                <div class="mb-4 grid gap-4 sm:grid-cols-2 md:mb-8 lg:grid-cols-3 xl:grid-cols-4">
                    <?php foreach ($data as $row) :

                        $images = json_decode($row['p_img'], true);
                        $firstImage = (!empty($images) && is_array($images)) ? htmlspecialchars($images[0], ENT_QUOTES, 'UTF-8') : 'default.jpg';

                        if ($row['p_status'] == 3) { ?>

                            <div class="cursor-not-allowed relative rounded-lg border border-gray-200  p-6 shadow-sm dark:border-gray-700 ">
                                <div style="background-color: white; opacity: 40%" class="absolute inset-0 flex items-center justify-center z-10">
                                    <span class="text-gray-900 font-semibold text-lg">Under Validation</span>
                                </div>

                                <div class="h-56 w-full">
                                    <a href="view.php?name=<?php echo $row['p_name'] ?>&type=<?php echo $row['p_type'] ?>&number=<?php echo $row['p_id'] ?>">
                                        <img class="mx-auto h-full" src="../../uploads/<?php echo $firstImage; ?>" alt="Property Image" />
                                    </a>
                                </div>
                                <div class="pt-6">
                                    <a href="view.php?name=<?php echo $row['p_name'] ?>&type=<?php echo $row['p_type'] ?>&number=<?php echo $row['p_id'] ?>">
                                        <?= htmlspecialchars($row['p_name']) ?>
                                    </a>
                                    <ul class="mt-2 flex items-center gap-4">
                                        <li class="flex items-center gap-2">
                                            <p class="text-sm font-medium"><?= htmlspecialchars($row['p_address']) ?></p>
                                        </li>
                                    </ul>
                                    <div class="mt-4 flex items-center justify-between gap-4">
                                        <p class="text-2xl font-extrabold leading-tight">₱<?= number_format($row['p_price']) ?></p>
                                        <button type="button" class="inline-flex items-center rounded-lg bg-blue-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            <a href="view.php?name=<?php echo $row['p_name'] ?>&type=<?php echo $row['p_type'] ?>&number=<?php echo $row['p_id'] ?>">
                                                View in details
                                            </a>
                                        </button>
                                    </div>
                                </div>
                            </div>

                        <?php } else { ?>

                            <div class="card-custom rounded-lg border border-gray-200 p-6 shadow-sm dark:border-gray-700">
                                <div class="h-56 w-full">
                                    <a href="view.php?name=<?php echo $row['p_name'] ?>&type=<?php echo $row['p_type'] ?>&number=<?php echo $row['p_id'] ?>">
                                        <img class="mx-auto h-full" src="../../uploads/<?php echo $firstImage; ?>" alt="Property Image" />
                                    </a>
                                </div>
                                <div class="pt-6">
                                    <a href="view.php?name=<?php echo $row['p_name'] ?>&type=<?php echo $row['p_type'] ?>&number=<?php echo $row['p_id'] ?>">
                                        <?= htmlspecialchars($row['p_name']) ?>
                                    </a>
                                    <ul class="mt-2 flex items-center gap-4">
                                        <li class="flex items-center gap-2">
                                            <p class="text-sm font-medium"><?= htmlspecialchars($row['p_address']) ?></p>
                                        </li>
                                    </ul>
                                    <div class="mt-4 flex items-center justify-between gap-4">
                                        <p class="text-2xl font-extrabold leading-tight">₱<?= number_format($row['p_price']) ?></p>
                                        <button type="button" class="inline-flex items-center rounded-lg bg-blue-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            <a href="view.php?name=<?php echo $row['p_name'] ?>&type=<?php echo $row['p_type'] ?>&number=<?php echo $row['p_id'] ?>">
                                                View in details
                                            </a>
                                        </button>
                                    </div>
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
                                <a href="apply.php" class="inline-flex items-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:focus:ring-blue-900">
                                    Apply
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