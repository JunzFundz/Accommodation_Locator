<?php
include '../Classes/Admin.php';
$view = new Admin();

if (isset($_POST['check'])) {
    $rid = $_POST['rid'];
    $uid = $_POST['uid'];

    $result = $view->viewIndividual($rid, $uid);

    if ($result) { ?>

        <section class="bg-white antialiased">
            <div class="max-w-screen-xl px-4 mx-auto lg:px-6 lg:py-24">
                <div class="flow-root max-w-3xl mx-auto sm:mt-12 lg:mt-16">
                    <div class="-my-4 divide-y divide-gray-200 ">

                        <input hidden id="rid" value="<?= $result['r_id'] ?>">

                        <div class="flex flex-col gap-2 py-4 sm:gap-6 sm:flex-row sm:items-center">
                            <p class="w-32 text-sm font-normal text-gray-500 sm:text-right dark:text-gray-700 shrink-0">
                                Full Name
                            </p>
                            <h3 class="text-sm font-semibold text-gray-900 ">
                                : <a href="#" class="hover:underline"><?= $result['u_fname'] . " " .  $result['u_lname'] . " " .  $result['u_mname'] ?></a>
                            </h3>
                        </div>

                        <div class="flex flex-col gap-2 py-4 sm:gap-6 sm:flex-row sm:items-center">
                            <p class="w-32 text-sm font-normal text-gray-500 sm:text-right dark:text-gray-700 shrink-0">
                                Email
                            </p>
                            <h3 class="text-sm font-semibold text-gray-900 ">
                                : <a href="#" class="hover:underline"><?= $result['u_email'] ?></a>
                            </h3>
                        </div>

                        <div class="flex flex-col gap-2 py-4 sm:gap-6 sm:flex-row sm:items-center">
                            <p class="w-32 text-sm font-normal text-gray-500 sm:text-right dark:text-gray-700 shrink-0">
                                Contact
                            </p>
                            <h3 class="text-sm font-semibold text-gray-900 ">
                                : <a href="#" class="hover:underline"><?= $result['pi_contact'] ?></a>
                            </h3>
                        </div>

                        <div class="flex flex-col gap-2 py-4 sm:gap-6 sm:flex-row sm:items-center">
                            <p class="w-32 text-sm font-normal text-gray-500 sm:text-right dark:text-gray-700 shrink-0">
                                Address
                            </p>
                            <h3 class="text-sm font-semibold text-gray-900 ">
                                : <a href="#" class="hover:underline"><?= $result['pi_brgy'] . " " . $result['pi_block'] . " " . $result['pi_street'] . " " . $result['pi_city'] ?></a>
                            </h3>
                        </div>

                        <div class="flex flex-col gap-2 py-4 sm:gap-6 sm:flex-row sm:items-center">
                            <p class=" text-xs font-normal text-gray-500 sm:text-right dark:text-gray-700 shrink-0">
                                Information date added : <a href="#" class="hover:underline">
                                    <?= date("F j, Y - h:i A", strtotime($result['pi_date_added'])) ?>
                                </a>
                            </p>

                            <p class="text-xs font-normal text-gray-500 sm:text-right dark:text-gray-700 shrink-0">
                                Date of registration : <a href="#" class="hover:underline">
                                    <?= date("F j, Y - h:i A", strtotime($result['r_date_requested'])) ?>
                                </a>
                            </p>
                        </div>

                        <div class="flex flex-col gap-2 py-4 sm:gap-6 sm:flex-row sm:items-center">
                        </div>

                    </div>
                </div>
            </div>
        </section>


    <?php } else { ?>
        <p>No data found.</p>
    <?php }
}

if (isset($_POST['view_modal'])) {
    $pid = $_POST['pid'];

    $result = $view->checkUploads($pid);

    if ($result) { ?>

        <section class="bg-white antialiased">
            <div class="max-w-screen-xl px-4 mx-auto lg:px-6 lg:py-24">
                <div class="flow-root max-w-3xl mx-auto sm:mt-12 lg:mt-16">
                    <div class="-my-4 divide-y divide-gray-200 ">

                        <input hidden id="pid" value="<?= $result['p_id'] ?>">

                        <div class="flex flex-col gap-2 py-4 sm:gap-6 sm:flex-row sm:items-center">
                            <p class="w-32 text-sm font-normal text-gray-500 sm:text-right dark:text-gray-700 shrink-0">
                                Name
                            </p>
                            <h3 class="text-sm font-semibold text-gray-900 ">
                                : <a href="#" class="hover:underline"><?= $result['p_name'] ?></a>
                            </h3>
                        </div>

                        <div class="flex flex-col gap-2 py-4 sm:gap-6 sm:flex-row sm:items-center">
                            <p class="w-32 text-sm font-normal text-gray-500 sm:text-right dark:text-gray-700 shrink-0">
                                Price
                            </p>
                            <h3 class="text-sm font-semibold text-gray-900 ">
                                : <a href="#" class="hover:underline"><?= $result['p_price'] ?></a>
                            </h3>
                        </div>

                        <div class="flex flex-col gap-2 py-4 sm:gap-6 sm:flex-row sm:items-center">
                            <p class="w-32 text-sm font-normal text-gray-500 sm:text-right dark:text-gray-700 shrink-0">
                                Address
                            </p>
                            <h3 class="text-sm font-semibold text-gray-900 ">
                                : <a href="#" class="hover:underline"><?= $result['p_address'] ?></a>
                            </h3>
                        </div>

                        <div class="flex flex-col gap-2 py-4 sm:gap-6 sm:flex-row sm:items-center">
                            <p class="w-32 text-sm font-normal text-gray-500 sm:text-right dark:text-gray-700 shrink-0">
                                Embedded Map Link
                            </p>
                            <input type="text" id="embedded-link">
                        </div>

                    </div>
                </div>
            </div>
        </section>


    <?php } else { ?>
        <p>No data found.</p>
<?php }
}
