<!-- Main modal -->
<div id="crud-modal" tabindex="-1" aria-hidden="true" class="add-modal-custom-text hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full" style="z-index: 1;">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow-sm ">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900 ">
                    Create
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form class="p-4 md:p-5">
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="col-span-2">
                        <label for="nameof" class="block mb-2 text-sm font-medium text-gray-900 ">Name</label>
                        <input type="text" name="name" id="nameof" class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5  dark:border-gray-500 dark:placeholder-gray-400  dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type name" required="">
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="price" class="block mb-2 text-sm font-medium text-gray-900 ">Price</label>
                        <input type="number" name="price" id="price" class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5  dark:border-gray-500 dark:placeholder-gray-400  dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="₱" required="">
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="category" class="block mb-2 text-sm font-medium text-gray-900 ">Accommodation Type</label>
                        <select id="type" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5  dark:border-gray-500 dark:placeholder-gray-400  dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option selected value="bh">Boarding House</option>
                            <option value="hs">Hotels</option>
                            <option value="lh">Lodging Houses</option>
                        </select>
                    </div>
                    <div class="col-span-2">
                        <label for="address" class="block mb-2 text-sm font-medium text-gray-900 ">Complete address</label>
                        <input type="text" name="address" id="address" class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5  dark:border-gray-500 dark:placeholder-gray-400  dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type address" required="">
                    </div>
                    <div class="col-span-2">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 ">Description</label>
                        <textarea id="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900  rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500  dark:border-gray-500 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write description here"></textarea>
                    </div>
                    <div class="col-span-2">
                        <label class="block mb-2 text-sm font-medium text-red-700 " for="file_input">Upload an images including the front of the house, hotel or etc..</label>
                        <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:border-gray-600 dark:placeholder-gray-400"
                            id="file_input"
                            type="file"
                            accept="image/*"
                            multiple>

                    </div>

                    <div class="flex items-center">
                        <input id="beats" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />

                        <label for="beats" class="ml-2 text-sm font-medium text-gray-900 ">NORSU Campus 1</label>
                    </div>

                    <div class="flex items-center">
                        <input id="bose" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />

                        <label for="bose" class="ml-2 text-sm font-medium text-gray-900 ">Norsu Campus 2</label>
                    </div>

                    <div class="flex items-center">
                        <input id="benq" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />

                        <label for="benq" class="ml-2 text-sm font-medium text-gray-900 ">Bais City Science High School</label>
                    </div>

                    <div class="flex items-center">
                        <input id="bosch" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />

                        <label for="bosch" class="ml-2 text-sm font-medium text-gray-900 ">Bais City High School</label>
                    </div>

                    <div class="flex items-center">
                        <input id="brother" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />

                        <label for="brother" class="ml-2 text-sm font-medium text-gray-900 ">LCC</label>
                    </div>

                    <div class="flex items-center">
                        <input id="biostar" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />

                        <label for="biostar" class="ml-2 text-sm font-medium text-gray-900 ">Centre of Bais</label>
                    </div>

                    <div class="flex items-center">
                        <input id="canon" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />

                        <label for="canon" class="ml-2 text-sm font-medium text-gray-900 ">Private room</label>
                    </div>

                    <div class="flex items-center">
                        <input id="cisco" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />

                        <label for="cisco" class="ml-2 text-sm font-medium text-gray-900 ">
                            Shared room
                        </label>
                    </div>

                    <div class="flex items-center">
                        <input id="corsair" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />

                        <label for="corsair" class="ml-2 text-sm font-medium text-gray-900 "> Laundry area</label>
                    </div>

                    <div class="flex items-center">
                        <input id="csl" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />

                        <label for="csl" class="ml-2 text-sm font-medium text-gray-900 ">Kitchen</label>
                    </div>

                    <div class="flex items-center">
                        <input id="dell" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />

                        <label for="dell" class="ml-2 text-sm font-medium text-gray-900 ">Wifi</label>
                    </div>

                    <div class="flex items-center">
                        <input id="dyson" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />

                        <label for="dyson" class="ml-2 text-sm font-medium text-gray-900 ">
                            Swimming pool
                        </label>
                    </div>

                    <div class="flex items-center">
                        <input id="dobe" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />

                        <label for="dobe" class="ml-2 text-sm font-medium text-gray-900 ">
                            Parking
                        </label>
                    </div>

                    <div class="flex items-center">
                        <input id="digitus" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />

                        <label for="digitus" class="ml-2 text-sm font-medium text-gray-900 "> Complimentary breakfast</label>
                    </div>

                    <div class="flex items-center">
                        <input id="extreme" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />

                        <label for="extreme" class="ml-2 text-sm font-medium text-gray-900 ">
                            Air conditioned
                        </label>
                    </div>

                    <div class="flex items-center">
                        <input id="elgato" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />

                        <label for="elgato" class="ml-2 text-sm font-medium text-gray-900 ">
                            Bathroom
                        </label>
                    </div>
                    
                    <div class="flex items-center">
                        <input id="emi" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />

                        <label for="emi" class="ml-2 text-sm font-medium text-gray-900 ">
                            Parking
                        </label>
                    </div>
                </div>
                <button type="submit" data-id="<?php echo $_SESSION['u_id']; ?>" class="add-acc text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Add
                </button>
            </form>
        </div>
    </div>
</div>